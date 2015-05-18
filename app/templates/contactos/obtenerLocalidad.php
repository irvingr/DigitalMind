<!--  ventana emergente-->

<?php $IDestado = $obtenerDatosEstaMunci['IDstate'] ?>
<?php $nomMunicipio = $obtenerDatosEstaMunci['nameMunicipality'] ?>
<center>
	
	<h1 class="azul"><br />Localidad</h1>
		
	<form action="" method="POST" id="formLocality" target="_self">
		<table>
			<tr> <td>  <input type="hidden" name="stado" value="<?php echo $IDestado ?>"/>  </td> </tr>
			<tr> <td>  <input type="hidden" name="municip" value="<?php echo $nomMunicipio ?>"/>  </td> </tr>
			<tr> <td>  <input type="text" name="localidad" id="localidad" autocomplete="off" placeholder="Ingresa localidad" maxlength="50"  /> </td> </tr>
		</table>
		<br />
	</form>
	
	<div id="result"></div>
</center>

<script type="text/javascript">
	var lo = jQuery.noConflict();
	
	lo(document).ready(function() {
	   lo("#localidad").focus();
	});
	
	lo(function () {
		lo('#localidad').keyup(
			function () {
				formLo = this.form;
				lo('#result').load('index.php?url=viewDirLocality&',lo(formLo).serialize());
				
			}
		);
	});	
</script>

