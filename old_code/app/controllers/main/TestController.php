<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use fundstarter\storage\Category\CategoryRepository as CategoryRepository;
use fundstarter\storage\Project\ProjectRepository as ProjectRepository;
use fundstarter\storage\Reward\RewardRepository as RewardRepository;
use fundstarter\storage\Update\UpdateRepository as UpdateRepository;
use fundstarter\storage\Comment\CommentRepository as CommentRepository;
use fundstarter\storage\User\UserRepository as UserRepository;
use fundstarter\storage\Backing\BackingRepository as BackingRepository;
use fundstarter\storage\Adminsetting\AdminsettingRepository as AdminsettingRepository;
use fundstarter\storage\Newsletter\NewsletterRepository as NewsletterRepository;
use fundstarter\storage\Starredproject\StarredprojectRepository as StarredprojectRepository;
use fundstarter\storage\Country\CountryRepository as CountryRepository;
use fundstarter\storage\Slider\SliderRepository as SliderRepository;
use fundstarter\storage\Faq\FaqRepository as FaqRepository;
use fundstarter\storage\Contact\ContactRepository as ContactRepository;
use fundstarter\storage\Currency\CurrencyRepository as CurrencyRepository;
use fundstarter\storage\Like\LikeRepository as LikeRepository;
use fundstarter\storage\Follow\FollowRepository as FollowRepository;
use Illuminate\Support\Facades\Artisan;

class TestController extends BaseController {

    public function __construct(FollowRepository $followRepository, LikeRepository $likeRepository, CurrencyRepository $currencyRepository, ContactRepository $contactRepository, FaqRepository $faqRepository, SliderRepository $sliderRepository, CountryRepository $countryRepository, StarredprojectRepository $starredprojectRepository, NewsletterRepository $newsletterRepository, AdminsettingRepository $adminsettingRepository, UserRepository $userRepository, BackingRepository $backingRepository, CategoryRepository $categoryRepository, CommentRepository $commentRepository, UpdateRepository $updateRepository, RewardRepository $rewardRepository, ProjectRepository $projectRepository) {
        $this->category = $categoryRepository;
        $this->project = $projectRepository;
        $this->reward = $rewardRepository;
        $this->update = $updateRepository;
        $this->comment = $commentRepository;
        $this->user = $userRepository;
        $this->backing = $backingRepository;
        $this->adminsetting = $adminsettingRepository;
        $this->newsletter = $newsletterRepository;
        $this->starredproject = $starredprojectRepository;
        $this->country = $countryRepository;
        $this->slider = $sliderRepository;
        $this->faq = $faqRepository;
        $this->contact = $contactRepository;
        $this->currency = $currencyRepository;
        $this->like = $likeRepository;
        $this->follow = $followRepository;
    }

    public function index() {
        $countries = $this->country->all();
        return View::make('mainviews.test', compact('countries'));
    }

//    public function truncate(){
//        Artisan ::call('db:seed', ['--quiet' => true, '--force' => true]);
//    }

    public function updatetable() {
        Artisan ::call('db:seed', ['--quiet' => true, '--force' => true]);
    }
    
    public function testbacking(){
        return $this->backing->getbackingdetailsbyuserid(16,114);
    }

}
