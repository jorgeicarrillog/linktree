<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\AvatarRequest;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = auth()->user();
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request)
    {
        $user = auth()->user();
        $user->fill($request->all());
        $user->save();

        return redirect()->route('home')->with('_success', '¡Perfil editado exitosamente!');
    }

    public function upload_avatar(AvatarRequest $request)
    {

        if($request->file('avatar')){

            $user = auth()->user();
            
            if($user->avatar != NULL){
                Storage::disk('avatars')->delete($user->avatar);
            }

            $avatar_name = $user->id.'-'.Str::random(25).'.'.$request->file('avatar')->getClientOriginalExtension();
            $avatar_path = $request->file('avatar')->storeAs('',$avatar_name, 'avatars');
    
            $user->avatar = $avatar_path;
    
            if($user->save()){
                return back()->with('_success', '¡Avatar publicado exitosamente!');
            }else{
                return back()->with('_error', 'Hubo un problema, no se pudo subir el avatar.');
            }
    
        }
    
        return back()->with('_error', 'Hubo un problema, no se pudo subir el avatar.');
    }
}
