<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Costumers_Model extends CI_Model
{
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	function get_pais($q){
		$this->db->select('pais');
		$this->db->like('pais', $q);
		$query = $this->db->get('paises');
		if($query->num_rows() > 0){
			foreach ($query->result_array() as $row){
				$row_set[] = $row['pais']; 
			}
			echo json_encode($row_set); 
		}
	}
	/*
	 * devuelve las empresas
	 * para crear un listbox
	 */
	function getEmpresas()
	{
		 
		$this->db->select('id,nombrecomercial');
		$query = $this->db->get('empresas');
		$data = $query->result_array();
		return $data;
	}
	/*
	 * devuelve los paises
	 * para crear un listbox
	 */
	function getPaises()
	{
			
		$this->db->select('id,pais');
		$query = $this->db->get('paises');
		$data = $query->result_array();
		return $data;
	}
	/**
	 * Crea empresa, devuelve el id generado
	 * @param unknown $data
	 * @return number
	 */
	function createBusiness($data)
	{
		$this->db->insert('empresas', $data);
		$num_inserts = $this->db->affected_rows();
		$lastid = 0;
		if($num_inserts > 0)
		{
			$lastid = $this->db->insert_id();
		}
		else
		{
			$lastid = 0;
		}
		return $lastid;
	}
	/**
	 * crear cliente
	 * @param array $data
	 * @param int $empresa
	 * @return int
	 */
	function createCostumer($data,$empresa)
	{
		$this->db->insert('user', $data);
		$num_inserts = $this->db->affected_rows();
		$lastid = 0;
		if($num_inserts > 0)
		{
			$lastid = $this->db->insert_id();
		}
		else
		{
			$lastid = 0;
		}
		
		$data = array(
				'iduser' => $lastid ,
				'idempresa' => $empresa
		);
		$this->db->insert('userempresa', $data);
		$num_inserts = $this->db->affected_rows();
		return $num_inserts;
	}
	/*
	 * Busca los usuarios según criterio (id,cedula,nombre,email)
	 *  q = texto de busqueda o id
	 */
	function findUser($criteria,$q)
	{
		try {
			if($criteria == 1) //cedula,nombre,email
			{
				 
				$this->db->where('cedula', $q);
				$this->db->or_where('apellido', $q);
				$this->db->or_where('email', $q);
				$this->db->where('tipoUser','1000');
				$this->db->from('user');
				$query = $this->db->get();
				$data = $query->result_array();
				return $data;
			}
			else if($criteria == 'id') // id
			{
				$query = $this->db->get_where('user', array('id' => $q));
				$data = $query->row();
				return $data;
			}
			else // 10 últimos
			{
				 
				$this->db->select('*');
				$this->db->from('user');
				$this->db->where('tipoUser','1000');
				$this->db->limit(10);
				$this->db->order_by('id', 'DESC');
				$query = $this->db->get();
				$data = $query->result_array();
				return $data;
			}
		} catch (Exception $e) {
			return -1;
		}
	}
}
?>