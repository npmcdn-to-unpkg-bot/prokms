<?php
require_once 'kbase.php';

class Model_users extends Kbase {
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        parent::$tname = 'users';
    }    
    function add($r)
    {
        $dt = date('Y-m-d H:i:s');
        $q = "INSERT INTO users (username,credential,id_role,tgl_reg) "
                . "VALUES "
                . "('".$r['username']."',md5('".$r['credential']."'),'".$r['id_role']."','".$dt."')";
        return $this->db->simple_query($q);
    }
    
    function update($id,$r)
    {
        $q = "UPDATE users SET credential = md5('".$r['credential']."') WHERE id_user = '".$id."'";
        return $this->db->simple_query($q);
    }
    
    function delete($id)
    {
        $q = "DELETE FROM users WHERE id_user='".$id."'";
        return $this->db->simple_query($q);
    }
    
    function getToAuthenticate($id,$crd)
    {
        $id = $this->db->escape($id);
        $crd = $this->db->escape($crd);
        $q = "select * from users
                where username = ".$id."
                and credential = MD5(".$crd.")";
        $r = $this->db->query($q)->row_array();
        return $r;
        
    }
}
?>