<?php

namespace fundstarter\storage\Sendmsg;
//use fundstarter\storage\Sendmsg\SendmsgRepository as SendmsgRepo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Sendmsg;

class SendmsgRepository implements ISendmsgRepository {

    public function all() {
        $sendmsg = new Sendmsg;
        return $Sendmsg->all();
    }
    public function create(array $input) {
        $sendmsg = new Sendmsg;
        $sendmsg->id = $input['id'];
		$sendmsg->senderid = $input['senderid'];
		$sendmsg->recieverid = $input['recieverid'];
		$sendmsg->message = $input['message'];
		$sendmsg->senton = $input['senton'];
        $sendmsg->save();
        return 1;
    }

    public function update(array $input) {
        $email = Session::get('email');
        $id = $this->getid($email);
        $sendmsg = $this->find($id)->first();
		$sendmsg->id = $input['id'];
		$sendmsg->senderid = $input['senderid'];
		$sendmsg->recieverid = $input['recieverid'];
		$sendmsg->message = $input['message'];
		$sendmsg->senton = $input['senton'];
        $sendmsg->save();
        
        
    }

    public function getbyid($id) {
        $sendmsg = new Sendmsg;
        return $sendmsg->where('id', '=', $id)->get();
    }

  
}
