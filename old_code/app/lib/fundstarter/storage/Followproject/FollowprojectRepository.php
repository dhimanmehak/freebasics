<?php

namespace fundstarter\storage\Followproject;

use fundstarter\storage\User\UserRepository as UserRepo;
use Carbon\Carbon;
use Followproject;
use Illuminate\Support\Facades\Session;

class FollowprojectRepository implements IFollowprojectRepository {

    public function isfollowing($follower, $projectid) {
        $userRepo = new UserRepo;
        $followerid = $userRepo->getidbyemail($follower);
        $followproject = new Followproject;
        return $followproject->where('projectid', '=', $projectid)->where('followerid', '=', $followerid)->pluck('id');
    }

    public function create($follower, $projectid) {
        $userRepo = new UserRepo;
        $followerid = $userRepo->getidbyemail($follower);
        $followproject = new Followproject;
        $id = $followproject->where('projectid', '=', $projectid)->where('followerid', '=', $followerid)->pluck('id');
        if ($id == '') {
            $followproject->projectid = $projectid;
            $followproject->followerid = $followerid;
            $followproject->createdon = Carbon::now();
            $followproject->save();
            return 'You are following this project!';
        } else {
            $followproject->where('id', '=', $id)->delete();
        }
    }

    public function getfollower($followprojectingid) {
        $followproject = new Followproject;
        return $followproject->where('followingid', '=', $followprojectingid)->get();
    }

    public function getfollowersbyprojectid($projectid) {
        $followproject = new Followproject;
        return $followproject->join('users', 'users.id', '=', 'followprojects.followerid')->where('followprojects.projectid', '=', $projectid)->get(array('users.email', 'users.firstname'));
    }

}
