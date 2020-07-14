<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Build;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig;
use Spatie\PdfToImage\Exceptions\PageDoesNotExist;

class ProfileController extends Controller
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $this->middleware('auth');

        $profile = Profile::where('user_id', $request->user()->id)->firstOrFail();
        $builds = Build::all()->where('user_id', $request->user()->id);

        return view('profile.index', [
            'profile' => $profile,
            'builds' => ($builds->count() > 0) ? $builds : null,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $this->middleware('auth');

        return view('profile.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->middleware('auth');

        $id = $request->id;
        $profile= Profile::find($id);
        $data = $request->all();
        $profile->update($data);
        if($request->hasFile('image') && $request->file('image')->isValid())
        {
            $profile->addMediaFromRequest('image')->toMediaCollection('images');
        }



        return redirect('profile?id='.$id);
    }

    public function view(Request $request)
    {
        $profile = Profile::where('user_id', $request->user()->id)->firstOrFail();
        $builds = Build::all()->where('user_id', $request->user()->id);

        return view('profile.view', [
            'profile' => $profile,
            'builds' => ($builds->count() > 0) ? $builds : null,
        ]);
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
}
