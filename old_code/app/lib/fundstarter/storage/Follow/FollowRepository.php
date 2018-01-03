<?php

namespace fundstarter\storage\Follow;

use fundstarter\storage\User\UserRepository as UserRepo;
use Carbon\Carbon;
use Follow;
use Illuminate\Support\Facades\Session;

class FollowRepository implements IFollowRepository {

    public function getcountbyfollowingid($following) {
        $follow = new Follow;
        return $follow->where('followingid', '=', $following)->count();
    }

    public function getcountbyfollowerid($followerid) {
        $follow = new Follow;
        return $follow->where('followerid', '=', $followerid)->count();
    }

    public function isfollowing($follower, $following) {
        $userRepo = new UserRepo;
        $followerid = $userRepo->getidbyemail($follower);
        $follow = new Follow;
        return $follow->where('followingid', '=', $following)->where('followerid', '=', $followerid)->pluck('id');
    }

    public function create($follower, $following) {
        $userRepo = new UserRepo;
        $followerid = $userRepo->getidbyemail($follower);
        $follow = new Follow;
        $id = $follow->where('followingid', '=', $following)->where('followerid', '=', $followerid)->pluck('id');
        if ($id == '') {
            $follow->followerid = $followerid;
            $follow->followingid = $following;
            $follow->createdon = Carbon::now();
            $follow->save();
            $followercount = $this->getcountbyfollowerid($followerid);
            $followingcount = $this->getcountbyfollowingid($following);
            $userRepo->updatefollowing($followerid, $followercount);
            $userRepo->updatefollower($following, $followingcount);
            return 'You are following the creator of this project!';
        } else {
            $follow->where('id', '=', $id)->delete();
            $followercount = $this->getcountbyfollowerid($followerid);
            $followingcount = $this->getcountbyfollowingid($following);
            $userRepo->updatefollowing($followerid, $followercount);
            $userRepo->updatefollower($following, $followingcount);
            
        }
    }

    public function getfollower($followingid) {
        $follow = new Follow;
        return $follow->where('followingid', '=', $followingid)->get();
    }

}
