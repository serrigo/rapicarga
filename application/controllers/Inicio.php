<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
	}
	
	/**
	 * Muestra la pagina web de inicio del sistema
	 */
	public function index()
	{
		$this->load->view('Inicio');
	}
}
