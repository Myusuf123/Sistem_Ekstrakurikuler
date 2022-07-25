<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //validasi jika user belum login
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url();
            redirect($url);
        }
        $this->load->model('m_admin');
    }

    public function index()
    {
        $where = array('nis' => $this->session->userdata('ses_id'));
        $data['profile'] = $this->m_admin->getprofilesiswa($where);
        $data['users'] = $this->db->get_where('siswa', ['nis' =>
        $this->session->userdata('ses_id')])->row_array();
       
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('profile/profile',$data);
        $this->load->view('templates/footer');
    }

    public function guru()
    {
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('profile/profileadmin', $data);
        $this->load->view('templates/footer');
    }

    public function admin()
    {
 
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('profile/profileadmin', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['users'] = $this->db->get_where('siswa', ['nis' =>
        $this->session->userdata('ses_id')])->row_array();
        $data['jurusan'] = $this->m_admin->get('jurusan');
        $where = array('nis' => $this->session->userdata('ses_id'));
        $data['prof'] = $this->m_admin->edit_data($where, 'siswa')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('profile/editprofile',$data);
        $this->load->view('templates/footer');
    }

    public function editadmin()
    {
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();
        $data['jurusan'] = $this->m_admin->get('jurusan');
        $where = array('nip' => $this->session->userdata('ses_id'));
        $data['prof'] = $this->m_admin->edit_data($where, 'guru')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('profile/editadmin', $data);
        $this->load->view('templates/footer');
    }

    public function update(){
        $data['users'] = $this->db->get_where('siswa', ['nis' =>
        $this->session->userdata('ses_id')])->row_array();

        $nis = $this->input->post('nis');
        $nama = $this->input->post('nama');
        $no_telp = $this->input->post('no_telp');
        $kelas = $this->input->post('kelas');
        $gender = $this->input->post('gender');
        $jurusan_id = $this->input->post('jurusan_id');


        $upload_image = $_FILES['foto']['name'];

        if ($upload_image) {
            $config['allowed_types']  = 'jpg|png|jpeg|gif';
            $config['max_size']       = 2048;
            $config['upload_path'] = './assets/profile';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {

                $old_image = $data['users']['foto'];
                if ($old_image != 'default.png') {

                    unlink(FCPATH . '/assets/profile' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('foto', $new_image);
                
            } else {
                echo $this->upload->display_errors();
            }
        }

        $this->db->set('nama', $nama);
        $this->db->set('no_telp', $no_telp);
        $this->db->set('kelas', $kelas);
        $this->db->set('gender', $gender);
        $this->db->set('jurusan_id', $jurusan_id);
        $this->db->where('nis', $nis);
        $this->db->update('siswa');
        $this->session->set_flashdata('succses', 'Edit Data Berhasil.');
        redirect('profile');
    }

    public function updateadmin()
    {
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();

        $nip = $this->input->post('nip');
        $nama = $this->input->post('nama');
        $nohp = $this->input->post('nohp');


        $upload_image = $_FILES['foto']['name'];

        if ($upload_image) {
            $config['allowed_types']  = 'jpg|png|jpeg|gif';
            $config['max_size']       = 2048;
            $config['upload_path'] = './assets/profile';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {

                $old_image = $data['users']['foto'];
                if ($old_image != 'default.png') {

                    unlink(FCPATH . '/assets/profile' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('foto_g', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $this->db->set('nama_g', $nama);
        $this->db->set('nohp', $nohp);
        $this->db->where('nip', $nip);
        $this->db->update('guru');
        $this->session->set_flashdata('succses', 'Edit Data Berhasil.');
        redirect('profile/admin');
    }

    public function password()
    {
        $data['users'] = $this->db->get_where('siswa', ['nis' =>
        $this->session->userdata('ses_id')])->row_array();
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('profile/editpassword',$data);
        $this->load->view('templates/footer');
    }

    public function password_guru()
    {
        $data['users'] = $this->db->get_where('siswa', ['nis' =>
        $this->session->userdata('ses_id')])->row_array();
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('profile/editpassword_guru',$data);
        $this->load->view('templates/footer');
    }

    public function updatepw_siswa()
    {

        $data['users'] = $this->db->get_where('siswa', ['nis' =>
        $this->session->userdata('ses_id')])->row_array();


        $this->form_validation->set_rules('pw_baru','password baru','required');
        $this->form_validation->set_rules('konfir_pw','konfirmasi password','required|matches[pw_baru]');
        if( $this->form_validation->run() == FALSE ){
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('profile/editpassword',$data);
            $this->load->view('templates/footer');
        } else {
            $password = md5($this->input->post('pw_baru'));
            $data = array(
                'password' => $password,
   
    
            );
    
            $where = array(
                'nis' => $this->session->userdata('ses_id')
            );


            $this->m_admin->update_data($where, $data, 'siswa');
            $this->session->set_flashdata('success', 'Ubah Password Berhasil.');
            redirect('home');

        }

    }

    public function updatepw_guru()
    {

        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();


        $this->form_validation->set_rules('pw_baru','password baru','required');
        $this->form_validation->set_rules('konfir_pw','konfirmasi password','required|matches[pw_baru]');
        if( $this->form_validation->run() == FALSE ){
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('profile/editpassword',$data);
            $this->load->view('templates/footer');
        } else {
            $password = md5($this->input->post('pw_baru'));
            $data = array(
                'password' => $password,
   
    
            );
    
            $where = array(
                'nip' => $this->session->userdata('ses_id')
            );


            $this->m_admin->update_data($where, $data, 'guru');
            $this->session->set_flashdata('success', 'Ubah Password Berhasil.');
            redirect('home');

        }

    }
}
