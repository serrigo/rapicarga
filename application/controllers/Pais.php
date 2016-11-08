<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Pais extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
		$this->load->model('Pais_Model','PM',true);
	}
	
	function index()
	{
		$pages=10; //Número de registros mostrados por páginas
		$this->load->library('pagination'); //Cargamos la librería de paginación
		$config['base_url'] = base_url().'pais/pagina/'; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
		$config['total_rows'] = $this->PM->filas();//calcula el número de filas  
		$config['per_page'] = $pages; //Número de registros mostrados por páginas
        $config['num_links'] = 10; //Número de links mostrados en la paginación
 		$config['first_link'] = 'Primera';//primer link
		$config['last_link'] = '&Uacute;ltima';//último link
        $config["uri_segment"] = 3;//el segmento de la paginación
		$config['next_link'] = 'Siguiente';//siguiente link
		$config['prev_link'] = 'Anterior';//anterior link
		$this->pagination->initialize($config); //inicializamos la paginación		
		$data["paises"] = $this->PM->total_paginados($config['per_page'],$this->uri->segment(3));			
             
		$this->load->view('Paises_view', $data);
	}
}
