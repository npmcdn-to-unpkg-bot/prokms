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
            
            $view['content'] = $this->load->view('setting/ortu',NULL,TRUE);
            $this->load->view('index',$view);
	}
        
	public function ortu_new()
	{
            
            if ($this->input->post())
            {
//                database operation
                
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