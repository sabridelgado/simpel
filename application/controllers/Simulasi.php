<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simulasi extends CI_Controller
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
        //simulasi kedatangan


        $query = $this->db->get('tabel_kedatangan')->result_array();
        $data['s_kedatangan'] = $query;



        $data['user'] = $this->db->get_where('tabel_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['nama1'] = $this->uri->segment(1);
        $data['nama'] = $this->uri->segment(2);

        $this->load->view('header');
        $this->load->view('navbar', $data);
        $this->load->view('simulasi/kedatangan', $data);
        $this->load->view('footer');
    }
    public function kedatangan()
    {
        //simulasi kedatangan


        $query = $this->db->get('tabel_kedatangan')->result_array();
        $data['s_kedatangan'] = $query;



        $data['user'] = $this->db->get_where('tabel_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['nama1'] = $this->uri->segment(1);
        $data['nama'] = $this->uri->segment(2);

        $this->load->view('header');
        $this->load->view('navbar', $data);
        $this->load->view('simulasi/kedatangan', $data);
        $this->load->view('footer');
    }

    public function hitung_kedatangan()
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
            $this->load->view('simulasi/kedatangan', $data);
            $this->load->view('footer');
        } else {

            function ubahwaktu($u_waktu)
            {
                $detik = $u_waktu  % 60;
                $menit = floor(($u_waktu % 3600) / 60);
                $jam = floor(($u_waktu % 86400) / 3600);


                return "$jam : $menit : $detik";
            }



            //perulangan kedatangan nasabah
            $this->db->truncate('tabel_kedatangan');

            //rumus mendcari kedatangan nasabah
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
                    $InterWaktuKdt = $InterKdt * 3600 * $jam;
                    $WaktuKdt = $TinterKdt * 3600 * $jam;
                    $konter = round($WaktuKdt);
                    //hitung konter

                }
                //ubah desimal ke waktu
                $wk_waktu = ubahwaktu($WaktuKdt);
                $iwk_waktu = ubahwaktu($InterWaktuKdt);

                //  masukan kedalam database
                $result = [
                    'kedatangan' => $kedatangan,
                    'durasi' => $jam,
                    'bilAcak' => $AcakInter,
                    'iwk' => $InterKdt,
                    'wk' => $TinterKdt,
                    'iwk_waktu' => $iwk_waktu,
                    'wk_waktu' => $wk_waktu
                ];


                $this->db->insert('tabel_kedatangan', $result);
            }

            $data["data"][] = [$AcakInter];

            $query = $this->db->get('tabel_kedatangan')->result_array();
            $data['s_kedatangan'] = $query;

            $data['lamda'] = $lamda;
            $data['durasi'] = $jam;
            $data['user'] = $this->db->get_where('tabel_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['nama1'] = $this->uri->segment(1);
            $data['nama'] = $this->uri->segment(2);

            $this->load->view('header');
            $this->load->view('navbar', $data);
            $this->load->view('simulasi/kedatangan_hasil', $data);
            $this->load->view('footer');
        }
    }
    public function pelayanan()
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
            redirect('simulasi/kedatangan');
        } else {


            $query = $this->db->get('tabel_pelayanan')->result_array();
            $data['s_layan'] = $query;





            $data['user'] = $this->db->get_where('tabel_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['nama1'] = $this->uri->segment(1);
            $data['nama'] = $this->uri->segment(2);

            $this->load->view('header');
            $this->load->view('navbar', $data);
            $this->load->view('simulasi/pelayanan', $data);
            $this->load->view('footer');
            # code...
        }
    }



    public function simulasi_pelayanan()

    {
        $this->db->truncate('tabel_total');

        $query = $this->db->get('tabel_kedatangan')->result_array();
        //validasi inputan
        $this->form_validation->set_rules('lamda', 'Lamda', 'required|trim');
        $this->form_validation->set_rules('durasi', 'Durasi', 'required|trim');



        if ($query != null) {
            $loket = $this->input->post('loket');
            $HtgSvr = 0;
            $MulaiLyn = 0;
            $nasabah = 0;
            $wq = 0;
            $lq = 0;
            $TWaktuTgu = 0;
            $TWaktuTguLyn = 0;
            $TWaktuTguSys = 0;

            $miu = $this->input->post('miu');

            function hitung($Mlayan, $miu)
            {
                $miu = $miu;
                //bangkitkan bilangan acak
                $AcakInter = rand(0.1 * 1000, 0.9 * 1000) / 1000;
                //hitung waktu pelayanan
                $Layan = round(abs((1 / $miu) * log10($AcakInter)), 5);

                //hitung waktu layanan
                $SelesaiLyn = round($Mlayan + $Layan, 5);

                $nilai = [
                    $SelesaiLyn, $Layan, $AcakInter
                ];


                return $nilai;
            }

            //ubah desimal ke waktu
            function ubahwaktu($u_waktu)
            {
                $detik = $u_waktu  % 60;
                $menit = floor(($u_waktu % 3600) / 60);
                $jam = floor(($u_waktu % 86400) / 3600);


                return "$jam : $menit : $detik";
            }

            $waktuselesai = [];
            $WaktuTgu = 0;
            $WaktuTguSys = 0;
            $all = [];
            $this->db->truncate('tabel_pelayanan');
            foreach ($query as $q) {
                // kondisi pertama

                if ($q['kedatangan'] > $nasabah) {
                    // kondisi ke dua
                    if ($nasabah < $loket) {

                        $HtgSvr = $nasabah;

                        $WaktuDtg = $q['wk'];

                        $MulaiLyn = $WaktuDtg;

                        $waktuselesai = hitung($MulaiLyn, $miu);

                        $WaktuTgu = $MulaiLyn - $WaktuDtg;
                        $WaktuTguSys = round($waktuselesai[0] - $WaktuDtg, 5);

                        $all[] = [$waktuselesai[0], $WaktuTgu, $WaktuTguSys, $WaktuDtg, $MulaiLyn];
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
                            $waktuselesai = hitung($MulaiLyn, $miu);
                            $WaktuTgu = $MulaiLyn - $WaktuDtg;
                            $WaktuTguSys = round($waktuselesai[0] - $WaktuDtg, 5);
                            $all[] = [$waktuselesai[0], $WaktuTgu, $WaktuTguSys, $WaktuDtg, $MulaiLyn];
                        } else {
                            $MulaiLyn = $kecil;
                            $waktuselesai = hitung($MulaiLyn, $miu);
                            $WaktuTgu = $MulaiLyn - $WaktuDtg;
                            $WaktuTguSys = round($waktuselesai[0] - $WaktuDtg, 5);
                            $all[] = [$waktuselesai[0], $WaktuTgu, $WaktuTguSys, $WaktuDtg, $MulaiLyn];
                        }
                    }

                    $TWaktuTgu = $TWaktuTgu + $WaktuTgu;
                    $TWaktuTguLyn = $TWaktuTguLyn + $waktuselesai[1];
                    $TWaktuTguSys = $TWaktuTguSys + $WaktuTguSys;

                    $resultt = [

                        'nasabah' => $nasabah,
                        'acak' => $waktuselesai[2],
                        'w_datang' => $WaktuDtg,
                        'w_layan' => $waktuselesai[1],
                        'w_mulai' => $MulaiLyn,
                        'w_selesai' => $waktuselesai[0],
                        'w_tunggu' => $WaktuTgu,
                        'w_tunggusys' => $WaktuTguSys

                    ];
                    $this->db->insert('tabel_pelayanan', $resultt);


                    $nasabah++;
                }
            }



            $durasim = $query[0]['durasi'];
            $wq = round($TWaktuTgu / $nasabah, 5);
            $waktu_wq = ubahwaktu($wq * 3600);
            $ws = round($TWaktuTguSys / $nasabah, 5);
            $lq = ceil($TWaktuTgu / $durasim);
            $ls = round($TWaktuTguSys / $durasim, 5);
            $probabilitas = round($TWaktuTguLyn / ($loket * $durasim), 5);

            $result = [
                'wq' => $wq,
                'ws' => $ws,
                'lq' => $lq,
                'ls' => $ls,
                'probabilitas' => $probabilitas,
                'waktu_wq' => $waktu_wq
            ];

            $this->db->insert('tabel_total', $result);
            redirect('simulasi/pelayanan');
        } else {
            $pesan = 'Tabel Kedatangan Is NULL';

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">' . $pesan . '</div>'
            );
            redirect('simulasi/kedatangan');
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
