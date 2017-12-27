<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//-------------------App Controllers---------------------//
use App\Http\Controllers\Api\Data\DataController;
//-------------------App Controllers---------------------//

//-------------------App Models---------------------//
use App\Models\Auth\UsersModel;
use App\Models\User\ChitsModel;
//-------------------App Models---------------------//

class StartController extends Controller
{
    public function homePage() {

        // SECTION : Models
        $usersModel = new UsersModel;
        $chitsModel = new ChitsModel;

        // SECTION : Logics
        if(!isset($_COOKIE['auth']) && @$_COOKIE['auth'] !== 'success') {
                return view("layouts.start");
        } else {

            $user = $usersModel->getUser();
            $userChits = $chitsModel->getUserChits($user);

            return view("user.profile")
                ->with("user", $user)
                ->with("userChits", $userChits);
        }
    }
}
