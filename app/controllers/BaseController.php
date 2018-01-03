<?php
ob_start();
class BaseController extends Controller {

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    public function __construct() {
      
    }

    protected function setupLayout() {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }

    public function checksession() {
        if (Session::has('email')) {
            return Redirect::to('adminlogin');
        } else {
            return Redirect::to('adminlogin');
        }
    }

}
