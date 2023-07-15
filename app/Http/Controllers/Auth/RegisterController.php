<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use Auth;
use DB;
use Log;

// models
use App\Models\User;

// email
use App\Mail\WelcomeEmail;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index(Request $request)
    {
        return view('auth.register');
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
        // "confirmed" validation in password will automatically bind with request of "password_confirmation" that is found in the input name attribute
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
        ]);

        DB::beginTransaction(); // use DB transaction if something breaks along the process

        try {
            User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            DB::commit();

            // way to login -> https://laravel.com/docs/7.x/authentication
            Auth::attempt([
                'email' => $request->email,
                'password' => $request->password
            ]);

            $current_loggedin_user = Auth::user();
            // Mail::to($current_loggedin_user->email)->send(new WelcomeEmail($current_loggedin_user->name));

            return $this->redirectWithMessage('success','Welcome to FD Palette Community.','/palette-community');
        } catch (\Exception $error) {
            DB::rollBack();
            Log::error($error);
            Redirect::back();
        }
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
