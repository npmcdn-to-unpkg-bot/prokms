<?php
class Model_users extends CI_Model {
    
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }    
        
    function getToAuthenticate($id,$crd)
    {
        $id = $this->db->escape($id);
        $crd = $this->db->escape($crd);
        $q = "select * from users
                where username = ".$id."
                and credential = MD5(".$crd.")";
        $r = $this->db->query($q)->row_array();
        return $r;
        
    }
}
?>