<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'kloader.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Kauth
 *
 * @author user
 */
class kauth {
    //put your code here
    private $ldap_config = array('server1'=>array(   'host'=>'10.0.0.11',
                                    'useStartTls'=>false,
                                    'accountDomainName'=>'pp3.co.id',
                                    'accountDomainNameShort'=>'PP3',
                                    'accountCanonicalForm'=>3,
                                    'baseDn'=>"DC=pp3,DC=co,DC=id"));


        function __construct() {
//        load the auth class
        kloader::load('Zend_Auth');
        kloader::load('Zend_Auth_Storage_Session');
        
//        set the unique storege
        Zend_Auth::getInstance()->setStorage(new Zend_Auth_Storage_Session("shgfhgjhgjkhjrakkesan4kemasti"));
    }
    
    
    public function authanticate($username,$credential)
    {
        kloader::load('Zend_Auth_Adapter_DbTable');
        kloader::load('Zend_Db_Adapter_Oracle');
        $CI =& get_instance();
        
        $auth = Zend_Auth::getInstance();
        $auth->clearIdentity();
        
//        load config
        $CI->load->database();
        $dbConfig = array(
//                'host'     => $CI->db->hostname,
                'username'  => $CI->db->username,
                'password'  => $CI->db->password,
                'dbname'    => $CI->db->hostname
            );
        $dbAdapter = new Zend_Db_Adapter_Oracle($dbConfig);
        $adapter = new Zend_Auth_Adapter_DbTable($dbAdapter);
        
        $adapter->setTableName("USERS")
                ->setIdentityColumn("USERNAME")
                ->setCredentialColumn("PASSWORD")
                ->setIdentity($username)
                ->setCredential($credential)
                ->setCredentialTreatment('md5(?)')
        ;
        if($auth->authenticate($adapter)->isValid())
        {
            //autheticated
            $auth->getStorage()->write($adapter->getResultRowObject(null,"PASSWORD"));
            return true;
        }
        else
        {
            return false;
        }
    }
    
    
    public function localAuthenticate($username,$credential) {
        $auth = Zend_Auth::getInstance();
        $auth->clearIdentity();
        
        if($username =='demo' and $credential=='q')
        {
            $identity = new stdClass();
            $identity->NAME = 'Herman';
            $identity->USERNAME = 'Demo';
            $identity->ID_GROUP = 'SUPERADMIN';
            $identity->KD_DIT = '02';
            $identity->KD_SUB = '02';
            $identity->KD_SEK = '02';
            $identity->KD_CAB = '01';
            $auth->getStorage()->write($identity);
            return true;
        }
        else
        {
            return FALSE;
        }
    }

    public function getInstance(){
        return Zend_Auth::getInstance();
    }
}

?>
