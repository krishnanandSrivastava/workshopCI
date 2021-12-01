<?php
class Person extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("PersonManagement");
    }

    public function index()
    {
        if ($this->session->userdata("person")["isLoggedIn"]) {
            $viewData["personData"] =  $this->PersonManagement->getData()->result();
            $this->load->view("detailPage", $viewData);
        } else {
            redirect("Person/login");
        }
    }

    public function createPerson()
    {
        $this->load->view("createPerson");
    }

    public function deletePerson($id)
    {
        if ($this->PersonManagement->delete($id)) {
            $this->session->set_flashdata("successMessage", "Row deleted Successfully.");
        } else {
            $this->session->set_flashdata("errorMessage", "Failed To delete Row.");
        }
        redirect("Person");
    }

    public function editPerson($id)
    {
        $viewData["personData"] = $this->PersonManagement->getDataUsingID($id)->result()[0];
        $this->load->view("editPerson", $viewData);
    }

    public function savePerson()
    {

        $this->form_validation->set_rules('firstName', 'First Name', 'required', array("required" => "Please Enter First Name"));

        $this->form_validation->set_rules('lastName', 'Last Name', 'required', array("required" => "Please Enter First Name"));

        $this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric|min_length[10]|max_length[10]', array("required" => "Please Enter Mobile Number."));

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email', array("required" => "Please Enter Email."));

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email', array("required" => "Please Enter Email."));

        //$this->form_validation->set_rules('hobbies', 'Hobbies', 'required',array("required"=>"Please Select At Least One hobby."));

        $this->form_validation->set_rules('password', 'Password', 'required', array("required" => "Please Enter Password."));

        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]', array("required" => "Please Enter Confirm Password."));

        if ($this->form_validation->run() == false) {
            $this->createPerson();
        } else {
            $fileConfig["upload_path"] = "./assets/uploads/";
            $fileConfig["allowed_types"] = "jpg|jpeg|png";
            $fileConfig["max_size"] = "2048";
            $fileConfig["file_ext_tolower"] = TRUE;
            $fileConfig["overwrite"] = TRUE;
            $fileConfig['encrypt_name'] = TRUE;

            $this->load->library("upload", $fileConfig);
            if (!$this->upload->do_upload("photo")) {
                $this->session->set_flashdata("errorMessage", $this->upload->display_errors());
                $this->createPerson();
            } else {
                $photo = $this->upload->data()["file_name"];
                $hobbiesAll = "";
                $hobbies = $this->input->post("hobbies");
                foreach ($hobbies as $hob) {
                    $hobbiesAll = implode(',', $hobbies);
                }
                $personData = array(
                    "firstName" => $this->input->post("firstName"),
                    "lastName" => $this->input->post("lastName"),
                    "mobile" => $this->input->post("mobile"),
                    "email" => $this->input->post("email"),
                    "hobbies" => $hobbiesAll,
                    "address" => $this->input->post("address"),
                    "city" => $this->input->post("city"),
                    "password" => md5($this->input->post("password")),
                    "gender" => $this->input->post("gender") == "M" ? "Male" : "Female",
                    "photo" => "assets/uploads/" . $photo
                );
                if ($this->PersonManagement->savePersonData($personData)) {
                    echo $this->db->last_query();
                    echo "Success";
                } else {
                    echo "Falied";
                }
            }
        }
    }

    public function updatePerson()
    {
        $this->form_validation->set_rules('firstName', 'First Name', 'required', array("required" => "Please Enter First Name"));

        $this->form_validation->set_rules('lastName', 'Last Name', 'required', array("required" => "Please Enter First Name"));

        $this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric|min_length[10]|max_length[10]', array("required" => "Please Enter Mobile Number."));

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email', array("required" => "Please Enter Email."));

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email', array("required" => "Please Enter Email."));

        //$this->form_validation->set_rules('hobbies', 'Hobbies', 'required',array("required"=>"Please Select At Least One hobby."));

        $this->form_validation->set_rules('password', 'Password', 'required', array("required" => "Please Enter Password."));

        //$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]', array("required" => "Please Enter Confirm Password."));

        if ($this->form_validation->run() == false) {
            $this->createPerson();
        } else {
            $photo = "";
            if (!empty($_POST["photo"])) {
                $fileConfig["upload_path"] = "./assets/uploads/";
                $fileConfig["allowed_types"] = "jpg|jpeg|png";
                $fileConfig["max_size"] = "2048";
                $fileConfig["file_ext_tolower"] = TRUE;
                $fileConfig["overwrite"] = TRUE;
                $fileConfig['encrypt_name'] = TRUE;
                $this->load->library("upload", $fileConfig);
                if (!$this->upload->do_upload("photo")) {
                    $photo = $this->input->post("old_photo");
                } else {

                    $photo = "assets/uploads/" . $this->upload->data()["file_name"];
                }
            } else {
                $photo = $this->input->post("old_photo");
            }

            $hobbies = $this->input->post("hobbies");
            $hobbiesAll = implode(',', $hobbies);
            $personData = array(
                "id" => $this->input->post("id"),
                "firstName" => $this->input->post("firstName"),
                "lastName" => $this->input->post("lastName"),
                "mobile" => $this->input->post("mobile"),
                "email" => $this->input->post("email"),
                "hobbies" => $hobbiesAll,
                "address" => $this->input->post("address"),
                "city" => $this->input->post("city"),
                "password" => md5($this->input->post("password")),
                "gender" => $this->input->post("gender") == "M" ? "Male" : "Female",
                "photo" => $photo
            );
            if ($this->PersonManagement->updatePerson($personData)) {
                redirect("Person");
            } else {
                echo $this->db->last_query();
                exit;
            }
        }
    }

    public function login()
    {
        if ($this->session->userdata("person")["isLoggedIn"]) {
            $this->index();
        } else {
            $this->load->view("login");
        }
    }

    public function validateLogin()
    {
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $personData = $this->PersonManagement->checkCredentials($username, md5($password))->result();

        if (sizeof($personData)) {
            $personSessionData = array(
                "name" => $personData[0]->firstName . " " . $personData[0]->lastName,
                "email" => $personData[0]->email,
                "isLoggedIn" => true
            );
            $this->session->set_userdata("person", $personSessionData);
            redirect("Person");
        } else {
            echo "Wrong Credentials";
        }
    }

    public function logout()
    {
        $this->session->set_userdata("person", "");
        $this->session->sess_destroy();
        redirect("Person/login");
    }
}
