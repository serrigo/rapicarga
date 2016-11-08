<?php

/*
 * File Name: Logout.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		session_start();
		session_destroy();
		header( "refresh:0; url=".base_url() );
		exit();
	}


}
