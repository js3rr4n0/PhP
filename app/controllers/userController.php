<?php

namespace App\Controllers;

use App\Models\User;

class userController {
    public function register($name, $email, $password){
        $id = (new User())->createUser($name,$email, $password);
        return $id;
    }
}