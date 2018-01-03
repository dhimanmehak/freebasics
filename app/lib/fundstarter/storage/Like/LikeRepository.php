<?php

namespace fundstarter\storage\Like;

use fundstarter\storage\User\UserRepository as UserRepo;
use fundstarter\storage\Project\ProjectRepository as ProjectRepo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Like;

class LikeRepository implements ILikeRepository {

    public function getcountbyprojectid($id) {
        $like = new Like;
        return $like->where('projectid', '=', $id)->count();
    }

    public function isliked($email, $projectid) {
        $userRepo = new UserRepo;
        $userid = $userRepo->getidbyemail($email);
        $like = new Like;
        return $like->where('projectid', '=', $projectid)->where('userid', '=', $userid)->pluck('id');
    }

    public function create($email, $projectid) {
        $userRepo = new UserRepo;
        $userid = $userRepo->getidbyemail($email);
        $like = new Like;
        $id = $like->where('projectid', '=', $projectid)->where('userid', '=', $userid)->pluck('id');
        if ($id == '') {
            $like->userid = $userid;
            $like->projectid = $projectid;
            $like->createdon = Carbon::now();
            $like->save();
            $projectRepo = new ProjectRepo;
            $count = $this->getcountbyprojectid($projectid);
            $projectRepo->updatelikes($projectid, $count);
        } else {
            $like->where('id', '=', $id)->delete();
            $projectRepo = new ProjectRepo;
            $count = $this->getcountbyprojectid($projectid);
            $projectRepo->updatelikes($projectid, $count);
        }
    }

}
