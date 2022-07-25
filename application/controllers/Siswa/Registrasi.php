<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends CI_Controller
{
    var $message;
    function __construct()
    {
        parent::__construct();
        //validasi jika user belum login
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url();
            redirect($url);
        }
      
        $this->load->model('m_dashboard');
    
        $this->load->model('m_siswa');
    
    }

    public function index()
    {
        $count = array(
            'nis_s' => $this->session->userdata('ses_id')
        );
        $user = $this->session->userdata('ses_id');
        $data['count'] = $this->m_dashboard->get_all_count();
        
        $data['ambil'] = $this->m_siswa->getAnggota($user)->result();
        $data['ekskul'] = $this->m_siswa->tampil_eks()->result();
        $data['total_ekskul'] = $this->m_siswa->get_siswa($count)->num_rows();

       $ses=['nis' => $this->session->userdata('ses_id')];
        $data['users'] = $this->m_siswa->getProfile($ses)->row_array();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/registrasi/ekskul',$data);
        $this->load->view('templates/footer');
    }


    public function Regis_aksi($kode_ekskul)
    {

        $cek = array(
            'nis_s' => $this->session->userdata('ses_id'),
            'ekskul_id' => $kode_ekskul
        );

        $cek_siswa = $this->m_siswa->cek_ekskul('pendaftaran', $cek)->num_rows();

            if ($cek_siswa > 0) {
                $this->session->set_flashdata('danger', 'Anda Tidak Bisa Memilih Ekskul Yang Sudah Anda Daftarkan.');
                redirect('siswa/registrasi');
            } else {

                $count = array(
                    'nis_s' => $this->session->userdata('ses_id')
                );



                $diproses = $this->m_siswa->siswa_diproses($count)->num_rows();
                $diterima = $this->m_siswa->get_siswa($count)->num_rows();
                $ditolak = $this->m_siswa->siswa_ditolak($count)->num_rows();
            
                $diterimadanproses = $this->m_siswa->diterimadanproses($count)->num_rows();
      
                if ($diproses >= 2) {

                    $this->session->set_flashdata('danger', 'Anda Tidak Bisa Mendaftar Lebih Dari 2 Ektrakurikuler.');
                    redirect('siswa/registrasi');
                    
            }
                
                elseif ($diterima >= 2) {
                $this->session->set_flashdata('danger', 'Anda Tidak Bisa Mendaftar Lebih Dari 2 Ektrakurikuler.');
                redirect('siswa/registrasi');
            } 
 
            elseif ($ditolak) {
                $data = array(

                    'nis_s' => $this->session->userdata('ses_id'),
                    'ekskul_id' => $kode_ekskul,
                    'jabatan' => 'Anggota',
                    'status' => 'Diproses',
                    'tgl_daftar' => date('Y-m-d')



                );

                $this->db->insert('pendaftaran', $data);
                $this->session->set_flashdata('succses', 'Anda Berhasil Mendaftar Ekstrakurikuler.');

                redirect('siswa/registrasi');
            } 
            // elseif ($diterimadanproses >= 1) {
            //     $this->session->set_flashdata('danger', 'Anda Tidak Bisa Mendaftar Lebih Dari 2 Ektrakurikuler.');
            //     redirect('siswa/registrasi');
            // } 
            
                 else {


                  
                    $data = array(
                      
                        'nis_s' => $this->session->userdata('ses_id') ,
                        'ekskul_id' => $kode_ekskul,
                        'jabatan' => 'Anggota',
                        'status' => 'Diproses',
                        'tgl_daftar' => date('Y-m-d')



                    );

                    $this ->db->insert('pendaftaran',$data);
                    $this->session->set_flashdata('succses', 'Anda Berhasil Mendaftar Ekstrakurikuler.');

                    redirect('siswa/registrasi');
                }
            }

    }

}
