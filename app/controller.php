<?php
/**
 * Esta clase implementa una serie de métodos públicos, que hemos denominado acciones para indicar que son métodos asociados a URL’s. 
 * En cada una de las acciones se declara un array asociativo con los datos que serán pintados en la plantilla. Pero en ningún caso hay información 
 * acerca de como se pintarán dichos datos. Por otro lado, casi todas las acciones utilizan un objeto de la clase Models para realizar operaciones relativas
 * a la lógica de negocio.
 */
    class controller{
    	public function inicio(){
    		$obtenerDatos = array(
				'fecha' => date('d/m/Y H:i'),
			);
			
			require __DIR__ . '/templates/inicio.php';
    	}
		
		//CONTACTOS
		public function listarContacto()
		{
			$m = new model(config::$mvc_db_name, config::$mvc_db_user,
						config::$mvc_db_pass, config::$mvc_db_hostname);
						
			$obtenerDatosContactos = array(
				'contactos' => $m->obtenerContactos(),
			); 
			
			require __DIR__ . '/templates/mostrarContactos.php';
		}
		
		public function verContacto(){
			if(!isset($_GET['idContact'])){
				throw new Exception("Página no encontrada", 1);
			}
			
			$IdContacto = $_GET['idContact'];
			
			$m = new model(config::$mvc_db_name, config::$mvc_db_user,
						config::$mvc_db_pass, config::$mvc_db_hostname);
			
			$detalleContacto = $m->obtenerContacto($IdContacto);
			
			$obtenerDatosContacto = $detalleContacto;
			
			require __DIR__ . '/templates/verContacto.php';
			
		}
		
		public function insertarContacto(){
			
			$parametrosContactos = array(
				'idCont' => '',
				'nombre' => '',
				'app' => '',
				'apm' => '',
				'area' => '',
				'movil' => '',
				'tel_ofi' => '',
				'tel_emer' => '',
				'correoPers' => '',
				'correoInsti' => '',
				'RSFacebook' => '',
				'RSTwitter' => '',
				'RSSkype' => '',
				'pagWeb' => '',
			);
			
			$m = new model(config::$mvc_db_name, config::$mvc_db_user,
						config::$mvc_db_pass, config::$mvc_db_hostname);
			
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			
				if($m->registrarContacto($_POST['idContact'],$_POST['nameContact'],$_POST['ApPContact'],$_POST['ApMContact'],$_POST['nameArea'],$_POST['telMovil'],$_POST['telOficina'],
						$_POST['telEmergencia'],$_POST['emailPersonal'],$_POST['emailInstitucional'],$_POST['redSocialF'],$_POST['redSocialT'],$_POST['redSocialS'],
						$_POST['webPage'])){
							header('Location: index.php?url=listContact');
				} else {
						$parametrosContactos = array(
						'idCont' => $_POST['idContact'],
						'nombre' => $_POST['nameContact'],
						'app' => $_POST['ApPContact'],
						'apm' => $_POST['ApMContact'],
						'area' => $_POST['nameArea'],
						'movil' => $_POST['telMovil'],
						'tel_ofi' => $_POST['telOficina'],
						'tel_emer' => $_POST['telEmergencia'],
						'correoPers' => $_POST['emailPersonal'],
						'correoInsti' => $_POST['emailInstitucional'],
						'RSFacebook' => $_POST['redSocialF'],
						'RSTwitter' => $_POST['redSocialT'],
						'RSSkype' => $_POST['redSocialS'],
						'pagWeb' => $_POST['webPage'],
					);
					$parametrosContactos['mensaje'] = 'Error al registrar contactos. Revise el formulario';
				}
			}
			
			require __DIR__.'/templates/insertarContacto.php';
		}
		
		/* CODIGOS POSTALES */
		public function listarCodPost()
		{
			$m = new model(config::$mvc_db_name, config::$mvc_db_user,
						config::$mvc_db_pass, config::$mvc_db_hostname);
						
			$obtenerDatos = array(
				'codigos_postales' => $m->obtenerCodigosPostales(),
			);
			
			require __DIR__ . '/templates/mostrarCodigosPostales.php';
		}
			
		public function verCodPost()
		{				
			if (!isset($_GET['idCP'])) {
				throw new Exception("Página no encontrada", 1);
			}
			
			
			$idCodPost = $_GET['idCP'];
			//$idCodPost = Encrypter::decrypt("$idCodigoPostal");
			
			$m = new model(config::$mvc_db_name, config::$mvc_db_user,
						config::$mvc_db_pass, config::$mvc_db_hostname);
						
			$codPost = $m->obtenerCodigoPostal($idCodPost);
			
			$obtenerDatos = $codPost;
			
			require __DIR__ . '/templates/verCodigoPostal.php';
		}
    
		public function insertarCodPost()
		{
			
			require __DIR__ . '/templates/________';
		}
		
		public function buscarCodPost()
		{
			
			require __DIR__ . '/templates/________';
		}
}
?>