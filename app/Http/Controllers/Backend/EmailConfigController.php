<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\ContentApprovedMail;
use Illuminate\Http\Request;
use App\WebConfig;
use Illuminate\Support\Facades\Mail;

class EmailConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $email_lsit = WebConfig::all();
         return view('backend.web_config.index',compact('email_lsit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.web_config.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'app_password' => 'required',
        ]);

         $web_mail = WebConfig::create([
            'username' => $request->username,
            'email' => $request->email,
            'app_password' => $request->app_password,
         ]);
         $data = [
             'username' => $request->username,
             'email' => $request->email,
             'app_password' => $request->app_password,
         ];
         Mail::to($request->email)->send(new ContentApprovedMail($data));

         return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list = WebConfig::find($id);
        return view('backend.web_config.edit',compact('list'));
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
         $update = WebConfig::find($id);
         $update->username = $request->username;
         $update->email = $request->email;
         $update->app_password = $request->app_password;
         $update->save();


         return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         WebConfig::destroy($id);
         return redirect()->back();
    }
}
