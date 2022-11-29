<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lessons.index', ['lessons' => Lesson::all()]);
    }
    
    public function courseLessons($course_id)
    {
        $course=Course::findOrFail($course_id);
        return view('lessons.index', ['lessons' => $course->lessons, 'course' => $course]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('isAdmin');
        return view('lessons.create', ['courses'=>Course::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('isAdmin');  
        
        $rules=array(
            'lesson_name'=>['required', 'string', 'max:255' ],
            'course'=>['required', 'numeric', 'min:1'],
            'study_time'=>['required', 'numeric', 'min:0'],
            'description'=>['required'],
            'pass_mark'=>['required', 'numeric', 'max:100', 'min:0'],
        );
        $this->validate($request, $rules);
        Lesson::create([
            'name'=>$request->lesson_name,
            'course_id'=>$request->course,
            'description'=>$request->description,
            'user_id'=>Auth::user()->id,
            'study_time'=>$request->study_time,
            'pass_mark'=>$request->pass_mark,
        ]);
        return Redirect::route('lessons.create')->with('success',"Lesson created successfully");
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show( $lesson)
    {
        return view('lessons.show', ['lesson'=>Lesson::findOrFail($lesson)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('isAdmin');
        return view('lessons.edit', ['lesson'=>Lesson::findOrFail($id), 'courses'=>Course::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        Gate::authorize('isAdmin');  
        $lesson=Lesson::findOrFail($id);
        $rules=array(
            'lesson_name'=>['required', 'string', 'max:255' ],
            'course'=>['required', 'numeric', 'min:1'],
            'study_time'=>['required', 'numeric'],
            'description'=>['required'],
            'pass_mark'=>['required', 'numeric', 'max:100', 'min:0'],
        );
        $this->validate($request, $rules);
        
        $lesson->name=$request->lesson_name;
        $lesson->course_id=$request->course;
        $lesson->description=$request->description;
        $lesson->user_id=Auth::user()->id;
        $lesson->study_time=$request->study_time;
        $lesson->pass_mark=$request->pass_mark;
        $lesson->save();
        return Redirect::route('lessons.index')->with('success',"Lesson has been updated successfully");
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Gate::authorize('isAdmin');
        $lesson = Lesson::findOrFail($id);
        $lesson->delete();  
        Session::flash('success', 'Lesson has been deleted successfully');
        return Redirect::route('lessons.index');
    }

    /**
     * Initiate study.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function start($id)
    {
        return view('lessons.start', ['lesson' => Lesson::findOrFail($id)]);
    }
}
