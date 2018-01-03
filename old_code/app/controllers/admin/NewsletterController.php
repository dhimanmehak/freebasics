<?php

use fundstarter\storage\Subscription\SubscriptionRepository as SubscriptionRepository;
use fundstarter\storage\Newsletter\NewsletterRepository as NewsletterRepository;
use fundstarter\storage\User\UserRepository as UserRepository;
use fundstarter\storage\Adminsetting\AdminsettingRepository as AdminsettingRepository;

class NewsletterController extends BaseController {

    public function __construct(AdminsettingRepository $adminsettingRepository, UserRepository $userRepository, SubscriptionRepository $subscriptionrepository, NewsletterRepository $newsletterRepository) {
        $this->subscription = $subscriptionrepository;
        $this->newsletter = $newsletterRepository;
        $this->user = $userRepository;
        $this->adminsetting = $adminsettingRepository;
    }

    public function index() {
        $templates = $this->newsletter->getsubscriptiontemplates();
        $subscriptions = $this->subscription->all();
        return View::make('adminviews.newsletter.subscriptionlist', compact('subscriptions', 'templates'));
    }

    public function editsubscription() {
        $id = Input::get('id');
        $details = $this->subscription->getbyid($id);
        return View::make('adminviews.newsletter.editsubscription', compact('details'));
    }

    public function posteditsubscription() {
        $input = Input::all();
        $this->subscription->update($input);
        Session::flash('success', 'Subscription successfully updated!');
        return Redirect::to('subscriptionlist');
    }

    public function deletesubscription() {
        $id = Input::get('id');
        $this->subscription->deletesubscriptionbyid($id);
        Session::flash('success', 'Subscription successfully deleted!');
        return Redirect::to('subscriptionlist');
    }

    public function templatelist() {
        $newsletters = $this->newsletter->all();
        return View::make('adminviews.newsletter.templatelist', compact('newsletters'));
    }

    public function addtemplate() {
        return View::make('adminviews.newsletter.addtemplate');
    }

    public function postaddtemplate() {
        $input = Input::all();
        if (Input::has('subscription')) {
            $input['subscription'] = 1;
        } else {
            $input['subscription'] = 0;
        }
        $result = $this->newsletter->create($input);
        if ($result == 1) {
            $file = NEWSLETTER . '/' . $input['templatename'] . '.' . 'blade.php';
            $content = $input['emailcontent'];
            file_put_contents($file, $content);
            Session::flash('success', 'Template successfully added!');
            return Redirect::to('templatelist');
        } else {
            Session::flash('failed', 'Template name already exists');
            return Redirect::to('addtemplate');
        }
    }

    public function edittemplate() {
        $id = Input::get('id');
        $details = $this->newsletter->getbyid($id);
        return View::make('adminviews.newsletter.edittemplate', compact('details'));
    }

    public function viewtemplate() {
        $id = Input::get('id');
        $details = $this->newsletter->getbyid($id);
        return View::make('adminviews.newsletter.viewtemplate', compact('details'));
    }

    public function postedittemplate() {
        $input = Input::all();
        if (Input::has('subscription')) {
            $input['subscription'] = 1;
        } else {
            $input['subscription'] = 0;
        }
        $result = $this->newsletter->update($input);
        //  if ($result == 1) {
        $file = NEWSLETTER . '/' . $input['templatename'] . '.' . 'blade.php';
        $content = $input['emailcontent'];
        file_put_contents($file, $content);
        Session::flash('success', 'Template successfully updated!');
        return Redirect::to('templatelist');
        //  } else {
        //     Session::flash('failed', 'Template name already exists');
        //      return Redirect::back();
        //  }
    }

    public function deletetemplate() {
        $id = Input::get('id');
        $this->newsletter->deletebyid($id);
        Session::flash('success', 'Template successfully deleted!');
        return Redirect::to('templatelist');
    }

    public function massemail() {
        $emails = $this->subscription->getactiveemail();
        return View::make('adminviews.newsletter.massemail', compact('emails'));
    }

    public function postmassemail() {
        $allemails = Input::get('allemails');
        $emails = Input::get('emails');
        $adminsettings = $this->adminsetting->getfirst();
        $subject = Input::get('emailsubject');
        $content = Input::get('editor1');
        $logo = $adminsettings['logo'];
        $title = $adminsettings['sitetitle'];
        $file = NEWSLETTER . '/massemail.blade.php';
        file_put_contents($file, $content);

        if (Input::get('emailto') == 'alluser') {
            foreach ($allemails as $allemail) {
                $data = array(
                    'email' => $allemail,
                    'logo' => $logo,
                    'title' => $title
                );
                Mail::send('emails.newsletters.massemail', $data, function($message)use ($allemail, $subject) {
                    $message->to($allemail)->subject($subject);
                });
            }
        } else {
            foreach ($emails as $email) {
                $data = array(
                    'email' => $email,
                    'logo' => $logo,
                    'title' => $title
                );
                Mail::send('emails.newsletters.massemail', $data, function($message)use ($email, $subject) {
                    $message->to($email)->subject($subject);
                });
            }
        }
        Session::flash('success', 'Newsletter successfully sent!!');
        return Redirect::to('massemail');
    }

    public function sendnewsletter() {
        $templateid = Input::get('templateid');
        $subscriberids = Input::get('checkbox');
        $mailtype = Input::get('buttonval');
        $adminsettings = $this->adminsetting->getfirst();
        $logo = $adminsettings['logo'];
        $title = $adminsettings['sitetitle'];
        $template = $this->newsletter->getbyidfirst($templateid);
        $allemails = $this->subscription->getactiveemail();
        if ($mailtype == 'SendMailAll') {
            foreach ($allemails as $all) {
                try {
                    $allemail = $all['email'];
                    $data = array(
                        'email' => $allemail,
                        'logo' => $logo,
                        'title' => $title
                    );
                    Mail::send('emails.newsletters.' . $template['templatename'], $data, function($message)use ($allemail, $template) {
                        $message->to($allemail)->subject($template['subject']);
                    });
                } catch (Swift_TransportException $e) {
                    Mail::getSwiftMailer()->getTransport()->stop();
                    //sleep(10); // Just in case ;-)
                }
            }
        } else {
            $emails = $this->subscription->getemailsbyid($subscriberids);
            foreach ($emails as $email) {
                try {
                    $data = array(
                        'email' => $email,
                        'logo' => $logo,
                        'title' => $title
                    );
                    Mail::send('emails.newsletters.' . $template['templatename'], $data, function($message)use ($email, $template) {
                        $message->to($email)->subject($template['subject']);
                    });
                } catch (Swift_TransportException $e) {
                    $mailer->getTransport()->stop();
                    // sleep(10); // Just in case ;-)
                }
            }
        }
        Session::flash('success', 'Newsletter successfully sent!!');
        return Redirect::to('subscriptionlist');
    }

    public function subscriptionstatus($id, $status) {
        if ($status == "active") {
            $change = "inactive";
        } else {
            $change = "active";
        }
        Subscription::where('id', '=', $id)->update(array('status' => $change));
        return Redirect::back();
    }

}
