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
        
        return view('forum.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        /*$temp=$request;
        $temp['Name_of_thread'] = $temp['Forumo_temos'];
        $temp['Content'] = $temp['turinys'];
        $this->validate($temp, [
            'Name_of_thread' => 'required|min:5',
            'Content'  => 'required|min:10',
//            'g-recaptcha-response' => 'required|captcha'
        ]);*/
        $this->validate($request, [
            'Forumo_temos' => 'required|min:5',
            'turinys'  => 'required|min:10',
//            'g-recaptcha-response' => 'required|captcha'
        ]);

        //store
        //$thread = auth()->user()->threads()->create($request->all());

        //$thread->tags()->attach($request->tags);
        Forumas::create($request->all());

        //redirect
        return redirect()->route('forum.index')->withMessage('Thread Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Forumas  $forumas
     * @return \Illuminate\Http\Response
     */
    public function show(Forumas $forum)
    {
        //var_dump($forumas);
        //$user = Forumas::where('id',$forumas->id)->first();
        //var_dump($forum);
        return view('forum.single',compact('forum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Forumas  $forumas
     * @return \Illuminate\Http\Response
     */
    public function edit(Forumas $forum)
    {
        return view('forum.edit',compact('forum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Forumas  $forumas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forumas $forum)
    {
        $this->validate($request, [
            'Forumo_temos' => 'required|min:5',
            'turinys'  => 'required|min:10',
//            'g-recaptcha-response' => 'required|captcha'
        ]);
        $forum->update($request->all());
        return redirect()->route('forum.show',$forum->id)->withMessage('Thread updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Forumas  $forumas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forumas $forum)
    {
        $forum->delete();
        return redirect()->route('forum.index')->withMessage('Thread deleted');
    }
}
