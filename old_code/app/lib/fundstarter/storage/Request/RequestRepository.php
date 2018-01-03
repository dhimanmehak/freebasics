<?php

namespace fundstarter\storage\Request;

use fundstarter\storage\User\UserRepository as UserRepo;
use fundstarter\storage\Project\ProjectRepository as ProjectRepo;
use Carbon\Carbon;
use Requestadmin;

class RequestRepository implements IRequestRepository {

    public function all() {
        $request = new Requestadmin;
        return $request->orderby('id', 'desc')->get();
    }

    public function getbyid($id) {
        $request = new Requestadmin;
        return $request->where('id', '=', $id)->first();
    }

    public function getwaitingrequests() {
        $request = new Requestadmin;
        return $request->where('status', '=', 0)->count();
    }

    public function create(array $input) {
        $request = new Requestadmin;
        $request->fundinggoal = $input['requestfundinggoal'];
        $request->projecttitle = $input['projecttitle'];
        $request->projectid = $input['projectid'];
        $request->fundingduration = $input['requestfundingduration'];
        $request->message = $input['requestmessage'];
        $request->status = 0;
        $request->createdon = Carbon::now();
        $request->save();
    }

    public function updatestatus($id, $status) {
        $request = new Requestadmin;
        $data = $request->find($id);
        $data->status = $status;
        $data->save();
        return $data;
    }
    
    public function deletebyid($id){
         $request = new Requestadmin;
         $request->where('id','=',$id)->delete();
    }

}
