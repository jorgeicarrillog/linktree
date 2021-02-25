<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SocialNetwork;
use Illuminate\Http\Request;
use App\Http\Requests\SocialNetworkRequest;

class SocialNetworkApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socialnetworks = SocialNetwork::ownedBy(auth()->id())->simplePaginate(5);

        return response()->json(['data'=>compact('socialnetworks')], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SocialNetworkRequest $request)
    {
        $socialNetwork = new SocialNetwork();
        $socialNetwork->fill($request->all());
        $socialNetwork->user_id = auth()->id();
        $socialNetwork->save();

        return response()->json(['data' => $socialNetwork], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SocialNetwork  $socialNetwork
     * @return \Illuminate\Http\Response
     */
    public function show(SocialNetwork $socialNetwork)
    {
        return response()->json(['data' => $socialNetwork], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SocialNetwork  $socialNetwork
     * @return \Illuminate\Http\Response
     */
    public function update(SocialNetworkRequest $request, SocialNetwork $socialNetwork)
    {
        $socialNetwork->fill($request->all());
        $socialNetwork->save();

        return response()->json(['data'=>$socialNetwork], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SocialNetwork  $socialNetwork
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialNetwork $socialNetwork)
    {
        $socialNetwork->delete();
        return response(null, 204);
    }
}
