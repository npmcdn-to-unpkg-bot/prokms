<?php
require_once 'kbase.php';
class Model_ortu extends Kbase {
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        parent::$tname = 'users';
    }    
        
    function getAll()
    {
        $q = "select * from orang_tua";
        $rs = $this->db->query($q)->result_array();
        return $rs;
        
    }
    
    function add($r)
    {
        $q = "insert into orang_tua "
                . " (nama_ortu,  jkel,   id_user,    alamat,"
                . " no_hp,  email)"
                . "values"
                . "('".$r['nama_ortu']."', '".$r['jkel']."', '".$r['id_user']."', '".$r['alamat']."',"
                . " '".$r['no_hp']."', '".$r['email']."')";
        return $this->db->simple_query($q);
    }
}
?>