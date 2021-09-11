<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

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

		$tempat = "assets/img/";
		$kodenya = 'http://192.168.1.9/antriancapil/index.php/home/order';

		QRcode::png(
			$kodenya,
			$tempat . "qrcode01.png",
			QR_ECLEVEL_L,
			100,
			4
		);
		$this->load->view('user/home');
	}

	public function order()
	{
		$this->load->view('user/order');
	}
	public function scanqr()
	{
		$tempat = "assets/img/";
		$kodenya = 'https://www.youtube.com/';

		QRcode::png(
			$kodenya,
			$tempat . "qrcode01.png",
			QR_ECLEVEL_L,
			10,
			4
		);
	}
}
