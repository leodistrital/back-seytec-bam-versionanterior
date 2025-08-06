<?php
include('includes/consultaPartipantes.php');
$sumaPaso=intval(217+11);
?>
<!--Form-->
<section id="mainForm" class="contForm">
	<form id="formInsParticipante" method="POST" enctype="multipart/form-data" >
		<div class="gCenter">
			<div class="titleForm">
				<h2>Participant Details <em>/ Información del Participante</em></h2>
				<p class="noteRequired"><span>*</span> Mandatory / <em>Obligatorio</em></p>
			</div>
			<fieldset>
				<p>This information concerns the invited participant at BIFF / <em>Esta información corresponde al Participante invitado ante el BIFF</em></p>
				<div class="gCol col2">
					<div>
						<p>
							<label class="gLabel required">
								<input type="text" name="nom_par" id="nom_par" value="<?=$nom_par?>">
								<span class="label"><strong>Name</strong> <br><em>Nombre</em></span>
							</label>
						</p>
					</div>
					<div>
						<p>
							<label class="gLabel">
								<input type="text" name="com_par" id="com_par" value="<?=$com_par?>">
								<span class="label"><strong>Company name</strong> <br><em>Compañía</em></span>
							</label>
						</p>
					</div>
				</div>
				<div class="gCol col2">
					<div>
						<p>
							<label class="gLabel required">
								<input type="text" name="tit_par" id="tit_par" value="<?=$tit_par?>">
								<span class="label"><strong>Title</strong> <br><em>Cargo</em></span>
							</label>
						</p>
					</div>
					<div>
						<p>
							<label class="gLabel required">
								<input type="email" name="email_par" id="email_par" value="<?=$email_par?>">
								<span class="label"><strong>Email</strong> <br><em>Correo electrónico</em></span>
							</label>
						</p>
					</div>
				</div>
				<div class="gCol col2">
					<div>
						<p>
							<label class="gLabel required">
								<input type="text" name="dir_par" id="dir_par" value="<?=$dir_par?>">
								<span class="label"><strong>Address</strong> <br><em>Dirección</em></span>
							</label>
						</p>
					</div>
					<div>
						<p>
							<label class="gLabel tSelect required">
								<? combo_evento_where("pais","pais","id_pai","nom_pai_ing",$pais, "value='$pais'", "" ," nom_pai asc ");?>
								<span class="label"><strong>Country</strong> <br><em>País</em></span>
							</label>
						</p>
					</div>
				</div>
				<div class="gCol col2">
					<div>
						<p>
							<label class="gLabel required">
								<input type="text" name="tel_par" id="tel_par" value="<?=$tel_par?>" placeholder="+ (  )">
								<span class="label"><strong>Telephone</strong> <br><em>Teléfono</em></span>
							</label>
						</p>
					</div>
					<div>
						<p>
							<label for="foto" class="gLabel">
								<span class="label static"><strong>Picture</strong> <br><em>Fotografía</em></span>
							</label>
							<input type="file" name="fot_par" id="fot_par" value="<?=$fot_par?>">
						</p>
					</div>
				</div>
				<p>
					<label class="gLabel tSelect required">
						<? combo_parametro("perfil","perfil", $perfil, "");?>
						<span class="label"><strong>Profile</strong> <br><em>Perfil</em></span>
					</label>
				</p>
			</fieldset>
		</div>
		<div class="contBtns">
			<button type="submit" class="gButton">Finish / <em>Finalizar</em></button>
		</div>
		<input type="hidden" name="reg1" id="reg1" value="<?=encode_this_get($sumaPaso)?>">
		<input type="hidden" name="reg2" id="reg2" value="<?=encode_this_get($codigoregistro)?>">
	</form>
</section><!--Form-->
