<?php
/* 
 * File Name: Session_Management.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class Session_Management extends CI_Model
{
    function __construct()
    {
        parent::__construct();       
    }
    
	public function Validar_Permiso($modulo)
	{
		//$this->Validar_Sesion();
		$this->db->select('idmodulos');
		$this->db->from('modulos');
		$this->db->where('nombre', $modulo);
		$query = $this->db->get();
		$datos =$query->row();
		$idmodulo = $datos->idmodulos;
		
		$this->db->select('C,R,U,D,I');
		$this->db->from('permisos');
		$this->db->where('usuario',$_SESSION['iduser']);
		$this->db->where('modulo', $idmodulo);
		$query = $this->db->get();
		$datos =$query->result_array();
		return $datos;
	}
	
	public function Validar_Sesion()
	{
		if (!isset($_SESSION['user']) || $_SESSION['valid']== false)
		{
			header( "refresh:0; url=".base_url() );
			exit();
		}
	}
	
}
?>
