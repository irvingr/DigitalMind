<!-- Insertar Contacto -->
<?php ob_start() ?>

	<?php if (isset($parametrosContactos['mensaje'])) :?>
		<b><span style="color: red;"><?php echo $parametrosContactos['mensaje'] ?></span></b>
	<?php endif; ?>
	 <br/>
	 <!-- Style CSS valid & invalid-->
        <link href="<?php echo 'css/'.config::$style_valid_invalid_css ?>" rel="stylesheet" />
        
     <!-- CSS -->
        <link rel="stylesheet" href="css/fancybox/jquery.fancybox-buttons.css">
        <link rel="stylesheet" href="css/fancybox/jquery.fancybox.css">

	<!-- Grab Google CDN's jQuery, fall back to local if offline -->
 		<script>window.jQuery || document.write('<script src="js/fancybox/libs/jquery-1.7.1.min.js"><\/script>')</script>
    
	<!-- FancyBox -->
		<script src="js/fancybox/jquery.fancybox.js"></script>
	 	
	<div class="rowSam">
		<h1><br />Nuevo Contacto</h1>
		<div class="fondo">&nbsp;* Información requerida</div>
		<br />
		<div class="col-xs-pull-3 col-md-offset-0">	
			<form action="index.php?url=insertContact" method="POST" id="formContact" target="_self">
				<ul class="nav-tabs">
					<dt>Datos Contacto</dt>
					<dd>
						<ul>
							<li> <!-- IdContacto -->  <input type="hidden" name="idContact" value="<?php echo $parametrosContactos['idCont']  ?>" readonly /> </li>
							<li><label>Nombre</label><input type="text" name="nameContact" id="nomCont" autocomplete="off" required="required" maxlength="50" pattern="|^[a-zA-Z ñÑáéíóúÁÉÍÓÚüÜ]*$|" value="<?php echo $parametrosContactos['nombre'] ?>" onChange="conMayusculas(this)" /><span style="color: red;"><b>&nbsp;*</b></span></li>
							<li><label>Apellido Paterno</label><input type="text" name="ApPContact" autocomplete="off" required="required" maxlength="50" pattern="|^[a-zA-Z ñÑáéíóúÁÉÍÓÚüÜ]*$|"value="<?php echo $parametrosContactos['app'] ?>" onChange="conMayusculas(this)" /><span style="color: red;"><b>&nbsp;*</b></span></li>
							<li><label>Apellido Materno</label><input type="text" name="ApMContact" autocomplete="off" required="required" maxlength="50" pattern="|^[a-zA-Z ñÑáéíóúÁÉÍÓÚüÜ]*$|" value="<?php echo $parametrosContactos['apm'] ?>" onChange="conMayusculas(this)" /><span style="color: red;"><b>&nbsp;*</b></span></li>
							<li><label>Área</label><input type="text" name="nameArea" autocomplete="off" required="required" maxlength="50" pattern="|^[a-zA-Z ñÑáéíóúÁÉÍÓÚüÜ]*$|" value="<?php echo $parametrosContactos['area'] ?>" onChange="conMayusculas(this)" /><span style="color: red;"><b>&nbsp*</b></span></li>
							<li><label>Teléfono Móvil</label><input type="text" id="tel" class="keysNumbers" name="telMovil" autocomplete="off" required="required" maxlength="10" pattern="[0-9]{10}" value="<?php echo $parametrosContactos['movil'] ?>" /><span style="color: red;"><b>&nbsp;*</b></span></li>
							<?php if($parametrosContactos['whatsAppC'] == "No") :?>
								<li>
									<?php $valorTrue = "Si" ?>
									<strong>¿Utilizas <img src="images/whatsapp.png" title="WhatsApp"/>?</strong>
									<input type="radio" name="whatsappMovil" value="<?php echo $valorTrue ?>"/>Si
									<input type="radio" name="whatsappMovil" value="<?php echo $parametrosContactos['whatsAppC'] ?>" checked="checked"/>No
								</li>
							<?php else :?>
								<li>
									<?php $valorFalse = "No" ?>
									<strong>¿Utilizas <img src="images/whatsapp.png" title="WhatsApp"/>?</strong>
									<input type="radio" name="whatsappMovil" value="<?php echo $parametrosContactos['whatsAppC'] ?>" checked="checked"/>Si
									<input type="radio" name="whatsappMovil" value="<?php echo $valorFalse ?>"/>No
								</li>
							<?php endif; ?>
							<li><label>Extensión</label><input type="text" id="tel" class="keysNumbers" name="extC" autocomplete="off" required="required" maxlength="3" pattern="[0-9]{3}" value="<?php echo $parametrosContactos['ext'] ?>" /><span style="color: red;"><b>&nbsp;*</b></span></li>
							<li><label>Teléfono Oficina</label><input type="text" id="tel" class="keysNumbers" name="telOficina" autocomplete="off" required="required" maxlength="10" pattern="[0-9]{10}" value="<?php echo $parametrosContactos['tel_ofi'] ?>" /><span style="color: red;"><b>&nbsp;*</b></span></li>
							<?php if($parametrosContactos['tel_emer'] != 0) :?>
								<li><label>Teléfono Emergencia</label><input type="text" id="tel" class="keysNumbers" name="telEmergencia" autocomplete="off" maxlength="10" pattern="[0-9]{10}" value="<?php echo $parametrosContactos['tel_emer'] ?>" />&nbsp;&nbsp;&nbsp;</li>
							<?php else :?>
								<?php $parametrosContactos['tel_emer'] = "" ?>
								<li><label>Teléfono Emergencia</label><input type="text" id="tel" class="keysNumbers" name="telEmergencia" autocomplete="off" maxlength="10" pattern="[0-9]{10}" value="<?php echo $parametrosContactos['tel_emer'] ?>" />&nbsp;&nbsp;&nbsp;</li>
							<?php endif; ?>
							<li><label>Correo Personal</label><input type="email" name="emailPersonal" autocomplete="off" required="required" maxlength="50" placeholder="nombre@ejemplo.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?php echo $parametrosContactos['correoPers'] ?>" /><span style="color: red;"><b>&nbsp;*</b></span></li>
							<li><label>Correo Institucional</label><input type="email" name="emailInstitucional" autocomplete="off" maxlength="50" placeholder="nombre@ejemplo.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?php echo $parametrosContactos['correoInsti'] ?>" />&nbsp;&nbsp;&nbsp;</li>
							<li><label>Facebook </label><input type="text" name="redSocialF" autocomplete="off" maxlength="20" pattern="^[a-z\d\.]{5,}$" value="<?php echo $parametrosContactos['RSFacebook'] ?>" />&nbsp;&nbsp;&nbsp;</li>
							<li><label>Twitter</label><input type="text" name="redSocialT" autocomplete="off" maxlength="20" value="<?php echo $parametrosContactos['RSTwitter'] ?>" />&nbsp;&nbsp;&nbsp;</li>
							<li><label>Skype</label><input type="text" name="redSocialS" autocomplete="off" maxlength="20" value="<?php echo $parametrosContactos['RSSkype'] ?>" />&nbsp;&nbsp;&nbsp;</li>
							<li><label>Página Web</label><input type="url" name="webPage" autocomplete="off" maxlength="30" placeholder="http://www.ejemplo.com" value="<?php echo $parametrosContactos['pagWeb'] ?>" />&nbsp;&nbsp;&nbsp;</li>
							<br />
						</ul>
					</dd>
				</ul>
				
				<ul class="nav-tabs">
					<dt>Datos Dirección Física</dt>
					<dd>
						<ul>
							<li><!-- IdDirección --><input type="hidden"  name="idAddress" value="<?php echo $parametrosContactos['idDir'] ?>" readonly /></li>
							<li>
								<label>Estado</label>
								<select name="idEstado" id="state" required="required" >
									<?php if($parametrosContactos['nomEstado'] == "") :?>
										<option value="" disabled="disabled">Seleccione estado</option>
										<?php foreach ($parametrosContactos['stateID'] as $estado) :?>
											<option value="<?php echo $estado['id_estado'] ?>"><?php echo $estado['estado'] ?></option>
										<?php endforeach; ?>
									<?php else :?>
										<option value="<?php echo $parametrosContactos['stateID'] ?>"><?php echo $parametrosContactos['nomEstado'] ?></option>
										<?php foreach ($parametrosContactos['estados'] as $estado) :?>
											<option value="<?php echo $estado['id_estado'] ?>"><?php echo $estado['estado'] ?></option>
										<?php endforeach; ?>
									<?php endif; ?>
								</select>
								<span style="color: red;"><b>*</b></span>
							</li>
							<li>
								<label>Municipio</label>
								<?php if($parametrosContactos['nomMunicipio'] == "") :?>
									<select name="municipio" id="municipio" required="required" disabled="disabled" onchange="ValidarMunicipio();">
										
									</select>
								<?php else :?>
									<select name="municipio" id="municipio" required="required" disabled="disabled" onchange="ValidarMunicipio();">
										<option value="<?php echo $parametrosContactos['nomMunicipio'] ?>"><?php echo $parametrosContactos['nomMunicipio'] ?></option>
										<?php foreach ($parametrosContactos['municipios'] as $nameMunicipality) : ?>
												<option value="<?php echo $nameMunicipality['municipio'] ?>"> <?php echo $nameMunicipality['municipio'] ?> </option> ?>
										<?php endforeach; ?>
									</select>
								<?php endif; ?>
								<span style="color: red;"><b>*</b></span>
							</li>
							<li><a href="#loc" id="segundaPantallaLocalidad" class="fancybox"><input type="button" name="btnGetLocality" value="Obtener Localidad" id="btnLoc" disabled="true" class="btn-primary"/></a></li>
							
							<div id="datosLoc">
							<?php if(isset($parametrosContactos['idcp'])) :?>
								<?php if($parametrosContactos['idcp'] != 0) :?>							
									
										<li>
											<!-- IdCodigoPostal --><input type="text" name="idcp-locality" id="icp" readonly="readonly" value="<?php echo $parametrosContactos['idcp'] ?>"/>
										</li>
										<li>
											<label>Localidad</label><input type="text" name="loc" id="locEvent" readonly="readonly" class="desabilitar" value="<?php echo $parametrosContactos['nameLocality'] ?>"/>
											&nbsp;&nbsp;&nbsp;
										</li>
										<li>
											<label>Código Postal</label><input type="text" name="cp" readonly="readonly" class="desabilitar" value="<?php echo $parametrosContactos['codigoPos'] ?>"/>
											&nbsp;&nbsp;&nbsp;
										</li>
									
								<?php endif; ?>
							<?php endif; ?>
							</div>
							
							<!-- 
							<li>
								<?php if($parametrosContactos['nameLocality'] == "") :?>
									<div id="result" ></div>
								<?php else :?>
									<div id="result">
										<?php if($parametrosContactos['localidades'] == NULL) :?>
											<pre><center><table><tr><td><span class="span">Ingresa una localidad valida</span></td></tr></table></center></pre>
										<?php else :?>
											<table class="table" id="miTabla">
												<tr>
													<th>Estado</th>
													<th>Municipio</th>
													<th>Localidad</th>
													<th>CP</th>
													<th>Elegir</th>
												</tr>
												
												<?php foreach ($parametrosContactos['localidades'] as $Dir) : ?>
													<tr>
														<td><?php echo $Dir['estado'] ?></td>
														<td><?php echo $Dir['municipio'] ?></td>
														<td><?php echo $Dir['localidad'] ?></td>
														<td><?php echo $Dir['codigoP'] ?></td>
														<?php if($Dir['id_cp'] == $parametrosContactos['idCP']) :?>
															<td><input type="radio" name="idcp-locality" checked="checked" value="<?php echo $Dir['id_cp'] ?>"/></td>
														<?php else :?>
															<td><input type="radio" name="idcp-locality" value="<?php echo $Dir['id_cp'] ?>"/></td>
														<?php endif; ?>
													</tr>
												<?php endforeach; ?>
											</table>
										<?php endif; ?>
									</div>
								<?php endif; ?>
							</li> -->
							<li><label>Calle</label><input type="text" name="street" autocomplete="off" required="required" maxlength="50" value="<?php echo $parametrosContactos['calleD'] ?>" onChange="conMayusculas(this)" /><span style="color: red;"><b>&nbsp;*</b></span></li>
							<li><label>Número Exterior</label><input type="text" class="keysNumbers" name="numExt" autocomplete="off" required="required" maxlength="5" value="<?php echo $parametrosContactos['numExterior'] ?>" /><span style="color: red;"><b>&nbsp;*</b></span></li>
							<?php if($parametrosContactos['numInterior'] != 0) :?>
								<li><label>Número Interior</label><input type="text" class="keysNumbers" name="numInt" autocomplete="off" maxlength="5" value="<?php echo $parametrosContactos['numInterior'] ?>" />&nbsp;&nbsp;&nbsp;</li>
							<?php else :?>
								<?php $parametrosContactos['numInterior']  = "" ?>
								<li><label>Número Interior</label><input type="text" class="keysNumbers" name="numInt" autocomplete="off" maxlength="5" value="<?php echo $parametrosContactos['numInterior'] ?>" />&nbsp;&nbsp;&nbsp;</li>			
							<?php endif; ?>
							<li><label>Colonia</label><input type="text" name="colonia" autocomplete="off" required="required" maxlength="50" value="<?php echo $parametrosContactos['coloniaD'] ?>" onChange="conMayusculas(this)" /><span style="color: red;"><b>&nbsp;*</b></span></li>
							<li><label>Referencia</label><input type="text" name="reference" autocomplete="off" value="<?php echo $parametrosContactos['referenciaD'] ?>" onChange="conMayusculas(this)" />&nbsp;&nbsp;&nbsp;</li>
							<br />
						</ul>
					</dd>
				</ul>
				
				<!-- Botones -->
				<input type="submit" class="boton2" value="Guardar" name="btnGuardar" />
				&nbsp;&nbsp;
				<a href="index.php?url=listContact" title="Regresar" onclick="return confirm('¿Desea salir antes de guardar?');">
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
		
		// $(document).ready(function() {
		    // $('.keysNumbers').keypress(function(tecla) {
		       // if(tecla.charCode < 48 || tecla.charCode > 57) return false;
		   // });
		// });
// 		
		// function conMayusculas(field) {
			// field.value = field.value.toUpperCase()
		// }
		
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
		        // $("#datosLoc").css("display", "none");
		    });
		});
		
		function ValidarMunicipio() {
		    if (int('#municipio').val() != "") {
		    	int("#btnLoc").removeAttr('disabled');
		        // $("#icp").val("");
		        // $("#locEvent").val("");
		    }
		    else {
		        int('#municipio').removeAttr('disabled');
		        int("#datosLoc").css("display", "none");
		        int("#btnLoc").attr('disabled','disabled');
		    }
		   
		}
		
		int(document).ready(function(){
			int("#btnLoc").click(function () {
				var estad = int("#state").val();
				var municipi = int("#municipio").val();
				int("#segundaPantallaLocalidad").fancybox();
				int("#loc").load('index.php?url=enviarEstadMunici&est='+estad+'&mun='+municipi);
			});
		});
		
	</script>
	
<?php $contenido = ob_get_clean() ?>

<?php include '../app/templates/layout_second.php' ?>