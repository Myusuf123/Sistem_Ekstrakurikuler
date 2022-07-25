   <?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Pembina extends CI_Model
{
        public function get($table, $data = null, $where = null)
        {
            if ($data != null) {
                return $this->db->get_where($table, $data)->row_array();
            } else {
                return $this->db->get_where($table, $where)->result_array();
            }
        }

        function tampilekskul($where)
        {
            $this->db->join('guru g', 'e.nip_g = g.nip');
            $this->db->order_by('tahunajaran', 'DESC');
            $this->db->where('nip', $where);
            return $this->db->get('ekskul e');
        }

        public function getEkskul()
        {
            $this->db->join('guru g', 'e.nip_g = g.nip');
            $this->db->order_by('tahunajaran','DESC');
            return $this->db->get('ekskul e')->result_array();
        }

        //BAGIAN DATA SISWA
        public function getAllsiswa()
        {
            $this->db->join('jurusan j', 's.jurusan_id = j.id_jurusan');
            return $this->db->get('siswa s')->result_array();
        }
        

        function input_data($data, $table)
        {
            $this->db->insert($table, $data);
        }

        public function getPembina()
        {
            $this->db->where('level','pembina');
            return $this->db->get('guru')->result_array();
        }

        public function getpendaftaran($user)
        {
            $this->db->join('pendaftaran pe', 'e.id_ekskul = pe.ekskul_id');
            $this->db->join('siswa s', 'pe.nis_s = s.nis');
            $this->db->join('jurusan j', 's.jurusan_id = j.id_jurusan');
            $this->db->where('status', 'Diproses');
            $this->db->order_by('nama_jurusan', 'DESC');
            $this->db->order_by('kelas', 'DESC');
            return $this->db->get_where('ekskul e', $user)->result_array();
        }
        
        public function filterPendaftar($id){
            return $this->db->query("SELECT nis_s from pendaftaran where id_pendaftaran = '$id'")->result();
        }

        public function countData($nis){
            return $this->db->query("SELECT * from pendaftaran where nis_s = '$nis'")->result();
        }

        public function getAnggotaeks($where)
        {
            $this->db->join('ekskul e', 'pe.ekskul_id = e.id_ekskul');
            $this->db->join('siswa s', 'pe.nis_s = s.nis');
            $this->db->join('jurusan j', 's.jurusan_id = j.id_jurusan');
            $this->db->join('guru g', 'e.nip_g = g.nip');

            $this->db->where_in('pe.status', ['Diterima','Selesai']);
            $this->db->where('jabatan', 'Anggota');

            $this->db->order_by('id_pendaftaran', 'DESC');
            return $this->db->get_where('pendaftaran pe', $where)->result_array();
        }
        public function getKetuaeks($where)
        {
            $this->db->join('ekskul e', 'pe.ekskul_id = e.id_ekskul');
            $this->db->join('siswa s', 'pe.nis_s = s.nis');
            $this->db->join('jurusan j', 's.jurusan_id = j.id_jurusan');
            $this->db->join('guru g', 'e.nip_g = g.nip');
            $this->db->where_in('pe.status', ['Diterima','Selesai']);
            $this->db->where('jabatan', 'Ketua');
            return $this->db->get_where('pendaftaran pe', $where)->result_array();
        }

        public function getAnggotaeks__($user)
        {
            $this->db->join('pendaftaran pe', 'e.id_ekskul = pe.ekskul_id');
            $this->db->join('guru g', 'e.nip_g = g.nip');
            $this->db->join('siswa s', 'pe.nis_s = s.nis');
            $this->db->join('jurusan j', 's.jurusan_id = j.id_jurusan');
            $this->db->where('nip', $user);
            return $this->db->get('ekskul e')->result_array();
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

//BAGIAN JADWAL
        public function getJadwalPembina($user)
        {
            $this->db->join('ekskul e', 'j.id_ekskull = e.id_ekskul');
            $this->db->join('guru g', 'e.nip_g = g.nip');
            return $this->db->get_where( 'jadwal j', $user)->result_array();
        }

        //bagian getsession
        public function getSes($user)
        {
            $this->db->join('ekskul e', 'g.nip = e.nip_g');
            return $this->db->get_where('guru g',$user);
        }

        public function get_option($user)
        {
            $this->db->where('nip_g',$user);
            return $this->db->get('ekskul')-> result_array();
        }

        //BAGIAN DATA PRESTASI
        public function getPrestasiP($user)
        {
            $this->db->join('ekskul e', 'p.ekskull_id = e.id_ekskul');
            $this->db->join('guru g', 'e.nip_g = g.nip');
            
            return $this->db->get_where('data_prestasi p', $user)->result_array();
        }

}
