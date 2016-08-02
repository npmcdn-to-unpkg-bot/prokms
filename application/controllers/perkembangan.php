<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perkembangan extends CI_Controller {

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
            $this->load->model('model_perkembangan');
            $ro = $this->model_ortu->getByUserId($this->session->userdata('id_user'));
            
            if($ro['id_ortu'])
            {
                $rs = $this->model_balita->getAllByOrtu($ro['id_ortu']);
                $data['anaks'] = $rs;
            }
            
            $view['content'] = $this->load->view('perkembangan/grafik',$data,TRUE);
            $this->load->view('index',$view);
	}
        
	public function entri() {
            $this->load->library('form_validation');
            $this->load->model('model_balita');
            $this->load->model('model_ortu');
            $this->load->model('model_perkembangan');
            $ro = $this->model_ortu->getByUserId($this->session->userdata('id_user'));
            
            if($this->input->post())
            {
//                do validate
                $rules = array( array('field'=>'umur','label'=>'Umur','rules'=>'required'),
                                array('field'=>'berat','label'=>'Berat Timbangan (KG)','rules'=>'required|numeric'),
                                array('field'=>'tinggi','label'=>'Tinggi Prngukuran (CM)','rules'=>'required|numeric')
                );
                
                $this->form_validation->set_rules($rules);
                if ($this->form_validation->run() != FALSE)
                {
//                    do insert
//                      get ORTU_ID
                    if($ro['id_ortu'])
                    {
//                        insert BALITA 
                        $rb = array('id_balita'=>$_POST['id_balita'],
                                    'umur'=>$_POST['umur'],
                                    'berat'=>$_POST['berat'],
                                    'tinggi'=>$_POST['tinggi']);
                        if($this->model_perkembangan->add($rb))
                        {
                            redirect('perkembangan/entri');
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
            
            if($ro['id_ortu'])
            {
                $rs = $this->model_balita->getAllByOrtu($ro['id_ortu']);
                $data['anaks'] = $rs;
            }
            $view['content'] = $this->load->view('perkembangan/entri',$data,TRUE);
            $this->load->view('index',$view);
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
