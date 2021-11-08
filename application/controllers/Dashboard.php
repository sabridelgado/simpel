<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');

		if (!$this->session->userdata('username')) {
			redirect('');
		}
	}

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{
		$query = $this->db->get('tabel_total')->row_array();
		$query1 = $this->db->get('tabel_pelayanan')->result_array();
		$querytot = $this->db->get('tabel_pelayanan')->num_rows();

		$data['s_layan'] = $query1;
		$data['total_nasabah'] = $querytot;

		$data['hitung'] = $query;



		$data['user'] = $this->db->get_where('tabel_user', ['username' => $this->session->userdata('username')])->row_array();

		$data['nama'] = $this->uri->segment(1);

		$this->load->view('header');
		$this->load->view('navbar', $data);
		$this->load->view('dashboard/home', $data);
	}

	public function hasil()
	{
		//simulasi kedatangan

		$query = $this->db->get('tabel_kedatangan')->result_array();


		if ($query == null) {
			$data['s_kedatangan'] = $query;
			$pesan = 'Tabel Kedatangan Is NULL';

			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-danger" role="alert">' . $pesan . '</div>'
			);
			redirect('dashboard/kedatangan');
		} else {


			$query = $this->db->get('tabel_pelayanan')->result_array();
			$data['s_layan'] = $query;

			$data['user'] = $this->db->get_where('tabel_user', ['username' => $this->session->userdata('username')])->row_array();
			$data['nama1'] = $this->uri->segment(1);
			$data['nama'] = $this->uri->segment(2);

			$this->load->view('header');
			$this->load->view('navbar', $data);
			$this->load->view('simulasi/hasil', $data);
			$this->load->view('footer');
			# code...
		}
	}







	public function resetdata()
	{
		$this->db->truncate('tabel_kedatangan');
		$this->db->truncate('tabel_pelayanan');
		$this->db->truncate('tabel_total');
		redirect('dashboard/kedatangan');
	}
}
