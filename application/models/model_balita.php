<?php
require_once 'kbase.php';
class Model_balita extends Kbase {
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        parent::$tname = 'balita';
    }    
        
    function getAll()
    {
        $q = "select * from balita";
        $rs = $this->db->query($q)->result_array();
        return $rs;
        
    }
    function getDetail($id)
    {
        $q = "select id_balita,b.id_ortu, nama_balita, tanggal_lahir, kelamin, berat_lahir,
                tinggi_lahir,catatan_khusus,nama_ortu, jkel kelamin_ortu,alamat,no_hp,email 
                from balita a, orang_tua b
                where a.id_ortu = b.id_ortu
                and id_balita = '".$id."'";
        
        $rr = $this->db->query($q)->row_array();
        return $rr;
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
        $q = "insert into balita "
                . " (nama_balita,  id_ortu,    tanggal_lahir,"
                . " kelamin,  berat_lahir,  tinggi_lahir,   catatan_khusus)"
                . "values"
                . "('".$r['nama_balita']."', '".$r['id_ortu']."', '".$r['tanggal_lahir']."',"
                . " '".$r['kelamin']."', '".$r['berat_lahir']."', '".$r['tinggi_lahir']."', '".$r['catatan_khusus']."')";
        
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