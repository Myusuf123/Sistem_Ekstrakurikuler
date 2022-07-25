<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan extends CI_Controller
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
        $data['jurusan'] = $this->m_admin->tampil_jurusan('jurusan')->result();
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/jurusan/datajurusan', $data);
        $this->load->view('templates/footer');
    }

  


    public function tambah_aksi()
    {

        $this->form_validation->set_rules('nama_jurusan', 'Nama Jurusan', 'required|is_unique[jurusan.nama_jurusan]');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('danger', 'Data Sudah Ada.');
            redirect('admin/jurusan');
        } else {

            $id_jurusan = $this->input->post('id_jurusan');
            $nama_jurusan = $this->input->post('nama_jurusan');


            $data = array(
                'id_jurusan' => $id_jurusan,
                'nama_jurusan' => $nama_jurusan

            );
            $this->m_admin->input_data($data, 'jurusan');
            $this->session->set_flashdata('succses', 'Data Yang anda masukan berhasil.');

            redirect('admin/jurusan');
        }
    }

    

    function edit($id_jurusan)
    {
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();
        $where = array('id_jurusan' => $id_jurusan);
        $data['jurusan'] = $this->m_admin->edit_data($where, 'jurusan')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/jurusan/edit_jurusan', $data);
        $this->load->view('templates/footer');
    }
  

    function update()
    {
        $id_jurusan = $this->input->post('id_jurusan');
        $nama_jurusan = $this->input->post('nama_jurusan');
        

        $data = array(
            'nama_jurusan' => $nama_jurusan,

        );

        $where = array(
            'id_jurusan' => $id_jurusan
        );

        $this->m_admin->update_data($where, $data, 'jurusan');
        $this->session->set_flashdata('succses', 'Edit Data Berhasil.');
        redirect('admin/jurusan');
    }


    function hapus($id_jurusan)
    {
        $where = array('id_jurusan' => $id_jurusan);
        $this->m_admin->hapus_data($where, 'jurusan');
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('danger', 'Data Tidak Dapat Dihapus (Sudah Berelasi).');
            redirect('admin/jurusan');
        } else {
            $this->session->set_flashdata('primary', 'Data Terhapus.');
            redirect('admin/jurusan');
        }
    }

}
