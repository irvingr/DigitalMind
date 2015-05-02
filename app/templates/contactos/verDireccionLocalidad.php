<!-- Ver dirección según la localidad -->
<?php if (isset($obtenerDatosDireccion[0]['localidad'])) :?>
	<div style="width:850px; height:350px; overflow-y: scroll; ">
		<table class="table" id="miTabla">
			<tr>
				<th>Estado</th>
				<th>Municipio</th>
				<th>Localidad</th>
				<th>CP</th>
				<th>Elegir</th>
			</tr>
			
			<?php foreach ($obtenerDatosDireccion as $Dir) : ?>
				<div style="">
					<tr>
						<td><?php echo $Dir['estado'] ?></td>
						<td><?php echo $Dir['municipio'] ?></td>
						<td><?php echo $Dir['localidad'] ?></td>
						<td><?php echo $Dir['codigoP'] ?></td>
						<td>
							<!-- boton borrar -->
							<form action='' method = 'POST' enctype='application/x-www-form-urlencoded' id='formAdd' target='_self'>
							<!-- input hidden-->
							<input type="hidden" name="idcp_loc" value="<?php echo $Dir['id_cp'] ?>"/>
							<input type="hidden" name="txtLoc" value="<?php echo $Dir['localidad'] ?>"/>
							<input type="hidden" name="txtCp" value="<?php echo $Dir['codigoP'] ?>"/>
							<!-- Botón -->
							<input type="button" name="btnAdd" class="addLoc" value="Agregar" onClick="$.fancybox.close();">
							</form>
						</td>
					</tr>
				</div>
			<?php endforeach; ?>
		</table>
	</div>
<?php endif ?>

<script type="text/javascript">
	$(function () {
		$('.addLoc').click(
			function () {
				formLoc = this.form;
				$('#datosLoc').load('index.php?url=enviarLocality&',$(formLoc).serialize());
				$("#datosLoc").css("display", "block");
			}
		);
	});
</script>