<?php
/*
 * Class untuk menghandel query sering dan sederhana
 * dengan fungsi antara lain: query data(get),update data(edit),tambah data(add), dan hapus data(delete)
 * CARA PENGGUNAAN:
 * $this->get(array('*'),//kolom tabel utama
                    array(array('tabel1','tabel1.id= hometabel.id',array(kolom1,'alias2'=>'kolom3'),//join
                    array(array("kolom1 is null"),array("kolom2 = '?'",$type)),//where
                    array('ORDERED'));//order
   $this->add(array(   'kolom1'=>'value1',//KOLOM BIASA
                    array('DATE','20-12-2012','DD-MM-YYYY')//KOLOM DENGAN NILAI TANGGAL
                )
        );
 
$this->edit('value',//PRIMARY KEY
            //data yang akan di update
            array(   'kolom1'=>'value1',//KOLOM BIASA
                    array('DATE','20-12-2012','DD-MM-YYYY')//KOLOM DENGAN NILAI TANGGAL
                )
            );

edit dengan multiprimary key
$this->edit(array('kolomprim1'=>'value1','kolimpirmari2'=>'value2'),//MULTI PRIMARY KEY
            //data yang akan di update
            array(   'kolom1'=>'value1',//KOLOM BIASA
                    array('type'=>'date','value'=>'20-12-2012')//KOLOM DENGAN NILAI TANGGAL
                )
            );
 
$this->delete('value');
hapus dengan multiprimary key
$this->delete(array('kolomprim1'=>'value1','kolimpirmari2'=>'value2'))//MULTI PRIMARY KEY);
 
 * 
 * Fungsi yang seharunya ada (TAPI BELUM ADA) :D
 * nama tabel tidak bisa dengan alias, harus full penulisannya
 * limitasi record untuk paging hasil query
 */

class Kbase extends CI_Model {
	
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        
//        $q = "ALTER SESSION SET nls_date_format = 'DD-MM-YYYY'";
//        $this->db->simple_query($q);
    }
    
        function get($cols = array('*'),$join = null,$where = null,$order = null,$limit = null){
    //            create where
            foreach ($cols as $v) {
                $cs .= $this->_name.".".$v.",";
            }
    //        generate join
            if($join)
            {
                foreach ($join as $v) {
                    $js .= " JOIN ".$v[0]." ON ".$v[1]." ";
                    if (is_array($v[2]))
                    {
                        foreach ($v[2] as $kk => $vv) {
                            $cs .= $v[0].".".(is_int($kk) ? $vv : $vv." ".$kk).",";
                        }
                    }
                    else
                    {
                        $cs .= $v[0].".*";
                    }
                }
            }

    //        generate where
            if($where)
            {
                foreach ($where as $v) {
                    $ws .= str_replace('?', $v[1], $v[0])." AND ";
                }
                $ws = " WHERE ".$ws;
            }
//            GENERATE ORDER BY
            if($order)
            {
                $os = is_array($order) ? implode(',', $order) : $order;
                $os = ' ORDER BY '.$os;
            }
            
//            Core Query String
            $cqs = "SELECT ".trim($cs,',')." FROM ".$this->_name." ".$js." ".trim($ws,'AND ').$os;
//            return $cqs;
            $this->load->database();
            return $this->db->query($cqs);
        }
        
	function add($data,$table = NULL){
            $table = empty($table) ? $this->_name:$table;
            if(is_array($data))
            {
                if (!empty($table))
                {
    //                create SQL
                    $q = "INSERT INTO ".$table;
                    foreach ($data as $k => $v) {
                        $field .= $k.",";
                        if (is_array($v))
                        {
                            switch ($v['type']) {
                                case 'date':
                                       $value .= empty($v['value']) ? "null,":"to_date('".$v['value']."','DD-MM-YYYY'),";
                                    break;
                            }
                        }
                        else
                           $value .= "'".$v."',";
                    }
                    $field = trim($field, ',');
                    $value = trim($value,',');
                    $q .= "(".$field.") VALUES (".$value.")";
                    return $this->db->simple_query($q);
                }
                else
                    return FALSE;
            }
            else 
                return FALSE;
	}
	
	function edit($id,$data,$table = NULL){
                $table = empty($table) ? $this->_name:$table;
//		 generate field to set
                foreach($data as $key=>$value){
                    if(is_array($value))
                    {
                        if(strtolower($value['type']) == 'date')
                        {
                            $field[] = $key."= TO_DATE('".$value['value']."','DD-MM-YYYY')";
                        }
                    }
                    else
                    {
                         $field[] = $key."='$value'";
                    }
                   
                }
//                generate the WHERE CLAUSE
                
                if(is_array($id))
                {
                    foreach ($id as $k => $v) 
                    {
                        $where[] = $k."='".$v."'";
                    }
                }
                
//                execute query
                $sql = "UPDATE ".$table." SET ".implode(',',$field)." WHERE ".  implode(' AND ', $where);
                return $this->db->simple_query($sql);
                
	}
	
	function delete($id){
		$this->load->database();
//                generate the WHERE CLAUSE
                if(is_array($this->_primary))
                {
                    foreach ($this->_primary as $k => $v) {
                        $where[] = $v."='".$id[$k]."'";
                    }
                }
                else
                {
                    $where[] = $this->_primary."='".$id."'";
                }
                
		$this->db->trans_start();
                $this->db->query("DELETE FROM ".$this->_name." WHERE ".  implode(' AND ', $where));
		$this->db->trans_complete();
		
		$return = $this->db->trans_status();
		$this->db->close();
		return $return;
	}
        
        function genWhere($filter = Array(),$plusWhere = FALSE )
        {
            $ws = NULL;
            if($filter)
            {
                foreach ($filter as $k => $v) {
                    $ws .= "$k = '".$v."' AND ";
                }
                $ws = rtrim($ws,'AND ');
                if (!empty($ws))
                {
                    $ws = $plusWhere ? (" WHERE ".$ws) : (" AND ".$ws);
                }
            }
            
            return $ws;
        }
       
        
}
?>