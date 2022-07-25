

    <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class M_dashboard extends CI_Model
    {

        public function get_all_count()
        {
            $guru = $this->db->query("SELECT * FROM guru WHERE level='pembina'")->num_rows();
            
            $ekskul = $this->db->query('SELECT DISTINCT nama_ekskul from ekskul')->num_rows();
            $siswa = $this->db->get('siswa')->num_rows();
            $ketua = $this->db->query("SELECT * FROM pendaftaran where jabatan='Ketua'")->num_rows();
            $jurusan = $this->db->get('jurusan')->num_rows();
            $jum_daftar = $this->db->query('SELECT nis_s, COUNT(nis_s) AS jumlah FROM pendaftaran GROUP BY nis_s')->num_rows();
            $anggota = $this->db->query("SELECT * FROM pendaftaran")->num_rows();
            $count = [
                'ekskul' => $ekskul,
                'guru' => $guru,
                'siswa' => $siswa,
                'pendaftaran' => $ketua,
                'pendaftaran' => $jum_daftar,
                'jurusan' => $jurusan,
                'anggota' => $anggota,
            ];
            return $count;
        }
        public function count_ketua()
        {
            
            $ketua = $this->db->query("SELECT * FROM pendaftaran where jabatan='Ketua'")->num_rows();
           
            $count = [
                
                'pendaftaran' => $ketua,
            ];
            return $count;
        }

        function get_pendaftaran(){
            $jum_daftar = $this->db->query('SELECT nis_s, COUNT(nis_s) AS jumlah FROM pendaftaran GROUP BY nis_s')->num_rows();
            $count = [
   
                'pendaftaran' => $jum_daftar,
         
            ];
            return $count;
        }

        function get_ketua($where)
        {
            $this->db->where('jabatan', 'Ketua');
            return $this->db->get_where('pendaftaran', $where);
        }
        function get_pendaftar($where)
        {
            $this->db->where('status', 'Diproses');
            return $this->db->get_where('pendaftaran', $where);
        }

        function get_anggota($where)
        {
            $this->db->where('status', 'Diterima');
            return $this->db->get_where('pendaftaran', $where);
        }

    }
