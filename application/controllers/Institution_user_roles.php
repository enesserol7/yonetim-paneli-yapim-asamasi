<?php
class Institution_user_roles extends MY_Controller{
    public $viewFolder = "";
    public function __construct(){
        parent::__construct();
        $this->viewFolder = "institution_user_roles_v";
        $this->load->model("institution_user_role_model");
        $this->load->model("institution_model");
        if(!get_active_user()){
            redirect(base_url("login"));
        }
    }
    public function index(){
        $viewData = new stdClass();
        $user = get_active_user();
        if ($this->session->userdata("user")) {
            $items = $this->institution_user_role_model->get_all(
                array()
            );
            $institutions = $this->institution_model->get_all(
                array()
            );
        }else{
            //$items = $this->institution_user_role_model->get_all(
            //    array(
            //        "institution_id" => $user->institution_id
            //    )
            //);
            $institutions = $this->institution_model->get_all(
                array()
            );
            $item1 = array();
            $items = array();
            foreach ($institutions as $institution) {
                if (isAllowedViewInstitution($institution->id)) {
                    $item1 = $this->institution_user_role_model->get_all(
                        array(
                            "institution_id" => $institution->id
                        )
                    );
                }
                if ($items == "") {
                    $items = $item1;
                }else{
                    $items = array_merge($items,$item1);
                }
            }
        }
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function new_form(){
        if (!isAllowedWriteModule()) {
            redirect(base_url("institution_user_roles"));
        }
        $viewData = new stdClass();
        $viewData->institutions = $this->institution_model->get_all(
            array(
                "isActive" => 1
            ),"title ASC"
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->payment_control = "";
        $viewData->subViewFolder = "add";
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function save(){
        if (!isAllowedWriteModule()) {
            redirect(base_url("institution_user_roles"));
        }
        $this->load->library("form_validation");
        $this->form_validation->set_rules("title", "Başlık", "required|trim");
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );
        //if ($this->session->userdata("user")) {
        //$institution_id = $this->input->post("institution_id");
        //}else{
        //    $institution_user = $this->session->userdata("institution_user");
        //    $institution_id = $institution_user->institution_id;
        //}
        $validate = $this->form_validation->run();
        if($validate){
            $insert = $this->institution_user_role_model->add(
                array(
                    "title"         => $this->input->post("title"),
                    "isActive"      => 1,
                    "createdAt"     => date("Y-m-d H:i:s")
                )
            );
            if($insert){
                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde eklendi",
                    "type"  => "success"
                );
            } else {
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt Ekleme sırasında bir problem oluştu",
                    "type"  => "error"
                );
            }
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("institution_user_roles"));
        } else {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->payment_control = "";
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;
            $viewData->institutions = $this->institution_model->get_all(
                array(
                    "isActive" => 1
                ),"title ASC"
            );
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    public function update_form($id){
        if (!isAllowedUpdateModule()) {
            redirect(base_url("institution_user_roles"));
        }
        $viewData = new stdClass();
        $item = $this->institution_user_role_model->get(
            array(
                "id"    => $id,
            )
        );
        $viewData->institutions = $this->institution_model->get_all(
            array(
                "isActive" => 1
            ),"title ASC"
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->payment_control = "";
        $viewData->subViewFolder = "update";
        $viewData->item = $item;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function update($id){
        if (!isAllowedUpdateModule()) {
            redirect(base_url("institution_user_roles"));
        }
        $this->load->library("form_validation");
        $this->form_validation->set_rules("title", "Başlık", "required|trim");
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );
        //if ($this->session->userdata("user")) {
        //$institution_id = $this->input->post("institution_id");
        //}else{
        //    $institution_user = $this->session->userdata("institution_user");
        //    $institution_id = $institution_user->institution_id;
        //}
        $validate = $this->form_validation->run();
        if($validate){
            $update = $this->institution_user_role_model->update(array("id" => $id), array(
                "title" => $this->input->post("title"),
            ));
            if($update){
                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde güncellendi",
                    "type"  => "success"
                );
            } else {
                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt Güncelleme sırasında bir problem oluştu",
                    "type"  => "error"
                );
            }
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("institution_user_roles"));
        } else {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->payment_control = "";
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->item = $this->institution_user_role_model->get(
                array(
                    "id"    => $id,
                )
            );
            $viewData->institutions = $this->institution_model->get_all(
                array(
                    "isActive" => 1
                ),"title ASC"
            );
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    public function delete($id){
        if (!isAllowedDeleteModule()) {
            redirect(base_url("institution_user_roles"));
        }
        $delete = $this->institution_user_role_model->delete(
            array(
                "id"    => $id
            )
        );
        if($delete){
            $alert = array(
                "title" => "İşlem Başarılı",
                "text" => "Kayıt başarılı bir şekilde silindi",
                "type"  => "success"
            );
        } else {
            $alert = array(
                "title" => "İşlem Başarılı",
                "text" => "Kayıt silme sırasında bir problem oluştu",
                "type"  => "error"
            );
        }
        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("institution_user_roles"));
    }
    public function isActiveSetter($id){
        if (!isAllowedUpdateModule()) {
            redirect(base_url("institution_user_roles"));
        }
        if($id){
            $isActive = ($this->input->post("data") === "true") ? 1 : 0;
            $this->institution_user_role_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "isActive"  => $isActive
                )
            );
        }
    }
    public function permissions_form($id){
        if (!isAllowedUpdateModule()) {
            redirect(base_url("institution_user_roles"));
        }
        $viewData = new stdClass();
        $item = $this->institution_user_role_model->get(
            array(
                "id"=>$id
            )
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->payment_control = "";
        $viewData->subViewFolder = "permissions";
        $viewData->item = $item;
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
    public function update_permissions($id){
        if (!isAllowedUpdateModule()) {
            redirect(base_url("institution_user_roles"));
        }
        $permissions = json_encode($this->input->post("permissions"));
        $update = $this->institution_user_role_model->update(array("id"=>$id),
            array(
                "permissions" => $permissions
            )
        );
        if($update){
            $alert = array(
                "title" => "İşlem Başarılıyla Gerçekleşti.",
                "text" => "Yetki tanımı başarılı bir şekilde güncellendi.",
                "type" => "success"
            );
        } else {
            $alert = array(
                "title" => "İşlem Başarısız Oldu!",
                "text" => "Yetki tanımı güncelleme sırasında bir problem oluştu!",
                "type" => "error"
            );
        }
        setInstitutionUserRoles();
        $this->session->set_flashdata("alert",$alert);
        redirect(base_url("institution_user_roles/permissions_form/$id"));
    }
}