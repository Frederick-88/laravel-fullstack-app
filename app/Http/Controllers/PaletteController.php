<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Auth;

// email
use App\Mail\AddPaletteEmail;

// model
use App\Models\Palette;

class PaletteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']); // only authenticated users can come in
    }

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
        $this->validate($request, [
            'title' => 'required'
        ]);


        // default color fallback is 'black'.
        $colorsObject = [
            'color_1' => $request->input('color_1', '#000000'),
            'color_2' => $request->input('color_2', '#000000'),
            'color_3' => $request->input('color_3', '#000000'),
            'color_4' => $request->input('color_4', '#000000'),
            'color_5' => $request->input('color_5', '#000000'),
        ];

        // user_id will be automatically bind, or more info can learn docs or see video
        $request->user()->palettes()->create([
            'title' => $request->title,
            'colors' => $colorsObject
        ]);

        $current_loggedin_user = Auth::user();
        // Mail::to($current_loggedin_user->email)->send(new AddPaletteEmail($current_loggedin_user->name, $request->title));

        return $this->redirectWithMessage('success','Successfully shared palette.');
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
        $this->validate($request, [
            'title' => 'required'
        ]);

        $selectedPalette = Palette::where('id', $id)->first();
        $oldPaletteTitle = $selectedPalette->title;

        if(!$selectedPalette) {
            return $this->redirectWithMessage('success', 'Invalid palette id.');
        }

        // default color fallback is 'black'.
        $colorsObject = [
            'color_1' => $request->input('color_1', '#000000'),
            'color_2' => $request->input('color_2', '#000000'),
            'color_3' => $request->input('color_3', '#000000'),
            'color_4' => $request->input('color_4', '#000000'),
            'color_5' => $request->input('color_5', '#000000'),
        ];

        $this->authorize('authorized', $selectedPalette); // part of palettePolicy to make sure only the owner of a palette that can update it.

        $selectedPalette->update([
            'title' => $request->title,
            'colors' => $colorsObject
        ]);

        $responseMessage = 'Successfully edited ' . '"' . $oldPaletteTitle . '"' . ' palette.';
        return $this->redirectWithMessage('success', $responseMessage, '/palette-community');
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request, $id)
    {
        $selectedPalette = Palette::where('id', $id)->onlyTrashed()->first();

        if(!$selectedPalette) {
            return $this->redirectWithMessage('success', 'Invalid palette id.');
        }

        $this->authorize('authorized', $selectedPalette); // part of palettePolicy to make sure only the owner of a palette that can restore it.

        $selectedPalette->restore();

        return $this->redirectWithMessage('success', 'Successfully restored palette.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $isForceDelete = filter_var($request->input('is_force_delete', false), FILTER_VALIDATE_BOOLEAN);
        $selectedPalette = Palette::where('id', $id)
            ->when($isForceDelete, function($query) {
                return $query->onlyTrashed();
            })
            ->first();

        if(!$selectedPalette) {
            return $this->redirectWithMessage('success', 'Invalid palette id.');
        }

        $this->authorize('authorized', $selectedPalette); // part of palettePolicy to make sure only the owner of a palette that can delete it.

        $deleteText = '';
        if($isForceDelete){
            $selectedPalette->forceDelete();
            $deleteText = 'deleted';
        } else {
            $selectedPalette->delete();
            $deleteText = 'archived';
        }

        $responseMessage = 'Successfully ' . $deleteText . ' palette.';
        return $this->redirectWithMessage('success', $responseMessage);
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
