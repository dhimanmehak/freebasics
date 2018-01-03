<?php

namespace fundstarter\storage\Inboxmsg;

//use fundstarter\storage\Inboxmsgs\InboxmsgsRepository as InboxmsgsRepo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Inboxmsg;

class InboxmsgRepository implements IInboxmsgRepository {

    public function all() {
        $inboxmsg = new Inboxmsg;
        return $inboxmsg->all();
    }

    public function create(array $input) {
        $inboxmsg = new Inboxmsg;
        $inboxmsg->senderid = $input['senderid'];
        $inboxmsg->recieverid = $input['recieverid'];
        $inboxmsg->status = 0;
        $inboxmsg->message = $input['message'];
        $inboxmsg->date = Carbon::now();
        $inboxmsg->save();
    }

    public function update(array $input) {
        $email = Session::get('email');
        $id = $this->getid($email);
        $data = $this->find($id)->first();
        $inboxmsg->id = $input['id'];
        $inboxmsg->senderid = $input['senderid'];
        $inboxmsg->recieverid = $input['recieverid'];
        $inboxmsg->status = $input['status'];
        $inboxmsg->message = $input['message'];
        $inboxmsg->senton = $input['senton'];
        $inboxmsg->save();
    }
	

    public function getbyid($id) {
        $inboxmsg = new Inboxmsg;
        return $inboxmsg->where('id', '=', $id)->get();
    }

    public function getsentmsgbyid($id) {
        $inboxmsg = new Inboxmsg;
        return $inboxmsg->join('users', 'inboxmsgs.recieverid', '=', 'users.id')->where('inboxmsgs.senderid', '=', $id)->where('inboxmsgs.senderstatus', '=', 'available')->get(array('users.firstname', 'users.lastname', 'inboxmsgs.date', 'inboxmsgs.message', 'inboxmsgs.senderid', 'inboxmsgs.id'));
    }

    public function getrecievedmsgbyid($id) {
        $inboxmsg = new Inboxmsg;
        return $inboxmsg->join('users', 'inboxmsgs.senderid', '=', 'users.id')->where('inboxmsgs.recieverid', '=', $id)->where('inboxmsgs.recieverstatus', '=', 'available')->groupBy('inboxmsgs.senderid')->get(array('users.firstname', 'users.lastname', 'inboxmsgs.date', 'inboxmsgs.message', 'inboxmsgs.status', 'inboxmsgs.recieverid', 'inboxmsgs.senderid', 'inboxmsgs.id'));
    }

    public function updatesenderstatus($id) {
        $inboxmsg = new Inboxmsg;
        $data = $inboxmsg->find($id);
        $data->senderstatus = "deleted";
        $data->save();
    }

    public function updaterecieverstatus($id) {
        $inboxmsg = new Inboxmsg;
        $data = $inboxmsg->find($id);
        $data->recieverstatus = "deleted";
        $data->save();
    }

    public function updatemessagestatus($id) {
        $inboxmsg = new Inboxmsg;
        $data = $inboxmsg->find($id);
        $data->status = 1;
        $data->save();
    }

    public function getmsgsbyuserid($id, $recieverid) {
        $inboxmsg = new Inboxmsg;
        $result = $inboxmsg->where(function ($query) use($id, $recieverid) {
                    $query->where('inboxmsgs.senderid', '=', $id)->where('inboxmsgs.recieverid', '=', $recieverid);
                })->orwhere(function ($query)use($id, $recieverid) {
                    $query->where('inboxmsgs.senderid', '=', $recieverid)->where('inboxmsgs.recieverid', '=', $id);
                })->join('users', 'inboxmsgs.senderid', '=', 'users.id')->get(array('users.image', 'users.firstname', 'users.lastname', 'inboxmsgs.date', 'inboxmsgs.message', 'inboxmsgs.senderid', 'inboxmsgs.recieverid', 'inboxmsgs.id','users.username'));
        return $result;
    }

}
