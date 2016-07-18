<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
        function __construct() {
            parent::__construct();     
        }
        
        
	public function index()
	{
            if ($this->session->userdata('has_identity') == TRUE)
            {
//                trow to HOME page!
                    redirect('home');
            }
//            if submitted
            if(!empty($_POST['USM']) AND !empty($_POST['CRD']))
            {
//              Do Authenticate
                $this->load->model('model_users');
//                $r = $this->model_users->get('*',NULL,array(array('username = ?',$USM),
//                                                            array('credential = ?',$CRD)
//                                                            )
//                                            );
                $this->load->model('model_users');
                $r = $this->model_users->getToAuthenticate($_POST['USM'],$_POST['CRD']);
                
                if(!empty($r['username']))
                {
                    $this->session->set_userdata(array('id_user'=>$r['id_user'],
                                                        'username'=>$r['username'],
                                                        'id_role'=>$r['id_role'],
                                                        'has_identity'=>TRUE)
                                                );
                    redirect('home');
                }
                else
                    $this->session->set_flashdata('loginerror','Login Gagal, Username atau Password salah');
                    redirect('auth');
            }
            $login['loginerror'] = $this->session->flashdata('loginerror');
            $view['content'] = $this->load->view('login',$login,TRUE);
            $this->load->view('index_clear',$view);
	}
        
        public function logout()
        {
            $this->session->unset_userdata(array('user_id',
                                                'username',
                                                'id_role',
                                                'has_identity')
                                                );
            redirect ('auth');
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */