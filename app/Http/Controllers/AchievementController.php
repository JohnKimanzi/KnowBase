<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\AssessmentAttempt;
use App\Models\Course;
use Hamcrest\Core\HasToString;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attempts=Auth::user()->assessmentAttempts;
        $i=0;
        $courses=array();
        $course_ids=array();
        foreach ($attempts as $attempt) {
            $courses[$i++]=$attempt->lesson->course;
            
        }
        // array_count_values($course_ids);
    //    dd(array_count_values(array_column($courses, "name"))['Project management']);
    //    dd(array_count_values(array_column($courses, "name"))['Project management']);

        // return view('achievements.index', ['attempts'=>$attempts, 'courses'=>$courses]);
        return view('achievements.index2', ['achievements'=>Achievement::where('user_id', Auth::user()->id)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Achievement $achievement)
    {
        //
        return view('achievements.show', ['achievement'=>$achievement]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
