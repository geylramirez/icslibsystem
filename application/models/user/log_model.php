<?php

if(! defined('BASEPATH')) exit ('No direct script access allowed');

class Log_model extends CI_Model{
	
	public function _construct(){
		parent :: _construct();
	}

	public function get_borrower($username, $password)
		{
			$this->load->database();
			$password = sha1($password);
			$stmt = "SELECT * FROM `borrower` WHERE (email = '{$username}' or idnumber = '{$username}') and password = '{$password}' and status = 'ACTIVATED'";
			$query = $this->db->query($stmt);
			return $query->result();
		}

	public function get_info($idnumber)
		{
			$this->load->database();
			$stmt = "SELECT * FROM `sample` WHERE idnumber = '{$idnumber}'";
			$query = $this->db->query($stmt);
			return $query->result();
		}

	public function get_password($username)
		{
			$this->load->database();
			$stmt = "SELECT idnumber,email,password FROM `borrower` WHERE email = '{$username}' or idnumber = '{$username}'";
			$query = $this->db->query($stmt);
			return $query->result();
		}

	public function set_last_session($username)
		{
			$this->load->database();
			$stmt = "UPDATE `borrower` SET `lastsession` = NOW() WHERE `idnumber`= '$username'";
			$query = $this->db->query($stmt);
			return true;
		}

	public function update_log_login($username)
		{
			$this->load->database();
			$stmt = "INSERT INTO log( `action`, `time`, `idnumber`) VALUES ('logged in', NOW(), '$username')";
			$query = $this->db->query($stmt);
			return true;
		}
		
}
	/* 	End of file Log_model.php
	* 	Location: ./application/models/user/log_model.php 
	*/
?>