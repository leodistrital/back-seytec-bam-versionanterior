  <div class="sectExtraInt nop">
      <div class="maxW">
          <div class="listRegiones bg2">
              <div class="listR">
                  <article class="iRegiones">
                      <h2>¿Quiénes pueden participar?</h2>
                      <div class="gListRegiones">
                          <?php foreach ($listaparticipantes as $participantes) :  ?>
                          <article class="itemSRegion">
                              <div>
                                  <figure class="gImg">
                                      <img src="<?=$participantes['img_par']?>">
                                  </figure>
                                  <header class="gDesc">
                                      <h2><?=$participantes['tit_par']?></h2>
                                      <h3><?=$participantes['des_par']?></h3>
                                  </header>
                              </div>
                          </article>
                          <?php endforeach;  ?>
                      </div>
                  </article>
              </div>
          </div>
      </div>
  </div>