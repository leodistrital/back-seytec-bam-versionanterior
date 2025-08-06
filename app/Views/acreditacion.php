<?php
echo $this->include("components/cabezote/head");
echo $this->include('components/cabezote/header');
?>
<?php
echo $this->include("components/internas/banner_interno");
?>
<section class="gMSection_interna">
    <div class="maxW">

        <div class="contIntern">
            <div class="gContent">
                <div class="topInfo">
                    <h2 class="gTitle">Formulario de acreditación</h2>
                    <p class="gIntro">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eu fermentum
                        enim. Phasellus mattis libero ut eleifend lacinia. Vestibulum eget volutpat ligula, nec
                        venenatis justo. Phasellus sit amet dictum erat. Sed id ex orci. Donec vestibulum metus sed
                        lacus auctor, vel vulputate eros fringilla. Vivamus ornare purus accumsan, mollis lacus sed,
                        varius dolor. Fusce consequat orci quis leo pellentesque, a eleifend orci faucibus. Ut vehicula
                        dictum ex vitae porttitor. Morbi est mi, posuere et elit non, imperdiet ornare mi. Maecenas eu
                        interdum ipsum, eu interdum leo.
                        <br><br>Vivamus tincidunt in massa sit amet efficitur. Integer nisl erat, scelerisque et
                        tincidunt ut, faucibus sit amet purus. Suspendisse ex arcu, ornare id bibendum placerat, dapibus
                        a enim. Cras mattis et eros eget efficitur. Sed lorem magna, volutpat pulvinar mattis vitae,
                        suscipit a urna. Etiam interdum faucibus ipsum, non ultricies nunc molestie sed. Sed ornare,
                        velit ut sagittis congue, magna ipsum fermentum justo, ut tincidunt ipsum justo sit amet metus.
                        Vestibulum quis eleifend felis. Aliquam ipsum sapien, tincidunt vitae sapien vitae, blandit
                        facilisis.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php
    //echo $this->include("components/internas/contenido");
    if($paso==1){
        echo $this->include("acreditaciones/formularios/paso1");
    }
    if($paso==2){
        echo $this->include("acreditaciones/formularios/paso2");
    }
    if($paso==3){
        echo $this->include("acreditaciones/formularios/paso3");
    }
   
    ?>
</section>
<?php
echo $this->include('components/footer/foot.php');
?>