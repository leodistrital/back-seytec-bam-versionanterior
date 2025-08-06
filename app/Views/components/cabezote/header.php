<div id="pageLoading"></div>
<!--Page Header-->
<header class="pageHeader">
    <div class="maxW">
        <!--Logo Page-->
        <div class="logoPage">
            <h1>
                <a href="/">
                    <span class="gHidden">Bogotá Audiovisual Market</span>
                    <img src="/images/site/logo-BAM.svg" alt="Bogotá Audiovisual Market">
                </a>
            </h1>
        </div>
        <!--End Logo Page-->
        <button type="button" id="btnMMenu" class="btnMMenu"><span class="box"><span
                    class="inner"></span></span></button>

        <!--Content Menu-->
        <div class="cMHeader">
            <!--Main Menu-->
            <nav class="mainMenu">
                <h2 class="gHidden">Menu principal</h2>
                <?php
                echo $this->include("components/cabezote/page-menu"); ?>
            </nav>
            <!--End Main Menu-->

            <!--Extra Menu-->
            <div class="extraMH">
                <ul>
                    <li class="fechas"> <?= view_cell('\App\Libraries\ViewSitio::getLeyendaHeader') ?> </li>
                    <li>

                        <?= view_cell('\App\Libraries\ViewSitio::getRedes') ?>
                    </li>
                    <li>
                        <?= view_cell('\App\Libraries\ViewSitio::getBotonAcreditacion') ?>

                    </li>
                    <!-- <li><a href="#" class="gBtn small bg2 btnIdi"><span>English</span></a></li> -->
                </ul>
                <?php if (!empty($_SESSION['username'])) {
                    echo  view_cell('\App\Libraries\ViewSitio::getCuenta');
                } else {
                    echo  view_cell('\App\Libraries\ViewSitio::getLogin');
                }

                ?>
            </div>
            <!--End Extra Menu-->
        </div>
        <!--End Content Menus-->
    </div>
</header>
<!--End Page Header-->