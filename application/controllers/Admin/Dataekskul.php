<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dataekskul extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //validasi jika user belum login
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url();
            redirect($url);
        }

        $this->load->model('m_dashboard');
        $this->load->model('m_admin');

    }


    public function index()
    {
        $data['count'] = $this->m_dashboard->get_all_count();
        $data['ekskul'] = $this->m_admin->GetEkskul();
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/ekskul/dataekskul', $data);
        $this->load->view('templates/footer');
    }


 

    public function tambah()
    {
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();
        $data['pembina'] = $this->m_admin->GetPembina();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar',$data);
            $this->load->view('admin/ekskul/tambahekstra', $data);
            $this->load->view('templates/footer');
  
    }
    public function tambah_aksi(){
       
        $this->form_validation->set_rules('nama_ekskul', 'Nama Ekstrakurikuler', 'required');
        $this->form_validation->set_rules('tahunajaran', 'Periode/Tahun Ajaran', 'required');
        $this->form_validation->set_rules('nip_g', 'Pembina', 'required');
        if ($this->form_validation->run() == false){
            $data['guru'] = $this->db->get_where('guru', ['nip' =>
            $this->session->userdata('ses_id')])->row_array();
            $data['pembina'] = $this->m_admin->GetPembina();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar',$data);
            $this->load->view('admin/ekskul/tambahekstra',$data);
            $this->load->view('templates/footer');
        } else {
            $id_ekskul = $this->input->post('id_ekskul');
            $nama_ekskul = $this->input->post('nama_ekskul');
            $tahunajaran = $this->input->post('tahunajaran');
            $nip_g = $this->input->post('nip_g');


            $data = array(
                'id_ekskul' => $id_ekskul,
                'nama_ekskul' => $nama_ekskul,
                'tahunajaran' => $tahunajaran,
                'nip_g' => $nip_g,

            );
            $this->m_admin->input_data($data, 'ekskul');
            $this->session->set_flashdata('succses', 'Data Yang anda masukan berhasil.');
            redirect('admin/dataekskul');
        }
        

    }

    function edit($id_ekskul){
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();
        $where = array('id_ekskul' => $id_ekskul);
        $data['pembina'] = $this->m_admin->GetPembina();
        $data['ekskul'] = $this -> m_admin -> edit_data ($where,'ekskul') -> result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/ekskul/edit_ekskul',$data);
        $this->load->view('templates/footer');

    }

    function update()
    {
        $id_ekskul = $this->input->post('id_ekskul');
        $nama_ekskul = $this->input->post('nama_ekskul');
        $tahunajaran = $this->input->post('tahunajaran');
        $nip_g = $this->input->post('nip_g');


        $data = array(
            
            'nama_ekskul' => $nama_ekskul,
            'tahunajaran' => $tahunajaran,
            'nip_g' => $nip_g,
        );

        $where = array(
            'id_ekskul' => $id_ekskul,
        );

        $this->m_admin->update_data($where, $data, 'ekskul');
        $this->session->set_flashdata('succses', 'Edit Data Berhasil.');
        redirect('admin/dataekskul');
    }

    function hapus($id_ekskul)
    {
        $where = array('id_ekskul' => $id_ekskul);
        $this->m_admin->hapus_data($where, 'ekskul');
        $error = $this->db->error();
        if ($error['code'] !=0){
            $this->session->set_flashdata('danger', 'Data Tidak Dapat Dihapus (Sudah Berelasi).');
            redirect('admin/dataekskul');
        }else{
  
            $this->session->set_flashdata('primary', 'Data Terhapus.');
            redirect('admin/dataekskul');
        }

    }

}
