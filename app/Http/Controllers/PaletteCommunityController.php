<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

// model
use App\Models\Palette;

class PaletteCommunityController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']); // only authenticated users can come in
    }

    public function index(Request $request)
    {
        $isShowArchivedOnly = filter_var($request->input('is_archived', false), FILTER_VALIDATE_BOOLEAN); // for a fix boolean output, e.g true instead of "true"
        $paletteList = Palette::orderBy('created_at', 'desc')
            ->when($isShowArchivedOnly, function($query) {
                // only get the archived palettes of the user itself
                return $query->onlyTrashed()->where('user_id', Auth::user()->id)->get();
            })
            ->when(!$isShowArchivedOnly, function($query) {
                // todo: when in archived page that has query string, how when paginate can keep the query string along with ?page params.
                return $query->paginate(5);
            });

        return view('palette.index', [
            'paletteList' => $paletteList,
            'selectedPalette' => null,
            'isEdit' => false,
            'isViewingArchives' => $isShowArchivedOnly,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paletteList = Palette::orderBy('created_at', 'desc')->paginate(5);
        $selectedPalette = Palette::findOrFail($id);

        return view('palette.index', [
            'paletteList' => $paletteList,
            'selectedPalette' => $selectedPalette,
            'isEdit' => true,
            'isViewingArchives' => false,
        ]);
    }
}
