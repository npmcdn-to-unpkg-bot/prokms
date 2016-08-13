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
                . "(id_balita,  umur,    berat,    tinggi)"
                . "values"
                . "('".$r['id_balita']."', '".$r['umur']."', '".$r['berat']."', '".$r['tinggi']."')";
        
        return $this->db->simple_query($q);
    }
    
    function edit($id,$r)
    {
        $q = "update imunisasi set"
                . " id_balita = '".$r['id_balita']."' , umur = '".$r['umur']."',"
                . " berat = '".$r['berat']."',  tinggi = '".$r['tinggi']."' "
                . " where id_perkembangan = '".$id."'";
        return $this->db->simple_query($q);
    }
    
    function delete($id)
    {
        $q = "delete from imunisasi where id_perkembangan = '".$id."'";
        
        return $this->db->simple_query($q);
    }
}
?>