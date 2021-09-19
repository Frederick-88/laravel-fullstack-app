<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
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

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // filling the remember_token column if the remember me checkbox is checked.
        // then in web-cookies when you inspect there will be a key like "remember_web_59ba36addc2b2f9401580f014c7f58ea4e30989d"
        // then if want to create function can try, like bind with database, etc.
        $isRemember = $request->remember;

        if (!auth()->attempt($request->only('email', 'password'), $isRemember)) {
            return $this->redirectWithMessage('error','Invalid login details.');
        }

        return $this->redirectWithMessage('success','Welcome to FD Palette Community.','/palette-community');
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

    private function redirectWithMessage($type, $message, $requestedRoute = '')
    {
        // method to redirect back + query url
        // e.g "http://localhost:8000/palette-community?res_type=success&response=Successfully+shared+palette."
        $previousUrl = app('url')->previous();
        $hasQueryUrl = str_contains($previousUrl, '?') || false;
        $hasIsArchivedQuery = str_contains($previousUrl, 'is_archived') || false;

        $getCleanUrl = $previousUrl;
        if($hasQueryUrl){
            $getCleanUrl = explode('?',$previousUrl)[0]; // clean url without any query string
        }

        // prefix url redirects avoid duplicate query url
        $prefixUrl = $previousUrl.'?'. http_build_query(['res_type'=>$type,'response'=>$message]);
        if ($hasQueryUrl && $hasIsArchivedQuery) {
            $prefixUrl = $getCleanUrl.'?is_archived=true&'. http_build_query(['res_type'=>$type,'response'=>$message]);
        } else if($hasQueryUrl) {
            $prefixUrl = $getCleanUrl.'?'. http_build_query(['res_type'=>$type,'response'=>$message]);
        } else if (!!$requestedRoute) {
            $prefixUrl = $requestedRoute.'?'. http_build_query(['res_type'=>$type,'response'=>$message]);
        }

        return redirect()->to($prefixUrl);
    }
}
