<?php
if (isset($codigoRegion)) 
    echo ''; 
else 
$codigoRegion=0;

?>
<!--Extra-->
<div class="sectExtra nop">
    <div class="maxW">
        <div class="listReg">
            <div class="listR">
                <article class="iReg">
                    <ul>
                        <?php foreach ($regioneslista as $region) :  ?>
                        <li
                            class="<?=$region['vencido']?>  <?php  if($region['cod_reg']==$codigoRegion)  echo 'active';  else  echo '';  ?>">
                            <a href="/region/<?=$region['slu_reg']?>">
                                <h2><?=$region['nom_reg'] ?></h2>
                                <h3><?=$region['fec_reg']?></h3>
                            </a>
                        </li>
                        <?php endforeach;  ?>
                    </ul>
                </article>
            </div>
        </div>
    </div>
</div>