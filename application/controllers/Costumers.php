<?php
/*
 * File Name: Costumers.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'Captcha.php';
class Costumers extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('Session_Management','SM',true);
		$this->load->model('Costumers_Model','CM',true);
		$this->load->model('Usuarios_Model','UM',true);
		$this->SM->Validar_Sesion();
	}

	public function index()
	{
		$this->SM->Validar_Sesion();
		$permisos['CLIENTES']=$this->SM->Validar_Permiso('CLIENTES');
		$this->load->view('Costumers_view',$permisos);
	}
	/*
	 * Para cargar formularios o tablas mediante ajax
	 */
	public function loadView($view,$data = NULL)
	{
		//
		$captcha = new Captcha();
		$imagen['CAPTCHA'] = $captcha->captcha_setting();
	
		if($view == 'newCostumer')
			$this->load->view('forms/Costumers/formNewCostumer',$imagen);
		if($view == 'findCostumer')
			$this->load->view('forms/Costumers/formFindCostumer');
		if($view == 'editUser')
			$this->load->view('forms/Costumers/formUpdateUser',array_merge($data,$imagen));
		if($view == 'tableUser')
			$this->load->view('tables/Costumers/tableDataListUsers',$data);
	}
	
	function get_paises(){
		if (isset($_GET['term'])){
			$q = strtolower($_GET['term']);
			$this->CM->get_pais($q);
		}
	}
	/*
	 * devuelve las empresas
	 * para crear un listbox
	 * @return JSON
	 */
	public function getEmpresas()
	{
		$retorno = $this->CM->getEmpresas();
		echo json_encode($retorno);
	}
	
	/* devuelve los paises
	* para crear un listbox
	* @return JSON
	*/
	public function getPaises()
	{
		$retorno = $this->CM->getPaises();
		echo json_encode($retorno);
	}
	
	/**
	 * crear nueva empresa
	 */
	//nomEmpresa+'/'+nombreCom+'/'+diremp+'/'+ciudademp+'/'+faxemp+'/'+telemp+'/'+paisemp+'/'+correoemp+'/'+ruc
	public function createBusiness($nom1,$nom2,$dir,$ciu,$fax,$tel,$pais,$correo,$ruc)
	{
		$nom1 = rawurldecode($nom1);
		$nom2 = rawurldecode($nom2);
		$dir = rawurldecode($dir);
		$ciu = rawurldecode($ciu);
		
		
		$data = array(
				'nombrecomercial' => $nom2 ,
				'nombrelegal' => $nom1 ,
				'direccion' => $dir,
				'ciudad' => $ciu,
				'fax' => $fax,
				'telefono' => $tel,
				'idpais' => $pais,
				'correo' => $correo,
				'ruc' => $ruc
		);
		// devuelve el id generado de la nueva empresa
		$retorno = $this->CM->createBusiness($data);
		echo $retorno;
	}
	/**
	 * crea nuevo cliente
	 * @param unknown $cedula
	 * @param unknown $password
	 * @param unknown $email
	 * @param unknown $nombre
	 * @param unknown $apellido
	 * @param unknown $fecha
	 * @param unknown $tel
	 * @param unknown $cel
	 * @param unknown $pais
	 * @param unknown $postal
	 * @param unknown $empresa
	 */
	public function createCostumer($cedula,$password,$email,$nombre,$apellido,$fecha,$tel,$cel,$pais,$postal,$empresa)
	{
		$email = rawurldecode($email);
		$nombre = rawurldecode($nombre);
		$apellido = rawurldecode($apellido);
		$fecha = rawurldecode($fecha);
		if($empresa == "") $empresa = 0;
		
		$data = array(
				'password' => $password ,
				'email' => $email ,
				'nombre' => $nombre,
				'apellido' => $apellido,
				'cedula' => $cedula,
				'fecha_nac' => $fecha,
				'telefono' => $tel,
				'celular' => $cel,
				'idpais' => $pais,
				'ap_postal' => $postal,
				'tipoUser' => '1000' //cliente
		);
		$retorno = $this->CM->createCostumer($data,$empresa);
		echo $retorno;
	}
	/*
	 * Busca los clientes según criterio (id,cedula,nombre,email)
	 *  q = texto de busqueda o id
	 */
	public function findCostumer($criteria,$q)
	{
		$data['USER']=$this->CM->findUser($criteria,$q);
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
	public function updateCostumer($id,$cedula,$email,$nombre,$apellido,$resetPass,$fecha,$tel,$cel,$pais,$postal)
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
					'fecha_nac' => $fecha,
					'telefono' => $tel,
					'celular' => $cel,
					'idpais' => $pais,
					'ap_postal' => $postal,
					'password' => sha1('123456')
			);
		}
		
		else if($resetPass == 'false')
		{
			$data = array(
					'email' => $email ,
					'nombre' => $nombre,
					'apellido' => $apellido,
					'cedula' => $cedula,
					'fecha_nac' => $fecha,
					'telefono' => $tel,
					'celular' => $cel,
					'idpais' => $pais,
					'ap_postal' => $postal
			);
		}
			
	
		$retorno = $this->UM->updateUser($id,$data);
		echo $retorno;
	}
}