<?php

namespace app\Http\Controllers\Api\User\Chits;

use Illuminate\Http\Request;
use app\Http\Controllers\Controller;

//-------------------App Controllers---------------------//
use app\Http\Controllers\Api\Data\DataController;
//-------------------App Controllers---------------------//

//-------------------App Models---------------------//
use app\Models\Auth\UsersModel;
use app\Chit;
use app\Models\User\ChitsGroupModel;
//-------------------App Models---------------------//

use app\Http\Lib\OpenGraph;


class ChitsController extends Controller
{

    public function copyChits(Request $request, Chit $chit)
    {
        $chit->copy($request->id);
        
        return response()->json([
            'msg' => 'success'
        ]);
    }

    public function addChits(Request $request) {

        // SECTION : Models & Controllers
        $usersModel = new UsersModel;
        $chitsModel = new Chit;
        $chitsGroupModel = new ChitsGroupModel;

        // SECTION : Request
        $address = $request->address;
        $groupId = $request->groupId;

        $chit = $chitsModel->addNew($address, $groupId);

        if(is_null($chit)) {
            $result['status'] = 0;
            $result['msg'] = 'error, chit not added';
        }
        
        $result['status'] = 1;
        $result['msg'] = 'success';
        $result['chit']['group_id'] = $chit->group_id;

        if($chit->opg_sitename == 'youtube') {
            $result['html'] = view('user.chits.includes.video-list')
                ->with("chit", $chit)
                ->render();
        } else {
            $result['html'] = view('user.chits.includes.default-list')
                ->with("chit", $chit)
                ->render();
        }
        return response()->json($result);
    }

    public function deleteChits(Request $request, Chit $chit)
    {
        $chit->find($request->id)->delete();

        return response()->json([
            'msg' => 'success'
        ]);
    }

}
