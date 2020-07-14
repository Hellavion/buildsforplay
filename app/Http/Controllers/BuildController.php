<?php

namespace App\Http\Controllers;

use App\Build;
use App\Profile;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BuildController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->middleware('auth');
        return view('builds.create.index');
    }

    public function view(Request $request)
    {
        $builds = DB::table('profiles')
            ->join('builds', 'profiles.user_id', '=', 'builds.user_id')
            ->select('builds.id as id_build','builds.name as name_build', 'profiles.user_id as user_id', 'profiles.name as name_profile')
            ->get();

        return view('builds.list.index', [
            'builds' => $builds,
        ]);
    }

    /**
     * Создание нового билда.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->middleware('auth');
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $request->user()->builds()->create([
            'name' => $request->name,
            'url_video' => $request->url_video,
            'description' => $request->description,
            'full_text' => $request->full_text,
        ]);

        /*if($request->hasFile('image') && $request->file('image')->isValid()) {
            $request->user()->addMediaFromRequest('image')->toMediaCollection('images');
        }*/

        return redirect('/');
    }

    /**
     * Показать список всех задач пользователя.
     *
     * @param  Request  $request
     * @return Response
     */
    public function viewForUser(Request $request)
    {
        $this->middleware('auth');
        return view('builds.userList.index', [
            'builds' => $this->builds->forUser($request->user()),
        ]);
    }

    public function getBuild(Request $request)
    {
        $build = Build::find($request->id);

        return view('builds.build.index', [
            'build' => $build,
        ]);
    }
}
