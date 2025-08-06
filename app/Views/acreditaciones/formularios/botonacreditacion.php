<?php if (!empty($_SESSION['username'])) { ?>
<a href="#" class="gBtn small" id="botonocultamuestra" value="Mostrar div"><span>Mi
        cuenta</span></a>
<?php } else { ?>
<a href="#" class="gBtn small" id="botonocultamuestra" value="Mostrar div">
    <span>Ingresar a BAM
    </span>
</a>
<?php } ?>