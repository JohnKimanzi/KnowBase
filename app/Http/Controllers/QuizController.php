<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
Use App\Models\Lesson;
use App\Models\Course;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('isManager');
        $quizzes=Quiz::paginate(4);
        return view('quizzes.Newindex', ['quizzes'=> $quizzes, 'courses'=>Course::all(), 'lessons'=>Lesson::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        Gate::authorize('isManager');
        $lessons=Lesson::all();
        $courses=Course::all();
        return view('quizzes.create', ['lessons'=>$lessons, 'courses'=>$courses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('isManager');
        $rules=array(
            'course'=> ['required', 'numeric', 'min:1'],
            'lesson'=> ['required', 'numeric',  'min:1'],
            'quiz'=> ['required'],
            'choices'=> ['required'],
            'ans'=> ['required',  'numeric', 'min:0'],
        );

        $this->Validate($request    , $rules);
        // dd($validated_input);
        
        // if (!(Lesson::find($request->lesson))->course===$request->course) 
        // {
        //     //lesson is for different course
        //     // Session::flash('error', 'Congratulations for completing the test! Your results are shown below');
        //     return Redirect::back()->withErrors(['msg', 'Lesson does not exist withing the specified course domain. You can create the lesson before proceeding']);
        // }

        // else {
           
            Quiz::create([
                'user_id'=> Auth::user()->id,
                'lesson_id'=> $request->lesson,
                'question'=> $request-> quiz,
                'choices'=> json_encode($request->choices),
                'correct_choice'=> $request->choices[$request->ans],
            ]);
            // Session::flash('success', 'Quiz added successfully');
            return Redirect::route('quizzes.create')->with('success', 'Quiz added successfully');
        // }  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(quiz $quiz)
    {
        Gate::authorize('isManager');
        return view('quizzes.show', ['quiz'=>$quiz]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(quiz $quiz)
    {
        Gate::authorize('isManager');
        return view('quizzes.edit', ['quiz'=>$quiz, 'lessons'=>Lesson::all(), 'courses'=>Course::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Gate::authorize('isManager');
        $quiz=Quiz::findOrFail($id);
        $rules=array(
            'course'=> ['required', 'numeric', 'min:1'],
            'lesson'=> ['required', 'numeric',  'min:1'],
            'question'=> ['required'],
            'choices'=> ['required'],
            'ans'=> ['required',  'numeric', 'min:0'],
        );

        $this->Validate($request, $rules);
        
        $quiz->user_id= Auth::user()->id;
        $quiz->lesson_id= $request->lesson;
        $quiz->question= $request-> question;
        $quiz->choices= json_encode($request->choices);
        $quiz->correct_choice= $request->choices[$request->ans];
        
        $quiz->save();
        // Session::flash('success', 'Quiz added successfully');
        return Redirect::route('quizzes.show', $quiz->id)->with('success', 'Quiz updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        Gate::authorize('isManager');
        $quiz = Quiz::findOrFail($id);
        $quiz->delete();  
        Session::flash('success', 'Quiz has been deleted successfully');
        return Redirect::route('quizzes.index');
    }
}
