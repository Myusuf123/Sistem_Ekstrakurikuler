   <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class M_siswa extends CI_Model
    {
        public function get($table, $data = null, $where = null)
        {
            if ($data != null) {
                return $this->db->get_where($table, $data)->row_array();
            } else {
                return $this->db->get_where($table, $where)->result_array();
            }
        }

        function input_data($data, $table)
        {
            $this->db->insert($table, $data);
        }

        //BAGIAN SISWA JADWAL
        public function getJadwal()
        {
            $this->db->join('ekskul e', 'j.id_ekskull = e.id_ekskul');
            return $this->db->get('jadwal j')->result_array();
        }

        //BAGIAN SISWA PRESTASI    
        public function getPrestasi()
        {
            $this->db->join('ekskul e', 'p.ekskull_id = e.id_ekskul');
            return $this->db->get('data_prestasi p')->result_array();
        }

        public function getKetua()
        {
            $this->db->join('jurusan j', 's.jurusan_id = j.id_jurusan');
            $this->db->where('s.level', 'ketua');
            return $this->db->get('siswa s')->result_array();
        }
        public function getDetail($where)
        {

            $this->db->join('jurusan j', 's.jurusan_id = j.id_jurusan');
            return $this->db->get_where('siswa s', $where);
        }
        public function getProfile($where)
        {

            $this->db->join('jurusan j', 's.jurusan_id = j.id_jurusan');
            return $this->db->get_where('siswa s', $where);
        }
        public function getAnggota($user)
        {
            $this->db->join('ekskul e', 'pe.ekskul_id = e.id_ekskul');
            $this->db->join('siswa s', 'pe.nis_s = s.nis');
            $this->db->where('nis', $user);
            $this->db->order_by('tahunajaran', 'DESC');
            return $this->db->get('pendaftaran pe');
        }
        public function getSiswa($user)
        {
            $this->db->join('ekskul e', 'pe.k_ekskul = e.kode_ekskul');
            $this->db->join('siswa s', 'pe.nis_s = s.nis');
            $this->db->where('nis', $user);
            return $this->db->get('pendaftaran pe');
        }


        public function getAnggotaeks($user)
        {
            $this->db->join('pendaftaran pe', 'e.kode_ekskul = pe.k_ekskul');
            $this->db->join('siswa s', 'pe.nis_s = s.nis');
            $this->db->join('jurusan j', 's.jurusan_id = j.id_jurusan');
            $this->db->order_by('nama_jurusan', 'DESC');
            $this->db->order_by('kelas', 'DESC');

            return $this->db->get_where('ekskul e', $user)->result_array();
        }



        function cek_ekskul($table, $query)
        {
        
                return $this->db->get_where($table, $query);
            
        }
        

        function tampil_data()
        {
            return $this->db->get('siswa');
        }

        function tampil_eks()
        {
            $this->db->order_by('tahunajaran', 'DESC');
            return $this->db->get('ekskul');
        }
        function get_siswa($where)
        {
            $this->db->where('status', 'Diterima');
            return $this->db->get_where('pendaftaran', $where);
        }

    
        function siswa_diproses($where)
        {

            $this->db->where('status', 'Diproses');
            return $this->db->get_where('pendaftaran', $where);
        }
        function siswa_ditolak($where)
        {
            $this->db->where('status', 'Ditolak');
            return $this->db->get_where('pendaftaran', $where);
        }


        function diterimadanproses($where)
        {

            $this->db->where('status', 'Diterima');
            return $this->db->get_where('pendaftaran', $where);
        }
        

        public function getjeniseks($user)
        {
            $this->db->join('ekskul e', 's.k_ekskul = e.kode_ekskul');
            $this->db->order_by('k_ekskul');
            $this->db->where('k_ekskul', $user);
            return $this->db->get('siswa s')->result_array();
        }

        function edit_data($where, $table)
        {
            return $this->db->get_where($table, $where);
        }
        function update_data($where, $data, $table)
        {
            $this->db->where($where);
            $this->db->update($table, $data);
        }

        function hapus_data($where, $table)
        {
            $this->db->where($where);
            $this->db->delete($table);
        }
    }
