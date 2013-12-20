<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$this->load->model('TmdbModel');
		$data['title'] = $this->TmdbModel->getTitle();
		$this->load->view('main', $data);
	}
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */

