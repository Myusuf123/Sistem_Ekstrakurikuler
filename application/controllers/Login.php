<?php
class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
      
    }

    function index()
    {
        $this->load->view('login');
    }

    function auth()
    {
        $username = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);

        $cek_pembina = $this->m_login->auth_pembina($username, $password);
        $cek_siswa = $this->m_login->auth_siswa($username, $password);

        if ($cek_pembina->num_rows() > 0) { //jika login sebagai dosen
            $data = $cek_pembina->row_array();
            $this->session->set_userdata('masuk', TRUE);
            if ($data['level'] == 'admin') {//Akses admin
                $this->session->set_userdata('akses', 'admin');
                $this->session->set_userdata('ses_id', $data['nip']);
                $this->session->set_userdata('ses_nama', $data['nama_g']);
                $this->session->set_userdata('ses_nohp', $data['nohp']);
                $this->session->set_userdata('ses_level', $data['level']);
                redirect('home');
            } else { //akses dosen
                $this->session->set_userdata('akses', 'pembina');
                $this->session->set_userdata('ses_id', $data['nip']);
                $this->session->set_userdata('ses_nama', $data['nama_g']);
               
                $this->session->set_userdata('ses_nohp', $data['nohp']);
                $this->session->set_userdata('ses_level', $data['level']);
                redirect('home');
            }
        } else if($cek_siswa->num_rows() > 0) { //jika login sebagai mahasiswa
            
            $data = $cek_siswa->row_array();
  
                $this->session->set_userdata('masuk', TRUE);
                $this->session->set_userdata('akses', 'anggota');
                $this->session->set_userdata('ses_id', $data['nis']);
                $this->session->set_userdata('ses_nama', $data['nama']);
                $this->session->set_userdata('ses_kode', $data['k_ekskul']);
                $this->session->set_userdata('ses_foto', $data['foto']);
                $this->session->set_userdata('ses_nohp', $data['no_telp']);
                $this->session->set_userdata('ses_level', $data['level']);
                redirect('home');
            
             }

             else {  // jika username dan password tidak ditemukan atau salah
                $url = base_url();
                echo $this->session->set_flashdata('info', 'Username Atau Password Salah');
                redirect($url);
            }
       
    }

    function logout()
    {
        $this->session->sess_destroy();
        $url = base_url('');
        redirect($url);
    }
}
