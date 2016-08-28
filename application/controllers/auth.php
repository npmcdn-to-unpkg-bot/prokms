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
                    switch ($r['id_role']) {
                        case '4': //petugas yandu
                            $this->load->model('model_petugas');
                            $rd = $this->model_petugas->getByUserId($r['id_user']);
                            $nama = $rd['nama_petugas'];
                            $id_user_detail = $rd['id_petugas'];
                            break;
                        case '3'://dokter
                            $this->load->model('model_dokter');
                            $rd = $this->model_dokter->getByUserId($r['id_user']);
                            $nama = $rd['nama_dokter'];
                            $id_user_detail = $rd['id_dokter'];
                            break;
                        case '2'://orang tua
                            $this->load->model('model_ortu');
                            $rd = $this->model_ortu->getByUserId($r['id_user']);
                            $nama = $rd['nama_ortu'];
                            $id_user_detail = $rd['id_ortu'];
                            break;
                        case '1'://admin
                            $nama = 'Administrator';
                            $id_user_detail = '';
                            break;
                        
                    }
                    $this->session->set_userdata(array('id_user'=>$r['id_user'],
                                                        'username'=>$r['username'],
                                                        'id_role'=>$r['id_role'],
                                                        'has_identity'=>TRUE,
                                                        'nama'=>$nama,
                                                        'id_user_detail'=>$id_user_detail)
                                                );
                    redirect('home');
                }
                else
                    $this->session->set_flashdata('loginpesan','Login Gagal, Username atau Password salah');
                    redirect('auth');
            }
            $login['loginerror'] = $this->session->flashdata('loginpesan');
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
        
        public function registrasi_ortu()
        {
            $this->load->library('form_validation');
            $this->load->model('model_users');
            $this->load->model('model_ortu');
            if($this->input->post())
            {
                if (empty($id))
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
                                $this->session->set_flashdata('loginpesan','Registrasi Berhasil, Silahkan Login');
                                redirect('auth');
                            }
                        }

                    }
                }
                else
                {
                    
    //                do validate
                    $rules = array( array('field'=>'nama','label'=>'Nama Orang Tua','rules'=>'required'),
                                    array('field'=>'jkel','label'=>'Jenis Kelamin','rules'=>'required'),
                                    array('field'=>'alamat','label'=>'Alamat','rules'=>'required'),
                                    array('field'=>'phone','label'=>'Telephone/HP','rules'=>'required'),
                                    array('field'=>'email','label'=>'Username (Email)','rules'=>'regex_match[/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/]'),
                                    array('field'=>'credential','label'=>'Password','rules'=>'max_length[20]'),
                                    array('field'=>'credential2','label'=>'Re-entry Password','rules'=>'matches[credential]')
                    );
                    
                    $this->form_validation->set_rules($rules);
                    if ($this->form_validation->run() != FALSE)
                    {
    //                    do update
    //                      get user id
                        $rr_ortu = $this->model_ortu->getById($_POST['id_ortu']);
                        $ru = array('credential'=>$_POST['credential']
                                    );//orang tua
                        if($this->model_users->update($rr_ortu['id_user'],$ru))
                        {
    //                        update orang tua
                            $ro = array('nama_ortu'=>$_POST['nama'],
                                        'jkel'=>$_POST['jkel'],
                                        'alamat'=>$_POST['alamat'],
                                        'no_hp'=>$_POST['phone']);
                            if($this->model_ortu->update($rr_ortu['id_user'],$ro))
                            {
                                redirect('auth');
                            }
                        }

                    }
                }
            }
            if(!empty($id))
            {
//                ambil data dari data base
                $ro = $this->model_ortu->getById($id);
                $data['r_ortu'] = $ro;
            }
            $view['content'] = $this->load->view('setting/ortu_new',$data,TRUE);
            $this->load->view('index_clear',$view);
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */