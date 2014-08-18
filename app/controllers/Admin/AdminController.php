<?php
class AdminController extends BaseController {

    // private $company;
    /**
     * Initializer.
     *
     * @return \AdminController
     */
    public function __construct()
    {
//        parent::__construct();
        // $this->company=$company;
        // Apply the admin auth filter
        $this->beforeFilter('admin-auth');
    }

}