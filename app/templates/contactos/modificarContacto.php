<!-- Modificar Contacto -->
<?php ob_start() ?>
	<?php $obtenerDatosContacto['id_contacto'] ?>
	
	<?php if (isset($parametrosContactos['mensaje'])) :?>
		<b><span style="color: red;"><?php echo $parametrosContactos['mensaje'] ?></span></b>
	<?php endif; ?>
	 <br/>
	 <!-- Style CSS valid & invalid-->
        <link href="<?php echo 'css/'.config::$style_valid_invalid_css ?>" rel="stylesheet" />
	 		
	<!-- CSS FancyBox-->
        <link rel="stylesheet" href="css/fancybox/jquery.fancybox-buttons.css">
        <link rel="stylesheet" href="css/fancybox/jquery.fancybox.css">

	<!-- Grab Google CDN's jQuery, fall back to local if offline -->
 		<script>window.jQuery || document.write('<script src="js/fancybox/libs/jquery-1.7.1.min.js"><\/script>')</script>
    
	<!-- FancyBox -->
		<script src="js/fancybox/jquery.fancybox.js"></script>
	
	<div class="rowSam">
		<h1><br />Editar Contacto</h1>
		<div class="fondo">&nbsp;* Información requerida</div>
		<br />
		<div class="col-xs-pull-3 col-md-offset-0">
			<?php echo"<form action='index.php?url=updateContact&idContact=".$obtenerDatosContacto['id_contacto']."' method='POST' id='formContact' target='_self' >"; ?>
				<ul class="nav-tabs">
					<dt>Datos Contacto</dt>
					<dd>
						<ul>
							<li> <!-- IdContacto -->  <input type="hidden" name="idContact" value="<?php echo $obtenerDatosContacto['id_contacto']  ?>" readonly /> </li>
							<li><label>Nombre</label><input type="text" name="nameContact" autofocus="autofocus" autocomplete="off" required="required" maxlength="50"  pattern="|^[a-zA-Z ñÑáéíóúÁÉÍÓÚüÜ]*$|" value="<?php echo $obtenerDatosContacto['nombreCon'] ?>" onChange="conMayusculas(this)" /><span style="color: red;"><b>&nbsp;*</b></span></li>
							<li><label>Apellido Paterno</label><input type="text" name="ApPContact" autocomplete="off" required="required" maxlength="50" pattern="|^[a-zA-Z ñÑáéíóúÁÉÍÓÚüÜ]*$|"  value="<?php echo $obtenerDatosContacto['ap_paterno'] ?>" onChange="conMayusculas(this)" /><span style="color: red;"><b>&nbsp;*</b></span></li>
							<li><label>Apellido Materno</label><input type="text" name="ApMContact" autocomplete="off" required="required" maxlength="50" pattern="|^[a-zA-Z ñÑáéíóúÁÉÍÓÚüÜ]*$|" value="<?php echo $obtenerDatosContacto['ap_materno'] ?>" onChange="conMayusculas(this)"/><span style="color: red;"><b>&nbsp;*</b></span></li>
							<li><label>Área</label><input type="text" name="nameArea" autocomplete="off" required="required" maxlength="50" pattern="|^[a-zA-Z ñÑáéíóúÁÉÍÓÚüÜ]*$|" value="<?php echo $obtenerDatosContacto['nombre_area'] ?>" onChange="conMayusculas(this)" /><span style="color: red;"><b>&nbsp*</b></span></li>
							<li><label>Teléfono Móvil</label><input type="text" id="tel" class="keysNumbers" name="telMovil" autocomplete="off" required="required" maxlength="10" pattern="[0-9]{10}" value="<?php echo $obtenerDatosContacto['movil'] ?>" /><span style="color: red;"><b>&nbsp;*</b></span></li>
							<?php if($obtenerDatosContacto['whatsapp'] == "No") :?>
								<li>
									<?php $valorTrue = "Si" ?>
									<strong>¿Utilizas <img src="images/whatsapp.png" title="WhatsApp"/>?</strong>
									<input type="radio" name="whatsappMovil" value="<?php echo $valorTrue ?>"/>Si
									<input type="radio" name="whatsappMovil" value="<?php echo $obtenerDatosContacto['whatsapp'] ?>" checked="checked"/>No
								</li>
							<?php else :?>
								<li>
									<?php $valorFalse = "No" ?>
									<strong>¿Utilizas <img src="images/whatsapp.png" title="WhatsApp"/>?</strong>
									<input type="radio" name="whatsappMovil" value="<?php echo $obtenerDatosContacto['whatsapp'] ?>" checked="checked"/>Si
									<input type="radio" name="whatsappMovil" value="<?php echo $valorFalse ?>"/>No
								</li>
							<?php endif; ?>
							<li><label>Extensión</label><input type="text" id="tel" class="keysNumbers" name="extC" autocomplete="off" required="required" maxlength="3" pattern="[0-9]{3}" value="<?php echo $obtenerDatosContacto['extension'] ?>" /><span style="color: red;"><b>&nbsp;*</b></span></li>
							<li><label>Teléfono Oficina</label><input type="text" id="tel" class="keysNumbers" name="telOficina" autocomplete="off" required="required" maxlength="10" pattern="[0-9]{10}" value="<?php echo $obtenerDatosContacto['tel_oficina'] ?>" /><span style="color: red;"><b>&nbsp;*</b></span></li>
							<?php if($obtenerDatosContacto['tel_emergencia'] != 0) :?>
								<li><label>Teléfono Emergencia</label><input type="text" id="tel" class="keysNumbers" name="telEmergencia" autocomplete="off" maxlength="10" pattern="[0-9]{10}" value="<?php echo $obtenerDatosContacto['tel_emergencia'] ?>" />&nbsp;&nbsp;&nbsp;</li>
							<?php else :?>
								<?php $obtenerDatosContacto['tel_emergencia'] = ""; ?>
								<li><label>Teléfono Emergencia</label><input type="text" id="tel" class="keysNumbers" name="telEmergencia" autocomplete="off" maxlength="10" pattern="[0-9]{10}" value="<?php echo $obtenerDatosContacto['tel_emergencia'] ?>" />&nbsp;&nbsp;&nbsp;</li>
							<?php endif; ?>
							<li><label>Correo Personal</label><input type="email" name="emailPersonal" autocomplete="off" required="required" maxlength="50" placeholder="nombre@ejemplo.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?php echo $obtenerDatosContacto['correo_p'] ?>" /><span style="color: red;"><b>&nbsp;*</b></span></li>
							<li><label>Correo Institucional</label><input type="email" name="emailInstitucional" autocomplete="off" maxlength="50" placeholder="nombre@ejemplo.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?php echo $obtenerDatosContacto['correo_instu'] ?>" />&nbsp;&nbsp;&nbsp;</li>
							<li><label>Facebook </label><input type="text" name="redSocialF"  autocomplete="off" maxlength="20" pattern="^[a-z\d\.]{5,}$" value="<?php echo $obtenerDatosContacto['facebook'] ?>" />&nbsp;&nbsp;&nbsp;</li>
							<li><label>Twitter</label><input type="text" name="redSocialT" autocomplete="off" maxlength="20" value="<?php echo $obtenerDatosContacto['twitter'] ?>" />&nbsp;&nbsp;&nbsp;</li>
							<li><label>Skype</label><input type="text" name="redSocialS"  autocomplete="off" maxlength="20" value="<?php echo $obtenerDatosContacto['skype'] ?>" />&nbsp;&nbsp;&nbsp;</li>
							<li><label>Página Web</label><input type="url" name="webPage"  autocomplete="off" maxlength="30" placeholder="http://www.ejemplo.com" value="<?php echo $obtenerDatosContacto['direccion_web'] ?>" />&nbsp;&nbsp;&nbsp;</li>
							<!-- <?php if ($obtenerDatosContacto['activo'] == "Si") :?> -->
								<!-- <li class="li_radio" >
									<label>Activo</label>
									<input type="radio" name="activoC" value="Si" checked  /> Si
									<input type="radio" name="activoC" value="No" /> No
								</li> -->
							<!-- <?php else :?> -->
								<!-- <li class="li_radio" >
									<label>Activo</label>
									<input type="radio" name="activoC" value="Si" /> Si
									<input type="radio" name="activoC" value="No" checked /> No
								</li> -->
							<!-- <?php endif; ?> -->
							<br />
						</ul>
					</dd>
				</ul>
					
				<ul class="nav-tabs">
					<dt>Datos Dirección Física</dt>
						<dd>
							<ul>
								<li><!-- IdDirección --><input type="hidden"  name="idAddress" value="<?php echo $obtenerDatosContacto['id_direccion'] ?>" readonly /></li>
								<!--===================== Estado =====================-->
								<?php if(!isset($obtenerDatosContacto['estadoAfter'])) :?>
									<li>
										<label>Estado</label>
										<select name="idEstado" id="state" required='required'>
											<?php if($obtenerDatosContacto['estado'] != "") :?>
												<option value="<?php echo $obtenerDatosContacto['id_estado'] ?>"><?php echo $obtenerDatosContacto['estado'] ?></option>
												<?php foreach ($obtenerDatosDir['estados'] as $estado) :?>
													<option value="<?php echo $estado['id_estado'] ?>"><?php echo $estado['estado'] ?></option>
												<?php endforeach; ?>
											<?php endif; ?>
										</select>
										<span style="color: red;"><b>*</b></span>
									</li>
								<?php else :?>
									<li>
										<label>Estado</label>
										<select name="idEstado" id="state" required='required'>
											<?php if($obtenerDatosContacto['estadoAfter'] == "") :?>
												<option value="" disabled="disabled">Seleccione estado</option>
												<?php foreach ($obtenerDatosContacto['id_estado'] as $estado) :?>
													<option value="<?php echo $estado['id_estado'] ?>"><?php echo $estado['estadoAfter'] ?></option>
												<?php endforeach; ?>
											<?php else :?>
												<option value="<?php echo $obtenerDatosContacto['id_estado'] ?>"><?php echo $obtenerDatosContacto['estadoAfter'] ?></option>
												<?php foreach ($obtenerDatosContacto['estados'] as $estado) :?>
													<option value="<?php echo $estado['id_estado'] ?>"><?php echo $estado['estado'] ?></option>
												<?php endforeach; ?>
											<?php endif; ?>
										</select>
										<span style="color: red;"><b>*</b></span>
									</li>
								<?php endif; ?>
								<!--===================== Municipio =====================-->
								<?php if(!isset($obtenerDatosContacto['municipioAfter'])) :?>
									<li>
										<label>Municipio</label>
										<?php if($obtenerDatosContacto['municipio'] != "") :?>
											<select name="municipio" id="municipio" required='required' onchange="ValidarMunicipio();">
												<option value="<?php echo $obtenerDatosContacto['municipio'] ?>"><?php echo $obtenerDatosContacto['municipio'] ?></option>
												<?php foreach ($obtenerDatosDir['municipios'] as $nameMunicipality) : ?>
														<option value="<?php echo $nameMunicipality['municipio'] ?>"> <?php echo $nameMunicipality['municipio'] ?> </option> ?>
												<?php endforeach; ?>
											</select>
										<?php endif; ?>
										<span style="color: red;"><b>*</b></span>
									</li>

									<li>
										<?php if($obtenerDatosContacto['municipio'] == "") :?>
											<a href="#loc" id="segundaPantallaLocalidad" class="fancybox">
												<input type="button" name="btnGetLocality" value="Obtener Localidad" id="btnLoc" disabled="true" class="btn-primary"/>
											</a>
										<?php else :?>
											<a href="#loc" id="segundaPantallaLocalidad" class="fancybox">
												<input type="button" name="btnGetLocality" value="Obtener Localidad" id="btnLoc" class="btn-primary"/>
											</a>
										<?php endif; ?>
									</li>
								<?php else :?>
									<li>
										<label>Municipio</label>
										<?php if($obtenerDatosContacto['municipioAfter'] == "") :?>
											<select name="municipio" id="municipio" required='required' disabled="disabled" onchange="ValidarMunicipio();">
												
											</select>
										<?php else :?>
											<select name="municipio" id="municipio" required='required' onchange="ValidarMunicipio();">
												<option value="<?php echo $obtenerDatosContacto['municipioAfter'] ?>"><?php echo $obtenerDatosContacto['municipioAfter'] ?></option>
												<?php foreach ($obtenerDatosContacto['municipios'] as $nameMunicipality) : ?>
														<option value="<?php echo $nameMunicipality['municipio'] ?>"> <?php echo $nameMunicipality['municipio'] ?> </option> ?>
												<?php endforeach; ?>
											</select>
										<?php endif; ?>
										<span style="color: red;"><b>*</b></span>
									</li>

									<li>
										<?php if($obtenerDatosContacto['municipioAfter'] == "") :?>
											<a href="#loc" id="segundaPantallaLocalidad" class="fancybox">
												<input type="button" name="btnGetLocality" value="Obtener Localidad" id="btnLoc" disabled="true" class="btn-primary"/>
											</a>
										<?php else :?>
											<a href="#loc" id="segundaPantallaLocalidad" class="fancybox">
												<input type="button" name="btnGetLocality" value="Obtener Localidad" id="btnLoc" class="btn-primary"/>
											</a>
										<?php endif; ?>
									</li>
								<?php endif; ?>
								
								<div id="datosLoc">
									<?php if(isset($obtenerDatosContacto['id_cp'])) :?>
										<?php if($obtenerDatosContacto['id_cp'] != 0) :?>							
											
												<li>
													<!-- IdCodigoPostal --><input type="hidden" name="idcp-locality" id="icp" readonly="readonly" value="<?php echo $obtenerDatosContacto['id_cp'] ?>"/>
												</li>
												<li>
													<label>Localidad</label><input type="text" name="loc" id="locEvent" readonly="readonly" class="desabilitar" value="<?php echo $obtenerDatosContacto['localidad'] ?>"/>
													&nbsp;&nbsp;&nbsp;
												</li>
												<li>
													<label>Código Postal</label><input type="text" name="cp" id="cpEvent" readonly="readonly" class="desabilitar" value="<?php echo $obtenerDatosContacto['codigoP'] ?>"/>
													&nbsp;&nbsp;&nbsp;
												</li>
											
										<?php endif; ?>
									<?php endif; ?>
								</div>
							<li><label>Calle</label><input type="text" name="street" autocomplete="off" required="required" maxlength="50" value="<?php echo $obtenerDatosContacto['calle'] ?>" onChange="conMayusculas(this)" /><span style="color: red;"><b>&nbsp;*</b></span></li>
							<li><label>Número Exterior</label><input type="text" class="keysNumbers" name="numExt" autocomplete="off" required="required" maxlength="5" value="<?php echo $obtenerDatosContacto['num_ext'] ?>"  /><span style="color: red;"><b>&nbsp;*</b></span></li>
							<?php if($obtenerDatosContacto['num_int'] != 0) :?>
								<li><label>Número Interior</label><input type="text" class="keysNumbers" name="numInt" autocomplete="off" maxlength="5" value="<?php echo $obtenerDatosContacto['num_int'] ?>" />&nbsp;&nbsp;&nbsp;</li>
							<?php else :?>
								<?php $obtenerDatosContacto['num_int'] = "" ?>
								<li><label>Número Interior</label><input type="text" class="keysNumbers" name="numInt" autocomplete="off" maxlength="5" value="<?php echo $obtenerDatosContacto['num_int'] ?>" />&nbsp;&nbsp;&nbsp;</li>
							<?php endif; ?>
							<li><label>Colonia</label><input type="text" name="colonia" autocomplete="off" required="required" maxlength="50" value="<?php echo $obtenerDatosContacto['colonia'] ?>" onChange="conMayusculas(this)" /><span style="color: red;"><b>&nbsp;*</b></span></li>
							<li><label>Referencia</label><input type="text" name="reference" autocomplete="off" value="<?php echo $obtenerDatosContacto['referencia'] ?>" onChange="conMayusculas(this)" />&nbsp;&nbsp;&nbsp;</li>
							<br />
						</ul>
					</dd>
				</ul>
						
				<!-- Botones -->
				<input type="submit" class="boton2" value="Actualizar" name="btnActualizar" id="btnActualizar"/>
				&nbsp;&nbsp;
				<a href="index.php?url=listContact" title="Regresar" onclick="return confirm('¿Desea salir antes de actualizar?');">
					<input type="button" class="boton2" value="Cancelar" />
				</a>
									
			</form>
			
			<!--  ventana emergente-->
			<div style="display: none;">
				<div id="loc" style="width:900px; height:500px; overflow:hidden;">
					
				</div>
			</div>
		</div>
	</div>
					
	<script type="text/javascript">
		var int = jQuery.noConflict();
		
		<!--Script listas desplegables-->
		
		int(document).ready(function(){
		   int("dd").hide();
			int("dt").css({
			'cursor':'pointer'});
			int("dt").click(function(event){
				var desplegable = int(this).next();
				int('dd').not(desplegable).slideUp('fast');
				desplegable.slideToggle('fast');
				event.preventDefault();
				int("#nomCont").focus();
			})
		});
		
		int(document).ready(function() {
		    int('.keysNumbers').keypress(function(tecla) {
		       if(tecla.charCode < 48 || tecla.charCode > 57) return false;
		   });
		});
		
		function conMayusculas(field) {
			field.value = field.value.toUpperCase()
		}
		
		int(function () {
		    int('#state').change(function () {
		        if (int(this).val() != "") {
		            int('#municipio').removeAttr('disabled');
		            int('#municipio').load('index.php?url=viewMunicipality&state=' + this.options[this.selectedIndex].value);
		            if(int('#municipio').val("")){
		        		int("#btnLoc").attr('disabled','disabled');
		       		}
		        }else {
		            int('#municipio').attr('disabled','disabled').val("");
		            int("#btnLoc").attr('disabled','disabled');
		        }
		        int("#datosLoc").css("display", "none");
		        int("#icp").val("");
		        int("#locEvent").val("");
		        int("#cpEvent").val("");
		    });
		});
		
		function ValidarMunicipio() {
		    if (int('#municipio').val() != "") {
		    	int("#btnLoc").removeAttr('disabled');
		    }
		    else {
		        int('#municipio').removeAttr('disabled');
		        int("#datosLoc").css("display", "none");
		        int("#btnLoc").attr('disabled','disabled');
		    }
		   int("#datosLoc").css("display", "none");
		   int("#icp").val("");
		   int("#locEvent").val("");
		   int("#cpEvent").val("");
		}
		
		int(function () {
			int("#btnLoc").click(
				function () {
					formContact = this.form;
					int("#segundaPantallaLocalidad").fancybox();
					int('#loc').load('index.php?url=enviarEstadMunici&',int(formContact).serialize());
				}
			);
		});
	</script>
	
<?php $contenido = ob_get_clean() ?>

<?php include '../app/templates/layout_second.php' ?>