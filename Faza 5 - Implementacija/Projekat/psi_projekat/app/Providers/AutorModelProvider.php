<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable;

class AutorModelProvider implements UserProvider{

public function retrieveById($identifier){
    return User::where('email',$identifier)->first();
}

public function retrieveByToken($identifier, $token){}

public function updateRememberToken(Authenticatable $user, $token){}

public function retrieveByCredentials(array $credentials){
    return User::where('email',$credentials['email'])->first();
}

public function validateCredentials(Authenticatable $user, array $credentials){
    return $user->getAuthPassword() == $credentials['lozinka'];
}
}
