<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Models\Gender;
use App\Models\MaritalStatus;
use App\Models\EducationLevel;
use App\Models\WorkExperience;
use App\Models\Reference;
use App\Models\Currency;
use Exception;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Gate;
use Throwable;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('isAdmin');
        return view('users.index',['users'=>User::paginate(12)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         Gate::authorize('isAdmin');
        $users = User::all();
        $countries = Country::all();
        $genders = Gender::all();
        $marital_statuses = MaritalStatus::all();
        $work_experiences = WorkExperience::all();
        $education_levels = EducationLevel::all();
        $references = Reference::all();
        return view('users.create', compact('users', 'countries', 'genders', 'marital_statuses', 'work_experiences', 'education_levels', 'references'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       // Gate::authorize('isAdmin');
        $rules=array(
            'fname' => ['required', 'string', 'max:255'],
            'mname' => ['string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'personal_email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'national_id' => ['required', 'string', 'max:15'],
            'phone1' => ['required', 'string', 'max:255'],
            'phone2' => ['nullable', 'string', 'max:255'],
            'dob' => ['required', 'date'],
            'salary' => ['numeric'],
            'dependants' => ['numeric'],
            'poccupation' => ['string'],
            'workExperience'=> ['nullable'],
            'educationDetails'=> ['required'],

        );

        $this->validate($request, $rules);
        $user=new User;
        $user->fname =$request->fname;
        $user->mname =$request->mname;
        $user->lname =$request->lname;
        $user->personal_email =$request->personal_email;
        $user->national_id =$request->national_id;
        $user->country_id =$request->country_id;
        $user->reference_id =$request->reference_id;
        $user->marital_status_id=$request->marital_status_id;
        $user->phone1 =$request->phone1;
        $user->phone2 =$request->phone2;
        $user->dob =$request->dob;
        $user->gender_id =$request->gender_id;
        $user->salary = $request->salary;
        $user->dependants = $request->dependants;
        $user->poccupation = $request->poccupation;
        $user->save();
        return response()->json([
            'status' => true,
            'message' => 'User created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        Gate::authorize('isAdmin');
        $user=User::findOrFail($id);
        return view('users.show', ['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('isAdmin');
        $user=User::findOrFail($id);

        return view('users.edit', ['user'=>$user, 'countries'=>Country::all()]);
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
        Gate::authorize('isAdmin');
        $user=User::findOrFail($id);
        $rules=array(
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],

            'national_id' => ['required', 'string', 'max:15'],
            'huduma_number' => ['nullable', 'string', 'max:20'],
            'country' => ['required', 'string', 'max:255'],
            'residence' => ['required', 'string', 'max:255'],
            'phone1' => ['required', 'string', 'max:255'],
            'phone2' => ['nullable', 'string', 'max:255'],
            'dob' => ['required', 'date'],
            'gender' => ['required', 'string', 'max:10'],
            'passport_num' => ['nullable', 'string', 'max:20'],
        );
        try {
            $this->validate($request, $rules);
            $user->name =$request->name;
            $user->email =$request->email;

            $user->national_id =$request->national_id;
            $user->huduma_number =$request->huduma_number;
            $user->country =$request->country;
            $user->residence =$request->residence;
            $user->phone1 =$request->phone1;
            $user->phone2 =$request->phone2;
            $user->dob =$request->dob;
            $user->gender =$request->gender;
            $user->passport_num =$request->passport_num;

            $user->save();
            Session::flash('success', 'User details updated successfully');
            return Redirect::route('users.show', $id);

        } catch (Throwable $err){
            throw $err;
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('isAdmin');
        $user = User::findOrFail($id);
        $user->delete();
        Session::flash('success', 'User has been deleted successfully');
        return Redirect::route('users.index');

    }
    public function profile()
    {
        return view('users.profile', ['user' => Auth::user(), 'countries' => Country::all()]);
    }
}
