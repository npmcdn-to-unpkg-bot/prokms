<?php
require_once 'kbase.php';

class Model_menu extends Kbase {
    
    //private property
    protected $_name = 'MENUS';
    protected $_primary = 'ID';
    
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }    
        
    function getByType($type)
    {
        $q = "SELECT * FROM MENUS WHERE PARENT IS NULL AND PUBLISHED = 1 AND MENUTYPE = '".$type."' ORDER BY ORDERED ASC";
        $this->load->database();
        $rsMenu = $this->db->query($q)->result_array();
        foreach ($rsMenu as $k=>$v)
        {
            $q = "SELECT * FROM MENUS WHERE PARENT = '".$v['ID']."' AND PUBLISHED = 1 ORDER BY ORDERED ASC";
            $rsMenu[$k]['CHILD'] = $this->db->query($q)->result_array();
        }
        return $rsMenu;
        
    }
}
?>