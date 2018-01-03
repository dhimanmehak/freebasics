<?php

namespace appstorage\Newsletter;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Newsletter;

class NewsletterRepository {

     public function getbytemplatename($templatename) {
        $newsletter = new Newsletter;
        return $newsletter->where('templatename', '=', $templatename)->first();
    }

}