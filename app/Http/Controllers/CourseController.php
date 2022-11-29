<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseToken;
use App\Models\StudyMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses=Course::all();
        // $study_materials=StudyMaterial::where('course_id', )->get();
        return view('courses.index', ['courses'=>$courses]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('isAdmin');
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if (Gate::allows('isAdmin')) {
        Gate::authorize('isAdmin');  

        $rules=array(
            'course_name'=>['required', 'string', 'max:255' ],
            'project'=>['required', 'string', 'max:255'],
            'description'=>['required'],
        );
        $this->validate($request, $rules);
        Course::create([
            'name'=>$request->course_name,
            'project'=>$request->project,
            'description'=>$request->description,
            'user_id'=>Auth::user()->id,
        ]);
        return Redirect::route('courses.create')->with('success',"Course added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        // this view needs looots'a rewriting!
        return view('courses.show', ['course'=>$course]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        Gate::authorize('isAdmin') || Gate::authorize('isManager');
        return view('courses.edit', ['course'=>$course]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        Gate::authorize('isAdmin');  
        $course= Course::findOrFail($id);
        $rules=array(
            'course_name'=>['required', 'string', 'max:255' ],
            'project'=>['required', 'string', 'max:255'],
            'description'=>['required'],
        );
        $this->validate($request, $rules);
        
        
        $course->name=$request->course_name;
        $course->project=$request->project;
        $course->description=$request->description;
        $course->user_id=Auth::user()->id;
        $course->save();
        return Redirect::route('courses.index')->with('success',"Changes have been saved successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('isAdmin');
        $Course = Course::findOrFail($id);
        $Course->delete();  
        Session::flash('success', 'Course has been deleted successfully');
        return Redirect::route('courses.index');
    }

}
