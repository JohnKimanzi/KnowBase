<?php

namespace App\Http\Controllers;

use App\Models\GeneratedCertificate;
use Exception;
use Illuminate\Http\Request;

class GeneratedCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('certificates.index', ['certs'=>GeneratedCertificate::paginate(15)]);
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
     * @param  \App\Models\GeneratedCertificate  $generatedCertificate
     * @return \Illuminate\Http\Response
     */
    public function show(GeneratedCertificate $generatedCertificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GeneratedCertificate  $generatedCertificate
     * @return \Illuminate\Http\Response
     */
    public function edit(GeneratedCertificate $generatedCertificate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GeneratedCertificate  $generatedCertificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GeneratedCertificate $generatedCertificate)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GeneratedCertificate  $generatedCertificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(GeneratedCertificate $generatedCertificate)
    {
        //
    }
}
