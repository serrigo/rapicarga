<?php

/*
 * File Name: Management.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Management extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
 		$this->load->model('Session_Management','SM',true);
 		$this->SM->Validar_Sesion();
	}

	public function index()
	{
		$permisos['USUARIOS']=$this->SM->Validar_Permiso('USUARIOS');
		$permisos['CLIENTES']=$this->SM->Validar_Permiso('CLIENTES');
		$permisos['COTIZACIONES']=$this->SM->Validar_Permiso('COTIZACIONES');
		$permisos['FACTURAS']=$this->SM->Validar_Permiso('FACTURAS');
		$permisos['RUTAS']=$this->SM->Validar_Permiso('RUTAS');
		$permisos['PROVEEDORES']=$this->SM->Validar_Permiso('PROVEEDORES');
		$this->load->view('Management_view',$permisos);
	}


}