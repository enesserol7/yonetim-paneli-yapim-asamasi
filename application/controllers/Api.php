<?php
class Api extends CI_Controller {
    public $JSON_DATA;
    public function __construct(){
        parent::__construct();
        $this->load->model("function_model");
        $this->output->set_content_type("application/json");
        $this->output->set_header("Access-Control-Allow-Origin: *");
        $this->output->set_header("Access-Control-Allow-Methods: GET, OPTIONS");
        $this->output->set_header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");

        $this->JSON_DATA = (array)json_decode(file_get_contents("php://input"));
    }
    public function signIn(){
        $user = $this->function_model->get("system_users",
            $this->JSON_DATA
        );
        if ($user) {
            $alert = array(
                "title" => "İşlem Başarılıyla Gerçekleşti.",
                "text" => "$user->full_name Hoşgeldiniz...",
                "type" => "success"
            );
            $this->session->set_userdata("user",$user);
            setUserRoles();
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url());
        }else{
            $user = $this->function_model->get("institution_users",
                $this->JSON_DATA
            );
            if ($user) {
                $alert = array(
                    "title" => "İşlem Başarılıyla Gerçekleşti.",
                    "text" => "$user->full_name Hoşgeldiniz...",
                    "type" => "success"
                );
                $this->session->set_userdata("institution_user",$user);
                setInstitutionUserRoles();
                setInstitutionUserPermissions();
                $this->session->set_flashdata("alert",$alert);
                redirect(base_url());
            }else{
                $alert = array(
                    "title" => "İşlem Başarısız!.",
                    "text" => "Lütfen giriş bilgilerinizi kontrol ediniz!",
                    "type" => "error"
                );
                $this->session->set_flashdata("alert",$alert);
                redirect(base_url("login"));
            }
        }    
    }
    public function get_all_data(){
        echo $this->login_model->get_all();
    }
    public function save(){
        echo $this->login_model->save(
            $this->JSON_DATA
        );
    }
    public function update(){
        $id = $this->JSON_DATA["id"];
        unset($this->JSON_DATA["id"]);
        echo $this->login_model->update(
            $this->JSON_DATA,
            array(
                "id" => $id
            )
        );
    }
    public function delete(){
        echo $this->login_model->delete(
            $this->JSON_DATA
        );
    }
}