<?php
require_once 'kbase.php';
class Model_imunisasi extends Kbase {
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        parent::$tname = 'imunisasi';
    }    
        
    function getAll()
    {
        $q = "select * from imunisasi";
        $rs = $this->db->query($q)->result_array();
        return $rs;
        
    }
    
    function add($r)
    {
        $q = "insert into imunisasi "
                . "(nama_imunisasi,  sifat_imunisasi)"
                . "values"
                . "('".$r['nama_imunisasi']."', '".$r['sifat_imunisasi']."')";
        
        return $this->db->simple_query($q);
    }
    
    function edit($id,$r)
    {
        $q = "update imunisasi set"
                . " nama_imunisasi = '".$r['nama_imunisasi']."' , sifat_imunisasi = '".$r['sifat_imunisasi']."' "
                . " where id_imunisasi = '".$id."'";
        return $this->db->simple_query($q);
    }
    
    function delete($id)
    {
        $q = "delete from imunisasi where id_imunisasi = '".$id."'";
        
        return $this->db->simple_query($q);
    }
}
?>