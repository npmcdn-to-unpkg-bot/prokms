<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Imunisasi extends CI_Controller {

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
            $this->load->model('model_balita');
            $this->load->model('model_ortu');
            $this->load->model('model_imunisasi');
            $this->load->model('model_agimunisasi');
            
//            apakah orang tua?
            $ro = $this->model_ortu->getByUserId($this->session->userdata('id_user'));
            
            if($ro['id_ortu'])
            {
                $rs = $this->model_balita->getAllByOrtu($ro['id_ortu']);
                $data['anaks'] = $rs;
            }
            
//            set pilihan jadi default
            if($this->input->post())
            {
                if($_POST['cari_balita']=='ok')
                {
                    $this->session->set_userdata(array('id_balita'=>$_POST['id_balita']));
                }
            }
            
            if ($this->session->userdata('id_balita') != '')
            {
//                query data
                
                $rs_ag = $this->model_agimunisasi->getAllByBalita($this->session->userdata('id_balita'));
                $data['rs_ag'] = $rs_ag;
            }
//            ke view
            $view['content'] = $this->load->view('agimunisasi/index',$data,TRUE);
            $this->load->view('index',$view);
	}
        
	public function entri() {
            $this->load->library('form_validation');
            $this->load->model('model_balita');
            $this->load->model('model_ortu');
            $this->load->model('model_imunisasi');
            $this->load->model('model_agimunisasi');
            
            if($this->input->post())
            {
//                do validate
                $rules = array( array('field'=>'id_balita','label'=>'Nama Balita','rules'=>'required'),
                                array('field'=>'id_imunisasi','label'=>'Nama Imunisasi','rules'=>'required'),
                                array('field'=>'tanggal_agenda','label'=>'Tanggal Agenda','rules'=>'required')
                );
                
                $this->form_validation->set_rules($rules);
                if ($this->form_validation->run() != FALSE)
                {
//                    do insert
//                    insert BALITA 
                    $rb = array('id_balita'=>$_POST['id_balita'],
                                'id_imunisasi'=>$_POST['id_imunisasi'],
                                'tanggal_agenda'=>$_POST['tanggal_agenda'],
                                'flag_realisasi'=>0
                        );
                        
                    if($this->model_agimunisasi->add($rb))
                    {
                        redirect('imunisasi/index');
                    }
                    else
                    {
                        redirect('imunisasi/index');
                    }
                }
            }
            
//            query orang balita
            $ro = $this->model_ortu->getByUserId($this->session->userdata('id_user'));
            if($ro['id_ortu'])
            {
                $rs = $this->model_balita->getAllByOrtu($ro['id_ortu']);
                $data['anaks'] = $rs;
            }
            
//            query nama imunisasi
            $data['rs_imunisasi'] = $this->model_imunisasi->getAll();
            
            
            $view['content'] = $this->load->view('agimunisasi/entri',$data,TRUE);
            $this->load->view('index',$view);
 
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
