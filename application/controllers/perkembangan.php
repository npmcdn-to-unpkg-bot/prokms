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
            
            if($this->input->post())
            {
                if($_POST['cari_balita']=='ok')
                {
                    $this->session->set_userdata(array('id_balita'=>$_POST['id_balita']));
                }
            }
            
            if($ro['id_ortu'])
            {
                $rs = $this->model_balita->getAllByOrtu($ro['id_ortu']);
                $data['anaks'] = $rs;
            }
            
            if ($this->session->userdata('id_balita') != '')
            {
//                get data perkembangan
                $id_balita = $this->session->userdata('id_balita');
                $r_anak = $this->model_balita->getDetail($id_balita);
                $rs_pkb = $this->model_perkembangan->getAllByBalita($id_balita);
                
                $rs_pkb_i[] = array('x'=>0,'y'=>$r_anak['berat_lahir'],'tinggi'=>$r_anak['tinggi_lahir'],'id_perkembangan'=>'','status'=>'');
                $rs_status_i = array();
                foreach ($rs_pkb as $k=>$v) {
                       
//                    hitung selisih
                    $selisih = FALSE;
                    if($v['umur']== 1)
                    {
                        $selisih = $v['berat'] - $r_anak['berat_lahir'];
                    }
                    else if($rs_pkb[$k-1]['umur']==$v['umur']-1)
                    {
                        $selisih = $v['berat'] - $rs_pkb[$k-1]['berat'];
                    }
                  
                    $rs_pkb_i[] = array('x'=>$v['umur'],'y'=>$v['berat'],'tinggi'=>$v['tinggi'],'id_perkembangan'=>$v['id_perkembangan'],'status'=>$this->status_timbang($r_anak['kelamin'], $v['umur'], $selisih));
                   
                }
                
                $data['r_anak'] = $r_anak;
                $data['rs_pkb'] = $rs_pkb_i;
                $data['rs_status'] = $rs_status_i;
            }
            
            $view['content'] = $this->load->view('perkembangan/grafik',$data,TRUE);
            $this->load->view('index',$view);
	}
        
	public function entri($id = NULL) {
            $this->load->library('form_validation');
            $this->load->model('model_balita');
            $this->load->model('model_ortu');
            $this->load->model('model_perkembangan');
            
            if($this->input->post())
            {
                 
//                do validate
                $rules = array( array('field'=>'berat','label'=>'Berat Timbangan (KG)','rules'=>'required|numeric'),
                                array('field'=>'tinggi','label'=>'Tinggi Prngukuran (CM)','rules'=>'numeric')
                );

                $this->form_validation->set_rules($rules);
                if ($this->form_validation->run() != FALSE)
                {
                    if(empty($id))
                    {
    //                    do insert
//                     insert PERKEMBANGAN 
                        $rb = array('id_balita'=>$_POST['id_balita'],
                                    'umur'=>$_POST['umur'],
                                    'berat'=>$_POST['berat'],
                                    'tinggi'=>$_POST['tinggi']);
                        $this->model_perkembangan->add($rb);
                        redirect('perkembangan');
                    }
                    else
                    {
    //                    update data
                        $rb = array('berat'=>$_POST['berat'],
                                    'tinggi'=>$_POST['tinggi']);
                        $this->model_perkembangan->update($id,$rb);
                        redirect('perkembangan');
                    }
                }
            }
            
            if ($this->session->userdata('id_role') == 2)
            {
                $ro = $this->model_ortu->getByUserId($this->session->userdata('id_user'));
                if($ro['id_ortu'])
                {
                    $rs = $this->model_balita->getAllByOrtu($ro['id_ortu']);
                    $data['anaks'] = $rs;
                }
            }
            else if($this->session->userdata('id_role') == 3 or $this->session->userdata('id_role') == 4)
            {
                $rs = $this->model_balita->getAll();
                $data['anaks'] = $rs;
            }
            
            if(!empty($id))
            {
//                query data perkembangan
                
                $r_pkb = $this->model_perkembangan->getById($id);
                $data['r_pkb'] = $r_pkb;
            }
            
            $view['content'] = $this->load->view('perkembangan/entri',$data,TRUE);
            $this->load->view('index',$view);
        }
        
        public function delete($id)
        {
            $this->load->model('model_perkembangan');
            
            $this->model_perkembangan->delete($id);
            
            redirect('perkembangan');
        }

                private function status_timbang($jk, $umur, $selisih)
        {   
//            start calculate
            if ($selisih === FALSE)
            {
                return '';
            }
            
            if($jk == 'laki-laki')
            {
                switch ($umur) {
                    case 1:
                        if ($selisih >= 0.8)
                        {
                            $status = 'N';
                        }
                        else
                        {
                            $status = 'T';
                        }

                        break;
                    case 2:
                        if ($selisih >= 0.9)
                        {
                            $status = 'N';
                        }
                        else
                        {
                            $status = 'T';
                        }

                        break;
                    case 3:
                        if ($selisih >= 0.8)
                        {
                            $status = 'N';
                        }
                        else
                        {
                            $status = 'T';
                        }

                        break;
                    case 4:
                        if ($selisih >= 0.6)
                        {
                            $status = 'N';
                        }
                        else
                        {
                            $status = 'T';
                        }

                        break;
                    case 5:
                        if ($selisih >= 0.5)
                        {
                            $status = 'N';
                        }
                        else
                        {
                            $status = 'T';
                        }

                        break;
                    case 6:
                        if ($selisih >= 0.4)
                        {
                            $status = 'N';
                        }
                        else
                        {
                            $status = 'T';
                        }

                        break;
                    default :
                        if ($selisih >= 0.3)
                        {
                            $status = 'N';
                        }
                        else
                        {
                            $status = 'T';
                        }

                        break;

                }
            }
            else
            {
                switch ($umur) {
                    case 1:
                        if ($selisih >= 0.8)
                        {
                            $status = 'N';
                        }
                        else
                        {
                            $status = 'T';
                        }

                        break;
                    case 2:
                        if ($selisih >= 0.9)
                        {
                            $status = 'N';
                        }
                        else
                        {
                            $status = 'T';
                        }

                        break;
                    case 3:
                        if ($selisih >= 0.8)
                        {
                            $status = 'N';
                        }
                        else
                        {
                            $status = 'T';
                        }

                        break;
                    case 4:
                        if ($selisih >= 0.6)
                        {
                            $status = 'N';
                        }
                        else
                        {
                            $status = 'T';
                        }

                        break;
                    case 5:
                        if ($selisih >= 0.5)
                        {
                            $status = 'N';
                        }
                        else
                        {
                            $status = 'T';
                        }

                        break;
                    case 6:
                        if ($selisih >= 0.4)
                        {
                            $status = 'N';
                        }
                        else
                        {
                            $status = 'T';
                        }

                        break;
                    default :
                        if ($selisih >= 0.3)
                        {
                            $status = 'N';
                        }
                        else
                        {
                            $status = 'T';
                        }

                        break;

                }
            }
            
            return $status;
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
