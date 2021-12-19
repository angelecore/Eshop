<?php

namespace App\Http\Controllers;

use App\Models\Forumas;
use Illuminate\Http\Request;

class ForumasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $forumas= Forumas::paginate(15);
       return view('forum.index',compact('forumas'));
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
     * @param  \App\Models\Forumas  $forumas
     * @return \Illuminate\Http\Response
     */
    public function show(Forumas $forumas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Forumas  $forumas
     * @return \Illuminate\Http\Response
     */
    public function edit(Forumas $forumas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Forumas  $forumas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forumas $forumas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Forumas  $forumas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forumas $forumas)
    {
        //
    }
}
