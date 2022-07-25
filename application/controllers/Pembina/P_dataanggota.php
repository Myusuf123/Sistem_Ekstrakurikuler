<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_dataanggota extends CI_Controller
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
        $this->load->model('m_pembina');
        $this->load->model('m_dashboard');
       
    }


    public function index()
    {
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();
        $user =$this->session->userdata('ses_id');
       
        $data['ekskul'] = $this->m_pembina->tampilekskul($user)->result();
       
        
        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('pembina/anggota/data_ekskul', $data);
        $this->load->view('templates/footer');
    }

    public function getanggota($id_ekskul)
    {
        $count = array(
            'ekskul_id' => $id_ekskul
        );


        $data['total_ketua'] = $this->m_dashboard->get_ketua($count)->num_rows();
        $data['total_ekskul'] = $this->m_dashboard->get_anggota($count)->num_rows();
        $data['namaekskul'] = $this->db->get_where('ekskul', ['id_ekskul' =>
        $id_ekskul])->row_array();
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();
        $where = array('ekskul_id' => $id_ekskul);
        $data['anggota'] = $this->m_pembina->getAnggotaeks($where);
        $data['ketua'] = $this->m_pembina->getKetuaeks($where);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('pembina/anggota/p_dataanggota', $data);
        $this->load->view('templates/footer');
    }

    public function tampilsiswa()
    {
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();
        $data['jenis'] = $this->m_admin->get('ekskul');
        $data['count'] = $this->m_dashboard->get_all_count();
        $data['ketua'] = $this->m_pembina->getAllsiswa();
        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('pembina/p_datasiswa', $data);
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
        $this->load->view('templates/topbar', $data);
        $this->load->view('pembina/detailsiswa', $data);
        $this->load->view('templates/footer');
    }

    public function tambahketua($id_pendaftaran)
    {


        $data = array(

            'jabatan' => 'Ketua'


        );

        $where = array(
            'id_pendaftaran' => $id_pendaftaran
        );



        $this->m_pembina->update_data($where, $data, 'pendaftaran');
        $this->session->set_flashdata('succses', 'Ketua Telah Ditambahkan.');

        $this->load->library('user_agent');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function selesai($id_pendaftaran)
    {


        $data = array(

            'status' => 'Selesai'


        );

        $where = array(
            'id_pendaftaran' => $id_pendaftaran
        );



        $this->m_pembina->update_data($where, $data, 'pendaftaran');
        $this->session->set_flashdata('succses', 'Status Telah Dirubah.');

        $this->load->library('user_agent');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function hapusketua($id_pendaftaran)
    {


        $data = array(

            'jabatan' => 'Anggota'


        );

        $where = array(
            'id_pendaftaran' => $id_pendaftaran
        );



        $this->m_pembina->update_data($where, $data, 'pendaftaran');
        $this->session->set_flashdata('danger', 'Ketua Telah Dihapus.');

        $this->load->library('user_agent');
        redirect($_SERVER['HTTP_REFERER']);
    }


    function hapus($id_pendaftaran)
    {
        $where = array('id_pendaftaran' => $id_pendaftaran);
        $this->m_pembina->hapus_data($where, 'pendaftaran');
        $this->session->set_flashdata('primary', 'Data Terhapus.');
        $this->load->library('user_agent');
        redirect($_SERVER['HTTP_REFERER']);
    }

   
}