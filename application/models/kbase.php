<?php
class Kbase extends CI_Model {
    protected $tname;
            function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        
    }
    
    function getId()
    {
        $q = "SELECT AUTO_INCREMENT NEXT_ID
                FROM information_schema.tables
                WHERE table_name = '".  $this->tname."'";
        
        $r =  $this->db->query($q)->row_array();
        return $r['NEXT_ID'];
    }
}
?>