   <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class M_admin extends CI_Model
    {
        function tampil_data($user)
        {
            return $this->db->get($user);
        }
        function tampil_jurusan($user)
        {
            $this->db->order_by('nama_jurusan', 'ASC');
            return $this->db->get($user);
        }
        function tampilekskul($user)
        {
            $this->db->order_by('tahunajaran', 'DESC');
            return $this->db->get($user);
        }

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

        public function get_eks($user){
            $this->db->order_by('tahunajaran', 'DESC');
            return $this->db->get($user)->result_array();
        }

        public function GetPembina()
        {
            $this->db->where('level', 'pembina');
            return $this->db->get('guru')->result_array();
        }

        public function GetEkskul()
        {
            $this->db->join('guru g', 'e.nip_g = g.nip');
            $this->db->order_by('tahunajaran', 'DESC');
            return $this->db->get('ekskul e')->result_array();
        }
        public function getAnggotaeks($user)
        {
            $this->db->join('pendaftaran pe', 'e.id_ekskul = pe.ekskul_id');
            $this->db->join('siswa s', 'pe.nis_s = s.nis');
            $this->db->join('jurusan j', 's.jurusan_id = j.id_jurusan');
            $this->db->order_by('nama_jurusan', 'DESC');
            $this->db->order_by('kelas', 'DESC');
            $this->db->where('status', 'Diterima');
            return $this->db->get_where('ekskul e', $user)->result_array();
        }

        
        public function getAnggotaeks_($user)
        {
            $this->db->join('ekskul e', 'a.id_ekskul = e.ekskul_id');
            $this->db->join('siswa s', 'a.nis_s = s.nis');
            $this->db->join('jurusan j', 's.jurusan_id = j.id_jurusan');
            $this->db->order_by('nama_jurusan', 'DESC');
            $this->db->order_by('kelas', 'DESC');
            $this->db->where('ekskul_id',$user);
            return $this->db->get_where('pendaftaran pe')->result_array();
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

        //BAGIAN DATA SISWA
        public function getDetail($where)
        {

            $this->db->join('jurusan j', 's.jurusan_id = j.id_jurusan');
            return $this->db->get_where('siswa s', $where);
        }
        public function getDetails($where)
        {

            $this->db->join('siswa s', 'a.nis = s.nis_s');
            $this->db->where('nis', 'nis_S');
            return $this->db->get_where('pendaftaran pe', $where);
        }
        public function getAllsiswa()
        {
            $this->db->join('jurusan j', 's.jurusan_id = j.id_jurusan');

            return $this->db->get('siswa s')->result_array();
        }

        //BAGIAN JADWAL
        public function getJadwal()
        {
            $this->db->join('ekskul e', 'j.id_ekskull = e.id_ekskul');
            $this->db->order_by('tgl', 'DESC');
            $this->db->order_by('tahunajaran', 'DESC');
            return $this->db->get('jadwal j')->result_array();
        }

        //BAGIAN PRESTASI
        public function getPrestasi()
        {
            $this->db->join('ekskul e', 'p.ekskull_id = e.id_ekskul');
            $this->db->order_by('tahunajaran', 'DESC');
            $this->db->order_by('id_prestasi', 'DESC');
            return $this->db->get('data_prestasi p')->result_array();
        }

        public function getPrestasihome()
        {
            $this->db->join('ekskul e', 'p.ekskull_id = e.id_ekskul');
            $this->db->order_by('tahunajaran', 'DESC');
            $this->db->order_by('id_prestasi', 'DESC');
            return $this->db->get('data_prestasi p',3)->result_array();
        }

        public function getprofilesiswa($where)
        {
            $this->db->join('jurusan j', 's.jurusan_id = j.id_jurusan');

            return $this->db->get_where('siswa s', $where)->result_array();
        }
    }
