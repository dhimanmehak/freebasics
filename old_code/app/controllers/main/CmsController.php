<?php

use fundstarter\storage\Staticpage\StaticpageRepository as StaticpageRepository;

class CmsController extends BaseController {

    public function __construct(StaticpageRepository $staticpageRepository) {
        $this->staticpage = $staticpageRepository;
    }

    public function index($seourl) {
        $page = $this->staticpage->getbyseourl($seourl);
        View::share('metatitle', $page['metaname']);
        View::share('metakeyword', $page['metakeyword']);
        View::share('metadescription', $page['metadescription']);
        return View::make('mainviews.staticpages.displaypage', compact('page'));
    }

}
