<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class UserCreated
{
    use SerializesModels;

    /**
    * The order instance.
    *
    * @var \App\Models\User
    */
   public $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->setUsername();
        return false;
    }

    public function setUsername($addRand=false)
    {
        $partsEmail = explode('@', $this->user->email);
        $username = Str::slug($partsEmail[0], '-');
        if(!User::whereUsername($username)->exists()){
            $this->user->username = $username;
            $this->user->save();
        }else{
            $username .= Str::random(4);
            if(!User::whereUsername($username)->exists()){
                $this->user->username = $username;
                $this->user->save();
            }
        }
        
    }
}
