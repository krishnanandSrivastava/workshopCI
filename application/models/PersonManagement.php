<?php
class PersonManagement extends CI_Model{
    function getData(){
        $this->db->select("*");
        $this->db->from("person");
        $this->db->order_by("id","desc");
        return $this->db->get();
        }
    function getDataById($id){
        $this->db->select("*");
        $this->db->from("person");
        $this->db->where("id",$id);
        return $this->db->get();
        }
    function saveData($data){
        if($this->db->insert('person',$data)){
            echo "success";
        }else{
            echo "Failed";
        }
    }
    function deleteData($id){
        $this->db->where("id",$id);
        return $this->db->delete("person");
    }

}
?>