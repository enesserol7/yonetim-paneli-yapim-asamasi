<?php
class Connect{
    protected $CI;
    public function __construct(){
        $this->CI =& get_instance();
    }
    public function signIn($email, $password){
        $this->CI->load->model("function_model");
        $user = $this->CI->function_model->get("system_users",
            array(
                "email" => $email,
                "password" => md5($password),
                "isActive" => 1
            )
        );
        if ($user) {
            $alert = array(
                "title" => "İşlem Başarılıyla Gerçekleşti.",
                "text" => "$user->full_name Hoşgeldiniz...",
                "type" => "success"
            );
            $this->CI->session->set_userdata("user",$user);
            setUserRoles();
            $this->CI->session->set_flashdata("alert",$alert);
            return 1;
        }else{
            $user = $this->CI->function_model->get("institution_users",
                array(
                    "email" => $email,
                    "password" => md5($password),
                    "isActive" => 1
                )
            );
            if ($user) {
                $alert = array(
                    "title" => "İşlem Başarılıyla Gerçekleşti.",
                    "text" => "$user->full_name Hoşgeldiniz...",
                    "type" => "success"
                );
                $this->CI->session->set_userdata("institution_user",$user);
                setInstitutionUserRoles();
                setInstitutionUserPermissions();
                $this->CI->session->set_flashdata("alert",$alert);
                return 1;
            }else{
              $alert = array(
                "title" => "İşlem Başarısız!.",
                "text" => "Lütfen giriş bilgilerinizi kontrol ediniz!",
                "type" => "error"
            );
              $this->CI->session->set_flashdata("alert",$alert);
              return 0;
          }
      }    
  }
}
?>