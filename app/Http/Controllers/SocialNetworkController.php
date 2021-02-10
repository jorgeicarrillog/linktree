<?php

namespace App\Http\Controllers;

use App\Models\SocialNetwork;
use App\Http\Requests\SocialNetworkRequest;

class SocialNetworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socialnetworks = SocialNetwork::ownedBy(auth()->id())->simplePaginate(5);

        return view('social-networks.index', compact('socialnetworks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('social-networks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SocialNetworkRequest;  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SocialNetworkRequest $request)
    {
        $socialNetwork = new SocialNetwork();
        $socialNetwork->fill($request->all());
        $socialNetwork->user_id = auth()->id();
        $socialNetwork->save();

        return redirect()->route('redes-sociales.index')->with('_success', '¡Red Social creada exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SocialNetwork  $socialNetwork
     * @return \Illuminate\Http\Response
     */
    public function show(SocialNetwork $socialNetwork)
    {
        return view('social-networks.show', compact('socialNetwork'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SocialNetwork  $socialNetwork
     * @return \Illuminate\Http\Response
     */
    public function edit(SocialNetwork $socialNetwork)
    {
        return view('social-networks.edit', compact('socialNetwork'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\SocialNetworkRequest  $request
     * @param  \App\Models\SocialNetwork  $socialNetwork
     * @return \Illuminate\Http\Response
     */
    public function update(SocialNetworkRequest $request, SocialNetwork $socialNetwork)
    {
        $socialNetwork->fill($request->all());
        $socialNetwork->save();

        return redirect()->route('redes-sociales.index')->with('_success', '¡Red Social editada exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SocialNetwork  $socialNetwork
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialNetwork $socialNetwork)
    {
        if($socialNetwork->owner->id == auth()->id())
        {
            $socialNetwork->delete();

            return redirect()->route('redes-sociales.index')->with('_success', '¡Red Social borrada exitosamente!');
        }
        
        return back()->with('_failure', '¡No tiene permiso de borrar ese recurso!');
    }
}
