<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

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




		$data['user'] = $this->db->get_where('tabel_user', ['username' => $this->session->userdata('username')])->row_array();

		$data['nama'] = $this->uri->segment(1);

		$this->load->view('header');
		$this->load->view('navbar', $data);
		$this->load->view('dashboard/home', $data);
		$this->load->view('footer');
	}



	public function simulasi()
	{
		$waktui = 0;
		$meniti = 0;
		$detiki = 0;
		$waktu = 0;
		$menit = 0;
		$detik = 0;
		$jumlahAntrian = 15;
		$durasi = 1 * 60 * 60;
		$randomValue = 0;
		$iwk = 0;
		$wk = 0;
		for ($i = 1; $i <= $jumlahAntrian; $i++) {
			$data['jumlah'][]  = [
				$i,
				$randomValue,
				$iwk,
				$wk,
				$meniti,
				$detiki,
				$menit,
				$detik
			];

			$randomValue = rand(0.1 * 10, 0.9 * 10) / 10;
			$iwk = abs((1 / $jumlahAntrian) * log($randomValue));
			$wk += $iwk;
			$waktui = ceil($iwk * $durasi);
			$meniti = floor($waktui / 60);
			$detiki = $waktui % 60;
			$waktu = ceil($wk * $durasi);
			$menit = floor($waktu / 60);
			$detik = $waktu % 60;
		}
		$data['user'] = $this->db->get_where('tabel_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['nama1'] = $this->uri->segment(1);
		$data['nama'] = $this->uri->segment(2);
		$this->load->view('header');
		$this->load->view('navbar', $data);
		$this->load->view('dashboard/simulasi', $data);
		$this->load->view('footer');
	}


	public function input()
	{
	}
}
