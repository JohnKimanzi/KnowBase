<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\COurse;
use App\Models\CourseToken;
use App\Models\Lesson;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseTokenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('isAdmin');
        return view("courses.tokens.index", ['tokens'=>CourseToken::paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('isAdmin');
        return view("courses.tokens.create", ['generated_code'=> Str::random(10), 'courses'=>Course::all()]);
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
            'token_name'=>['required', 'string', 'max:255'],
            'course'=>['required', 'numeric', 'min:1'],
            'code'=>['required', 'string', 'max:20'],
            'description'=>['required', 'string', 'max:1000'],
        );
        $this->validate($request, $rules);
        CourseToken::create([
            'name'=>$request->token_name,
            'code'=>$request->code,
            'course_id'=>$request->course,
            'description'=>$request->description,
            'user_id'=>Auth::user()->id,
        ]);
        return Redirect::route('tokens.create')->with('success',"Token created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseToken  $courseToken
     * @return \Illuminate\Http\Response
     */
    public function show(CourseToken $courseToken)
    {
        Gate::authorize('isAdmin');
        return view("courses.tokens.index", ['tokens'=>CourseToken::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseToken  $courseToken
     * @return \Illuminate\Http\Response
     */
    public function edit( $courseToken)
    {
        Gate::authorize('isAdmin');
        return view("courses.tokens.edit", ['token'=>CourseToken::findOrFail($courseToken), 'courses'=>Course::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseToken  $courseToken
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Gate::authorize('isAdmin');
        $rules=array(
            'token_name'=>['required', 'string', 'max:255'],
            'course'=>['required', 'numeric', 'min:1'],
            'code'=>['required', 'string', 'max:20'],
            'description'=>['required', 'string', 'max:1000'],
        );
        $this->validate($request, $rules);
        $token=CourseToken::findOrFail($id);
        
        $token->name=$request->token_name;
        $token->code=$request->code;
        $token->course_id=$request->course;
        $token->description=$request->description;
        $token->user_id=Auth::user()->id;
        
        $token->save();
        return Redirect::route('tokens.index')->with('success',"Token eddited successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseToken  $courseToken
     * @return \Illuminate\Http\Response
     */
    public function destroy($courseToken)
    {
        Gate::authorize('isAdmin');
        $Course = CourseToken::findOrFail($courseToken);
        $Course->delete();  
        Session::flash('success', 'The token has been deleted successfully');
        return Redirect::route('tokens.index');
    }

    /**
     * Validate the token of a specified resource against a given Course.
     *
     * @param  \App\Models\CourseToken  $courseToken
     * @return \Illuminate\Http\Response
     */
    public function validateToken(Request $request)
    {   
        //   dd($request->lesson_id);  
        $rules=array(
            'token'=>['required', 'string', 'max:20'],
            'agree'=>['required'],
            'lesson_id' => ['required', 'string', 'max:250'],
        );
        
        $this->validate($request, $rules);

        $lesson=Lesson::findOrFail($request->lesson_id);
        $course=$lesson->course;
        // dd($course->name." : ".$request->token);
        $get_token=CourseToken::where('code', $request->token)
            ->where('course_id', $course->id)
            ->first();
        if ($get_token<>null) {
            return Redirect::route('startLesson', ['lesson' => $request->lesson_id])->with('success', "Token code has been validated successfully.");
        }
        else{
            return Redirect::back()->with('error', "The token code is invalid. Are you sure you got the right course?");
        }
    }
}
