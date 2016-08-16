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
        
	public function ortu_new($id)
	{
            $this->load->library('form_validation');
            $this->load->model('model_users');
            $this->load->model('model_ortu');
            if($this->input->post())
            {
                if (empty($_POST['id_ortu']))
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
                                redirect('setting/ortu');
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
            $this->load->view('index',$view);
	}
        
        public function ortu_delete($id)
        {
            $this->load->model('model_users');
            $this->load->model('model_ortu');
            
            $rr_ortu = $this->model_ortu->getById($id);
            $this->model_users->delete($rr_ortu['id_user']);
            $this->model_ortu->delete($rr_ortu['id_ortu']);
            
            redirect('setting/ortu');
        }

        public function dokter()
	{
            $this->load->model('model_dokter');
            
            $rs = $this->model_dokter->getAll();
            $data['rs'] = $rs;
            
            $view['content'] = $this->load->view('setting/dokter',$data,TRUE);
            $this->load->view('index',$view);
	}
        
	public function dokter_new()
	{
            $this->load->library('form_validation');
            $this->load->model('model_users');
            $this->load->model('model_dokter');
            if($this->input->post())
            {
//                do validate
                $rules = array( array('field'=>'nama_dokter','label'=>'Nama Dokter','rules'=>'required'),
                                array('field'=>'alamat_dokter','label'=>'Alamat','rules'=>'required'),
                                array('field'=>'phone_dokter','label'=>'Telephone/HP','rules'=>'required'),
                                array('field'=>'email_dokter','label'=>'Username (Email)','rules'=>'required|regex_match[/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/]'),
                                array('field'=>'credential','label'=>'Password','rules'=>'required|max_length[20]'),
                                array('field'=>'credential2','label'=>'Re-entry Password','rules'=>'required|matches[credential]')
                );
                
                $this->form_validation->set_rules($rules);
                if ($this->form_validation->run() != FALSE)
                {
//                    do insert
//                      get user id
                    $id_user = $this->model_users->getId();
                    $ru = array('username'=>$_POST['email_dokter'],
                                'credential'=>$_POST['credential'],
                                'id_role'=>3);//dokter
                    if($this->model_users->add($ru))
                    {
//                        insert orang tua
                        $ro = array('nama_dokter'=>$_POST['nama_dokter'],
                                    'id_user_dokter'=>$id_user,
                                    'alamat_dokter'=>$_POST['alamat_dokter'],
                                    'no_hp_dokter'=>$_POST['phone_dokter'],
                                    'email_dokter'=>$_POST['email_dokter']);
                        if($this->model_dokter->add($ro))
                        {
                            redirect('setting/dokter');
                        }
                    }
                    
                }
            }
            
            $view['content'] = $this->load->view('setting/dokter_new',NULL,TRUE);
            $this->load->view('index',$view);
	}
	public function petugas()
	{
            $this->load->model('model_petugas');
            
            $rs = $this->model_petugas->getAll();
            $data['rs'] = $rs;
            
            $view['content'] = $this->load->view('setting/petugas',$data,TRUE);
            $this->load->view('index',$view);
	}
        
	public function petugas_new()
	{
            $this->load->library('form_validation');
            $this->load->model('model_users');
            $this->load->model('model_petugas');
            if($this->input->post())
            {
//                do validate
                $rules = array( array('field'=>'nama_petugas','label'=>'Nama Petugas','rules'=>'required'),
                                array('field'=>'alamat_petugas','label'=>'Alamat','rules'=>'required'),
                                array('field'=>'phone_petugas','label'=>'Telephone/HP','rules'=>'required'),
                                array('field'=>'email_petugas','label'=>'Username (Email)','rules'=>'required|regex_match[/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/]'),
                                array('field'=>'credential','label'=>'Password','rules'=>'required|max_length[20]'),
                                array('field'=>'credential2','label'=>'Re-entry Password','rules'=>'required|matches[credential]')
                );
                
                $this->form_validation->set_rules($rules);
                if ($this->form_validation->run() != FALSE)
                {
//                    do insert
//                      get user id
                    $id_user = $this->model_users->getId();
                    $ru = array('username'=>$_POST['email_petugas'],
                                'credential'=>$_POST['credential'],
                                'id_role'=>4);//petugas posyandu
                    if($this->model_users->add($ru))
                    {
//                        insert orang tua
                        $ro = array('nama_petugas'=>$_POST['nama_petugas'],
                                    'id_user_petugas'=>$id_user,
                                    'alamat_petugas'=>$_POST['alamat_petugas'],
                                    'no_hp_petugas'=>$_POST['phone_petugas'],
                                    'email_petugas'=>$_POST['email_petugas']);
                        if($this->model_petugas->add($ro))
                        {
                            redirect('setting/petugas');
                        }
                    }
                    
                }
            }
            
            $view['content'] = $this->load->view('setting/petugas_new',NULL,TRUE);
            $this->load->view('index',$view);
	}
        
        public function balita()
        {
            $this->load->model('model_balita');
            $this->load->model('model_ortu');
            
//          find id_ortu
            $r = $this->model_ortu->getByUserId($this->session->userdata('id_user'));
            if($r['id_ortu'])
            {
                $rs = $this->model_balita->getAllByOrtu($r['id_ortu']);
                $data['rs'] = $rs;
            }
            
            $view['content'] = $this->load->view('setting/balita',$data,TRUE);
            $this->load->view('index',$view);
        }
        
        public function balita_edit()
	{
            $this->load->library('form_validation');
            $this->load->model('model_ortu');
            $this->load->model('model_balita');
            if($this->input->post())
            {
//                do validate
                $rules = array( array('field'=>'nama_balita','label'=>'Nama Balita','rules'=>'required'),
                                array('field'=>'tanggal_lahir','label'=>'Tanggal Lahir','rules'=>'required'),
                                array('field'=>'jkel','label'=>'Jenis Kelamin','rules'=>'required'),
                                array('field'=>'berat_lahir','label'=>'Berat Lahir (KG)','rules'=>'required|numeric'),
                                array('field'=>'tinggi_lahir','label'=>'Tinggi Lahir (CM)','rules'=>'required|numeric')
                );
                
                $this->form_validation->set_rules($rules);
                if ($this->form_validation->run() != FALSE)
                {
//                    do insert
//                      get ORTU_ID
                    $r = $this->model_ortu->getByUserId($this->session->userdata('id_user'));
//                    var_dump($r);                    exit();
                    if(!empty($r['id_ortu']))
                    {
//                        insert BALITA 
                        $rb = array('nama_balita'=>$_POST['nama_balita'],
                                    'id_ortu'=>$r['id_ortu'],
                                    'tanggal_lahir'=>$_POST['tanggal_lahir'],
                                    'kelamin'=>$_POST['jkel'],
                                    'berat_lahir'=>$_POST['berat_lahir'],
                                    'tinggi_lahir'=>$_POST['tinggi_lahir'],
                                    'catatan_khusus'=>$_POST['catatan_khusus']);
                        if($this->model_balita->add($rb))
                        {
                            redirect('setting/balita');
                        }
                        else
                        {
                            
                        }
                    }
                    else
                    {
                        redirect('home');
                    }
                }
            }
            
            $view['content'] = $this->load->view('setting/balita_form',NULL,TRUE);
            $this->load->view('index',$view);
	}
        
        public function imunisasi()
        {
            $this->load->model('model_imunisasi');
            
            $rs = $this->model_imunisasi->getAll();
            $data['rs'] = $rs;
            
            $view['content'] = $this->load->view('setting/imunisasi',$data,TRUE);
            $this->load->view('index',$view);
        }
        
        public function imunisasi_edit()
	{
            $this->load->library('form_validation');
            $this->load->model('model_imunisasi');
            if($this->input->post())
            {
//                do validate
                $rules = array( array('field'=>'nama_imunisasi','label'=>'Nama Imunisasi','rules'=>'required'),
                                array('field'=>'sifat_imunisasi','label'=>'Sifat Imunisasi','rules'=>'required')
                );
                
                $this->form_validation->set_rules($rules);
                if ($this->form_validation->run() != FALSE)
                {
//                    do insert
                    $rb = array('nama_imunisasi'=>$_POST['nama_imunisasi'],
                                'sifat_imunisasi'=>$_POST['sifat_imunisasi']);
                    if($this->model_imunisasi->add($rb))
                    {
                        redirect('setting/imunisasi');
                    }
                    else
                    {
                        redirect('setting/imunisasi');
                    }
                   
                }
            }
            
            $view['content'] = $this->load->view('setting/imunisasi_form',NULL,TRUE);
            $this->load->view('index',$view);
	}
        
        public function imunisasi_delete($id)
        {
            $this->load->model('model_imunisasi');
            
            $this->model_imunisasi->delete($id);
            
            redirect('setting/imunisasi');
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
