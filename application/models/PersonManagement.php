<?php
class PersonManagement extends CI_Model
{
    function savePersonData(array $data){
        $this->db->insert("person",$data);
        return $this->db->insert_id();
    }

    function getData()
    { 
        $this->db->select("*");
        $this->db->from("person");
        $this->db->order_by("id","desc");
        return $this->db->get();
    }

    function getDataUsingID($id)
    { 
        $this->db->select("*");
        $this->db->from("person");
        $this->db->where("id",$id);
        return $this->db->get();
    }

    function delete($id){
        $this->db->where("id",$id);
        $this->db->delete("person");
    }

    function updatePerson(array $data){
        $this->db->where("id",$data["id"]);
        return $this->db->update("person",$data);
    }

    function checkCredentials($username,$password){
        $this->db->select("*");
        $this->db->from("person");
        $this->db->where("email",$username);
        $this->db->where("password",$password);
        return $this->db->get();
    }


}
