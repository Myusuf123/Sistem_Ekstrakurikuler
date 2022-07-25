<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_dataekskul extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //validasi jika user belum login
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url();
            redirect($url);
        }
        
        $this->load->model('m_pembina');
    }


    public function index()
    {
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();
        $data['ekskul'] = $this->m_pembina->getEkskul();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('pembina/p_dataekskul', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->session->userdata('akses') == 'admin' || $this->session->userdata('akses') == 'pembina') {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/tambahekstra');
            $this->load->view('templates/footer');
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }
    public function tambah_aksi()
    {
        $kode_ekskul = $this->input->post('kode_ekskul');
        $nama_ekskul = $this->input->post('nama_ekskul');


        $data = array(
            'kode_ekskul' => $kode_ekskul,
            'nama_ekskul' => $nama_ekskul,

        );
        $this->m_pembina->input_data($data, 'ekskul');
        redirect('admin/dataekskul');
    }

    function edit($data_ekskul)
    {
        $where = array('kode_ekskul' => $data_ekskul);
        $data['ekskul'] = $this->m_pembina->edit_data($where, 'ekskul')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/edit_ekskul', $data);
        $this->load->view('templates/footer');
    }

    function update()
    {
        $kode_ekskul = $this->input->post('kode_ekskul');
        $nama_ekskul = $this->input->post('nama_ekskul');


        $data = array(
            'nama_ekskul' => $nama_ekskul
        );

        $where = array(
            'kode_ekskul' => $kode_ekskul
        );

        $this->m_pembina->update_data($where, $data, 'ekskul');
        redirect('admin/dataekskul');
    }

    function hapus($kode_ekskul)
    {
        $where = array('kode_ekskul' => $kode_ekskul);
        $this->m_pembina->hapus_data($where, 'ekskul');
        redirect('admin/dataekskul');
    }

    public function jadwal()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/jadwal');
        $this->load->view('templates/footer');
    }
}
