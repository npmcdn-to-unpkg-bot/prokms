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
    
    function getByUserId($id)
    {
        $q = "select * from dokter where id_user_dokter = '".$id."'";
        return $this->db->query($q)->row_array();
    }
    
    function getById($id)
    {
        $q = "select * from dokter where id_dokter = '".$id."'";
        return $this->db->query($q)->row_array();
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
    
    function update($id,$r)
    {
        $q = "update dokter set"
                . " nama_dokter = '".$r['nama_dokter']."' , alamat_dokter = '".$r['alamat_dokter']."',"
                . " no_hp_dokter = '".$r['no_hp_dokter']."'"
                . " where id_dokter = '".$id."'";
        return $this->db->simple_query($q);
    }
    
    function delete($id)
    {
        $q = "DELETE FROM dokter WHERE id_dokter='".$id."'";
    }
}
?>