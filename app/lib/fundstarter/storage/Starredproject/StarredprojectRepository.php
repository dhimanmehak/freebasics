<?php

namespace fundstarter\storage\Starredproject;

use fundstarter\storage\Project\ProjectRepository as ProjectRepo;
use fundstarter\storage\User\UserRepository as UserRepo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Starredproject;

class StarredprojectRepository implements IStarredprojectRepository {

    public function all() {
        $starredproject = new Starredproject;
        return $starredproject->all();
    }

    public function create(array $input) {
        $starredproject = new Starredproject;
        $exists = $this->checkalreadyexists($input['userid'], $input['projectid']);
        if ($exists == '') {
            $starredproject = new Starredproject;
            $starredproject->userid = $input['userid'];
            $starredproject->projectid = $input['projectid'];
            $starredproject->status = 0;
            $starredproject->createdon = Carbon::now();
            $starredproject->save();
            return 1;
        } else {
            $this->deletebyid($exists);
            return 0;
        }
    }

    public function checkalreadyexists($userid, $projectid) {
        $starredproject = new Starredproject;
        return $starredproject->where('userid', '=', $userid)->where('projectid', '=', $projectid)->pluck('id');
    }

    public function deletebyid($id) {
        $starredproject = new Starredproject;
        $starredproject->where('id', '=', $id)->delete();
    }

    public function getbyprojectid($userid, $projectid) {
        $starredproject = new Starredproject;
        return $starredproject->where('userid', '=', $userid)->where('projectid', '=', $projectid)->pluck('id');
    }

}

?>