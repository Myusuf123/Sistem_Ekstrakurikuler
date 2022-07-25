<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_jadwal extends CI_Controller
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
        $this->load->model('m_pembina');
    }


    public function index()
    {

        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();
        $user = $this->session->userdata('ses_id');

        $data['ekskul'] = $this->m_pembina->tampilekskul($user)->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('pembina/jadwalkegiatan/data_ekskul', $data);
        $this->load->view('templates/footer');
    }

    public function getjadwal($id_ekskul)
    {
    
        $data['namaekskul'] = $this->db->get_where('ekskul', ['id_ekskul' =>
        $id_ekskul])->row_array();
        
        $user  = array('id_ekskull' => $id_ekskul);
        $userr = ['nip' => $this->session->userdata('ses_id')];
        $data['jadwal'] = $this->m_pembina->getJadwalPembina($user);
        $data['guru'] = $this->m_pembina->getSes($userr)->row_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('pembina/jadwalkegiatan/jadwalkegiatan', $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();
        $user = $this->session->userdata('ses_id'); 
        $data['jenis'] = $this->m_pembina->get_option($user);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('pembina/jadwalkegiatan/tambahjadwal', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        
        $this->form_validation->set_rules('tgl', 'Tanggal', 'required');
        $this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required');
        $this->form_validation->set_rules('id_ekskull', 'Jam Selesai', 'required');
        $this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('tgl', 'Tanggal', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        if ($this->form_validation->run() == false) {
            $user = $this->session->userdata('ses_id');
            $data['jenis'] = $this->m_pembina->get_option($user);

           
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('Pembina/jadwalkegiatan/tambahjadwal', $data);
            $this->load->view('templates/footer');
        } else {


            $id_jadwal = $this->input->post('id_jadwal');
            $id_jadwall = $this->input->post('id_ekskull');
            $jam_mulai = $this->input->post('jam_mulai');
            $jam_selesai = $this->input->post('jam_selesai');
            $lokasi = $this->input->post('lokasi');
            $tgl = $this->input->post('tgl');
            $deskripsi = $this->input->post('deskripsi');


            $data = array(
                
                'id_jadwal' => $id_jadwal,
                'id_ekskull' => $id_jadwall,
                'jam_mulai' => $jam_mulai,
                'jam_selesai' => $jam_selesai,
                'tgl' => $tgl,
                'lokasi' => $lokasi,
                'deskripsi' => $deskripsi
                

            );
            $this->m_pembina->input_data($data, 'jadwal');
            $this->session->set_flashdata('succses', 'Data Yang anda masukan berhasil.');
            redirect('Pembina/P_jadwal/getjadwal/'.$id_jadwall);
        }
    }

    function edit($id_jadwal)
    {
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();
        $user = $this->session->userdata('ses_id');
        $data['jenis'] = $this->m_pembina->get_option($user);
        $where = array('id_jadwal' => $id_jadwal);
        $data['jadwal'] = $this->m_pembina->edit_data($where, 'jadwal')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('pembina/jadwalkegiatan/editjadwal', $data);
        $this->load->view('templates/footer');
    }

    function update()
    {
        $id_jadwal = $this->input->post('id_jadwal');
        $id_jadwall = $this->input->post('id_ekskull');
        $jam_mulai = $this->input->post('jam_mulai');
        $jam_selesai = $this->input->post('jam_selesai');
        $tgl = $this->input->post('tgl');
        $deskripsi = $this->input->post('deskripsi');
        $lokasi = $this->input->post('lokasi');


        $data = array(
            'id_ekskull' => $id_jadwall,
            'jam_mulai' => $jam_mulai,
            'jam_selesai' => $jam_selesai,
            'tgl' => $tgl,
            'lokasi' => $lokasi,
            'deskripsi' => $deskripsi

        );

        $where = array(
            'id_jadwal' => $id_jadwal
        );

        $this->m_pembina->update_data($where, $data, 'jadwal');
        $this->session->set_flashdata('succses', 'Edit Data Berhasil.');
        redirect('Pembina/P_jadwal/getjadwal/'.$id_jadwall);
    }

    function hapus($id_jadwal)
    {
        $where = array('id_jadwal' => $id_jadwal);
        $this->m_pembina->hapus_data($where, 'jadwal');
        $this->session->set_flashdata('primary', 'Data Terhapus.');
        $this->load->library('user_agent');
        redirect($_SERVER['HTTP_REFERER']);
    }
}