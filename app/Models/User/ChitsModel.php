<?php

namespace app\Models\User;

use Illuminate\Database\Eloquent\Model;
use app\Http\Lib\OpenGraph;
use app\Http\Controllers\Api\Data\DataController;


class ChitsModel extends Model
{
    protected $table = 'chits';
    protected $guarded = ['id'];
    public $timestamps = true;
    public $result = [];

    public function user()
    {
        return $this->belongsTo('app\Models\Auth\UsersModel', 'userid');
    }

    public function group()
    {
        return $this->hasOne('app\Models\User\ChitsGroupModel', 'id', 'group_id');
    }

    // public function userMany() {
    //     return $this->belongsToMany('app\Models\Auth\UsersModel', 'chits_group', 'user_id', 'id');
    // }


    public function hasChits($user) {
        $chits = $this
            ->where('userid', $user['id'])
            ->count();
        return $chits;
    }

    public function deleteFromGroup($user, $chits, $group) {
        foreach ($chits as $chit) {
            $chit->delete();
        }

        $result['status'] = 1;
        $result['msg'] = 'success';
        return $result;
    }

    public function copyFromGroup($user, $chits, $group) {

        foreach ($chits as $chit) {
            $insert = new ChitsModel;
            $insert->userid = $user->id;
            $insert->address = $chit->address;
            $insert->group_id = $group->id;
            $insert->opg_sitename = @$chit["opg_site_name"];
            $insert->opg_title = @$chit["opg_title"];
            $insert->opg_image = @$chit["opg_image"];
            $insert->save();
        }

        $result['status'] = 1;
        $result['msg'] = 'success';
        return $result;

    }

    public function addDemoChits($user, $demogroups) {

        $chits = [];
        foreach ($demogroups as $key => $demogroup) {
            $chits = $this->where('group_id', $demogroup['id'])->get();

            foreach ($chits as $chit) {

                $insert = new ChitsModel;
                $insert->userid = $user['id'];
                $insert->address = $chit->address;
                $insert->group_id = $demogroup['new_id'];
                $insert->opg_sitename = @$chit["opg_site_name"];
                $insert->opg_title = @$chit["opg_title"];
                $insert->opg_image = @$chit["opg_image"];
                $insert->save();
            }

        }

            $result['status'] = 1;
            $result['msg'] = 'success';
            return $result;
    }

    public function copy($id)
    {
        $chit = $this->find($id);
        $group = auth()->user->groups->first();

        $this->userid = auth()->id;
        $this->address = $chit->address;
        $this->group_id = $group->id;
        $this->opg_sitename = $chit["opg_sitename"];
        $this->opg_title = $chit["opg_title"];
        $this->opg_image = $chit["opg_image"];
        $this->save();
    }

    public function addNew($user, $chitsAddress, $chitsGroupId) 
    {
        $graph = OpenGraph::fetch($chitsAddress);
        $opg = [];

        if(is_youtube($chitsAddress) !== 'yes') {
            foreach ($graph as $key => $value) {
                $opg[$key] = $value;
            }
        } else {

            // FOR YOUTUBE

            $videoId = getcode_youtube($chitsAddress);
            $tags = get_meta_tags('https://www.youtube.com/watch?v=' . $videoId);

            $opg["site_name"] = 'youtube';
            $opg['title'] = $tags['title'];
            $opg['image'] = "//img.youtube.com/vi/" . getcode_youtube($chitsAddress) . "/mqdefault.jpg";
        }


        // insert to database
        $this->userid = auth()->id;
        $this->address = $address;
        $this->group_id = $groupId;
        $this->opg_sitename = $opg["site_name"];
        $this->opg_title = $opg["title"];
        $this->opg_image = $opg["image"];
        $this->save();
    }







    public function getUserChits($user) {
        // $userChits = $this->where([
        //     ['userid', '=', $user['id']],
        // ])->latest()->get();


        $userChits = $this
            ->where('userid', $user['id'])
            ->orderByDesc("id")
            ->get();

        return $userChits;
    }

    public function getChitsByGroup($user, $id) {

        $chitsByGroup = $this
            ->where('userid', $user['id'])
            ->where('group_id', $id)
            ->orderByDesc("id")
            ->get();

        return $chitsByGroup;
    }

    public function getUserChitsByGroup($user, $userGroups) {

        $userChits = [];
        $userChitArr = [];
        foreach ($userGroups as $userGroup) {
            $userChits[$userGroup['name']] = $this->where([
                ['userid', '=', $user['id']],
                ['group_id', '=', $userGroup['id']],
            ])->get();

            foreach ($userChits[$userGroup['name']] as $userChit) {
                $userChitArr[$userChit->id]['id'] = $userChit->id;
                $userChitArr[$userChit->id]['user_id'] = $userChit->userid;
                $userChitArr[$userChit->id]['group_id'] = $userChit->group_id;
                $userChitArr[$userChit->id]['opg_sitename'] = $userChit->opg_sitename;
                $userChitArr[$userChit->id]['opg_title'] = $userChit->opg_title;
                $userChitArr[$userChit->id]['opg_image'] = $userChit->opg_image;
            }
        }

        return $userChitArr;
    }

    public function has_default_chits($user) {

        $userChits = $this->where([
            ['userid', '=', $user['id']],
            ['group_id', '=', 0]
        ])->first();

        if(is_null($userChits)) {
            return false;
        }

        return true;
    }

    public function is_userchits($user, $chitsId) {

        $userChits = $this->where([
            ['userid', '=', $user['id']],
            ['id', '=', $chitsId]
        ])->first();

        if(is_null($userChits)) {
            $this->result['status'] = 0;
            $this->result['msg'] = 'post with this id and userid not found';
            return $this->result;
        }

        $this->result['status'] = 1;
        $this->result['msg'] = 'success';
        return $this->result;

    }


}
