<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Pais_Model extends CI_Model
{
	public function construct()
	{
		parent::__construct();
	}
	
    //obtenemos el total de filas para hacer la paginación
	function filas()
	{
		$consulta = $this->db->get('paises');
		return  $consulta->num_rows() ;
	}
        
    
	function total_paginados($por_pagina,$segmento) 
        {
            $consulta = $this->db->get('paises',$por_pagina,$segmento);
            if($consulta->num_rows()>0)
            {
                foreach($consulta->result() as $fila)
				{
				    $data[] = $fila;
				}
                    return $data;
            }
	}
	
}
