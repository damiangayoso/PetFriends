<?php
	$email = $_SESSION["user"]["user_email"];
	$query_pets = 	"SELECT *
					FROM petfriends_db.users as pdb INNER JOIN petfriends_db.pets as pts
					ON pdb.user_id = pts.pet_idUser
					WHERE pdb.user_email = '$email'";
	$consulta_pets = mysqli_query($conexion,$query_pets);
	
	echo '<form method="post" action="/PETFRIENDS/includes/pet_cruce_add.php">	
				<div class="form-group col-md-12">
					<label for="cruce_pet">Seleccione la Mascota:</label>
					<select id="cruce_pet" name="cruce_pet" class="form-control">';
					
	while ($pets = mysqli_fetch_array($consulta_pets)){
	echo '<option value="',$pets["pet_name"],'">',$pets["pet_name"],'</option>';
	}
	
	echo '			</select>
					<p></p>
				</div>	
				<div class="form-group col-md-12">
					<p class="help-block">Una vez finalizado el ingreso, podra ver sus mascotas en la seccion CRUCE DE MASCOTAS.</p>
					<button type="submit" class="btn btn-default" name="add_cruce">Agregar Mascota para Cruce</button>
				</div>
			</form>';
?>