<?php
require_once 'kbase.php';
class Model_agimunisasi extends Kbase {
    protected $tname = 'agenda_imunisasi';
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }    
        
    function getAll()
    {
        $q = "select * from agenda_imunisasi";
        $rs = $this->db->query($q)->result_array();
        return $rs;
        
    }
    
    function getById($id)
    {
        $q = "select * from agenda_imunisasi where id_agenda = '".$id."'";
        $r = $this->db->query($q)->row_array();
        return $r;
        
    }
    
    function getAllByBalita($id)
    {
        $q = "select a.*,b.nama_imunisasi,b.sifat_imunisasi from agenda_imunisasi a, imunisasi b "
                . " where a.id_imunisasi = b.id_imunisasi"
                . " and  id_balita = '".$id."'"
                . " order by tanggal_agenda";
        $rs = $this->db->query($q)->result_array();
        return $rs;
        
    }
    
    
    
    function add($r)
    {
        $q = "insert into agenda_imunisasi "
                . "(id_balita,  id_imunisasi,    tanggal_agenda, flag_realisasi, tanggal_realisasi, keterangan)"
                . "values"
                . "('".$r['id_balita']."', '".$r['id_imunisasi']."', '".$r['tanggal_agenda']."', '".$r['flag_realisasi']."', '".$r['tanggal_realisasi']."', '".$r['keterengan']."')";
        
//        var_dump($q); exit();
        return $this->db->simple_query($q);
    }
    
    function update($id,$r)
    {
        $q = "update agenda_imunisasi set"
                . " id_imunisasi = '".$r['id_imunisasi']."' , tanggal_agenda = '".$r['tanggal_agenda']."'"
                . " where id_agenda = '".$id."'";
        return $this->db->simple_query($q);
    }
    
    function realisasi($id,$r)
    {
        $q = "update agenda_imunisasi set"
                . " flag_realisasi = '".$r['flag_realisasi']."' , tanggal_realisasi = '".$r['tanggal_realisasi']."',"
                . " keterangan = '".$r['keterangan']."'"
                . " where id_agenda = '".$id."'";
        return $this->db->simple_query($q);
    }
    
    function delete($id)
    {
        $q = "delete from agenda_imunisasi where id_agenda = '".$id."'";
        
        return $this->db->simple_query($q);
    }
    
    function deleteByBalita($idb)
    {
        $q = "delete from agenda_imunisasi where id_balita = '".$idb."'";
        
        return $this->db->simple_query($q);
    }
}
?>