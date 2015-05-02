<!--  ventana emergente-->

<?php $IDestado = $obtenerDatosEstaMunci['IDstate'] ?>
<?php $nomMunicipio = $obtenerDatosEstaMunci['nameMunicipality'] ?>
<center>
	
	<h1 class="azul"><br />Localidad</h1>
		
	<form action="" method="POST" id="formLocality" target="_self">
		<table>
			<tr> <td>  <input type="text" name="stado" value="<?php echo $IDestado ?>"/>  </td> </tr>
			<tr> <td>  <input type="text" name="municip" value="<?php echo $nomMunicipio ?>"/>  </td> </tr>
			<tr> <td>  <input type="text" name="localidad" autofocus="autofocus" id="localidad" autocomplete="off" placeholder="Ingresa localidad" maxlength="50"  /> </td> </tr>
		</table>
		<br />
	</form>
	
	<div id="result"></div>
</center>

<script type="text/javascript">	
	$(function () {
		$('#localidad').keyup(
			function () {
				formLoc = this.form;
				$('#result').load('index.php?url=viewDirLocality&',$(formLoc).serialize());
				
			}
		);
	});
</script>

