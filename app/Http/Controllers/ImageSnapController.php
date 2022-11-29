<?php

namespace App\Http\Controllers;

use App\Models\ImageSnap;
use Illuminate\Http\Request;

class ImageSnapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //save attempt details
        //save filename to db
        //take timestamp plus attempt code asfile name
        //generate a unique token for each attempt
        // this token will be used in certsand saving images

        /*
        flow of an attempt
        1. user clicks on attempt button.
        2. generate unique code
        3. takefirst snap and save using code
        4. grant access to course content
        5. take snaps at regular intervals
        6. User clicks take test
        7. Open test(take snaps)
        8. user finishes test and clicks save
        if user exits without finishing save progress and  record status as incomplete
        9. save reults and generate cert if passed
        10.
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ImageSnap  $imageSnap
     * @return \Illuminate\Http\Response
     */
    public function show(ImageSnap $imageSnap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ImageSnap  $imageSnap
     * @return \Illuminate\Http\Response
     */
    public function edit(ImageSnap $imageSnap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ImageSnap  $imageSnap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImageSnap $imageSnap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ImageSnap  $imageSnap
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImageSnap $imageSnap)
    {
        //
    }
}
