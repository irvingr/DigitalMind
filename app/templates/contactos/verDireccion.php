<?php if (isset($obtenerDatosDir[0]['codigoP'])) :?>
	<table class="table" id="miTabla">
			<tr>
				<th>Estado</th>
				<th>Municipio</th>
				<th>Localidad</th>
			</tr>
			
			<tr>
				<td><?php echo $codPost[0]['estado'] ?></td>
				<td><?php echo $codPost[0]['municipio'] ?></td>
				<td>
					<select id="loc" name="locality" >
						<option value='0'>Seleccione una Opción</option>
						<?php foreach ($obtenerDatosDir as $locality) : ?>
								<option required='required' value="<?php echo $locality['id_cp'] ?>"> <?php echo $locality['localidad'] ?> </option>"; ?>
								<!--<input type="text" value="<?php echo $locality['id_cp'] ?>" />-->
						<?php endforeach; ?>
					</select>
				</td>
			</tr>
<?php endif ?>
