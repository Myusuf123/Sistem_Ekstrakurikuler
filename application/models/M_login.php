<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model{
	//cek nip dan password dosen


	//cek nip dan password dosen
	function auth_pembina($username, $password)
	{
		$query = $this->db->query("SELECT * FROM guru WHERE nip='$username' AND password=MD5('$password') LIMIT 1");
		return $query;
	}

	//cek nim dan password mahasiswa
	function auth_siswa($username, $password)
	{
		$query = $this->db->query("SELECT * FROM siswa WHERE nis='$username' AND password=MD5('$password') LIMIT 1");
		return $query;
	}

}
