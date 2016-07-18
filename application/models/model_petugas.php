<?php
require_once 'kbase.php';
class Model_dokter extends Kbase {
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        parent::$tname = 'petugas_yandu';
    }    
        
    function getAll()
    {
        $q = "select * from petugas_yandu";
        $rs = $this->db->query($q)->result_array();
        return $rs;
        
    }
    
    function add($r)
    {
        $q = "insert into petugas_yandu "
                . " (nama_petugas,  id_user_petugas,    alamat_petugas,"
                . " no_hp_petugas,  email_petugas)"
                . "values"
                . "('".$r['nama_petugas']."', '".$r['id_user_petugas']."', '".$r['alamat_petugas']."',"
                . " '".$r['no_hp_petugas']."', '".$r['email_petugas']."')";
        return $this->db->simple_query($q);
    }
    
    function edit($id,$r)
    {
        $q = "update petugas_yandu set"
                . " nama_petugas = '".$r['nama_petugas']."' , alamat_petugas = '".$r['alamat_petugas']."',"
                . " no_hp_petugas = '".$r['no_hp_petugas']."',  email_petugas = '".$r['email_petugas']."' "
                . " where id_petugas = '".$id."'";
        return $this->db->simple_query($q);
    }
}
?>