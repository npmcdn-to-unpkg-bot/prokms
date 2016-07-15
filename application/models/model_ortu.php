<?php
class Model_ortu extends CI_Model {
    
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }    
        
    function getAll()
    {
        $q = "select * from users
                where username = ".$id."
                and credential = MD5(".$crd.")";
        $r = $this->db->query($q)->row_array();
        return $r;
        
    }
}
?>