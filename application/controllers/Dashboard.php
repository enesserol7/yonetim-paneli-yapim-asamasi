<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
    public $viewFolder = "";
    //public $user;
    public function __construct(){
        parent::__construct();
        $this->viewFolder = "dashboard_v";
        $this->load->model("user_model");
        $this->load->model("institution_user_model");
        $this->load->model("institution_model");
        //$this->user = get_active_user();
        if (!get_active_user()) {
            redirect(base_url("login"));
        }
    }
    public function index(){
    	$viewData = new stdClass();
        $user = get_active_user();
        if ($this->session->userdata("user")) {
            //$where = array();
            //$modelName = "user_model";
            $institutions = $this->institution_model->get_all(
                array()
            );
            $users = $this->user_model->get_all(
                array()
            );
        }else if($this->session->userdata("institution_user")){
            $institutions = $this->institution_model->get_all(
                array()
            );
            $user1 = array();
            $users = array();
            foreach ($institutions as $institution) {
                if (isAllowedViewInstitution($institution->id)) {
                    $user1 = $this->institution_user_model->get_all(
                        array(
                            "institution_id" => $institution->id
                        )
                    );
                }
                if ($users == "") {
                    $users = $user1;
                }else{
                    $users = array_merge($users,$user1);
                }
            }
            //$where = array(
            //    "institution_id" => $user->institution_id
            //);
            //$modelName = "institution_user_model";
        }
        $viewData->users = $users;
        //$viewData->personnel_payments = $personnel_payments;
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
    public function error_page(){
        $viewData = new stdClass();
        $user = get_active_user();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "error";
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
}