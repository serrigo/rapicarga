<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proveedores_Model extends CI_Model
{
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	function getServicios()
	{
	
		$this->db->select('id');
		$this->db->select('servicio');
		$this->db->from('servicios');
		$query = $this->db->get();
		$result = $query->result();
	
		$loc_id = array();
		$loc_name = array();
	
		for ($i = 0; $i < count($result); $i++)
		{
			array_push($loc_id, $result[$i]->id);
			array_push($loc_name, $result[$i]->servicio);
		}
		return $result = array_combine($loc_id, $loc_name);
	}
	
	function getTipoCarga()
	{
	
		$this->db->select('id');
		$this->db->select('tipocarga');
		$this->db->from('tipocarga');
		$query = $this->db->get();
		$result = $query->result();
	
		$loc_id = array();
		$loc_name = array();
	
		for ($i = 0; $i < count($result); $i++)
		{
			array_push($loc_id, $result[$i]->id);
			array_push($loc_name, $result[$i]->tipocarga);
		}
		return $result = array_combine($loc_id, $loc_name);
	}
	
	function createProvider($data)
	{
		$this->db->insert('proveedores', $data);
		$num_inserts = $this->db->affected_rows();
		return $num_inserts;
	}
	
	function getProviders()
	{
		try {

			$this->db->select('*');
			$this->db->from('proveedores');
			$this->db->join('servicios','proveedores.idserxpro = servicios.id');	
			$query = $this->db->get();
			$data = $query->result_array();
			return $data;
		} catch (Exception $e) {
		}
	}
}
?>