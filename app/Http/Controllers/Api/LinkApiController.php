<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;
use App\Http\Requests\LinkRequest;

class LinkApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Link::ownedBy(auth()->id())->simplePaginate(5);

        return response()->json(['data'=>compact('links')], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  LinkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LinkRequest $request)
    {
        $link = new Link();
        $link->label = $request->input('label');
        $link->url = $request->input('url');
        $link->user_id = auth()->id();
        $link->save();

        return response()->json(['data'=>$link], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function show(Link $link)
    {
        return response()->json(['data' => $link], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(LinkRequest $request, Link $link)
    {
        $link->label = $request->input('label');
        $link->url = $request->input('url');
        $link->save();

        return response()->json(['data' => $link], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        $link->delete();
        return response(null, 204);
    }
}
