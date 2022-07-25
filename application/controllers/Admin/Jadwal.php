<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
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
        $data['jadwal'] = $this->m_admin->getJadwal();
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/jadwal/jadwal', $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();
        $data['jenis'] = $this->m_admin->get_eks('ekskul');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/jadwal/tambahjadwal', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        
        $this->form_validation->set_rules('tgl', 'Tanggal', 'required');
        $this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required');
        $this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('tgl', 'Tanggal', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        if ($this->form_validation->run() == false) {
            $data['jenis'] = $this->m_admin->get_eks('ekskul');

           
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/jadwal/tambahjadwal', $data);
            $this->load->view('templates/footer');
        } else {
            

            $id_jadwal = $this->input->post('id_jadwal');
            $id_ekskull = $this->input->post('id_ekskull');
            $jam_mulai = $this->input->post('jam_mulai');
            $jam_selesai = $this->input->post('jam_selesai');
            $lokasi = $this->input->post('lokasi');
            $tgl = $this->input->post('tgl');
            $deskripsi = $this->input->post('deskripsi');


            $data = array(
                'id_jadwal' => $id_jadwal,
                'id_ekskull' => $id_ekskull,
                'jam_mulai' => $jam_mulai,
                'jam_selesai' => $jam_selesai,
                'tgl' => $tgl,
                'lokasi' => $lokasi,
                'deskripsi' => $deskripsi
                

            );
            $this->m_admin->input_data($data, 'jadwal');
            $this->session->set_flashdata('succses', 'Data Yang anda masukan berhasil.');
            redirect('admin/jadwal');
        }
    }

    function edit($id_jadwal)
    {
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();
        $data['jenis'] = $this->m_admin->get_eks('ekskul');
        $where = array('id_jadwal' => $id_jadwal);
        $data['jadwal'] = $this->m_admin->edit_data($where, 'jadwal')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/jadwal/editjadwal', $data);
        $this->load->view('templates/footer');
    }

    function update()
    {
        $id_jadwal = $this->input->post('id_jadwal');
        $id_ekskull = $this->input->post('id_ekskull');
        $jam_mulai = $this->input->post('jam_mulai');
        $jam_selesai = $this->input->post('jam_selesai');
        $tgl = $this->input->post('tgl');
        $deskripsi = $this->input->post('deskripsi');
        $lokasi = $this->input->post('lokasi');


        $data = array(
            'id_ekskull' => $id_ekskull,
            'jam_mulai' => $jam_mulai,
            'jam_selesai' => $jam_selesai,
            'tgl' => $tgl,
            'lokasi' => $lokasi,
            'deskripsi' => $deskripsi

        );

        $where = array(
            'id_jadwal' => $id_jadwal
        );

        $this->m_admin->update_data($where, $data, 'jadwal');
        $this->session->set_flashdata('succses', 'Edit Data Berhasil.');
        redirect('admin/jadwal');
    }

    function hapus($id_jadwal)
    {
        $where = array('id_jadwal' => $id_jadwal);
        $this->m_admin->hapus_data($where, 'jadwal');
        $this->session->set_flashdata('primary', 'Data Terhapus.');
        redirect('admin/jadwal');
    }
}