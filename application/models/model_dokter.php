<?php
require_once 'kbase.php';
class Model_dokter extends Kbase {
    protected $tname = 'dokter';
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }    
        
    function getAll()
    {
        $q = "select * from dokter";
        $rs = $this->db->query($q)->result_array();
        return $rs;
        
    }
    
    function add($r)
    {
        $q = "insert into dokter "
                . " (nama_dokter,  id_user_dokter,    alamat_dokter,"
                . " no_hp_dokter,  email_dokter)"
                . "values"
                . "('".$r['nama_dokter']."', '".$r['id_user_dokter']."', '".$r['alamat_dokter']."',"
                . " '".$r['no_hp_dokter']."', '".$r['email_dokter']."')";
        return $this->db->simple_query($q);
    }
}
?>