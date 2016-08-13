<?php
require_once 'kbase.php';
class Model_agimunisasi extends Kbase {
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        parent::$tname = 'agenda_imunisasi';
    }    
        
    function getAll()
    {
        $q = "select * from agenda_imunisasi";
        $rs = $this->db->query($q)->result_array();
        return $rs;
        
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
    
    function edit($id,$r)
    {
        $q = "update agenda_imunisasi set"
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