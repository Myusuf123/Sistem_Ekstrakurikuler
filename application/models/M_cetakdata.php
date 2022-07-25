   <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class M_cetakdata extends CI_Model
    {
        function tampil_data($user)
        {
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
        public function cari_anggota($kelas, $nama_jurusan)
        {
            $this->db->join('ekskul e', 'pe.ekskul_id = e.id_ekskul');
            $this->db->join('siswa s', 'pe.nis_s = s.nis');
            $this->db->join('jurusan j', 's.jurusan_id = j.id_jurusan');
            $this->db->where('s.kelas', $kelas);
            $this->db->where('s.jurusan_id', $nama_jurusan);
            $this->db->where('pe.status', 'Diterima');
            return $this->db->get('pendaftaran pe')->result_array();
        }
 
        function input_data($data, $table)
        {
            $this->db->insert($table, $data);
        }

        public function GetPembina()
        {
            $this->db->where('level', 'pembina');
            return $this->db->get('guru')->result_array();
        }

        public function GetEkskul()
        {
            $this->db->join('guru g', 'e.nip_g = g.nip');
            return $this->db->get('ekskul e')->result_array();
        }
        public function getAnggotaeks($user)
        {
            $this->db->join('pendaftaran pe', 'e.id_ekskul = pe.ekskul_id');
            $this->db->join('siswa s', 'pe.nis_s = s.nis');
            $this->db->join('jurusan j', 's.jurusan_id = j.id_jurusan');
            $this->db->join('guru g', 'e.nip_g = g.nip');
            $this->db->order_by('nama_jurusan', 'DESC');
            $this->db->order_by('kelas', 'DESC');

            return $this->db->get_where('ekskul e', $user)->result_array();
        }
        public function getPembina_($user)
        {
            $this->db->join('pendaftaran pe', 'e.id_ekskul = pe.ekskul_id');
            $this->db->join('siswa s', 'pe.nis_s = s.nis');
            $this->db->join('jurusan j', 's.jurusan_id = j.id_jurusan');
            $this->db->join('guru g', 'e.nip_g = g.nip');
            $this->db->order_by('nama_jurusan', 'DESC');
            $this->db->order_by('kelas', 'DESC');

            return $this->db->get_where('ekskul e', $user);
        }
        


        //BAGIAN CETAK DATA PEMBINA
        function GetEksPembina($user)
        {
            $this->db->join('guru g', 'e.nip_g = g.nip');
            $this->db->where('nip', $user);
            return $this->db->get('ekskul e');
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
