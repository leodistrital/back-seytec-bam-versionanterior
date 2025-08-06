<?php 

//print_r($datauser);
// echo $datauser['formPart'];
// echo '++++++';

//complete

if($datauser['formPart']!=2){ ?>
<div class="numPaso">
    <ul>
        <li class="<?=$paso == 1 ? 'actual' : ''; ?> <?=$datauser['divpaso1'] == 1 ? 'complete' : ''; ?>">
            <a href="/panel/acreditacion/1" class="icoCircle">1</a>
        </li>
        <li class="<?=$paso == 2 ? 'actual' : ''; ?> <?=$datauser['divpaso2'] == 1 ? 'complete' : ''; ?>">
            <a href="/panel/acreditacion/2" class="icoCircle">2</a>
        </li>
        <li class="<?=$paso == 3 ? 'actual' : ''; ?> <?=$datauser['divpaso3'] == 1 ? 'complete' : ''; ?>">
            <a href="/panel/acreditacion/3" class="icoCircle">3</a>
        </li>
        <li class="<?=$paso == 4 ? 'actual' : ''; ?> <?=$datauser['divpaso4'] == 1 ? 'complete' : ''; ?>">
            <a href="/panel/acreditacion/4" class="icoCircle">4</a>
        </li>
        <li class="<?=$paso == 5 ? 'actual' : ''; ?>">
            <a href="/panel/acreditacion/5" class="icoCircle">5</a>
        </li>
    </ul>
</div>
<?php } else { ?>
<div class="numPaso">



    <ul>
        <li class="<?=$paso == 1 ? 'actual' : ''; ?> <?=$datauser['divpaso1'] == 1 ? 'complete' : ''; ?>">
            <a href="/panel/acreditacion/1" class="icoCircle">1</a>
        </li>
        <li class="<?=$paso == 2 ? 'actual' : ''; ?> <?=$datauser['divpaso2'] == 1 ? 'complete' : ''; ?>">

            <a href="/panel/acreditacion/2" class="icoCircle">2</a>
        </li>

        <li class="<?=$paso == 4 ? 'actual' : ''; ?> <?=$datauser['divpaso4'] == 1 ? 'complete' : ''; ?>">

            <a href="/panel/acreditacion/4" class="icoCircle">3</a>
        </li>
        <li class="<?=$paso == 5 ? 'actual' : ''; ?>">
            <a href="/panel/acreditacion/5" class="icoCircle">4</a>
        </li>
    </ul>
</div>
<?php } ?>