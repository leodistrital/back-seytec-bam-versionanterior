<?php
$tabla = 'paso1';
$edicion = "";
$edicion2 = "";
include('includes/consultaGeneral.php');
$edicion = "class='valid'";
$edicion2 = "valid";
$sumaPaso = intval(217 + 1);

?>
<!--Form-->
<section id="mainForm" class="contForm">
	<form id="formInsFilm1" method="POST" enctype="multipart/form-data">
		<div class="gCenter">
			<div class="titleForm">
				<h2>Film Information <em>/ Información de la Película</em></h2>
				<p class="noteRequired"><span>*</span> Mandatory / <em>Obligatorio</em></p>
			</div>
			<fieldset>


				<div class="gCol col3">
					<div>
						<p>
							<label class="gLabel required">
								<input type="text" name="titori" id="titori" value='<?= $titori ?>' <?= $edicion ?>>
								<span class="label"><strong>Original title</strong> <br><em>Título original</em></span>
							</label>
						</p>
					</div>
					<div>
						<p>
							<label class="gLabel required">
								<input type="text" name="titeng" id="titeng" value='<?= $titeng ?>' <?= $edicion ?>>
								<span class="label"><strong>English title</strong> <br><em>Título en inglés</em></span>
							</label>
						</p>
					</div>
					<div>
						<p>
							<label class="gLabel">
								<input type="text" name="titesp" id="titesp" value='<?= $titesp ?>' <?= $edicion ?>>
								<span class="label"><strong>Spanish title</strong> <br><em>Título en español</em></span>
							</label>
						</p>
					</div>
				</div>


				<div class="gCol col3">
					<div>
						<p>
							<label class="gLabel tSelect required">
								<!--? combo_evento_where("pais", "pais", "id_pai", "nom_pai_ing", $pais, "value='$pais' $edicion", "", " nom_pai asc "); ?-->
								<? combo_evento_where("pais", "pais", "id_pai", "nom_pai_ing", $pais, "value='$pais' $edicion", "", " nom_pai_ing asc "); ?>
								<span class="label" ><strong>Country</strong> <br><em>País</em></span>

							</label>
						</p>
					</div>
					<div class="double">
						<p>
							<label class="gLabel">
								<input type="text" name="paises" id="paises" value='<?= $paises ?>' <?= $edicion ?>>
								<span class="label"><strong>If it's a coproduction, include all the countries involved</strong> <br><em>Si es coproducción, incluya todos los países que aplican</em></span>
							</label>
						</p>
					</div>
				</div>


				<div class="gCol col2">
					<div>
						<p>
							<label class="gLabel required">
								<input type="text" name="dire" id="dire" value='<?= $dire ?>' <?= $edicion ?>>
								<span class="label"><strong>Director</strong> <br><em>Director</em></span>
							</label>
						</p>
					</div>
					<div>
						<p>
							<label class="gLabel tSelect required">
								<? combo_evento_where("yearf", "anos", "num_ano", "num_ano", $yearf, "value='$yearf' $edicion", "", " num_ano desc "); ?>
								<span class="label"><strong>Completion year</strong> <br><em>Año finalización</em></span>	
							</label>
						</p>
					</div>
					<!--div>
						<div>
							<p>
								<label class="gLabel tSelect required">
									<? combo_evento_where("genero1", "generos", "cod_gen", "nom_gen", $genero1, "value='$genero1' $edicion", "", " cod_gen asc "); ?>
									<!-- <input type="text" name="gene" id="gene" value='<?= $gene ?>' <?= $edicion ?>> >
									<span class="label"><strong>Genre</strong> <br><em>Género</em></span>
								</label>
							</p>
						</div>
					</div-->
				</div>


				<div class="gCol col2">
					<!--div>
						<p>
							<label class="gLabel ">
								<? combo_evento_where("genero2", "generos", "cod_gen", "nom_gen", $genero2, "value='$genero2' $edicion", "", " cod_gen asc "); ?>
								<span class="label"><strong>Genre</strong> <br><em>Género</em></span>
							</label>
						</p>
					</div>
					<div>
						<p>
							<label class="gLabel ">
								<? combo_evento_where("genero3", "generos", "cod_gen", "nom_gen", $genero3, "value='$genero3' $edicion", "", " cod_gen asc "); ?>
								<span class="label"><strong>Genre</strong> <br><em>Género</em></span>
							</label>
						</p>
					</div-->
					<div>
						<div>
							<p>
								<label class="gLabel tSelect required">
								<? combo_evento_where("genero1", "generos", "cod_gen", "nom_gen", $genero1, "value='$genero1' $edicion", "", " cod_gen asc "); ?>
									<!-- <input type="text" name="gene" id="gene" value='<?= $gene ?>' <?= $edicion ?>> -->
									<span class="label"><strong>Genre</strong> <br><em>Género</em></span>
								</label>
							</p>
						</div>
					</div>
					<div>
						<p>
							<label class="gLabel">
								<input type="text" name="otro_gene" id="otro_gene" value='<?= $otro_gene ?>' <?= $edicion ?>>
								<span class="label"><strong>Other Genre</strong> <br><em>Otro Género</em></span>
							</label>
						</p>
					</div>
				</div>


				<div class="gCol col2">
					<div>
						<p>
							<label class="gLabel required">
								<textarea name="direbioEn" id="direbioEn" <?= $edicion ?>><?= $direbioEn ?></textarea>
								<span class="label"><strong>Director's Bio in English</strong> <br><em>Biografía del Director en inglés</em></span>
							</label>
						</p>
					</div>
					<div>
						<p>
							<label class="gLabel">
								<textarea name="direbio" id="direbio" <?= $edicion ?>><?= $direbio ?></textarea>
								<span class="label"><strong>Director's Bio in Spanish (1.000 characters)</strong> <br><em>Biografía del Director en español (1.000 caracteres máximo)</em></span>
							</label>
						</p>
					</div>
				</div>
				
				

				<div class="gCol col2">
					<div>
						<p>
							<label class="gLabel required">
								<textarea name="sinoeng" id="sinoeng" <?= $edicion ?>><?= $sinoeng ?></textarea>
								<span class="label"><strong>Synopsis in english (1.000 characters)</strong> <br><em>Sinopsis en Inglés (1.000 caracteres máximo)</em></span>
							</label>
						</p>
					</div>
					<div>
						<p>
							<label class="gLabel">
								<textarea name="sinoesp" id="sinoesp" <?= $edicion ?>><?= $sinoesp ?></textarea>
								<span class="label"><strong>Synopsis in spanish (1.000 characters)</strong> <br><em>Sinopsis en español (1.000 caracteres máximo)</em></span>
							</label>
						</p>
					</div>
				</div>

				<div class="gCol col2">
				<div>
					<p>
						<label class="gLabel required">
							<!--<textarea name="prem" id="prem" <?= $edicion ?>><?= $prem ?></textarea>-->
							<input type="text"  placeholder="Nº 1"  name="premio1" id="premio1" value='<?= $premio1 ?>' <?= $edicion ?>>
							<span class="label"><strong>Festivals and Awards (List them in order of importance) </strong> <br><em>Festivales y Premios (Listarlos en orden de importancia)</em></span>
						</label>
					</p>
				</div>
				<div>
					<p>
						<label class="gLabel required">
							<!--<textarea name="prem" id="prem" <?= $edicion ?>><?= $prem ?></textarea>-->
							<input type="text" placeholder="Nº 2" name="premio2" id="premio2" value='<?= $premio2 ?>' <?= $edicion ?>>
							<!-- <span class="label"><strong>Festivals and Awards (List them in order of importance) </strong> <br><em>Festivales y Premios (Lístelos en orden de importancia)</em></span> -->
						</label>
					</p>
				</div>
			</div>


			<div class="gCol col2">
				<div>
					<p>
						<label class="gLabel required">
							<!--<textarea name="prem" id="prem" <?= $edicion ?>><?= $prem ?></textarea>-->
							<input type="text" placeholder="Nº 3" name="premio3" id="premio3" value='<?= $premio3 ?>' <?= $edicion ?>>
							<!-- <span class="label"><strong>Festivals and Awards (List them in order of importance) </strong> <br><em>Festivales y Premios (Lístelos en orden de importancia)</em></span> -->
						</label>
					</p>
				</div>
				<div>
					<p>
						<label class="gLabel required">
							<!--<textarea name="prem" id="prem" <?= $edicion ?>><?= $prem ?></textarea>-->
							<input type="text" placeholder="Nº 4" name="premio4" id="premio4" value='<?= $premio4 ?>' <?= $edicion ?>>
							<!-- <span class="label"><strong>Festivals and Awards (List them in order of importance) </strong> <br><em>Festivales y Premios (Lístelos en orden de importancia)</em></span> -->
						</label>
					</p>
				</div>	
			</div>


			<div class="gCol col2">
				<div>	
					<p>
						<label class="gLabel required">
							<!--<textarea name="prem" id="prem" <?= $edicion ?>><?= $prem ?></textarea>-->
							<input type="text" placeholder="Nº 5" name="premio5" id="premio5" value='<?= $premio5 ?>' <?= $edicion ?>>
							<!-- <span class="label"><strong>Festivals and Awards (List them in order of importance) </strong> <br><em>Festivales y Premios (Lístelos en orden de importancia)</em></span> -->
						</label>
					</p>
				</div>
				<div>
					<p>
						<label class="gLabel required">
							<!--<textarea name="prem" id="prem" <?= $edicion ?>><?= $prem ?></textarea>-->
							<input type="text" placeholder="Nº 6" name="premio6" id="premio6" value='<?= $premio6 ?>' <?= $edicion ?>>
							<!-- <span class="label"><strong>Festivals and Awards (List them in order of importance) </strong> <br><em>Festivales y Premios (Lístelos en orden de importancia)</em></span> -->
						</label>
					</p>
				</div>
			</div>

				<p>
					<label class="textLabel">
						<strong>Please point out if the screening of the film in the Festival will be any of the following premieres</strong> <br><em>Por favor indique si la proyección de su película en el festival será alguna de las siguientes premieres</em>
					</label>
					<br>
					<label class="gCR">
						World Premiere / <i>Premier mundial</i> <input name="premf" id="wprem" type="radio" value='1' <? if ($prem_fest == 1) echo "checked";
							else echo ""; ?>>
						<span class="icoR"></span>
					</label>
					<label class="gCR">
						International Premiere / <i>Premier internacional</i><input name="premf" id="iprem" type="radio" value='2' <? if ($prem_fest == 2) echo "checked";
							else echo ""; ?>>
						<span class="icoR"></span>
					</label>
					<label class="gCR">
						Latin American Premiere / <i>Premier latinoamericana</i><input name="premf" id="lprem" type="radio" value='3' <? if ($prem_fest == 3) echo "checked";
							else echo ""; ?>>
						<span class="icoR"></span>
					</label>
					<label class="gCR"> 
						Colombian Premiere / <i>Premier colombiana</i><input name="premf" id="cprem" type="radio" value='4' <? if ($prem_fest == 4) echo "checked";
							else echo ""; ?>> 
						<span class="icoR"></span>
					</label>

					<!--NUEVOS valores --->
					<label class="gCR"> 
						Retrospective / <i>Retrospectiva</i><input name="premf" id="rprem" type="radio" value='5' <? if ($prem_fest == 5) echo "checked";
							else echo ""; ?>> 
						<span class="icoR"></span>
					</label>
					<label class="gCR"> 
						Cine Conciertos <input name="premf" id="nprem" type="radio" value='6' <? if ($prem_fest == 6) echo "checked";
							else echo ""; ?>> 
						<span class="icoR"></span>
					</label>
					<!--FIN NUEVOS valores -->
				</p>
			
			</fieldset>
		</div>
		<div class="contBtns">
			<button type="submit" class="gButton">Save and continue / <em>Guardar y continuar</em></button>
		</div>
		<input type="hidden" name="reg1" id="reg1" value="<?= encode_this_get($sumaPaso) ?>">
		<input type="hidden" name="reg2" id="reg2" value="<?= encode_this_get($codigoregistro) ?>">
	</form>
</section><!--Form-->
