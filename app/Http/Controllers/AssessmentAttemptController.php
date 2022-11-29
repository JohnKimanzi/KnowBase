<?php

namespace App\Http\Controllers;

use App\Models\AssessmentAttempt;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\GeneratedCertificate;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Exports\AssessmentAttemptsExport;
use App\Models\Achievement;
use App\Models\Lesson;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

use function GuzzleHttp\Promise\each;

class AssessmentAttemptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $attempts=AssessmentAttempt::paginate(8);
        return view('assessments.index', ['attempts'=>$attempts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(  $lesson_id)
    {
        $lesson=Lesson::findOrFail($lesson_id);
        // $quizzes=$course->quizzes;
        // Quiz::where('course_id', $course_id)->get();
        Session::put('global_lesson',$lesson);
            
        return View("assessments.make_attempt", compact('lesson'));
        // return View("assessments.oneQuiz", compact('lesson'));
    } 

    public function next(Quiz $quiz)
    {
        return 0;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $loop=1;
        $total_score=0;
        $lesson=Session::get('global_lesson');
        foreach ($lesson->quizzes as $quiz) 
        {
            
            $correct_ans=$quiz->correct_choice;
            $given_ans=$request->$loop;
            if (strcasecmp($correct_ans, $given_ans) == 0) {
                //count correct
                $total_score+=1;
            }
            $loop+=1;
        }
        //save res to db
        $course=$lesson->course;

        $assessmentAttempt = new AssessmentAttempt;
        $assessmentAttempt->user_id=Auth::id();
        //Pass, Fail, Incomplete
        $assessmentAttempt->study_time_taken="10.00";
        $assessmentAttempt->test_time_taken="10.00";
        $assessmentAttempt->score=round(($total_score/--$loop)*100);
        $assessmentAttempt->lesson_id=$lesson->id;
        // $assessmentAttempt->cert_status;
        if (round($total_score/$loop)*100 >= $lesson->pass_mark) 
        {
            $assessmentAttempt->status='pass';
        } else {
            $assessmentAttempt->status='fail';
        }
        
        // $assessmentAttempt->cert_status;

        $achievement=Auth::user()->achievements->where('course_id', $course->id)->first();
        $original_lesson_ids=$course->lessons->pluck('id')->toArray();

        if($achievement !=null)
        {           
            $lesson_ids=json_decode($achievement->lessons_done, true);
            // $lessons=Lesson::find($lesson_ids);
            // dd($lessons);
                
            if(is_array($lesson_ids))
            {
                if(!in_array($lesson->id, $lesson_ids))
                {
                    array_push($lesson_ids, $lesson->id);
                    $achievement->lessons_done=json_encode($lesson_ids);
                    
                }
                
            }
            elseif($lesson_ids!=$lesson->id)
            {
                // dd('not in array');
                $updated_lesson_ids=array($lesson_ids, $lesson->id);
                $achievement->lessons_done=json_encode($updated_lesson_ids);
                
            }
            
            //change status
            $achievement->save();
            $updated_lesson_ids=json_decode($achievement->lessons_done, true);
            
            if (!is_array($updated_lesson_ids)&&count($original_lesson_ids)==1 && in_array($lesson->id, $original_lesson_ids))
            {
                $achievement->status='complete';
            }
            elseif(is_array($updated_lesson_ids) && array_diff($original_lesson_ids, $updated_lesson_ids)==null)
            {
                $achievement->status='complete';
            }
        }
        else
        {
            //Create new record if the course has not been started
            $achievement=new Achievement();
            
            $achievement->course_id= $course->id;
            $achievement->user_id= Auth::user()->id;
            $achievement->lessons_done= json_encode($lesson->id);

            // if this this the only lesson in course mark it as done
            if(count($original_lesson_ids)==1 && in_array($lesson->id, $original_lesson_ids))
            {
                $achievement->status='complete';
            }
            else
            {
                $achievement->status='in progress';
            }
        }

        $achievement->save();
        // dd();

        //  generate a certificate if completed course and no cert is available
        if (strtolower($achievement->status)=='complete' && !GeneratedCertificate::where('achievement_id', $achievement->id)->exists()) 
        {
            $cert=new GeneratedCertificate();
            $cert->achievement_id=$achievement->id;
            $cert->code=Str::random(10);
            $cert->status='unverified';//verified, unverified, canceled, invalidated
            $cert->url=Auth::user()->name."_".$course->name.".png";
            
            $cert->save();
        }
        // dd($updated_lesson_ids);
        
        $assessmentAttempt->save();

        
        //email results to stakeholders
      
        Session::flash('success', 'Congratulations for completing the test! Your results are shown below');
        // Session::put('res', $quiz_res);
        return Redirect::route('testRes', $assessmentAttempt->id);
    }
    public function test_report($id)
    {
        try {
            $assessmentAttempt=AssessmentAttempt::findOrFail($id);
            return view('assessments.test_report', ['assessmentAttempt' => $assessmentAttempt]);
        } 
        catch (\Throwable $th) {
            return Redirect::route('courses.index')->with('error', "Please select a course to get started");
        }    
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssessmentAttempt  $assessmentAttempt
     * @return \Illuminate\Http\Response
     */
    public function show(AssessmentAttempt $assessmentAttempt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssessmentAttempt  $assessmentAttempt
     * @return \Illuminate\Http\Response
     */
    public function edit(AssessmentAttempt $assessmentAttempt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssessmentAttempt  $assessmentAttempt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssessmentAttempt $assessmentAttempt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssessmentAttempt  $assessmentAttempt
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssessmentAttempt $assessmentAttempt)
    {
        //
    }

    public function makeAttempt( $id)
    {
        // dd($id);
        $course=Lesson::find($id);
        return view('assessments.make_attempt',['course'=>$course]);
    }

    public function export() 
    {        

        $export=new AssessmentAttemptsExport();
        
        return Excel::download($export, 'assessment attempts.xlsx');
    }

    
}
