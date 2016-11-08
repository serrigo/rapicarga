<?php
/* 
 * File Name: Usuarios.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'Captcha.php';
class Usuarios extends CI_Controller
{
	private $captcha;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('Usuarios_Model','UM',true);
		$this->load->model('Session_Management','SM',true);
		
	}
	
	public function validarUsuario($usuario,$passCrypt)
	{
		$retorno = $this->UM->validar_Usuario($usuario,$passCrypt);
		echo $retorno;
	}
	
	public function index()
	{
		$this->SM->Validar_Sesion();
		$permisos['USUARIOS']=$this->SM->Validar_Permiso('USUARIOS');
		$this->load->view('Usuarios_view',$permisos);
	}
	
	/*
	 * Para cargar formularios o tablas mediante ajax
	 */
	public function loadView($view,$data = NULL)
	{
		$captcha = new Captcha();
		$imagen['CAPTCHA'] = $captcha->captcha_setting();
		
		if($view == 'newUser')
			$this->load->view('forms/Users/formNewUser',$imagen);
		if($view == 'findUser')
			$this->load->view('forms/Users/formFindUser');
		if($view == 'tableUser')
			$this->load->view('tables/Users/tableDataListUsers',$data);
		if($view == 'editUser')
			$this->load->view('forms/Users/formUpdateUser',array_merge($data,$imagen));
		if($view == 'tablePermission')
			$this->load->view('tables/Users/tablePermission',$data);
	}
	
	
	public function createUser($cedula,$password,$email,$nombre,$apellido)
	{
		$nombre = rawurldecode($nombre);
		$apellido = rawurldecode($apellido);
		
		$data = array(
				'password' => $password ,
				'email' => $email ,
				'nombre' => $nombre,
				'apellido' => $apellido,
				'cedula' => $cedula,
				'fecha_nac' => '',
				'telefono' => '',
				'celular' => '',
				'idpais' => '1',
				'ap_postal' => '',
				'tipoUser' => '2000'
		);
		$retorno = $this->UM->createUser($data);
		echo $retorno;
	}
	
	public function updateUser($id,$cedula,$email,$nombre,$apellido,$resetPass)
	{
// 		$this->SM->Validar_Sesion();
		$nombre = rawurldecode($nombre);
		$apellido = rawurldecode($apellido);
		
		if($resetPass == 'true')
		{
			$data = array(
					'email' => $email ,
					'nombre' => $nombre,
					'apellido' => $apellido,
					'cedula' => $cedula,
					'password' => sha1('123456')
			);
		}
			
		else if($resetPass == 'false')
		{
			$data = array(
					'email' => $email ,
					'nombre' => $nombre,
					'apellido' => $apellido,
					'cedula' => $cedula
			);
		}
			
		
		$retorno = $this->UM->updateUser($id,$data);
		echo $retorno;
	}
	
	/*
	 * Busca los usuarios según criterio (id,cedula,nombre,email)
	 *  q = texto de busqueda o id
	 */
	public function findUser($criteria,$q)
	{
		$data['USER']=$this->UM->findUser($criteria,$q);
		$data['PERMISO']=$this->SM->Validar_Permiso('USUARIOS');
		
		if($criteria == 'id')
		{
			
			$this->loadView('editUser',$data);
		}
			
		else
		{
			$this->loadView('tableUser',$data);
		}
			
	}
	
	/*
	 * obtiene  permisos de usuario y carga la tabla
	 */
	public function getPermission($idUser)
	{
		$data['USER']=$this->UM->getPermission($idUser);
		$data['iDUSER'] = $idUser;
		$this->loadView('tablePermission',$data);
	}
	
	/*
	 * crea un nuevo permiso de usuario
	 */
	public function createPermission($idUser,$idModulo,$c,$r,$u,$d,$i)
	{
		$data = array(
				'usuario' => $idUser ,
				'modulo' => $idModulo ,
				'C' => $c,
				'R' => $r,
				'U' => $u,
				'D' => $d,
				'I' => $i
		);
		$retorno = $this->UM->createPermission($data);
		echo $retorno;
	}
	
	public function updatePermission($idPermiso,$c,$r,$u,$d,$i)
	{
		// TODO: actualizar lista dinamicmente
		$data = array(
				'C' => $c,
				'R' => $r,
				'U' => $u,
				'D' => $d,
				'I' => $i
		);
		$retorno = $this->UM->updatePermission($idPermiso,$data);
		echo $retorno;
	}
	
	/*
     * devuelve los módulos que no han sido asigados al usuario
     * para crear un listbox
     * @return JSON
     */
	public function getModulosDisponibles($idUsuario)
	{
		$retorno = $this->UM->getModulosDisponibles($idUsuario);
		echo json_encode($retorno);
	}
	
	/*
	 * Elimina usuario
	 */
	public function deleteUser($id)
	{
		// TODO: eliminar permisos asociados a este id de usuario
		try {
			$data = array(
					'id' => $id
			);
			$retorno = $this->UM->deleteUser($data);
			echo $retorno;
			
		} catch (Exception $e) {
			echo 0;
		}
	}
	public function validarCaptcha($value)
	{
		try {
			$captcha = new Captcha();
			$key = $_SESSION['captchaWord'];
			$exito = $captcha->validateCaptcha($key,$value);
			echo trim($exito);
		} catch (Exception $e) {
		}
		
		//echo 
		
	}
	public function refreshCaptcha()
	{
		try {
			$captcha = new Captcha();
			$imagen = $captcha->captcha_refresh();
			echo $imagen;
		} catch (Exception $e) {
		}
	
	
	}
	
}