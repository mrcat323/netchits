<?php

namespace app\Http\Controllers;
use Illuminate\Http\Request;

//-------------------App Controllers---------------------//
use app\Http\Controllers\Api\Data\DataController;
//-------------------App Controllers---------------------//

//-------------------App Models---------------------//
use app\Models\Auth\UsersModel;
use app\Models\User\ChitsModel;
use app\Models\User\ChitsGroupModel;
use app\Models\Friends\FriendsModel;
//-------------------App Models---------------------//


class TestController extends Controller
{
    public function test() {

        $datenow = date('Y-m-d');
        $datenow = strtotime($datenow);

        dd($datenow);

        // $ads_time = strtotime($value['time_end']);
        //  if int($datenow) > int($ads_time)



        // $chitsModel = new ChitsModel;
        // $chitsGroupModel = new ChitsGroupModel;
        //
        // $user['id'] = 61;
        // $demoGroups = $chitsGroupModel->addDemoGroups($user);
        //
        // $demoChits = $chitsModel->addDemoChits($user, $demoGroups);



        // $group = $chitsGroupModel->copyGroup($user, $group);
        // $copyChit = $chitsModel->copyFromGroup($user, $chits, $group);



        //
        // dd($demoChits);


        // $usersModel = new UsersModel;
        //
        // $time = microtime(true);
        // $time = str_replace(".", "", $time);
        // $user = "user" . $time;
        //
        //
        // dd($user);




        // $chitsModel = new ChitsModel;
        // $chitsGroupModel = new ChitsGroupModel;
        // $usersModel = new UsersModel;
        //
        // $user = $usersModel->getUser();
        //
        // return view('test')->with('user', $user);
        // return view('test2')->with('user', $user);



        // $group = $chitsGroupModel->find(22);
        // dd($group->chits->all());


        // $user = $usersModel->find(38);
        // dd($user->groups->all());

        // $group = $chitsGroupModel->find(22);

        // $chits = $group->chits;
        // foreach ($chits as $chit) {
        //     dd($chit->group);
        // }





        // $chits = $chitsModel->all();
        // foreach ($chits as $chit) {
        //     dd($chit->group);
        // }







        // $address = UsersModel::find(38)->userid;
        // dd($address);

        // один к одному

        // $users = $usersModel->all();
        // foreach ($users as $user) {
        //     dd($user->chits);
        // }

        // один к одному обратное

        // $chits = $chitsModel->all();
        //
        // foreach ($chits as $chit) {
        //     dd($chit->user);
        // }

        // один ко многим

        // $users = $usersModel->all();
        // foreach ($users as $user) {
        //     dd($user->chitsMany);
        // }

        // многие ко многим

        // $chits = $chitsModel->all();
        //
        // foreach ($chits as $chit) {
        //     dd($chit->userMany);
        // }

    }
}
