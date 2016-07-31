<?php
require_once 'kbase.php';
class Model_perkembangan extends Kbase {
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        parent::$tname = 'balita';
    }    
        
    function getAll()
    {
        $q = "select * from perkembangan";
        $rs = $this->db->query($q)->result_array();
        return $rs;
        
    }
    
    function getAllByOrtu($id)
    {
        $q = "select * from balita"
                . " where id_ortu = '".$id."'";
        $rs = $this->db->query($q)->result_array();
        return $rs;
        
    }
    
    function add($r)
    {
        $q = "insert into perkembangan "
                . "(id_balita,  tanggal_ukur,    berat,    tinggi)"
                . "values"
                . "('".$r['id_balita']."', '".$r['tanggal_ukur']."', '".$r['berat']."', '".$r['tinggi']."')";
        
        return $this->db->simple_query($q);
    }
    
    function edit($id,$r)
    {
        $q = "update perkembangan set"
                . " id_balita = '".$r['id_balita']."' , tanggal_ukur = '".$r['tanggal_ukur']."',"
                . " berat = '".$r['berat']."',  tinggi = '".$r['tinggi']."' "
                . " where id_perkembangan = '".$id."'";
        return $this->db->simple_query($q);
    }
    
    function delete($id)
    {
        $q = "delete from perkembangan where id_perkembangan = '".$id."'";
        
        return $this->db->simple_query($q);
    }
}
?>