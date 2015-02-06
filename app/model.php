<?php
    /**
     * Modelo
     */
    class model {
        protected $conexion;
        
        public function __construct($dbname,$dbuser,$dbpass,$dbhost) {
            $mvc_db_conexion = mysql_connect($dbhost, $dbuser, $dbpass);
			
			if (!$mvc_db_conexion) {
				die('Error al realizar la conexión con la base de datos: ' . mysql_error());
			}
			mysql_select_db($dbname, $mvc_db_conexion);
			
			mysql_set_charset('utf8');
			
			$this->conexion = $mvc_db_conexion;
        }
		
		public function bd_conexion()
		{
			
		}
		
		//CONTACTOS
		public function obtenerContactos(){
			$consulta = "SELECT id_contacto,nombreCon,ap_paterno,ap_materno,nombre_area,movil,tel_oficina,correo_instu FROM contacto ORDER BY nombreCon;";
			$ejecutar = mysql_query($consulta,$this->conexion) or die (mysql_error());
			
			$Contactos = array();
			while($rows = mysql_fetch_assoc($ejecutar)){
				$Contactos[] = $rows;
			}
			
			return $Contactos;
		}
		
		public function obtenerContacto($idCon)
		{
			$idCon = htmlspecialchars($idCon);
			
			$consulta = "SELECT * FROM contacto WHERE id_contacto = ".$idCon;
			$ejecutar = mysql_query($consulta, $this->conexion);
			
			$contactl= array();
			$rows = mysql_fetch_assoc($ejecutar);
			
			return $rows;
		}
		
		public function obtenerIdContacto($idCo){
			$consulta = "SELECT id_contacto FROM contacto ORDER BY id_contacto DESC LIMIT 1;";
			$ejecutar = mysql_query($consulta,$this->conexion) or die (mysql_error());
			$filas = mysql_num_rows($ejecutar);
			
			if($filas==0){
				$idCo = 1;
			}else	{
				$idCo = mysql_result($ejecutar,0,'id_contacto');
				$idCo = $idCo+1;
			}
			
			return $idCo;
		}
		
		public function registrarContacto($nomCont,$apCont,$amCont,$areaCont,$telMovilCont,$telOficinaCont,$telEmergenciaCont,$correoPersonalCont,
		$correoInstituCont,$facebookCont,$twitterCont,$skypeCont,$dirWebCont)
		{
			//Convertir a mayúsculas
			$nomCont = mb_strtoupper($nomCont);
			$apCont = mb_strtoupper($apCont);
			$amCont = mb_strtoupper($amCont);
			$areaCont = mb_strtoupper($areaCont);
			//Convertir a minúsculas
			$correoPersonalCont = mb_strtolower($correoPersonalCont);
			$correoInstituCont = mb_strtolower($correoInstituCont);
			$facebookCont = mb_strtolower($facebookCont);
			$twitterCont = mb_strtolower($twitterCont);
			$skypeCont = mb_strtolower($skypeCont);
			$dirWebCont = mb_strtolower($dirWebCont);
			
			$consulta = "INSERT INTO contacto (nombreCon,ap_paterno,ap_materno,nombre_area,fecha_alta,movil,tel_oficina,tel_emergencia,correo_p,
								correo_instu,facebook,twitter,skype,direccion_web)
								VALUES ('".$nomCont."','".$apCont."','".$amCont."','".$areaCont."',NOW(),".$telMovilCont.",".$telOficinaCont.",".$telEmergenciaCont.",'".$correoPersonalCont."',
								'".$correoInstituCont."','".$facebookCont."','".$twitterCont."','".$skypeCont."','".$dirWebCont."');";
			$ejecutar = mysql_query($consulta,$this->conexion) or die (mysql_error());
			
			return $ejecutar;
		}

		public function validarDuplicidadContactos($nomCont,$apCont,$amCont,$idCont){
			$consulta = "SELECT id_contacto,nombreCon,ap_paterno,ap_materno 
								FROM contacto 
								WHERE nombreCon = '".$nomCont."' 
									AND ap_paterno = '".$apCont."' 
									AND ap_materno = '".$amCont."' 
									AND id_contacto != ".$idCont.";";
			$ejecutar = mysql_query($consulta,$this->conexion) or die (mysql_error());
			
			$rows = mysql_num_rows($ejecutar);
			
			return $rows;
		}
		
		//CODIGOS POSTALES
		public function obtenerCodigosPostales()
		{
			$consulta = "SELECT * FROM codigos_postales WEHERE ORDER BY id_cp LIMIT 250;";
			$ejecutar = mysql_query($consulta, $this->conexion) or die(mysql_error());
			
			$codigosPostales = array();
			while ($rows = mysql_fetch_assoc($ejecutar)) {
				$codigosPostales[] = $rows;
			}
			
			return $codigosPostales;
		}
		
		public function obtenerCodigoPostal($idCp)
		{
			$idCp = htmlspecialchars($idCp);
			
			$consulta = "SELECT * FROM codigos_postales WHERE id_cp = ".$idCp;
			$ejecutar = mysql_query($consulta, $this->conexion);
			
			$codigoPostal= array();
			$rows = mysql_fetch_assoc($ejecutar);
			
			return $rows;
		}
		/*---------------------------------------------CLIENTES-------------------------------------------*/
		/*Consulta para el listado de clientes*/
		public function obtieneClientes()
		{
			$consultaC = "SELECT c.`id_cliente`,c.`nombre`,df.`razon_social`,df.`rfc`,d.`id_cp`,cp.`municipio`,cp.`estado`,c.`activo`
			FROM datos_fiscales df,clientes c,direcciones d,codigos_postales cp
			WHERE df.`id_datFiscal`=c.`id_datFiscal`
			AND d.`id_direccion`=c.`id_direccion`
			AND cp.`id_cp`=d.`id_cp`
			ORDER BY  id_cliente";
			$ejecutarC = mysql_query($consultaC, $this->conexion);
			
			$Clientes = array();
			while ($rows = mysql_fetch_assoc($ejecutarC)) {
				$Clientes[] = $rows;
			}
			
			return $Clientes;  
			}

		/*Consulta para el detalle_ Cliente*/
		public function  obtieneVcliente($cv_cli)
		{
			$cv_cli = htmlspecialchars($cv_cli);
			$consultaC = "SELECT c.`id_cliente`,c.`nombre`,c.`fecha_alta`,df.`id_datFiscal`,df.`razon_social`,df.`rfc`,df.`id_tipo_ra`,d.`id_direccion`,
			d.`id_cp`,cp.`municipio`,cp.`codigoP`,cp.`localidad`,cp.`estado`,tr.`tipo`,dir.`id_direccion`,dir.`calle`,dir.`num_ext`,
			dir.`num_int`,dir.`colonia`,dir.`referencia`,con.`id_contacto`,con.`nombreCon`,con.`ap_paterno`,con.`ap_materno`,con.`nombre_area`,con.`correo_instu`,
			con.`movil`,con.`tel_oficina`,db.`id_datBank`,db.`sucursal`,db.`titular`,db.`no_cuenta`,db.`no_cuenta_interbancario`,b.`nombre_banco`,tc.`tipo_cuenta`

			FROM datos_fiscales df,clientes c,direcciones d,codigos_postales cp,tipos_razon_social tr,direcciones dir,contacto con,
			cliente_contacto cc,datos_bancarios db,det_bank_cli ddb,bancos b,tipo_cuenta tc

			WHERE df.`id_datFiscal`= c.`id_datFiscal`
			AND d.`id_direccion`= c.`id_direccion`
			AND tr.`id_tipo_ra`= df.`id_tipo_ra`
			AND dir.`id_direccion` = c.`id_direccion`
			AND c.`id_cliente` = cc.`id_cliente`
			AND con.`id_contacto` = cc.`id_contacto`
			AND db.`id_datBank` = ddb.`id_datBank`
			AND c.`id_cliente` = ddb.`id_cliente`
			AND b.`id_banco` = db.`id_banco`
			AND tc.`id_tipo_cuenta` = db.`id_tipo_cuenta`
			AND cp.`id_cp`= d.`id_cp` AND c.`id_cliente` = ".$cv_cli;
			$ejecutarC = mysql_query($consultaC, $this->conexion);
			$Cliente= array();
			$rows = mysql_fetch_assoc($ejecutarC);
			return $rows;
		}

		/*obtiene id del cliente para insercion*/
		public function id_incremento($cv_cli)
		{
			$sql="SELECT id_cliente FROM clientes ORDER BY id_cliente DESC LIMIT 1";
			$consulta=mysql_query($sql)or die ("Error de Consulta-IncrementUser");
			$filas=mysql_num_rows($consulta);
			$cv_cli=mysql_result($consulta,0,'id_cliente');
			$cv_cli=($cv_cli + 1);
			return $cv_cli;
		}
		//obtiene id de datos fiscales insercion
		public function incrementodFiscal($cv_dfiscal)
		{
			$sql="SELECT id_datFiscal FROM datos_fiscales ORDER BY id_datFiscal DESC LIMIT 1";
			$consulta=mysql_query($sql)or die ("Error de Consulta-Increment-Dfiscales");
			$filas=mysql_num_rows($consulta);
			$cv_dfiscal=mysql_result($consulta,0,'id_datFiscal');
			$cv_dfiscal=($cv_dfiscal + 1);
			return $cv_dfiscal;
		}

		//obtiene id direccion para insercion
		public function incrementoDir($cv_dir)
		{			
			$sql="SELECT id_direccion FROM direcciones ORDER BY id_direccion DESC LIMIT 1";
			$consulta=mysql_query($sql)or die ("Error de Consulta-Increment-Dir");
			$filas=mysql_num_rows($consulta);
			$cv_dir=mysql_result($consulta,0,'id_direccion');
			$cv_dir=($cv_dir + 1);
			return $cv_dir;
		}

		//combo dinamico para tipo de razon_social (FISICA,MORAL)
		public function obtieneTrazon()
    	{
    		$sql3 = "SELECT * FROM tipos_razon_social";
			$ejecutar = mysql_query($sql3)or die ("Error de Consulta-razonS");

			$tipoRa = array();
			while ($rows = mysql_fetch_assoc($ejecutar)) {
				$tipoRa[] = $rows;
			}
			
			return $tipoRa;
		}

		/*id para insercion */
		public function incrementoDB($cv_db)
		{			
			$sql="SELECT id_datBank FROM datos_bancarios ORDER BY id_datBank DESC LIMIT 1";
			$consulta=mysql_query($sql)or die ("Error de Consulta-Increment-DatBank");
			$filas=mysql_num_rows($consulta);
			$cv_db=mysql_result($consulta,0,'id_datBank');
			$cv_db=($cv_db + 1);
			return $cv_db;
		}
		//elimiancion de cliente
		public function elimCliente($del_cli)
		{
		
		$band = 0;
			if ($band==0) {
				
				$sql = "SELECT dbc.`id_cliente`,dbc.`id_bank_bcl`,dbc.`id_datBank`
				FROM  clientes c,det_bank_cli dbc
				WHERE c.`id_cliente`= dbc.`id_cliente`
				AND dbc.`id_cliente`  = $del_cli";				
				$ejecutar =mysql_query($sql) or die (mysql_error());				
				$filas = mysql_num_rows($ejecutar);				
				if($filas!=0){
					$band =1;
						$sqlDes = "UPDATE `clientes` SET  `activo` = 'No' WHERE `id_cliente` = $del_cli";
						$ejecutarDes = mysql_query($sqlDes) or die (mysql_error());
						echo" <script> alert('El registro no puede ser eliminado, solo se desactivo') 
						window.location='index.php?url=listaCliente';
				 		</script> ";

						}else{
					//elimi
					$sqlEl = "DELETE FROM clientes WHERE id_cliente = $del_cli ";
					$ejecutarEl = mysql_query($sqlEl) or die (mysql_error());
					echo" <script> alert('El registro ha sido eliminado correctamente') 
						window.location='index.php?url=listaCliente';
				 	</script> ";

				}
			}

		}
		
		//combo dinamico para nombre de banco
		public function obtieneBanco()
    	{
    		$sql = "SELECT * FROM bancos";
			$ejecutar = mysql_query($sql) or die ("Error de Consulta");

			$nombreB = array();
			while ($rows = mysql_fetch_assoc($ejecutar)) {
				$nombreB[] = $rows;
			}
			
			return $nombreB;
		}

		//combo dinamico para el tipo de cuenta
		public function obtieneTipoC()
    	{
    		$sql = "SELECT * FROM tipo_cuenta";
			$ejecutar = mysql_query($sql) or die ("Error de Consulta");

			$tipo_c = array();
			while ($rows = mysql_fetch_assoc($ejecutar)) {
				$tipo_c[] = $rows;
			}
			
			return $tipo_c;
		}



		public function busquedaX($busqueda)
		{
		$busqueda = htmlspecialchars($busqueda);
		//print($busqueda);
         $sql = "SELECT * FROM clientes where nombre LIKE '%".$busqueda."%' OR activo LIKE '%".$busqueda."%' OR fecha_alta LIKE '%".$busqueda."%'";

         $result = mysql_query($sql, $this->conexion);

         $cliente_result = array();
         while ($row = mysql_fetch_assoc($result))
         {
             $cliente_result[] = $row;
         }

         return $cliente_result;
		 }
    }
    
?>