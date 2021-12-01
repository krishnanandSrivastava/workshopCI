<?php
class Person extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model("PersonManagement");
    }
    function index(){
        
        $this->load->view("createPerson");    }
    function editPerson($id){
        $viewData["personData"] =$this->PersonManagement->getDataById($id)->result()[0];
        $this->load->view("editPerson",$viewData);
    }
    function viewPerson($s=false)
    {
        $viewData["personData"] =  $this->PersonManagement->getData()->result();
        $viewData["s"]=$s;
        $this->load->view("detailPage",$viewData);
    }
    function deletePerson($id){
        $s=$this->PersonManagement->deleteData($id);
        $this->viewPerson($s);
    }
    public function savePerson(){
        echo "hello";
        $this->PersonManagement->getData();
        // echo $this->input->post('firstName');
        $this->form_validation->set_rules('firstName','First Name','required',array("required"=>"Please Enter First Name"));
        $this->form_validation->set_rules('lastName','Last Name','required',array("required"=>"Please Enter Last Name"));
        $this->form_validation->set_rules('mobile','Mo no','required|min_length[10]|max_length[10]|numeric',array("required"=>"Please Enter Mobile No"));
        $this->form_validation->set_rules('email','Email','required|valid_email',array("valid_email"=>"Not valid Email","required"=>"Email required"));
        $this->form_validation->set_rules('gender','Gender','required',array("required"=>"Please Select Gender"));
        $this->form_validation->set_rules('hobbies','Hobbies','required',array("required"=>"Please Select Hobby"));
        $this->form_validation->set_rules('city','City','required',array("required"=>"Please Select City"));
        $this->form_validation->set_rules('address','Address','required',array("required"=>"Please Enter Address"));
        // $this->form_validation->set_rules('photo','PHOTO','required',array("required"=>"please select image"));
        if($this->form_validation->run()==false){

            $this->index();
        }
        else{
            $fconfig["upload_path"] = "./assets/uploads/";
            $fconfig["allowed_types"]= 'jpeg|jpg|png';
            $fconfig["max_size"] ="2048";
            $fconfig["file_ext_tolower"]=TRUE;
            $fconfig["overwrite"]=TRUE;
            $fconfig["encrypt_name"]=TRUE;
            $this->load->library("upload",$fconfig);
            if(!$this->upload->do_upload("photo")){
                echo $this->upload->display_errors();
                // exit;
                // $this->createPerson();

            }
            else{
                $personData = array(
                    "firstName" =>$this->input->post("firstName"),
                    "lastName" => $this->input->post("lastName"),
                    "mobile" => $this->input->post("mobile"),
                    "email" => $this->input->post("email"),
                    "gender" => $this->input->post("gender"),
                    "city" => $this->input->post("city"),
                    "address" => $this->input->post("address"),
                    "password" => $this->input->post("password"),
                    "hobbies" => $this->input->post("hobbies"),
                    "photo" => "./assets/uploads/".$this->upload->data()["file_name"]
                );
            $this->PersonManagement->saveData($personData);
            }
            
        }
    }
}
?>