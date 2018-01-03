<?php

namespace fundstarter\storage\Contact;

//use fundstarter\storage\Contact\ContactRepository as ContactRepo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Contact;

class ContactRepository implements IContactRepository {

    public function all() {
        $contact = new Contact;
        return $contact->all();
    }
    
    public function getall() {
        $contact = new Contact;
        return $contact->join('projects','projects.id','=','contacts.mobile')->get(array('contacts.id','contacts.mobile','projects.title','contacts.email','contacts.firstname','contacts.subject','contacts.message','contacts.createdon'));
    }

    public function create(array $input) {
        $contact = new Contact;
        $contact->firstname = $input['name'];
        $contact->email = $input['email'];
        $contact->mobile = $input['mobile'];
        $contact->subject = $input['subject'];
        $contact->message = $input['message'];
        $contact->createdon = Carbon::now();
        $contact->save();
        return 1;
    }

    public function update(array $input) {
        $email = Session::get('email');
        $id = $this->getid($email);
        $contact = $this->find($id)->first();
        $contact->id = $input['id'];
        $contact->firstname = $input['firstname'];
        $contact->lastname = $input['lastname'];
        $contact->email = $input['email'];
        $contact->mobile = $input['mobile'];
        $contact->subject = $input['subject'];
        $contact->message = $input['message'];
        $contact->createdon = $input['createdon'];
        $contact->save();
    }

    public function getbyid($id) {
        $contact = new Contact;
        return $contact->join('projects','projects.id','=','contacts.mobile')->where('contacts.id','=',$id)->first(array('contacts.id','contacts.mobile','projects.title','contacts.email','contacts.firstname','contacts.subject','contacts.message','contacts.createdon'));
    }

    public function deletebyid($id) {
        $contact = new Contact;
        return $contact->where('id', '=', $id)->delete();
    }
    
    public function getsecond(){
        $contact = new Contact;
        return $contact->where('id', '=', 2)->first();
    }

}
