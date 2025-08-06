<div class="gLPage"></div>
<!--Page Header-->
<header class="pageHeader">
    <div>
        <h1>
            <a href="index.php">
                <span class="gHidden">RENAULT D-NET</span>
                <img src="/images/site/renault_2021_simbolo.svg" alt="RENAULT D-NET">
            </a>
        </h1>
        <!--Main Menu-->
        <?php  echo ($menusuperior=='nuevo' ?  $this->include('components/menugeneral/menuNuevos') : '' ) ; ?>
        <?php  echo $this->include('components/menugeneral/menuenviapregunta'); ?>
        <?php echo $this->include('components/menugeneral/menuUusuario'); ?>
    </div>
</header>
<!--Fin Page Header-->