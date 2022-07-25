<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P_pendaftaran extends CI_Controller
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

        $data['count'] = $this->m_dashboard->get_all_count();
        $where = $this->session->userdata('ses_id');
        $data['ekskul'] = $this->m_pembina->tampilekskul($where)->result();
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('pembina/pendaftaran/data_ekskul', $data);
        $this->load->view('templates/footer');
    }

    public function getpendaftaran($id_ekskul)
    {
        $count = array(
            'ekskul_id' => $id_ekskul
        );

        
        $data['total_pendaftar'] = $this->m_dashboard->get_pendaftar($count)->num_rows();
        $data['countt'] = $this->m_dashboard->get_pendaftaran();
        
        //mengambil nama ektrakurikuler berdasarkan ekskul yang dipilih
        $data['namaekskul'] = $this->db->get_where('ekskul', ['id_ekskul' =>
        $id_ekskul])->row_array();
        $data['guru'] = $this->db->get_where('guru', ['nip' =>
        $this->session->userdata('ses_id')])->row_array();
        
        $user = array('ekskul_id' => $id_ekskul);
        $data['mengambil'] = $this->m_pembina->getpendaftaran($user);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('pembina/pendaftaran/data_daftar', $data);
        $this->load->view('templates/footer');

        
    }

    public function acc($id_ekskul){


        $data = array(

            'status' => 'Diterima'


        );

        $where = array(
            'id_pendaftaran' => $id_ekskul
            
        );


    
        $this->m_pembina->update_data($where, $data, 'pendaftaran');
        //tambahan
        $nis = $this->m_pembina->filterPendaftar($id_ekskul)[0]->nis_s;
        $dataSet = $this->m_pembina->countData($nis);
        $count = 0;
        foreach($dataSet as $row){
            if($row->status == 'Diterima'){
                $count +=1;
            }else{
                if($count >= 2){
                    $data = array(
                        'status' => 'Ditolak'
                    );
                    $where = array(
                        'id_pendaftaran' => $row->id_pendaftaran
                    );
                    $this->m_pembina->update_data($where, $data, 'pendaftaran');
                }
            }
        }
        // var_dump();exit();

        //end
        $this->session->set_flashdata('succses', 'Siswa Telah Di ACC.');
    
        $this->load->library('user_agent');
        redirect($_SERVER['HTTP_REFERER']);
    }


    public function ditolak($id_ekskul){


        $data = array(

            'status' => 'Ditolak'

        );

        $where = array(
            'id_pendaftaran' => $id_ekskul
        );


    
        $this->m_pembina->update_data($where, $data, 'pendaftaran');
        $this->session->set_flashdata('danger', 'Siswa Tidak Di Terima.');
    
        $this->load->library('user_agent');
        redirect($_SERVER['HTTP_REFERER']);
    }

  

   
}
