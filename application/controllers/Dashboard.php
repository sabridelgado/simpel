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

		$data['user'] = $this->db->get_where('tabel_user', ['username' => $this->session->userdata('username')])->row_array();

		$data['nama'] = $this->uri->segment(1);

		$this->load->view('header');
		$this->load->view('navbar', $data);
		$this->load->view('dashboard/home', $data);
		$this->load->view('footer');
	}





	public function simulasi()
	{
		//simulasi kedatangan



		$query = $this->db->get('tabel_kedatangan')->result_array();
		$data['s_kedatangan'] = $query;



		$data['user'] = $this->db->get_where('tabel_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['nama1'] = $this->uri->segment(1);
		$data['nama'] = $this->uri->segment(2);

		$this->load->view('header');
		$this->load->view('navbar', $data);
		$this->load->view('dashboard/simulasi', $data);
		$this->load->view('footer');
	}


	public function kedatangan()
	{
		//validasi inputan
		$this->form_validation->set_rules('lamda', 'Lamda', 'required|trim');
		$this->form_validation->set_rules('durasi', 'Durasi', 'required|trim');


		$lamda = $this->input->post('lamda');
		$jam = $this->input->post('durasi');
		$durasi = $jam * 3600;
		$konter = 0;
		$kedatangan = 0;
		$TinterKdt = 0;
		$WaktuKdt = 0;
		$AcakInter = 0;
		$InterKdt = 0;
		$InterWaktuKdt = 0;

		//kondisi validasi
		if ($this->form_validation->run() == false) {

			$data['jumlah'][] = [
				$kedatangan,
				$AcakInter,
				$InterWaktuKdt,
				$WaktuKdt,
				$durasi,
				$konter

			];

			$data['user'] = $this->db->get_where('tabel_user', ['username' => $this->session->userdata('username')])->row_array();
			$data['nama1'] = $this->uri->segment(1);
			$data['nama'] = $this->uri->segment(2);

			$this->load->view('header');
			$this->load->view('navbar', $data);
			$this->load->view('dashboard/simulasi', $data);
			$this->load->view('footer');
		} else {



			function ubahwaktu($ss)
			{
				$s = $ss % 60;
				$m = floor(($ss % 3600) / 60);
				$h = floor(($ss % 86400) / 3600);


				return "$h : $m : $s";
			}



			//perulangan
			$this->db->truncate('tabel_kedatangan');
			while ($konter <= $durasi) {


				$kedatangan = $kedatangan + 1;
				if ($kedatangan == 1) {

					$AcakinterKdt = 0;
					$InterWaktuKdt = 0;
				} else {
					//bangkitkan bilangan acak
					$AcakInter = rand(0.1 * 1000, 0.9 * 1000) / 1000;
					//hitung waktu antar kedatangan
					$InterKdt = round(abs((1 / $lamda) * log10($AcakInter)), 5);
					//hitung waktu kedatangan
					$TinterKdt = round($TinterKdt + $InterKdt, 5);
					$InterWaktuKdt = $InterKdt * $durasi;
					$WaktuKdt = $TinterKdt * $durasi;
					$konter = round($WaktuKdt);
					//hitung konter



				}
				$wk_waktu = ubahwaktu($WaktuKdt);
				$iwk_waktu = ubahwaktu($InterWaktuKdt);



				$result = [
					'kedatangan' => $kedatangan,
					'bilAcak' => $AcakInter,
					'iwk' => $InterKdt,
					'wk' => $TinterKdt,
					'iwk_waktu' => $iwk_waktu,
					'wk_waktu' => $wk_waktu
				];

				if ($konter < $durasi) {
					$this->db->insert('tabel_kedatangan', $result);
				}
			}
		}
		redirect('dashboard/simulasi');
	}

	public function pelayanan()

	{




		$query = $this->db->get('tabel_kedatangan')->result_array();



		$loket = 1;
		$HtgSvr = 0;
		$TWaktuTgu = 0;

		$TWaktuTguLyn = 0;
		$MulaiLyn = 0;

		$nasabah = 0;
		$AcakInter = 0;







		function hitung($Mlayan, $Wdatang)
		{
			$miu = 4;
			//bangkitkan bilangan acak
			$AcakInter = rand(0.1 * 1000, 0.9 * 1000) / 1000;
			//hitung waktu pelayanan
			$Layan = round(abs((1 / $miu) * log10($AcakInter)), 5);
			//hitung waktu layanan
			$SelesaiLyn = round($Mlayan + $Layan, 5);
			$WaktuTgu = $Mlayan - $Wdatang;

			return $SelesaiLyn;
		}


		$waktuselesai = 0;
		$WaktuTgu = 0;
		$TWaktuTguSys = 0;
		$all = [];

		foreach ($query as $q) {
			// kondisi pertama

			if ($q['kedatangan'] > $nasabah) {
				// kondisi ke dua
				if ($nasabah < $loket) {

					$HtgSvr = $nasabah;

					$WaktuDtg = $q['wk'];

					$MulaiLyn = $WaktuDtg;

					$waktuselesai = hitung($MulaiLyn, $WaktuDtg);
					$WaktuTgu = $MulaiLyn - $WaktuDtg;
					$TWaktuTguSys = $waktuselesai - $WaktuDtg;

					$all[] = [$waktuselesai, $WaktuTgu, $TWaktuTguSys, $WaktuDtg, $MulaiLyn];
				} else {

					$WaktuDtg = $q['wk'];
					$tampungkecil = [];
					for ($i = 0; $i < count($all); $i++) {
						$tampungkecil[] = $all[$i][0];
					}
					$fixkecil = [];

					rsort($tampungkecil);
					for ($i = 0; $i < $loket; $i++) {
						$fixkecil[] = $tampungkecil[$i];
					}
					$kecil = min($fixkecil);

					if ($WaktuDtg > $kecil) {
						$MulaiLyn = $WaktuDtg;
						$waktuselesai = hitung($MulaiLyn, $WaktuDtg);
						$WaktuTgu = $MulaiLyn - $WaktuDtg;
						$TWaktuTguSys = $waktuselesai - $WaktuDtg;
						$all[] = [$waktuselesai, $WaktuTgu, $TWaktuTguSys, $WaktuDtg, $MulaiLyn];
					} else {
						$MulaiLyn = $kecil;
						$waktuselesai = hitung($MulaiLyn, $WaktuDtg);
						$WaktuTgu = $MulaiLyn - $WaktuDtg;
						$TWaktuTguSys = $waktuselesai - $WaktuDtg;
						$all[] = [$waktuselesai, $WaktuTgu, $TWaktuTguSys, $WaktuDtg, $MulaiLyn];
					}
				}

				$nasabah++;
			}
		}


		echo "<pre>";
		print_r($all);
		echo "</pre>";



		die;






		$data['user'] = $this->db->get_where('tabel_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['nama1'] = $this->uri->segment(1);
		$data['nama'] = $this->uri->segment(2);

		$this->load->view('header');
		$this->load->view('navbar', $data);
		$this->load->view('dashboard/simulasi', $data);
		$this->load->view('footer');
	}


	public function coba()

	{



		$lamda = 9;
		$jam = 1;
		$durasi = $jam * 3600;
		$konter = 0;
		$kedatangan = 0;
		$TinterKdt = 0;
		$WaktuKdt = 0;
		$AcakInter = 0;
		$InterKdt = 0;
		$InterWaktuKdt = 0;






		function ubahwaktu($ss)
		{
			$s = $ss % 60;
			$m = floor(($ss % 3600) / 60);
			$h = floor(($ss % 86400) / 3600);


			return "$h : $m : $s";
		}



		//perulangan
		$this->db->truncate('tabel_kedatangan');
		while ($konter <= $durasi) {


			$kedatangan = $kedatangan + 1;
			if ($kedatangan == 1) {

				$AcakinterKdt = 0;
				$InterWaktuKdt = 0;
			} else {
				//bangkitkan bilangan acak
				$AcakInter = rand(0.1 * 1000, 0.9 * 1000) / 1000;
				//hitung waktu antar kedatangan
				$InterKdt = abs((1 / $lamda) * log10($AcakInter));
				//hitung waktu kedatangan
				$TinterKdt = $TinterKdt + $InterKdt;
				$InterWaktuKdt = $InterKdt * $durasi;
				$WaktuKdt = $TinterKdt * $durasi;
				$konter = round($WaktuKdt);
				//hitung konter

			}
			$wk_waktu = ubahwaktu($WaktuKdt);
			$iwk_waktu = ubahwaktu($InterWaktuKdt);

			$data['jumlah'][] = [
				$kedatangan,
				$AcakInter,
				$durasi,
				$konter,
				$iwk_waktu,
				$wk_waktu
			];
		}

		$data['user'] = $this->db->get_where('tabel_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['nama1'] = $this->uri->segment(1);
		$data['nama'] = $this->uri->segment(2);

		$this->load->view('header');
		$this->load->view('navbar', $data);
		$this->load->view('dashboard/coba', $data);
		$this->load->view('footer');
	}

	public function resetdata()
	{
		$this->db->truncate('tabel_kedatangan');

		redirect('dashboard/simulasi');
	}
}
