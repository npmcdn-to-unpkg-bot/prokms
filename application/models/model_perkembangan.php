<?php
require_once 'kbase.php';
class Model_perkembangan extends Kbase {
    protected $tname = 'perkembangan';
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }    
        
    function getAll()
    {
        $q = "select * from perkembangan";
        $rs = $this->db->query($q)->result_array();
        return $rs;
        
    }
    
    function getAllByBalita($id)
    {
        $q = "select * from perkembangan"
                . " where id_balita = '".$id."'";
        $rs = $this->db->query($q)->result_array();
        return $rs;
        
    }
    
    function getBeratFormated($id)
    {
        $q = "select umur,berat from perkembangan"
                . " where id_balita = '".$id."'";
        $rs = $this->db->query($q)->result_array();
        return $rs;
        
    }
    
    function add($r)
    {
        $q = "insert into perkembangan "
                . "(id_balita,  umur,    berat,    tinggi)"
                . "values"
                . "('".$r['id_balita']."', '".$r['umur']."', '".$r['berat']."', '".$r['tinggi']."')";
        
        return $this->db->simple_query($q);
    }
    
    function edit($id,$r)
    {
        $q = "update perkembangan set"
                . " id_balita = '".$r['id_balita']."' , umur = '".$r['umur']."',"
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