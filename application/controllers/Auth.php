<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
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


        $data['nama'] = 'SIMPEL';


        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');


        if ($this->form_validation->run() == false) {

            $this->load->view('auth/auth', $data);
        } else {
            $this->_login();
        }
    }
    public function register()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tabel_user.username]', [
            'is_unique' => 'This username has already registered !'

        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[password1]', [
            'matches' => 'password dont match !',
            'min_length' => 'password to short!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password]');



        if ($this->form_validation->run() == false) {
            $this->load->view('header');
            $this->load->view('auth/daftar');
        } else {
            $hast = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $data = [
                'username' => htmlspecialchars($this->input->post('username'), true),
                'password' => $hast,
                'image' => 'default.png',
                'date_created' => time(),
            ];


            $this->db->insert('tabel_user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Congratulation! your acount has been created. Please Login
          </div>');
            redirect('');
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tabel_user', ['username' => $username])->row_array();

        if ($user) {

            if (password_verify($password, $user['password'])) {

                $data = [
                    'username' => $user['username']
                ];
                $this->session->set_userdata($data);

                redirect('Dashboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Wrong password!</div>');
                redirect('');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
           Username is not registered!
          </div>');
            redirect('');
        }
    }

    public function logout()
    {

        $this->session->unset_userdata('username');
        redirect('');
    }

    public function profil()
    {
        $upload_image = $_FILES['gambar'];
        var_dump($upload_image);
    }
}
