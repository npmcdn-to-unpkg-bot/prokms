<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller {

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
            if ($this->session->userdata('has_identity') != TRUE)
            {
//                trow to unauthenticated page!
                  redirect('auth');
            }          
        }
        
        
	public function index()
	{
            $view['content'] = $this->load->view('home',NULL,TRUE);
            $this->load->view('index',$view);
	}
        
	public function ortu()
	{
            $this->load->model('model_ortu');
            
            $rs = $this->model_ortu->getAll();
            $data['rs'] = $rs;
            $view['content'] = $this->load->view('setting/ortu',$data,TRUE);
            $this->load->view('index',$view);
	}
        
	public function ortu_new()
	{
            $this->load->library('form_validation');
            $this->load->model('model_users');
            $this->load->model('model_ortu');
            if($this->input->post())
            {
//                do validate
                $rules = array( array('field'=>'nama','label'=>'Nama Orang Tua','rules'=>'required'),
                                array('field'=>'jkel','label'=>'Jenis Kelamin','rules'=>'required'),
                                array('field'=>'alamat','label'=>'Alamat','rules'=>'required'),
                                array('field'=>'phone','label'=>'Telephone/HP','rules'=>'required'),
                                array('field'=>'email','label'=>'Username (Email)','rules'=>'required|regex_match[/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/]'),
                                array('field'=>'credential','label'=>'Password','rules'=>'required|max_length[20]'),
                                array('field'=>'credential2','label'=>'Re-entry Password','rules'=>'required|matches[credential]')
                );
                
                $this->form_validation->set_rules($rules);
                if ($this->form_validation->run() != FALSE)
                {
//                    do insert
//                      get user id
                    $id_user = $this->model_users->getId();
                    $ru = array('username'=>$_POST['email'],
                                'credential'=>$_POST['credential'],
                                'id_role'=>2);//orang tua
                    if($this->model_users->add($ru))
                    {
//                        insert orang tua
                        $ro = array('nama_ortu'=>$_POST['nama'],
                                    'jkel'=>$_POST['jkel'],
                                    'id_user'=>$id_user,
                                    'alamat'=>$_POST['alamat'],
                                    'no_hp'=>$_POST['phone'],
                                    'email'=>$_POST['email']);
                        if($this->model_ortu->add($ro))
                        {
                            redirect('setting/ortu');
                        }
                    }
                    
                }
            }
            $view['content'] = $this->load->view('setting/ortu_new',NULL,TRUE);
            $this->load->view('index',$view);
	}
	public function dokter()
	{
            
            $view['content'] = $this->load->view('setting/ortu',NULL,TRUE);
            $this->load->view('index',$view);
	}
        
	public function dokter_new()
	{
            
            $view['content'] = $this->load->view('setting/ortu_new',NULL,TRUE);
            $this->load->view('index',$view);
	}
	public function petugas()
	{
            
            $view['content'] = $this->load->view('setting/ortu',NULL,TRUE);
            $this->load->view('index',$view);
	}
        
	public function petugas_new()
	{
            
            $view['content'] = $this->load->view('setting/ortu_new',NULL,TRUE);
            $this->load->view('index',$view);
	}
        
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
