<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datas = Site::paginate(50);
        return response($datas, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site.add_site');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $site = $request->all();
        $site = Site::create($site);

        $req_user = Auth::user();

        $notification = new NotificationController();
        $notification->sendNotification(collect([
            'title' => 'Site Added',
            'description' => 'Site "' . $request->name . '" successfully added',
            'user_id' => $req_user->id,
            'event_id' => $site->id,
            'module' => 'Site'
        ]));

        return response()->json(['status' => "success"], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site)
    {
        //
        return response($site, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site)
    {
        return view('site.edit_site', compact('site'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Site $site)
    {
        $site->fill($request->only([
            'site_id',
            'name',
            'person_in_charge',
            'address',
        ]));
        $site = $site->save();
        return response()->json(['status' => "success"], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site)
    {
        $site->delete();
        return response()->json(['status' => "success"], 200);
    }

    public function listing(Site $site)
    {
        $datas = Site::all();
        return view('site.listing', compact('datas'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function api_listing()
    {
        //
        $datas = Site::select('id', 'name')->get();
        return response($datas, 200);
    }
}
