 <!-- formulario preguntas interno -->
 <div class="form2-popup" id="preguntas">
     <form action="preguntas.php" class="form2-container">
         <!--img class="form2-img" src="images/site/logo-renault_cab.png" alt="RENAULT-D"-->
         <div class="marcaLoginForm">
             Envía tus dudas y comentarios a través de este formulario, pronto recibirás respuesta via e-mail
         </div>

         <div class="form2-field">
             <label for="psw"><b>Tus datos</b></label>
             <p style="margin: 0px"><input type="text" readonly placeholder="Ingresa tus nombres y apellidos"
                     name="nombre" value=""></p>
             <label for="psw"><b>Concesionario</b></label>
             <p style="margin: 0px"><input type="text" readonly placeholder="Concesionario" name="concesionario"
                     value=""></p>
             <label for="psw"><b>Correo electrónico</b></label>
             <!--input type="text" placeholder="Correo" name="correo"-->
             <p style="margin: 0px"><input type="text" placeholder="Ingresa tu e-mail" name="correo" value=""></p>
         </div>
         <br>
         <div class="form2-field">
             <label for="psw"><b>Tus comentarios</b></label><br>
             <textarea cols="107" rows="10" name="comentarios" spellcheck="true"
                 placeholder="Escribe aquí tus comentarios"></textarea>
             <!--input type="textarea" rows="10" cols="40"  name="comentarios" required-->
         </div>

         <button type="button" class="btn" onclick="sendQuestion(this.form)">Enviar mis comentarios</button>

         <div class="form2-check">
             <input type="checkbox" name="terms" value="true"> Acepto la siguiente política de datos, el tratamiento
             de mis datos y ser contactado con la información que proporciono en este formulario.
         </div>
         <div class="cerrar2">
             <button type="button" class="btn cancel" onclick="closePreg()">X</button>
         </div>
     </form>
 </div>
 <!-- formulario preguntas interno -->