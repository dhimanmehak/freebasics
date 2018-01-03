<?php

namespace fundstarter\storage\Newsletter;

//use fundstarter\storage\Newsletter\NewsletterRepository as NewsletterRepo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Newsletter;

class NewsletterRepository implements INewsletterRepository {

    public function all() {
        $newsletter = new Newsletter;
        return $newsletter->all();
    }

    public function getsubscriptiontemplates() {
        $newsletter = new Newsletter;
        return $newsletter->where('subscription', '=', 1)->get();
    }

    public function create(array $input) {
        $newsletter = new Newsletter;
        if ($this->checkalreadyexists($input['templatename']) == '[]') {
            $newsletter->templatename = $input['templatename'];
            $newsletter->subject = $input['subject'];
            $newsletter->subscription = $input['subscription'];
            $newsletter->sendername = $input['sendername'];
            $newsletter->senderemail = $input['senderemail'];
            $newsletter->emailcontent = $input['emailcontent'];
            $newsletter->createdon = Carbon::now();
            $newsletter->save();
            return 1;
        } else {
            return 0;
        }
    }

    public function update(array $input) {
        $newsletter = new Newsletter;
        $data = $newsletter->find($input['id']);
        $data->templatename = $input['templatename'];
        $data->subject = $input['subject'];
        $data->subscription = $input['subscription'];
        $data->sendername = $input['sendername'];
        $data->senderemail = $input['senderemail'];
        $data->emailcontent = $input['emailcontent'];
        $data->save();
    }

    public function getbyid($id) {
        $newsletter = new Newsletter;
        return $newsletter->where('id', '=', $id)->get();
    }

    public function deletebyid($id) {
        $newsletter = new Newsletter;
        return $newsletter->where('id', '=', $id)->delete();
    }

    public function checkalreadyexists($templatename) {
        $newsletter = new Newsletter;
        return $newsletter->where('templatename', '=', $templatename)->get();
    }

    public function getbyidfirst($id) {
        $newsletter = new Newsletter;
        return $newsletter->where('id', '=', $id)->first();
    }

    /* --------User-------- */

    public function getbytemplatename($templatename) {
        $newsletter = new Newsletter;
        return $newsletter->where('templatename', '=', $templatename)->first();
    }

}
