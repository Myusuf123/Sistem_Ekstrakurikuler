<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_prestasi extends CI_Controller
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
        $data['prestasi'] = $this->m_admin->getPrestasi();
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/prestasi/prestasi', $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();
        $data['jenis'] = $this->m_admin->get_eks('ekskul');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/prestasi/tambahprestasi', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        $this->form_validation->set_rules('ekskull_id', 'Eksktrakurikuler', 'required');
        $this->form_validation->set_rules('tgl_lomba', 'Tanggal', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        if ($this->form_validation->run() == false) {
            $data['jenis'] = $this->m_admin->get_eks('ekskul');
            $data['guru'] = $this->db->get_where('guru', ['nip' =>
            $this->session->userdata('ses_id')])->row_array();

            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar',$data);
            $this->load->view('admin/prestasi/tambahprestasi', $data);
            $this->load->view('templates/footer');
        } else {
            

            $id_prestasi = $this->input->post('id_prestasi');
            $ekskull_id = $this->input->post('ekskull_id');
            $tgl_lomba = $this->input->post('tgl_lomba');
            $deskripsi = $this->input->post('deskripsi');


            $data = array(
                'id_prestasi' => $id_prestasi,
                'ekskull_id' => $ekskull_id,
                'tgl_lomba' => $tgl_lomba,
                'deskripsi' => $deskripsi


            );
            $this->m_admin->input_data($data, 'data_prestasi');
            $this->session->set_flashdata('succses', 'Data Yang anda masukan berhasil.');
            redirect('admin/C_prestasi');
        }
    }

    function edit($id_prestasi)
    {
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();
        $data['jenis'] = $this->m_admin->get_eks('ekskul');
        $where = array('id_prestasi' => $id_prestasi);
        $data['prestasi'] = $this->m_admin->edit_data($where, 'data_prestasi')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/prestasi/editprestasi', $data);
        $this->load->view('templates/footer');
    }

    function update()
    {
        $id_prestasi = $this->input->post('id_prestasi');
        $ekskull_id = $this->input->post('ekskull_id');
        $tgl_lomba = $this->input->post('tgl_lomba');
        $deskripsi = $this->input->post('deskripsi');


        $data = array(
            'ekskull_id' => $ekskull_id,
            'tgl_lomba' => $tgl_lomba,
            'deskripsi' => $deskripsi

        );

        $where = array(
            'id_prestasi' => $id_prestasi
        );

        $this->m_admin->update_data($where, $data, 'data_prestasi');
        $this->session->set_flashdata('succses', 'Edit Data Berhasil.');
        redirect('admin/C_prestasi');
    }

    function hapus($id_prestasi)
    {
        $where = array('id_prestasi' => $id_prestasi);
        $this->m_admin->hapus_data($where, 'data_prestasi');
        $this->session->set_flashdata('primary', 'Data Terhapus.');
        redirect('admin/C_prestasi');
    }
}
