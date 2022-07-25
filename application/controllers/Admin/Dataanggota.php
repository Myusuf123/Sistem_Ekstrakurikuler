<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dataanggota extends CI_Controller
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
        $this->load->model('m_dashboard');
   
       
    }



    public function Siswa()
    {
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();
        $data['jenis'] = $this->m_admin->get('ekskul');
        $data['count'] = $this->m_dashboard->get_all_count();
        $data['ketua'] = $this->m_admin->getAllsiswa();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/data_siswa/siswa', $data);
        $this->load->view('templates/footer');
    }

    


    public function detailsiswa($nis)
    {
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();
        $where = array('nis' => $nis);
        $data['ketua'] = $this->m_admin->getDetail($where)->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/data_siswa/detail', $data);
        $this->load->view('templates/footer');
    }

  

    public function tambah()
    {
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();
            $data['jurusan'] = $this->m_admin->get('jurusan');
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar',$data);
            $this->load->view('admin/data_siswa/tambahsiswa', $data);
            $this->load->view('templates/footer');
        
    }





    public function tambah_aksi()
    {

        $this->form_validation->set_rules('nis', 'Nis', 'required|is_unique[siswa.nis]');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('jurusan_id', 'Jurusan', 'required');
        if ($this->form_validation->run() == false) {
            $data['jenis'] = $this->m_admin->get('ekskul');
            $data['jurusan'] = $this->m_admin->get('jurusan');
            $data['ketua'] = $this->m_admin->get('siswa');
            $data['guru'] = $this->db->get_where('guru', ['nip' =>
            $this->session->userdata('ses_id')])->row_array();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar',$data);
            $this->load->view('admin/data_siswa/tambahsiswa', $data);
            $this->load->view('templates/footer');
        } else {
           

            $nis = $this->input->post('nis');
            $nama = $this->input->post('nama');
            $password = md5($this->input->post('nis'));
            $kelas = $this->input->post('kelas');
            $jurusan_id = $this->input->post('jurusan_id');
            
           


            $data = array(
                'nis' => $nis,
                'nama' => $nama,
                'password' => $password,
                'kelas' => $kelas,
                'jurusan_id' => $jurusan_id,
                'foto'=>'defaultt.png',
                
                

            );
            $this->m_admin->input_data($data, 'siswa');
            $this->session->set_flashdata('succses', 'Data Yang anda masukan berhasil.');

            redirect('admin/dataanggota/siswa');
        }
    }

    function edit($nis)
    {
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();
        $data['jenis'] = $this->m_admin->get('ekskul');
        $data['jurusan'] = $this->m_admin->tampil_jurusan('jurusan')->result_array();
        $where = array('nis' => $nis);
        $data['ketua'] = $this->m_admin->edit_data($where, 'siswa')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/data_siswa/edit_siswa', $data);
        $this->load->view('templates/footer');
    }

    function edit_pw($nis)
    {
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();
        $where = array('nis' => $nis);
        $data['ketua'] = $this->m_admin->edit_data($where, 'siswa')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/data_siswa/edit_pw', $data);
        $this->load->view('templates/footer');
    }

    function update()
    {
        $nis = $this->input->post('nis');
        $nama = $this->input->post('nama');
        $kelas = $this->input->post('kelas');
        $no_telp = $this->input->post('no_telp');
        $gender = $this->input->post('gender');
        $jurusan_id = $this->input->post('jurusan_id');
        

        $data = array(
            'nama' => $nama,
            'kelas' => $kelas,
            'gender' => $gender,
            'no_telp' => $no_telp,
            'jurusan_id' => $jurusan_id,
            

        );

        $where = array(
            'nis' => $nis
        );

        $this->m_admin->update_data($where, $data, 'siswa');
        $this->session->set_flashdata('succses', 'Edit Data Berhasil.');
        redirect('admin/dataanggota/siswa');
    }

    function update_pass()
    {
        $nis = $this->input->post('nis');
        $password = md5($this->input->post('password'));

        $data = array(

            'password' => $password
        );

        $where = array(
            'nis' => $nis
        );

        $this->m_admin->update_data($where, $data, 'siswa');
        $this->session->set_flashdata('succses', 'Edit Password Berhasil.');
        redirect('admin/dataanggota/siswa');
    }



    function hapus($nis)
    {
        $where = array('nis' => $nis);
        $this->m_admin->hapus_data($where, 'siswa');
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('danger', 'Data Tidak Dapat Dihapus (Sudah Berelasi).');
            redirect('admin/dataanggota/siswa');
        } else {

            $this->session->set_flashdata('primary', 'Data Terhapus.');
            redirect('admin/dataanggota/siswa');
        }
        
    }

}
