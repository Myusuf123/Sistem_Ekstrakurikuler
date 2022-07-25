<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datapembina extends CI_Controller
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


    public function index()
    {
        
      
        $data['count'] = $this->m_dashboard->get_all_count();
        $data['pembina'] = $this->m_admin->getPembina();
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/data_pembina/datapembina',$data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();
            $data['jenis'] = $this->m_admin->get('ekskul');
            $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/data_pembina/tambahpembina',$data);
        $this->load->view('templates/footer');
    
    }
    
    public function tambah_aksi()
    {
        $this->form_validation->set_rules('nip', 'Nip', 'required|numeric|is_unique[guru.nip]');
        $this->form_validation->set_rules('nama_g', 'nama_g', 'required');
        $this->form_validation->set_rules('nohp', 'No Hp', 'required|numeric');
        if ($this->form_validation->run() == false){

            $data['pembina'] = $this->m_admin->getPembina();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/data_pembina/tambahpembina', $data);
            $this->load->view('templates/footer');
        }else {

            $nip = $this->input->post('nip');
            $nama_g = $this->input->post('nama_g');
            $nohp = $this->input->post('nohp');
            $password = md5($this->input->post('nip'));



            $data = array(
                'nip' => $nip,
                'nama_g' => $nama_g,
                'nohp' => $nohp,
                'password' => $password,
                'level' => 'pembina',
                'foto_g' => 'defaultt.png',

            );
            $this->m_admin->input_data($data, 'guru');
            $this->session->set_flashdata('succses', 'Data Yang anda masukan berhasil.');
            redirect('admin/datapembina');
            
        }
 
    }

    function edit($nip)
    {
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();
        $where = array('nip' => $nip);
        $data['pembina'] = $this->m_admin->edit_data($where, 'guru')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/data_pembina/edit_pembina', $data);
        $this->load->view('templates/footer');
    }

    function edit_pw($nip)
    {
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();
        $where = array('nip' => $nip);
        $data['pembina'] = $this->m_admin->edit_data($where, 'guru')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/data_pembina/edit_pw_pembina', $data);
        $this->load->view('templates/footer');
    }

    function update()
    {
        $nip = $this->input->post('nip');
        $nama_g = $this->input->post('nama_g');
        $nohp = $this->input->post('nohp');



        $data = array(
            'nama_g' => $nama_g,
            'nohp' => $nohp,


        );

        $where = array(
            'nip' => $nip
        );

        $this->m_admin->update_data($where, $data, 'guru');
        $this->session->set_flashdata('succses', 'Edit Data Berhasil.');
        redirect('admin/datapembina');
    }

    function update_pass()
    {
        $nip = $this->input->post('nip');
        $password = md5($this->input->post('password'));

        $data = array(

            'password' => $password
        );

        $where = array(
            'nip' => $nip
        );

        $this->m_admin->update_data($where, $data, 'guru');
        $this->session->set_flashdata('succses', 'Edit Password Berhasil.');
        redirect('admin/datapembina');
    }

    function hapus($nip)
    {
        $where = array('nip' => $nip);
        $this->m_admin->hapus_data($where, 'guru');
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('danger', 'Data Tidak Dapat Dihapus (Sudah Berelasi).');
            redirect('admin/datapembina');
        } else {

            $this->session->set_flashdata('primary', 'Data Terhapus.');
            redirect('admin/datapembina');
        }
        
    }

}

