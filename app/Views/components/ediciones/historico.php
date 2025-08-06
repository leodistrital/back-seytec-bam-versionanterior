<div class="maxW">
    <div class="contIntern">
        <div class="gContent">
            <?php foreach ($listaCategorias as $categorias) :  ?>
        <!-- orig     
            <div class="accordion-wrap">
                <div class="accordion-item">-->
            <div class="accordion-wrapVA">
                <div class="accordion-itemVA">
                    <p class="accordion-headerBig">Seleccionados <?=$categorias['nombrecategoria']?>
                        <span class="arrow left"></span>
                    </p>
                </div>
                <div class="accordion-text">
                    <div class="gListMovies">
                        <?php 
                        echo view_cell('App\Controllers\web\Ediciones::seleccionados','categoria='.$categorias['codigoCategoria'].',tipo='.$categorias['tipo']);
                         ?>



                        <!-- <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/filmProjects_2.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>Bienvenidos conquistadores interplanetarios del espacio sideral</h1>
                                    <h2>Andrés JURADO</h2>
                                    <h3>Experimental</h3>
                                    <h3>90 min.</h3>
                                    <h4>La Vulcanizadora</h4>
                                    <a href="resumen-proyecto.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>En los años 60, como parte del entrenamiento para el viaje a la
                                                    luna, los astronautas norteamericanos eran abandonados en las
                                                    selvas tropicales del Darién. En este ejercicio de supervivencia
                                                    Neil Armstrong se encuentra con un nativo, intercambia algunos
                                                    objetos, súbitamente un terror invade su cuerpo. ¿Creía que
                                                    sería decapitado, desollado y comido por un caníbal salvaje?</p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/filmProjects_3.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>Corazón de colibrí</h1>
                                    <h2>Henry RINCÓN</h2>
                                    <h3>Ficción / Drama</h3>
                                    <h3>95 min.</h3>
                                    <h4>Héroe Films</h4>
                                    <a href="resumen-proyecto.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>Lucas Obregón, maestro de humanidades, líder estudiantil y
                                                    apasionado por la poesía, es capturado en medio de una protesta
                                                    social y llevado a prisión. No tomar partido por la sucesión del
                                                    líder del patio, un antiguo militar, lo pondrán entre la vida y
                                                    la muerte. Su refugio es la poesía que lo lleva a los recuerdos
                                                    de su niñez en su natal Chocó y el estudio del código
                                                    penitenciario, que pone a disposición de los reclusos, hecho que
                                                    lo convierte en líder social del penal. Una historia donde la
                                                    poesía une a dos hombres. Una historia donde el perdón y la
                                                    reconciliación toman un nuevo sentido, cuando la víctima y el
                                                    victimario recorren el camino de la amistad, en medio de un país
                                                    envuelto en una profunda guerra.</p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/filmProjects_14.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>El giro del mulato</h1>
                                    <h2>Nina Paola MARÍN DÍAZ</h2>
                                    <h3>Ficción / Comedia</h3>
                                    <h3>110 min.</h3>
                                    <h4>Marines Films</h4>
                                    <a href="resumen-proyecto.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>Óscar es hijo de un migrante italiano que hace 40 años lo
                                                    abandonó. Su deseo es irse a Italia, pero su inseguridad y la
                                                    culpa por dejar a su madre, son obstáculos. Su vida cambia
                                                    cuando llega a su pueblo una joven que comparte el sueño de irse
                                                    a Europa.</p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/filmProjects_4.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>Gloria y el dragón</h1>
                                    <h2>César HEREDIA</h2>
                                    <h3>Ficción / Drama</h3>
                                    <h3>82 min.</h3>
                                    <h4>Gatoencerrado Films</h4>
                                    <a href="resumen-proyecto.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>Gloria, una valiente niña que vive en el Pacífico colombiano,
                                                    emprende un viaje por la selva buscando reencontrarse con su
                                                    padre. Sin embargo, mientras huye de una particular bestia,
                                                    descubre realidades desconocidas de un mundo hostil. Volver a
                                                    ver a su padre no será lo esperado.</p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/filmProjects_5.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>Horizonte</h1>
                                    <h2>César Augusto ACEVEDO</h2>
                                    <h3>Ficción / Drama</h3>
                                    <h3>100 min.</h3>
                                    <h4>Inercia Películas</h4>
                                    <a href="resumen-proyecto.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>Separados en vida por culpa de la violencia, Basilio y su madre
                                                    Inés, comprenden que su reencuentro sólo se debe a que ahora
                                                    están muertos. Pero al no hallar en aquel lugar señales del
                                                    padre desaparecido, deciden partir en su búsqueda, emprendiendo
                                                    un viaje físico y espiritual a través de un paisaje
                                                    completamente devastado por la guerra: con pueblos destruidos,
                                                    campos abandonados, ríos convertidos en cementerios e
                                                    innumerables historias de desolación y muerte. Todo esto
                                                    provocado por Basilio, quien en vida se convirtió en un criminal
                                                    salvaje y que ahora se ve obligado a revivir una y otra vez todo
                                                    el horror de sus actos; pero en esta ocasión, con su madre como
                                                    testigo.</p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/filmProjects_6.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>La cábala del pez</h1>
                                    <h2>Ana Katalina CARMONA</h2>
                                    <h3>Ficción / Drama</h3>
                                    <h3>94 min.</h3>
                                    <h4>Querida Productora</h4>
                                    <a href="resumen-proyecto.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>En las escamas de un pez aparece un número grabado. Como un
                                                    milagro, un pueblo entero gana la lotería con el número del pez.
                                                    Esta es la historia de un triunfo multitudinario visto desde la
                                                    única perdedora del pueblo.</p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/filmProjects_7.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>La suprema</h1>
                                    <h2>Felipe HOLGUÍN CARO</h2>
                                    <h3>Ficción / Drama</h3>
                                    <h3>90 min.</h3>
                                    <h4>Cumbia Films</h4>
                                    <a href="resumen-proyecto.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>En un pueblo borrado de los mapas donde ni siquiera hay
                                                    electricidad, una adolescente sueña con ser boxeadora. Cuando se
                                                    entera que su tío boxeará por el título mundial y el evento será
                                                    transmitido en vivo por televisión, ella y la comunidad harán
                                                    hasta lo imposible para ver la pelea, mientras luchan contra el
                                                    olvido.</p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/filmProjects_8.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>Llueve sobre Babel</h1>
                                    <h2>Gala DEL SOL</h2>
                                    <h3>Ficción / Comedia</h3>
                                    <h3>120 min.</h3>
                                    <h4>Gala del sol</h4>
                                    <a href="resumen-proyecto.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>El mítico bar de esta historia es una torre de Babel roja, el
                                                    ‘purgatorio’ donde se reúnen personajes extraordinarios que no
                                                    encajan en ningún otro lado. En esta Cali de otra dimensión
                                                    cargada de íconos de un ‘retro futurista gótico tropical’
                                                    habitan El Callegüeso, reconocido saxofonista del que pocos
                                                    saben que viaja en el tiempo; Salai, el dueño de Babel. Uma,
                                                    alias Púrpura Profunda, quien siempre lleva un cigarrillo sin
                                                    filtro entre los labios y pasa sus días apostando; Jacob, hijo
                                                    de un pastor cristiano ortodoxo que entra en secreto al mundo
                                                    del vogue… Diferentes historias que se juntan durante el día
                                                    hasta llegar a Babel. Algunos personajes se conocían de antes,
                                                    otros se conocen en esas 24 horas en que transcurre la historia,
                                                    y otros nunca llegan a conocerse.</p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/filmProjects_9.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>Los últimos románticos</h1>
                                    <h2>Diego GONZÁLEZ CRUZ</h2>
                                    <h3>Ficción / Comedia</h3>
                                    <h3>90 min.</h3>
                                    <h4>Corporación Cintadhesiva Comunicaciones</h4>
                                    <a href="resumen-proyecto.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>Zombi es un gótico treintañero que lucha por abrirse camino con
                                                    su banda de “Post Punk” en Cali, una calurosa ciudad tropical
                                                    donde la salsa manda. Momia, el otro integrante de la
                                                    agrupación, es una decrépita leyenda del rock gótico que, sin
                                                    casa y sin dinero, sobrevive con la ayuda de Zombi que lo deja
                                                    dormir a escondidas en el carro de su madre. Ambos deciden
                                                    aceptar la invitación de tocar gratis en un festival de música
                                                    gótica en Madrid, pero para poder triunfar en "la escena Dark
                                                    europea", deberán hacer lo imposible por conseguir el dinero de
                                                    los tiquetes. Quizás el tiempo de perseguir sus sueños de rock
                                                    stars ya pasó.</p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/filmProjects_10.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>Mi apá</h1>
                                    <h2>Juan Diego AGUIRRE GÓMEZ</h2>
                                    <h3>Documental</h3>
                                    <h3>85 min.</h3>
                                    <h4>Corporación Frontera Films</h4>
                                    <a href="resumen-proyecto.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>Acostumbrado a llevar una vida próspera en Venezuela, mi papá
                                                    está sumido en una crisis existencial. Está soltero, tiene
                                                    conflictos con su familia en Colombia, carga una deuda
                                                    millonaria con el banco que le quiere quitar su apartamento y su
                                                    única fuente de ingresos es el negocio de repuestos en la
                                                    frontera donde lidia con diferentes actores al margen de la ley
                                                    para pasar la mercancía. Su refugio es el alcohol. Ha llegado a
                                                    pensar en suicidarse. Con estrategias de superación personal,
                                                    meditaciones, terapias y libros, busca una salida. Mientras mi
                                                    papá pretende cicatrizar las heridas del pasado y reivindicarse
                                                    como persona, yo busco entenderlo, comprenderlo y amarlo.</p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/filmProjects_11.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>Noviembre</h1>
                                    <h2>Tomás CORREDOR</h2>
                                    <h3>Ficción / Drama</h3>
                                    <h3>90 min.</h3>
                                    <h4>Burning</h4>
                                    <a href="resumen-proyecto.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>Nada sale como el comando del M-19 lo planeó y, empezando la toma
                                                    del Palacio de Justicia, una fracción de guerrilleros con
                                                    algunos hombres gravemente heridos queda incomunicada y debe
                                                    encerrarse en un baño, hacinados con más de cincuenta rehenes, a
                                                    resistir por casi veintisiete horas la brutalidad de una
                                                    confrontación entre el grupo insurgente y Las Fuerzas Armadas
                                                    del Estado. Una situación extrema en la que cobra vida la
                                                    complejidad de la condición humana que, frente a la adversidad y
                                                    el desamparo de la guerra, de la violencia en general, confronta
                                                    el impulso de seguir con vida y al mismo tiempo la resistencia
                                                    para conservar un mínimo de dignidad hasta el último segundo.
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/filmProjects_12.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>Un coyote al final del camino</h1>
                                    <h2>Álvaro VÁSQUEZ MIRANDA</h2>
                                    <h3>Road movie / Coming-of-age</h3>
                                    <h3>90 min.</h3>
                                    <h4>Vaya Films</h4>
                                    <a href="resumen-proyecto.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>1958. Óscar, un adolescente problemático escapa de su casa en las
                                                    montañas huyendo de su padre. Atraviesa país con el pretexto de
                                                    encontrar a su hermano mayor. En el camino conoce a Raúl quien
                                                    le ayuda a conseguir trabajo a cambio de techo y comida por un
                                                    tiempo, allí deciden robar al patrón, pero las cosas salen mal y
                                                    deben separarse. Tras divagar durante días por el monte, Óscar
                                                    es encerrado en un reformatorio donde tendrá que crear su propia
                                                    manada para sobrevivir y planear una fuga a la gran ciudad.</p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/filmProjects_13.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>Un lápiz sagrado</h1>
                                    <h2>Gustavo ALONSO</h2>
                                    <h3>Documental / Animación</h3>
                                    <h3>68 min.</h3>
                                    <h4>La Pluma Producciones</h4>
                                    <a href="resumen-proyecto.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>Gusti es esencialmente observador. Heredero de los cronistas de
                                                    guerra, camina mundos y los plasma en sus libretas de viaje.
                                                    Dibuja todo el tiempo en aquello que tiene a mano documentando
                                                    sus viajes hacia la selva y la medicina natural, pero también al
                                                    interior de sí mismo. Con libros traducidos a varios idiomas,
                                                    abandona Barcelona para "escuchar" el mensaje de la naturaleza y
                                                    de culturas originarias, dejándose perder en la selva y
                                                    descubriendo su propia condición chamánica, por la que lo
                                                    reconocieron como hombre-medicina. Un lápiz sagrado une los dos
                                                    mundos de Gusti, a partir de sus trazos, y busca aquellos
                                                    espacios que tal vez el protagonista pretenda invisible.</p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/filmScreenings_7.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>TIEMPOS DE JACARANDA</h1>
                                    <h2>Francisco SÁNCHEZ SOLÍS</h2>
                                    <h3>90 min.</h3>
                                    <h3>Ficción / Drama - Coming of Age</h3>
                                    <h4>Enfant Poulet</h4>
                                    <a href="resumen-proyecto.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>México, 1989. Cuando su hermano mayor reaparece después de años
                                                    de ausencia para revelar que tiene SIDA, un tímido adolescente
                                                    desafía a su conservadora familia y a la prejuiciosa clase alta
                                                    a la que pertenece para reencontrarse con su hermano antes de
                                                    que la enfermedad los separe para siempre.</p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article> -->



                    </div>
                </div>
            </div>

            <?php endforeach;  ?>
            <!-- <div class="accordion-wrap">
                <div class="accordion-item">
                    <p class="accordion-headerBig">Seleccionados Series Projects
                        <span class="arrow left"></span>
                    </p>
                </div>
                <div class="accordion-text">
                    <div class="gListMovies">
                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/seriesProjects_7.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>Agricultores del asfalto</h1>
                                    <h2>Paulina FERRETTI</h2>
                                    <h3>25 min x 6</h3>
                                    <h3>Documental</h3>
                                    <h4>iD.Works</h4>
                                    <div class="sinop">
                                        <p class="title">Sinopsis</p>
                                        <div class="desc">
                                            <h2><b>Sinopsis</b></h2>
                                            <p>En medio de la actual crisis ambiental, sanitaria y económica que
                                                viven las grandes megalópolis de Latinoamérica, un grupo de
                                                ciudadanos lucha por la soberanía alimentaria. Una serie
                                                internacional de televisión documental que retrata diversas
                                                experiencias de agricultura urbana en 6 ciudades latinoamericanas.
                                                Sus protagonistas nos sumergirán en sus luchas cotidianas y en los
                                                caminos que los llevaron a buscar transformar sus vidas y la de sus
                                                comunidades a través de estas experiencias: historias inspiradoras
                                                que transcurren en distintos territorios de la región, y cuyo
                                                conector es la huerta como un puente entre el espacio natural y el
                                                espacio cultural, un lugar de encuentro y de resignificación.</p>
                                        </div>
                                    </div>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/seriesProjects_9.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>Black Venus</h1>
                                    <h2>Camilo CADENA, Ana Sofía OSORIO</h2>
                                    <h3>45 min. x 8</h3>
                                    <h3>Ficción / Drama Musical</h3>
                                    <h4>Bucle temporal</h4>
                                    <div class="sinop">
                                        <p class="title">Sinopsis</p>
                                        <div class="desc">
                                            <h2><b>Sinopsis</b></h2>
                                            <p>En una ciudad que respira a ritmo de salsa.&nbsp; Cuatro jóvenes
                                                estudiantes universitarias, desconocidas entre ellas, pero con un
                                                sueño común, rockear; Se encuentran, se alían y logran amplificar
                                                sus pensamientos a través de la música. De a poco a través de la
                                                sororidad y de algunos acordes descubren su voz femenina y asumen
                                                como propia la consigna de “We can do it”, logrando romper barreras
                                                tradicionales y traspasar fronteras.</p>
                                        </div>
                                    </div>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/seriesProjects_2.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>El Turno de la Noche</h1>
                                    <h2>Boris ABAUNZA QUEJEDA</h2>
                                    <h3>30 min. x 8</h3>
                                    <h3>Ficción - Thriller/Terror</h3>
                                    <h4>Epica Studio</h4>
                                    <div class="sinop">
                                        <p class="title">Sinopsis</p>
                                        <div class="desc">
                                            <h2><b>Sinopsis</b></h2>
                                            <p>Un grupo de trabajadores del turno nocturno en una bodega de
                                                mensajería toma voluntariamente un medicamento experimental que los
                                                puede mantener despiertos por días o semanas. Los efectos de la
                                                privación del sueño por periodos tan prolongados podrían producirles
                                                graves problemas de salud, pero ellos necesitan tiempo extra para
                                                trabajar más y ganar más dinero, y están dispuestos a arriesgar su
                                                salud y su vida. La obsesión moderna por la productividad ha
                                                convertido a la persona en una máquina ultra eficiente que debe
                                                estar conectada en todo momento, produciendo sin parar. Un drama de
                                                suspenso que muestra los límites a los que puede llegar el ser
                                                humano.</p>
                                        </div>
                                    </div>
                                </header>
                            </div>
                        </article>


                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/seriesProjects_8.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>Her Green Medicine</h1>
                                    <h2>Luisa NIKE GERLACH</h2>
                                    <h3>40 min. x 4</h3>
                                    <h3>Documental</h3>
                                    <h4>Help The Next! Production S. L.</h4>
                                    <div class="sinop">
                                        <p class="title">Sinopsis</p>
                                        <div class="desc">
                                            <h2><b>Sinopsis</b></h2>
                                            <p>El Zeitgeist de la marihuana escribiendo historia colectiva. Esta
                                                Docu-Serie internacional de impacto con enfoque feminista, expone el
                                                momento de quiebre y reinvención en las legislaturas respecto a las
                                                políticas con la marihuana medicinal y recreativa igual que en el
                                                cultivo y la exportación a través de la mirada femenina en Colombia,
                                                Reino Unido, Alemania y España.</p>
                                        </div>
                                    </div>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/seriesProjects_4.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>La Negra Soledad</h1>
                                    <h2>Mario Luis MANTILLA</h2>
                                    <h3>48 min. x 8</h3>
                                    <h3>Ficción - Drama</h3>
                                    <h4>Bitácora 5.0</h4>
                                    <div class="sinop">
                                        <p class="title">Sinopsis</p>
                                        <div class="desc">
                                            <h2><b>Sinopsis</b></h2>
                                            <p>A comienzos de los años 60, Wilfred Chaberra y Jorge Carbonero, dos
                                                inseparables amigos, músicos de profesión y cómplices de picardías
                                                en la ardiente Barrancabermeja, necesitan una canción original más
                                                para poder grabar su primer LP con una importante disquera de
                                                Barranquilla. Su camino al éxito está muy cerca, pero cuando ven
                                                bailar cumbia a Soledad, sus prioridades cambian de inmediato. La
                                                joven disfruta con la compañía de los muchachos, pero no los toma en
                                                serio. La dura disputa por su amor en la que ambos entran, hace que
                                                los reemplacen en la orquesta. Despechados, sin trabajo y pensando
                                                en Soledad, Jorge compone la música y Wilfred la letra de una
                                                canción que llaman La pollera colorá.</p>
                                        </div>
                                    </div>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/seriesProjects_5.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>Mi vida es como un meme</h1>
                                    <h2>Luis Hernando SALAS HERNÁNDEZ</h2>
                                    <h3>22 min. x 12</h3>
                                    <h3>Ficción - Comedia</h3>
                                    <h4>Little Bears</h4>
                                    <div class="sinop">
                                        <p class="title">Sinopsis</p>
                                        <div class="desc">
                                            <h2><b>Sinopsis</b></h2>
                                            <p>Laura es una estudiante que recién ingresa a la carrera de diseño
                                                gráfico. Sueña con nada menos que conquistar al mundo. Se va a
                                                estudiar a Bogotá desde su natal Tunja: al fin se convertirá en la
                                                adulta profesional que siempre soñó. Al principio va a la casa de
                                                sus tíos, pero luego se va a vivir con Sofía, donde va a descubrir
                                                que la vida que soñó no era tan sencilla como imaginaba. Todo lo que
                                                constituía las bases de su propia estructura, todo lo que siempre
                                                dio por sentado, comienza a tambalearse como un Jenga sobre una
                                                gelatina. El mundo es un lugar lleno de posibilidades y Laura está
                                                dispuesta a cuestionarlo todo.</p>
                                        </div>
                                    </div>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/seriesProjects_6.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>Nivel Dios</h1>
                                    <h2>Henry RINCÓN</h2>
                                    <h3>45 min. x 8</h3>
                                    <h3>Ficción - Drama</h3>
                                    <h4>Héroe Films</h4>
                                    <div class="sinop">
                                        <p class="title">Sinopsis</p>
                                        <div class="desc">
                                            <h2><b>Sinopsis</b></h2>
                                            <p>En Medellín, en un barrio de las periferias, vive Lobo. Recién salido
                                                del reformatorio, se gana la vida en batallas callejeras de
                                                improvisación, lugar donde encuentra su libertad. Junto a Pacho, su
                                                mejor amigo, quiere recuperar el tiempo perdido. Es en ese camino se
                                                enamora de Lala, hija de un mayor del ejército responsable de un
                                                operativo militar en el barrio en el que mueren varios jóvenes
                                                señalados como milicianos, entre ellos, Caliche, hermano de Lobo.
                                                Este suceso desencadena su ira y los mueve a buscar a los culpables,
                                                así pongan sus vidas en riesgo. Un camino donde las líricas los
                                                llevarán a encontrar la verdad y su propia libertad en medio de la
                                                transición a la adultez.</p>
                                        </div>
                                    </div>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/seriesProjects_3.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>POLI</h1>
                                    <h2>Ruth CAUDELLI</h2>
                                    <h3>24 min. x 6</h3>
                                    <h3>Ficción - Drama</h3>
                                    <h4>Ovella Blava Films</h4>
                                    <div class="sinop">
                                        <p class="title">Sinopsis</p>
                                        <div class="desc">
                                            <h2><b>Sinopsis</b></h2>
                                            <p>La noticia de que Ana no puede embarazarse, propicia un drástico giro
                                                en la relación poliamorosa que tiene junto a Saray y Valeria. La
                                                decisión de tener hijos ya había sido tomada, pero ahora todo parece
                                                está en el aire. Ni Valeria ni Saray se ven muy entusiasmadas para
                                                inseminarse. La cotidianidad de las tres se trunca y la ansiedad,
                                                los problemas económicos y peleas familiares producen situaciones
                                                que las alejan de la tranquilidad emocional que buscan. A duras
                                                penas pueden mantener la relación sentimental que las une. Tras una
                                                fuerte pelea en donde todos los reproches salen a la luz, deberán
                                                decidir si seguir adelante y resolver la duda que las acecha:
                                                ¿quieren o no quieren ser mamás?</p>
                                        </div>
                                    </div>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/seriesProjects_1.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>Tiempos Mutantes</h1>
                                    <h2>Juan RUEDA</h2>
                                    <h3>50 min. x 8</h3>
                                    <h3>Ficción / Drama</h3>
                                    <h4>Akiracine</h4>
                                    <div class="sinop">
                                        <p class="title">Sinopsis</p>
                                        <div class="desc">
                                            <h2><b>Sinopsis</b></h2>
                                            <p>Una road serie que recorre la década más fantástica de la música
                                                colombiana, los años noventa. Una época que también pasó a la
                                                historia como la más caótica y violenta del país. La serie se narra
                                                desde la mirada de un joven inglés aspirante a productor musical
                                                que, con el corazón roto e inconforme con su vida en Londres,
                                                recorre Colombia, un país inmerso en la guerra contra el
                                                narcotráfico, sin entender la magnitud del peligro. Una intensa
                                                combinación de aventuras amorosas y desafíos artísticos durante los
                                                que se convierte en un reconocido productor que cambia la historia
                                                musical de una generación. Sin embargo, el amor - su gran anhelo –
                                                continuará siendo una asignatura pendiente.</p>
                                        </div>
                                    </div>
                                </header>
                            </div>
                        </article>
                    </div>

                </div>
            </div> -->
            <!-- 
            <div class="accordion-wrap">
                <div class="accordion-item">
                    <p class="accordion-headerBig">Seleccionados Animation
                        <span class="arrow left"></span>
                    </p>
                </div>
                <div class="accordion-text">
                    <div class="gListMovies">

                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/animationProjects_1.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>ANIMÉTRICAS</h1>
                                    <h2>Juan David ORTIZ MARTÍNEZ</h2>
                                    <h3>8 min. x 13</h3>
                                    <h3>Infantil / Educativo</h3>
                                    <h4>Astrohouse Contenidos Audiovisuales</h4>
                                    <div class="sinop">
                                        <p class="title">Sinopsis</p>
                                        <div class="desc">
                                            <h2><b>Sinopsis</b></h2>
                                            <p>Para aprender el lenguaje humano, Flora la cocodrila, Mole el danta y
                                                Ori la jaguara inventan un juego: palabrear. ¿Cómo es una palabra
                                                triste? ¿Qué pasaría si mezclo dos palabras para obtener una nueva?
                                                ¿Conoces palabras que suenen al viento? ¿Cuál será la palabra más
                                                grande que existe? Mientras duermen crean lugares fantásticos:
                                                bosques con letras mayúsculas, llanuras llenas de vocales, planetas
                                                extraterrestres con sílabas flotantes… Pero cuando amanecen en
                                                ellos, Mole no es capaz de despertarse, Flora tiene miedo de las
                                                sombras, Ori quiere ser cantante pero se le ha ido su voz… Los
                                                palabreos les servirán para resolver cada problema al tiempo que van
                                                comprendiendo las cosas que ocurren en el mundo del lenguaje de los
                                                humanos.</p>
                                        </div>
                                    </div>
                                </header>

                            </div>
                        </article>

                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/animationProjects_2.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>CHOCÓ: LA TIERRA Y LOS MONSTRUOS</h1>
                                    <h2>Estefanía PIÑERES</h2>
                                    <h3>90 min.</h3>
                                    <h3>Infantil / Aventura</h3>
                                    <h4>Letrario</h4>
                                    <div class="sinop">
                                        <p class="title">Sinopsis</p>
                                        <div class="desc">
                                            <h2><b>Sinopsis</b></h2>
                                            <p>Chocó, una niña temerosa y compasiva, debe enfrentarse a su peor
                                                pesadilla cuando su hermano, Nuquí, es devorado por Mukira, uno de
                                                los monstruos que acechan su pueblo. Impulsada por su instinto y
                                                guiada por la sabiduría de Iolo, una misteriosa y mágica anciana,
                                                Chocó emprenderá un viaje en búsqueda del monstruo para realizar un
                                                peligroso ritual con el que traer de vuelta a Nuquí. Sin embargo,
                                                tras capturar a Mukira, Chocó entenderá que los monstruos están
                                                lejos de ser lo que los humanos creen. Un descubrimiento que la
                                                llevará a tomar decisiones que cambiarán su destino, el de su
                                                pueblo… y el de los monstruos.</p>
                                        </div>
                                    </div>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/animationProjects_3.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>EN LA DIESTRA DE DIOS PADRE</h1>
                                    <h2>Andrés CUEVAS</h2>
                                    <h3>8 min. x 12</h3>
                                    <h3>Infantil / Aventura</h3>
                                    <h4>Cuevasfilm Cine Entretenimiento</h4>
                                    <div class="sinop">
                                        <p class="title">Sinopsis</p>
                                        <div class="desc">
                                            <h2><b>Sinopsis</b></h2>
                                            <p>Eva, al frente de un grupo de niños huérfanos y junto a la Abue Lina,
                                                una anciana que adoptaron, recorre el país para encontrar a Don
                                                Pera, el único que los puede ayudar y proteger. Por ser tan
                                                caritativo Don Pera recibió cinco poderes con los que tiene el mundo
                                                patas arriba. Nunca pierde un juego y con todo lo que gana crea
                                                albergues en los que comen los pobres, se curan los enfermos y
                                                sirven de casa a los desamparados. Pero encontrarlo no será fácil.
                                                Los poderes del mal: el diablo y la muerte, están empeñados en
                                                acabar con él y sus seguidores, y usarán los trucos más sucios y las
                                                trampas más malvadas para lograrlo.</p>
                                        </div>
                                    </div>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/animationProjects_4.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>INSECTA</h1>
                                    <h2>Andrés ARÉVALO ROZO</h2>
                                    <h3>11 min. x 24</h3>
                                    <h3>Infantil / Comedia</h3>
                                    <h4>Jaguar Digital</h4>
                                    <div class="sinop">
                                        <p class="title">Sinopsis</p>
                                        <div class="desc">
                                            <h2><b>Sinopsis</b></h2>
                                            <p>Un día, Maya (14) se despierta de una criogenia accidental en un
                                                mundo dominado por insectos gigantes: ella es la única sobreviviente
                                                de los extintos humanos, que ahora se llaman "homosaurios" y sus
                                                fósiles se exhiben en el Bugseum de Insecta. En esta extraña
                                                sociedad, Maya se hace amiga de Bobarumen, Naaro y Doxter, un trío
                                                de jóvenes cucarachas con problemas de socialización en la
                                                secundaria. Los inseparables amigos tendrán que enfrentarse al
                                                absurdo de conciliar la lógica, las costumbres y las prácticas
                                                humanas con las de los insectos.</p>
                                        </div>
                                    </div>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/animationProjects_5.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>LOS CUENTOS DE VILLA PÍO</h1>
                                    <h2>Jorge Alberto VEGA RIVERA</h2>
                                    <h3>7 min. x 26</h3>
                                    <h3>Infantil / Educativo</h3>
                                    <h4>Corporación La Valiente Estudio</h4>
                                    <div class="sinop">
                                        <p class="title">Sinopsis</p>
                                        <div class="desc">
                                            <h2><b>Sinopsis</b></h2>
                                            <p>¡Bienvenidos a Villa Pío! donde habitan los pájaros cúbicos. En el
                                                parque central de Villa Pío viven Pedro y sus amigos. Pedro es el
                                                primer pájaro cúbico y con su pandilla, compuesta por una pajarita
                                                presumida al cubo, un cacto con ruedas y un hámster glotón viven
                                                extrañas aventuras en un curioso pueblo en el que los cuentos y las
                                                historias fantásticas son la solución a casi todo.</p>
                                        </div>
                                    </div>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/animationProjects_6.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>UGAMÚ</h1>
                                    <h2>Yuly VELASCO</h2>
                                    <h3>8 min. x 13</h3>
                                    <h3>Infantil / Familiar</h3>
                                    <h4>Mito Estudio Creativo</h4>
                                    <div class="sinop">
                                        <p class="title">Sinopsis</p>
                                        <div class="desc">
                                            <h2><b>Sinopsis</b></h2>
                                            <p>Cuando Ugamú empezó a ser el amigo imaginario de Óscar, jamás pensó
                                                que iba a estar tanto tiempo a su lado. Ahora Óscar tiene 13 años y
                                                Ugamú ya no es el amigo juguetón de antes. Viejo, amargado y
                                                achacoso, lo único que desea es poder jubilarse para irse a tomar el
                                                sol lejos de Óscar y sus ganas de jugar todo el día. La única forma
                                                de lograrlo es haciendo que Óscar se enfrente a nuevas experiencias
                                                que lo hagan actuar como cualquier otro adolescente, y así lo
                                                olvide. Pero nunca lo consigue. Óscar vive cada experiencia a su
                                                manera, imponiendo siempre su autenticidad y esencia infantil.</p>
                                        </div>
                                    </div>
                                </header>
                            </div>
                        </article>
                    </div>

                </div>
            </div>

            <div class="accordion-wrap">
                <div class="accordion-item">
                    <p class="accordion-headerBig">Seleccionados Film Screenings
                        <span class="arrow left"></span>
                    </p>
                </div>
                <div class="accordion-text">
                    <div class="gListMovies">
                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/filmScreenings_1.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>AGUA SALÁ</h1>
                                    <h2>Steven MORALES PINEDA</h2>
                                    <h3>93 min.</h3>
                                    <h3>Ficción / Drama</h3>
                                    <h4>Esuna Casa Audiovisual </h4>
                                    <div class="sinop">
                                        <p class="title">Sinopsis</p>
                                        <div class="desc">
                                            <h2><b>Sinopsis</b></h2>
                                            <p>Tras más de 20 años, Jacobo se reencuentra con José Luis, un
                                                sacerdote católico a punto de retirarse del clero debido a las
                                                acusaciones de abuso infantil en su contra. Es a José Luis a quien
                                                Jacobo le atribuye las grietas de su alma desde que era un niño,
                                                cuando este se marchó de la ciudad sin despedirse. Sin embargo,
                                                sumado al resentimiento por el abandono del cura, el corazón ahora
                                                adulto de Jacobo alberga sentimientos encontrados de amor y lujuria
                                                hacia este hombre de Dios.</p>
                                        </div>
                                    </div>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/filmScreenings_3.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>ENTREVISTA LABORAL</h1>
                                    <h2>Carlos OSUNA</h2>
                                    <h3>80 min.</h3>
                                    <h3>Ficción / Experimental</h3>
                                    <h4>Orion Films</h4>
                                    <div class="sinop">
                                        <p class="title">Sinopsis</p>
                                        <div class="desc">
                                            <h2><b>Sinopsis</b></h2>
                                            <p>Gabriel (18) es un rapero, que vive en las periferias de Bogotá.
                                                Visto de lejos Gabriel es parte del paisaje, observándolo con
                                                detenimiento desde la distancia tendremos que suponer qué es eso que
                                                tanto lo aflige, qué es eso que tanto desea.</p>
                                        </div>
                                    </div>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/filmScreenings_2.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>MÛPÃ (MADRE)</h1>
                                    <h2>David HERRERA</h2>
                                    <h3>80 min.</h3>
                                    <h3>Documental</h3>
                                    <h4>Fahrenheit Films</h4>
                                    <div class="sinop">
                                        <p class="title">Sinopsis</p>
                                        <div class="desc">
                                            <h2><b>Sinopsis</b></h2>
                                            <p>Llevando a cuestas un pasado de dolor, abusos y violencia, Morelia es
                                                elegida como Gobernadora de la comunidad indígena embera en Luz del
                                                Mundo, Antioquia. Una elección que le plantea dos desafíos:
                                                defenderse de las amenazas que recibe de hombres que se oponen a que
                                                una mujer les gobierne, y encontrar a una niña de 13 años,
                                                desaparecida, a quien sus padres forzaron a casarse con su profesor.
                                            </p>
                                        </div>
                                    </div>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/filmScreenings_4.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>TODAS LAS FLORES (ANTES DIANA DE SANTA FE)</h1>
                                    <h2>Carmen OQUENDO-VILLAR</h2>
                                    <h3>71 min.</h3>
                                    <h3>Documental</h3>
                                    <h4>Armadillo: New Media &amp; Films</h4>
                                    <div class="sinop">
                                        <p class="title">Sinopsis</p>
                                        <div class="desc">
                                            <h2><b>Sinopsis</b></h2>
                                            <p>Los prostíbulos rara vez se consideran seguros o dignos. En el centro
                                                de Bogotá, capital de Colombia, un país desgarrado por décadas de un
                                                violento conflicto armado, hay un minúsculo burdel que funciona como
                                                refugio para las trabajadoras sexuales del Santafé, una zona que
                                                concentra todas las miserias de una región ensangrentada. Todas las
                                                flores construye un retrato íntimo de Tabaco y Ron, un burdel de
                                                pequeña escala que protege a los inmigrantes en una zona sórdida
                                                donde el sexo es la mercancía sobresaliente. Dentro de sus límites,
                                                el burdel ofrece un oasis para las personas que huyen
                                                desesperadamente de la guerra y llegan completamente solas,
                                                desprotegidas y traumatizadas por el conflicto armado. Todas las
                                                flores presenta un retrato complejo de este prostíbulo, este barrio
                                                y la feroz voluntad de florecer de sus habitantes.</p>
                                        </div>
                                    </div>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/filmScreenings_5.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>ULTRAVIOLENCIA</h1>
                                    <h2>Marco VÉLEZ ESQUIVIA</h2>
                                    <h3>92 min.</h3>
                                    <h3>Ficción / Thriller - Terror</h3>
                                    <h4>2/4 Producciones</h4>
                                    <div class="sinop">
                                        <p class="title">Sinopsis</p>
                                        <div class="desc">
                                            <h2><b>Sinopsis</b></h2>
                                            <p>Francisco, un reconocido montajista, acepta trabajar en una nueva
                                                película. El ermitaño editor se obsesiona con la historia de la
                                                protagonista, secuestrada por un hombre en el sótano de su casa, y
                                                quiere cambiar el final de la película para que ella pueda salvarse.
                                                El director y la productora se niegan a sus cambios, pero Francisco
                                                consigue la ayuda de Eva, una asistente de posproducción. Cuando son
                                                descubiertos, Francisco tendrá que convertirse en el villano de su
                                                propia historia.</p>
                                        </div>
                                    </div>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/filmScreenings_6.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>UN PUNK TROPICAL</h1>
                                    <h2>Sebastián DUQUE MUÑOZ</h2>
                                    <h3>82 min.</h3>
                                    <h3>Documental</h3>
                                    <h4>Casa Audiovisual Industria Paraíso</h4>
                                    <div class="sinop">
                                        <p class="title">Sinopsis</p>
                                        <div class="desc">
                                            <h2><b>Sinopsis</b></h2>
                                            <p>A un director colombiano se le mete en la cabeza encontrar a Robo,
                                                una leyenda perdida del rock mundial para que actúe en su próxima
                                                película. Julio Roberto Valverde, Robo, es el mítico baterista de
                                                las bandas norteamericanas Black Flag y Misfits, un colombiano que,
                                                en los 80, con su forma de tocar, influenció todo un género musical.
                                                Aunque aparece referenciado en films de Jim Jarmusch, y su nombre
                                                aparece escrito en los libros de historia del rock y en los trabajos
                                                discográficos más emblemáticos del punk y el hardcore, poco se sabe
                                                de él. De las voces de Mackaye, Henry Rollins, Bill Stevenson, Chuck
                                                Dukowski, Keith Morris, entre otros esta película sigue los pasos de
                                                una figura mítica.</p>
                                        </div>
                                    </div>
                                </header>
                            </div>
                        </article>

                    </div>

                </div>
            </div>

            <div class="accordion-wrap">
                <div class="accordion-item">
                    <p class="accordion-headerBig">Seleccionados Short Film Screenings
                        <span class="arrow left"></span>
                    </p>
                </div>
                <div class="accordion-text">

                    <div class="gListMovies">
                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/shortscreenings_1.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>BANG</h1>
                                    <h2>Jairo Alberto GONZÁLEZ LONDOÑO</h2>
                                    <h3>14 min.</h3>
                                    <h3>Ficción / Drama</h3>
                                    <h4>Perrenque Media Lab</h4>
                                    <div class="sinop">
                                        <p class="title">Sinopsis</p>
                                        <div class="desc">
                                            <h2><b>Sinopsis</b></h2>
                                            <p>Roberto y Laura llevan 15 años casados. Tras una aparente noche de
                                                bodas, ebrios, cómplices y felices, llegan a la habitación de un
                                                hotel, donde celebran, brindan y hacen el amor. La felicidad de
                                                Laura por su liberación es superior a la tristeza de Roberto quien,
                                                ante la enfermedad de su esposa, paralizada de cintura para abajo,
                                                cede por amor. El momento de ejecutar el plan ha llegado: Roberto
                                                saca dos pistolas, las cargan, se toman de la mano y se las llevan a
                                                la boca… Cierran los ojos y cuentan hasta tres…</p>
                                        </div>
                                    </div>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/shortscreenings_2.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>EL BAILE</h1>
                                    <h2>Pedro Pablo VEGA</h2>
                                    <h3>15 min.</h3>
                                    <h3>Infantil</h3>
                                    <h4>Etincella Films</h4>
                                    <div class="sinop">
                                        <p class="title">Sinopsis</p>
                                        <div class="desc">
                                            <h2><b>Sinopsis</b></h2>
                                            <p>El zapato de Andrés tiene un roto enorme en la punta. Es tan grande
                                                que el dedo gordo del pie parece querer escapar a través de él. En
                                                otro momento no le importaría, pero mañana es el baile del colegio y
                                                Mariana, la niña de sus amores, le ha insistido en que quiere bailar
                                                con él. Andrés tiene solo un día para ingeniar una solución a ese
                                                problema y estar impecable en la cita que tanto ha esperado: o
                                                arregla su único par de zapatos o consigue unos nuevos.</p>
                                        </div>
                                    </div>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/shortscreenings_3.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>EL SILENCIO DE DIOS</h1>
                                    <h2>César ACEVEDO GARCÍA</h2>
                                    <h3>15 min.</h3>
                                    <h3>Ficción / Drama</h3>
                                    <h4>Inercia Películas</h4>
                                    <div class="sinop">
                                        <p class="title">Sinopsis</p>
                                        <div class="desc">
                                            <h2><b>Sinopsis</b></h2>
                                            <p>Gerardo, un viejo campesino ha perdido la fe tras una masacre
                                                reciente en su pueblo. Los recuerdos lo atormentan y lo consumen.
                                                Inés, su esposa, cree que la única esperanza para salvar su alma es
                                                llevar a su casa la campana de la iglesia: El llamado de Dios. Con
                                                la ayuda del cura y el sacristán, bajan la campana y la acomodan en
                                                una carreta arrastrada por burro para comenzar un duro viacrucis. El
                                                viaje físico es una metáfora de su viaje espiritual, el cual pondrá
                                                a prueba su propia fe cuando tengan que confrontar todas sus dudas y
                                                temores.</p>
                                        </div>
                                    </div>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/shortscreenings_4.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>NEGRO EL MAR</h1>
                                    <h2>Juan David MEJÍA VÁSQUEZ</h2>
                                    <h3>16 min.</h3>
                                    <h3>Ficción / Drama</h3>
                                    <h4>Corporación Fecisla</h4>
                                    <div class="sinop">
                                        <p class="title">Sinopsis</p>
                                        <div class="desc">
                                            <h2><b>Sinopsis</b></h2>
                                            <p>Arnaldo es un musico negro y flaco, con cincuenta años de vida. Sus
                                                días transcurren entre los trabajos ocasionales, la vida bohemia y
                                                la presencia de pensamientos. Pasa sus días entre canciones y
                                                conseguir dinero para que su hija, con quien no vive, pueda irse a
                                                la ciudad a estudiar. Sin muchas opciones, está decidido a irse
                                                también de la isla con la ayuda de su amigo Miguel, quien le habla
                                                de la posibilidad de salir en un barco. Arnaldo mira al horizonte y
                                                aunque duda, la mística del mar lo llama y decide irse, no sin antes
                                                dejar con Miguel lo único que tiene.</p>
                                        </div>
                                    </div>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie">
                            <div>
                                <figure class="gImg">
                                    <img src="images/site/shortscreenings_5.jpg">
                                </figure>
                                <header class="gDesc">
                                    <h1>NENECO</h1>
                                    <h2>Sara J. ASPRILLA PALOMINO, Karol MORA ALBARRACÍN</h2>
                                    <h3>18 min.</h3>
                                    <h3>Ficción / Drama</h3>
                                    <h4>IX Fieras</h4>
                                    <div class="sinop">
                                        <p class="title">Sinopsis</p>
                                        <div class="desc">
                                            <h2><b>Sinopsis</b></h2>
                                            <p>Neneco y Anwar son dos jóvenes que viven en Bahía Cupica, Chocó. Ante
                                                la enfermedad de la hermana menor de Neneco, se les encarga lavar su
                                                carga de ropa, pero la presencia de dos mujeres en la quebrada del
                                                pueblo hace que decidan aventurarse a sus afueras, hasta antes del
                                                atardecer, develando el pasado de Cupica de camino hacia el río
                                                Cacique.</p>
                                        </div>
                                    </div>
                                </header>
                            </div>
                        </article>
                    </div>

                </div>
            </div>

            <div class="accordion-wrap">
                <div class="accordion-item">
                    <p class="accordion-headerBig">Seleccionados Stories
                        <span class="arrow left"></span>
                    </p>
                </div>
                <div class="accordion-text">

                    <div class="gListMovies">
                        <article class="itemSMovie noStyle">
                            <div>
                                <figure class="gImg personaje">
                                    <img src="images/site/Alejandro_HOYOS.jpg">
                                </figure>
                                <header class="gDesc persona">
                                    <h1>Alejandro HOYOS</h1>
                                    <h2>Small world Colombia</h2>
                                    <h3>Largometraje</h3>
                                    <h3>Ficción / Sci Fi</h3>
                                    <a href="resumen-persona.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop personajes">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>Lizeth, una mesera que está saliendo de una relación tóxica,
                                                    conoce a William, un extraño turista sueco. Se alejan cuando él
                                                    se extravía en el bajo mundo, pero él reaparece y le pide ayuda
                                                    para que le muestre el país. Mientras son perseguidos por unos
                                                    misteriosos hombres de negro, William le cuenta a Lizeth que él
                                                    es en realidad un cerebro extraterrestre que habita el cuerpo
                                                    del escandinavo y que vino a realizar un informe sobre la
                                                    humanidad a partir de nuestro país. Al parecer, los de su
                                                    especie se están preguntando si vale la pena seguir protegiendo
                                                    a la Tierra de un golpe sideral. Ella no tiene más remedio que
                                                    creerle y se esfuerza en mostrar la mejor imagen de nuestra
                                                    tierra. Al final, la a química puede ser lo que incline la
                                                    balanza.</p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie noStyle">
                            <div>
                                <figure class="gImg personaje">
                                    <img src="images/site/Andres_ARIAS_GARCIA.jpg">
                                </figure>
                                <header class="gDesc persona">
                                    <h1>Andrés ARIAS GARCÍA</h1>
                                    <h2>Lejano azul</h2>
                                    <h3>Largometraje</h3>
                                    <h3>Ficción / Drama</h3>
                                    <a href="resumen-persona.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop personajes">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>Luis, un aspirante a músico que niega y evade sus problemas, se
                                                    contagia de lepra y es obligado a abandonar sus clases de
                                                    composición para recluirse hasta su muerte en un leprosario.
                                                    Mientras lucha infructuosamente por sanarse para salir del
                                                    encierro es testigo de los terribles abusos y crueldades que
                                                    allí ocurren, hechos que despiertan en él una compasión por
                                                    otros enfermos que lo inspiran a componer una auténtica obra
                                                    musical. Finalmente, las composiciones de Luis consiguen romper
                                                    las cadenas e injusticias de la reclusión y lo convierten en el
                                                    músico más importante de la época.</p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie noStyle">
                            <div>
                                <figure class="gImg personaje">
                                    <img src="images/site/Carlos_TELLEZ_HENAO.jpg">
                                </figure>
                                <header class="gDesc persona">
                                    <h1>Carlos TÉLLEZ HENAO</h1>
                                    <h2>La playa de los olvidados</h2>
                                    <h3>Serie</h3>
                                    <h3>Ficción / Drama</h3>
                                    <a href="resumen-persona.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop personajes">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>Un grupo de jóvenes y atractivos influenciadores son contratados
                                                    para promocionar un hotel durante un fin de semana lleno de
                                                    fiesta y excesos en una misteriosa isla ubicada en medio del
                                                    océano. Al llegar y descubrir que el lugar no es lo que
                                                    esperaban, el holograma de un misterioso enmascarado les
                                                    confiesa que han sido llevados ahí́ para pagar por toda la
                                                    basura que han compartido en sus redes sociales. Atrapados e
                                                    incomunicados, son obligados a enfrentar una serie de
                                                    situaciones extremadamente hostiles, obligándolos a violar todos
                                                    los principios que presumían en sus redes. Al revelar su
                                                    verdadera naturaleza y tocar el punto más decadente de su
                                                    humanidad, descubren que todo lo vivido es solo el inicio de una
                                                    macabra venganza.</p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie noStyle">
                            <div>
                                <figure class="gImg personaje">
                                    <img src="images/site/Diego_Fernando_ROJAS_FAJARDO.jpg">
                                </figure>
                                <header class="gDesc persona">
                                    <h1>Diego Fernando ROJAS FAJARDO</h1>
                                    <h2>One hit wonder</h2>
                                    <h3>Largometraje</h3>
                                    <h3>Ficción / Drama</h3>
                                    <a href="resumen-persona.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop personajes">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>A Nicolás, un adolescente introvertido, le encanta tocar batería.
                                                    Nació mujer, pero hace varios años tomó la decisión radical y
                                                    necesaria de cambiar su sexo. Su madre lo ha apoyado siempre en
                                                    su largo camino de transformación, pero cuando muere en un
                                                    accidente, Nicolás debe vivir con su único pariente vivo, su tío
                                                    Johnny Rock, una exestrella de rock cuyo único hit data de los
                                                    90s. Johnny Rock es un perdedor que vive solo con su perro
                                                    Chiqui, un enorme bulldog y que jura que todavía es un rock star
                                                    mientras se presenta en bares de mala muerte a cambio de cerveza
                                                    gratis. Cuando Nicolás llega a su casa, reconocen que son tan
                                                    distintos que no hay forma de que puedan vivir juntos, pero poco
                                                    a poco, el amor que ambos tienen por el Rock, los ayuda a
                                                    reencontrarse y aceptarse. Juntos crean música increíble,
                                                    novedosa. A través del Rock los dos consiguen vivir bajo sus
                                                    propios términos y logran darse una nueva oportunidad de vida
                                                    llena de amor y éxito. ¡Una vida llena de Rock!</p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie noStyle">
                            <div>
                                <figure class="gImg personaje">
                                    <img src="images/site/Edgar_DE_LUQUE_JACOME.jpg">
                                </figure>
                                <header class="gDesc persona">
                                    <h1>Edgar DE LUQUE JÁCOME</h1>
                                    <h2>Sangre de dragón</h2>
                                    <h3>Largometraje</h3>
                                    <h3>Ficción / Drama</h3>
                                    <a href="resumen-persona.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop personajes">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>Michael es un muchacho chocoano con talento para el fútbol que ve
                                                    en la llegada a su pueblo de “El Dragón” Hinestroza, un ex
                                                    futbolista ahora caza talentos, su oportunidad para ser jugador
                                                    profesional en Argentina. Lo que Michael no sabe es que El
                                                    Dragón es un falso promotor de jugadores y lo que el Dragón no
                                                    sabe es que Michael es su hijo, uno que nunca reconoció. Antes
                                                    de viajar a Argentina Michael le confiesa la verdad, pero él lo
                                                    vuelve a negar y se va para no volver. Aun así, Michael logra ir
                                                    a Argentina donde se entera de estafa. Pese a ello, se queda
                                                    hasta volverse profesional. Mientras en Colombia El Dragón es
                                                    capturado y encarcelado. Cuando Michael regresa convertido en
                                                    una promesa del fútbol nacional, se reencuentra con El Dragón
                                                    quien busca su perdón, Michael lo rechaza, confesándole que para
                                                    él sigue siendo el mismo. De ahora en adelante El Dragón deberá
                                                    conformarse con ver los triunfos de su hijo por televisión.</p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie noStyle">
                            <div>
                                <figure class="gImg personaje">
                                    <img src="images/site/Edwin_Humbero_RESTREPO_PINEDA.jpg">
                                </figure>
                                <header class="gDesc persona">
                                    <h1>Edwin Humbero RESTREPO PINEDA</h1>
                                    <h2>Madre</h2>
                                    <h3>Largometraje</h3>
                                    <h3>Ficción / Drama</h3>
                                    <a href="resumen-persona.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop personajes">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>Gloria, una mujer trans de avanzada edad, tiene bajo su crianza a
                                                    una niña que fue abandonada por su madre. Cuando Gloria busca
                                                    obtener la adopción legal, descubrimos que la pequeña nació como
                                                    varón y posee una identidad femenina, ahora Gloria deberá
                                                    enfrentar un sistema judicial amañado, para demostrar que la
                                                    identidad de la niña es algo natural, y que lo mejor para la
                                                    menor, es tenerla como madre para acompañarla mientras crece en
                                                    un mundo donde hay pocas oportunidades para mujeres como ellas.
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie noStyle">
                            <div>
                                <figure class="gImg personaje">
                                    <img src="images/site/Jaime_Andres_BALLESTEROS_AGUIRRE.jpg">
                                </figure>
                                <header class="gDesc persona">
                                    <h1>Jaime Andrés BALLESTEROS AGUIRRE</h1>
                                    <h2>Barrio enjaulado</h2>
                                    <h3>Largometraje</h3>
                                    <h3>Ficción / Drama</h3>
                                    <a href="resumen-persona.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop personajes">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>En un barrio de Invasión, los habitantes viven con tranquilidad,
                                                    ya que años antes la alcaldía les tramitó documentos de
                                                    propiedad parcial a cambio de que eviten ilegalidades dentro del
                                                    barrio. Esa tranquilidad termina cuando se instala un circo
                                                    ilegal dentro del barrio, en el espacio más querido: la cancha
                                                    de fútbol. Cuando por fin se va el circo, deja abandonada una
                                                    jaula metálica, con un león adentro. Liderados por Ramiro,
                                                    abogado sin título, Pacho, extrabajador de zoológico, Ancizar,
                                                    entrenador de fútbol, César, un joven que sueña con repetir el
                                                    éxito futbolístico de un antiguo vecino del barrio, y Joel, un
                                                    niño que busca que su hermanito por fin vaya al baño solo,
                                                    deberán ocultar al felino para no ser desalojados, y para ello,
                                                    trasladarán todos los ranchos alrededor de la jaula para
                                                    esconder al león. Cuando son descubiertos, su lucha por no ser
                                                    desalojados, les obligará a valerse del león mismo.</p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie noStyle">
                            <div>
                                <figure class="gImg personaje">
                                    <img src="images/site/Mauricio_GUERRA.jpg">
                                </figure>
                                <header class="gDesc persona">
                                    <h1>Mauricio GUERRA</h1>
                                    <h2>En vos confío</h2>
                                    <h3>Largometraje</h3>
                                    <h3>Ficción / Drama</h3>
                                    <a href="resumen-persona.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop personajes">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>Gloria está convencida de que la vida es solo un paso para hacer
                                                    mérito y ganar el cielo. Para ella lo más importante es la
                                                    salvación del alma. Por eso cuando se entera que su hijo va a
                                                    perder su alma, está dispuesta a sacrificar la suya para
                                                    salvarlo.</p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie noStyle">
                            <div>
                                <figure class="gImg personaje">
                                    <img src="images/site/Natalia_IMERY_ALMARIO.jpg">
                                </figure>
                                <header class="gDesc persona">
                                    <h1>Natalia IMERY ALMARIO</h1>
                                    <h2>Malakianta</h2>
                                    <h3>Largometraje</h3>
                                    <h3>Ficción / Drama</h3>
                                    <a href="resumen-persona.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop personajes">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>La colombiana Ángela y la Italiana Francesca, ambas en sus 30
                                                    años, viven como pareja los momentos más hermosos y dolorosos
                                                    del amor y la sexualidad, las fiestas, el reggaetón y el licor y
                                                    conversando sobre sexualidad, poliamor y los abusos vividos.
                                                    Juntas escriben una escena crucial de la película que Ángela
                                                    dirige. En ella, una pareja de mujeres llora desconsoladamente,
                                                    tras tener un orgasmo. Tras un año de no verse por la pandemia,
                                                    se reencuentran en Milán, pero sus cuerpos están distantes, y
                                                    son más los momentos de pelea que los de alegría. En un intento
                                                    de reencuentro, terminan teniendo sexo y después del orgasmo
                                                    Francesca rompe en llanto. Conviven con la familia de Francesca
                                                    entre fogones y canciones, plantan árboles… Pero Francesca no
                                                    sabe si la película que escribieron juntas influyó en su llanto
                                                    mientas hacían el amor. A pesar del amor profundo que se tienen,
                                                    deciden terminar la relación.</p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie noStyle">
                            <div>
                                <figure class="gImg personaje">
                                    <img src="images/site/Oscar_Eduardo_ADAN_DIAZ.jpg">
                                </figure>
                                <header class="gDesc persona">
                                    <h1>Óscar Eduardo ADÁN DÍAZ</h1>
                                    <h2>Soy la mujer que las feministas odian</h2>
                                    <h3>Serie</h3>
                                    <h3>Ficción / Drama</h3>
                                    <a href="resumen-persona.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop personajes">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>Cristina, madre y ama de casa separada, consigue trabajo como
                                                    cuidadora de Carmen, una antropóloga, feminista y neurótica que
                                                    sufre de artritis reumatoide. Su primera tarea es acompañarla a
                                                    un viaje por carretera para asistir a una conferencia. A ellas
                                                    se une Katherine, mujer trans, afro, católica y deslenguada. En
                                                    plena travesía, los secretos del trío aparecen: Cristina debe
                                                    decidir si acepta un trabajo en el exterior y descubre que está
                                                    embarazada de su ex (en recuperación a raíz de su sexolismo);
                                                    Katherine esconde una enfermedad terminal y prepara su último
                                                    show como cantante Drag; y Carmen debe superar el miedo de que
                                                    sus pares la vean disminuida, además de buscar la reconciliación
                                                    con su hija, con la que no habla en años. Al regreso, Cristina
                                                    se reúne con su ex y replantea su matrimonio; Katherine da su
                                                    presentación final, para luego morir en compañía de sus amigas;
                                                    y Carmen, tras relativizar su postura feminista, da el primer
                                                    paso de reconciliación con su hija.</p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie noStyle">
                            <div>
                                <figure class="gImg personaje">
                                    <img src="images/site/Santiago_JIMENEZ.jpg">
                                </figure>
                                <header class="gDesc persona">
                                    <h1>Santiago JIMÉNEZ</h1>
                                    <h2>El hombre que no podía mirar al cielo</h2>
                                    <h3>Largometraje</h3>
                                    <h3>Ficción / Drama</h3>
                                    <a href="resumen-persona.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop personajes">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>Luego de perder a su mujer en el atentado terrorista de Pablo
                                                    Escobar contra el vuelo 203 de Avianca, Fernando vive encerrado,
                                                    devastado por la culpa y la tristeza. Pero el encuentro fortuito
                                                    con un perro callejero, viejo y enfermo, dará comienzo a una
                                                    relación que lo encaminará a rehacer su vida, no sin antes
                                                    confrontar sus más grandes miedos.</p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>


                        <article class="itemSMovie noStyle">
                            <div>
                                <figure class="gImg personaje">
                                    <img src="images/site/Sebastian_LAPIDUS.jpg">
                                </figure>
                                <header class="gDesc persona">
                                    <h1>Sebastián LAPIDUS</h1>
                                    <h2>Cenizas</h2>
                                    <h3>Serie</h3>
                                    <h3>Ficción / Thriller -Terror</h3>
                                    <a href="resumen-persona.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop personajes">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>Ignacio lidera la estación de bomberos de un pueblo ubicado en el
                                                    límite de la selva. Una llamada de rutina, lo lleva a un
                                                    incendio en la hacienda de un hombre al que todos conocen como
                                                    El Diablo. Entre las cenizas, descubren que la conflagración fue
                                                    provocada y que cobró la vida de su propia hija, Jenny, con
                                                    quien no tenía contacto hace tiempo. Ayudado por Eugenia, su
                                                    lugarteniente, quiere unir las piezas que unen a Jenny y al
                                                    Diablo. Pronto descubren que Jenny estaba haciendo una
                                                    investigación periodística que los lleva a un caserío escondido
                                                    en la selva en el que habita una secta cuyos líderes han
                                                    convencido a sus seguidores de que nunca ocurrió un evento que
                                                    partió la historia de Colombia en dos: la muerte de Jorge
                                                    Eliécer Gaitán, el 9 de abril de 1948. Su vida y la de Eugenia
                                                    están en riesgo. Tras el caserío congelado en el tiempo existe
                                                    un engranaje más grande dispuesto a mover todos los hilos de la
                                                    maldad con tal de mantener un secreto de más de 70 años.</p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>
                    </div>

                </div>
            </div>

            <div class="accordion-wrap">
                <div class="accordion-item">
                    <p class="accordion-headerBig">Seleccionados Bammers
                        <span class="arrow left"></span>
                    </p>
                </div>
                <div class="accordion-text">
                    <div class="gListMovies">
                        <article class="itemSMovie noStyle">
                            <div>
                                <figure class="gImg personaje">
                                    <img src="images/site/Alexandra_LOPEZ_ASPRILLA.jpg">
                                </figure>
                                <header class="gDesc persona">
                                    <h1>Alexandra LÓPEZ ASPRILLA</h1>
                                    <h2>LA HERBOLARIA</h2>
                                    <h3>Serie | 25 min.</h3>
                                    <h3>Ficción / Sci Fi</h3>
                                    <a href="resumen-persona.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop personajes">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>Quibdó, año 2173. Una multinacional dedicada a la modificación
                                                    genética de plantas, ha patentado y prohibido la reproducción y
                                                    comercialización de las plantas medicinales históricamente
                                                    usadas en la región. Malle, una científica que ha vuelto a su
                                                    ciudad natal para trabajar en la multinacional, al no tener otro
                                                    lugar en dónde quedarse, llega a la casa de su fallecida abuela.
                                                    Allí encuentra una conserva ilegal de plantas medicinales que
                                                    pueden ayudarla a ser la investigadora más relevante, pero que
                                                    también pueden poner en riesgo el trabajo de sus sueños.</p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie noStyle">
                            <div>
                                <figure class="gImg personaje">
                                    <img src="images/site/Andres_Felipe_FERRO_RUIZ.jpg">
                                </figure>
                                <header class="gDesc persona">
                                    <h1>Andrés Felipe FERRO RUIZ</h1>
                                    <h2>CORAJE</h2>
                                    <h3>Largometraje | 90 min.</h3>
                                    <h3>Ficción / Drama</h3>
                                    <a href="resumen-persona.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop personajes">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>Coraje cuenta la historia de un grupo de teatro de estudiantes de
                                                    la Universidad Nacional que, en medio del estallido social
                                                    ocurrido en Colombia en noviembre de 2019, se ven en la
                                                    disyuntiva de traer su montaje de Madre Coraje (Bertolt Brecht)
                                                    al aquí y al ahora, de manera que esté a tono con el momento
                                                    histórico que viven. Juan Pablo, Augusto y Kathy, quienes
                                                    también hacen parte de la multitud de jóvenes que participan de
                                                    las marchas, empiezan a experimentar la urgente necesidad de que
                                                    la obra hable de sus problemas particulares, una necesidad que
                                                    va aumentando con el crecimiento de la marcha social y que
                                                    terminará afectando y cambiando la pieza teatral, y su propia
                                                    vida.</p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie noStyle">
                            <div>
                                <figure class="gImg personaje">
                                    <img src="images/site/Celia_Alejandra_HURTADO_ACOSTA.jpg">
                                </figure>
                                <header class="gDesc persona">
                                    <h1>Celia Alejandra HURTADO ACOSTA</h1>
                                    <h2>NO CONTESTES</h2>
                                    <h3>Cortometraje | 17 min.</h3>
                                    <h3>Ficción / Terror</h3>
                                    <a href="resumen-persona.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop personajes">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>Alex, de 27 años, es de gustos alternativos y despreocupado. Todo
                                                    cambia cuando en una noche apasionada con su novio recibe
                                                    insistentes llamadas de su mejor amiga, pero no contesta. A la
                                                    mañana siguiente Alex ve que se trata de mensajes de auxilio, la
                                                    llama, pero ahora la que no contesta es ella. Junto a su novio y
                                                    una amiga decide ir a la ubicación donde ella estuvo, pero lo
                                                    que encuentran es la casa de una vampiresa, sedienta de sangre y
                                                    muerte. Alex tendrá que pagar un precio alto si quiere salir con
                                                    vida y escoger entre salvar a su novio o a su mejor amiga.</p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie noStyle">
                            <div>
                                <figure class="gImg personaje">
                                    <img src="images/site/Daniel_CUERVO_BERNAL.jpg">
                                </figure>
                                <header class="gDesc persona">
                                    <h1>Daniel CUERVO BERNAL</h1>
                                    <h2>DESHIELO</h2>
                                    <h3>Cortometraje | 14 min.</h3>
                                    <h3>Ficción / Drama</h3>
                                    <a href="resumen-persona.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop personajes">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>Una fría y lluviosa, casi onírica, ciudad. Camilo, un joven que
                                                    acaba de ser asesinado, va en busca de su novia y su madre para
                                                    poder culminar las relaciones que quedaron abiertas en vida y
                                                    así trascender completamente al mundo de los muertos. Los sueños
                                                    serán el medio donde podrá comunicarse con los vivos.</p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie noStyle">
                            <div>
                                <figure class="gImg personaje">
                                    <img src="images/site/Daniela_LOPEZ_MORENO.jpg">
                                </figure>
                                <header class="gDesc persona">
                                    <h1>Daniela LÓPEZ MORENO</h1>
                                    <h2>LA RABIA</h2>
                                    <h3>Cortometraje | 20 min.</h3>
                                    <h3>Ficción / Thriller-Terror</h3>
                                    <a href="resumen-persona.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop personajes">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>Janis es una chica de 17 años que practica skate, un deporte que
                                                    la hace sentir libre. Una tarde es atacada por un hombre que la
                                                    toca sin su consentimiento. A raíz de este evento Janis
                                                    comenzará a manifestar síntomas de Rabia, lo que culminará en un
                                                    ataque violento en búsqueda de venganza.</p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie noStyle">
                            <div>
                                <figure class="gImg personaje">
                                    <img src="images/site/Jannina_SANCHEZ_VENEGAS.jpg">
                                </figure>
                                <header class="gDesc persona">
                                    <h1>Jannina SÁNCHEZ VENEGAS</h1>
                                    <h2>TRAYECTO DE ORO</h2>
                                    <h3>Serie | 45 min.</h3>
                                    <h3>Ficción / Acción</h3>
                                    <a href="resumen-persona.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop personajes">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>Es el año 2010, tras el incendio de su hogar, la muerte de su
                                                    padre y haber sido violada, todo a manos de la guerrilla, Aurora
                                                    huye con su pequeño hijo desde Florencia, Caquetá, hasta la
                                                    capital. El niño, en medio de su imaginación e inocencia, ve
                                                    cada uno de los sucesos de manera fantástica, pues su mamá
                                                    siempre se ha encargado de nutrirle la imaginación para que
                                                    evite sentir lo que se vive constantemente. La única opción de
                                                    Aurora, una vez lleguen a Bogotá, será intentar contactar al
                                                    papá de su hijo. Ante el desconsolador panorama que les espera a
                                                    su llegada, deberán encontrar alguna solución frente a tanta
                                                    adversidad.</p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie noStyle">
                            <div>
                                <figure class="gImg personaje">
                                    <img src="images/site/Kerly_Dayanna_CUENCA_MOJICA.jpg">
                                </figure>
                                <header class="gDesc persona">
                                    <h1>Kerly Dayanna CUENCA MOJICA</h1>
                                    <h2>FLORES PARA JAVIER</h2>
                                    <h3>Cortometraje | 45 min.</h3>
                                    <h3>Documental biográfico</h3>
                                    <a href="resumen-persona.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop personajes">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>A Javier Moreno, un compositor visionario y genial, su temprana
                                                    muerte le niega el reconocimiento. 30 años después, sus
                                                    composiciones salen a la luz y su figura cobra vigencia e
                                                    importancia. Famoso por ser el requintista de Los Carrangueros
                                                    de Ráquira, tras la disolución del grupo concibe un proyecto
                                                    musical arriesgado y experimental en clave de música popular,
                                                    pero las discográficas le negaron visibilidad. Poco a poco, por
                                                    lo original de su propuesta, Javier se convierte en una figura
                                                    de culto y por iniciativa de su primo sus composiciones se
                                                    editan en 2015 y la música colombiana encuentra una bocanada de
                                                    aire fresco.</p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie noStyle">
                            <div>
                                <figure class="gImg personaje">
                                    <img src="images/site/Laura_CARVAJAL.jpg">
                                </figure>
                                <header class="gDesc persona">
                                    <h1>Laura CARVAJAL</h1>
                                    <h2>LIEBRES</h2>
                                    <h3>Cortometraje | 15 min.</h3>
                                    <h3>Ficción / Thriller-Terror</h3>
                                    <a href="resumen-persona.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop personajes">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>Pilar, una adolescente, vive con sus dos hermanos en una gran
                                                    hacienda en Boyacá. Ante la ausencia constante de sus padres
                                                    Elsa, la criada, y su nieta también adolescente, Valentina, son
                                                    sus únicas acompañantes y encargadas. Pese a que Valentina
                                                    siempre ha intentado mantener una relación cercana con Pilar,
                                                    ella es indiferente a cualquier persona que esté a su servicio,
                                                    hasta que una tarde, camino al río, comienzan a establecer una
                                                    relación más cercana, contándose secretos y riéndose, sin saber
                                                    que al acecho hay un hombre cambiará el destino de sus vidas.
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie noStyle">
                            <div>
                                <figure class="gImg personaje">
                                    <img src="images/site/Laura_MONTES.jpg">
                                </figure>
                                <header class="gDesc persona">
                                    <h1>Laura MONTES</h1>
                                    <h2>ALFOMBRADO</h2>
                                    <h3>Cortometraje | 10 min.</h3>
                                    <h3>Ficción / Drama</h3>
                                    <a href="resumen-persona.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop personajes">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>M, un hombre que está perdiendo sus recuerdos progresivamente,
                                                    regresa a la casa de su familia después de un divorcio y
                                                    buscando recomenzar su vida. Un día, M descubre que siempre que
                                                    toca la alfombra de la sala recupera sus recuerdos a largo
                                                    plazo. Gracias a la alfombra, descubre un don que le permite
                                                    navegar en el tiempo a través de los tapetes y se da cuenta que
                                                    empiezan a curar sus dolores del alma. Ahora, M navega recuerdos
                                                    que incluso no son suyos. Pero pronto, ante su separación, se
                                                    enfrentará a la pregunta más importante: ¿memoria u olvido?</p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie noStyle">
                            <div>
                                <figure class="gImg personaje">
                                    <img src="images/site/Laura_GONZALEZ_REYES.jpg">
                                </figure>
                                <header class="gDesc persona">
                                    <h1>Laura GONZÁLEZ REYES</h1>
                                    <h2>LA OPORTUNIDAD</h2>
                                    <h3>Cortometraje | 10 min.</h3>
                                    <h3>Ficción / Drama</h3>
                                    <a href="resumen-persona.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop personajes">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>Chico es un niño de 11 años inducido por sus amigos en el robo al
                                                    “raponazo”. Annete es una fotógrafa extranjera que retrata
                                                    Bogotá y que se convierte en la primera víctima de este
                                                    principiante ladrón. Chico encuentra en la cámara hurtada las
                                                    fotografías de una ciudad que no reconoce, pero que tantas veces
                                                    ha recorrido. Quiere hacer sus propias fotos, pero la cámara se
                                                    queda sin batería. Su única opción para continuar explorando su
                                                    curiosidad es acercarse a Annete. Dos mundos diferentes
                                                    coinciden gracias a las imágenes de una ciudad.</p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie noStyle">
                            <div>
                                <figure class="gImg personaje">
                                    <img src="images/site/Laura_Sofia_ORTIZ_MONTES.jpg">
                                </figure>
                                <header class="gDesc persona">
                                    <h1>Laura Sofía ORTIZ MONTES</h1>
                                    <h2>DELIRIO</h2>
                                    <h3>Cortometraje | 8 min.</h3>
                                    <h3>Experimental</h3>
                                    <a href="resumen-persona.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop personajes">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>A Delirio, la indecisión sobre su maternidad la lleva a
                                                    desarrollar un brote psicótico. Mientras realiza su trabajo
                                                    diario como pianguera, en pacifico colombiano, atraviesa por
                                                    alucinaciones en las que seres antiguos del manglar y el bosque
                                                    húmedo reclaman a su recién nacida, llevándola a un estado de
                                                    confusión en el que no es capaz de diferenciar la realidad de su
                                                    neurosis. Consumida, decide rendirse a los encuentros. En medio
                                                    del mangle, encuentra tranquilidad y libertad al entregar a su
                                                    bebé, despidiéndose de ella para siempre.</p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie noStyle">
                            <div>
                                <figure class="gImg personaje">
                                    <img src="images/site/Natalia_GIRALDO_TARAZONA.jpg">
                                </figure>
                                <header class="gDesc persona">
                                    <h1>Natalia GIRALDO TARAZONA</h1>
                                    <h2>CACHIRRE</h2>
                                    <h3>Cortometraje | 25 min.</h3>
                                    <h3>Ficción / Drama</h3>
                                    <a href="resumen-persona.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop personajes">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>Con las lluvias de abril y mayo el cauce del Ariari se desborda,
                                                    inundando las llanuras, un hecho que aprovechan los cachirres,
                                                    reptiles de 2 y 3 metros de largo, quienes abandonan su hábitat
                                                    en los ríos y se adentran en la llanura donde atacan a
                                                    jornaleros y cabezas de ganado. Ante la repentina muerte de Don
                                                    Joaquín, sus hijos viajan a sus tierras para convencer a su
                                                    madre de mudarse a la ciudad. Siguiendo el rastro de un cachirre
                                                    que atormenta la finca, se adentran en el llano donde serán
                                                    testigos de eventos extraños tras los que descubrirán al
                                                    espíritu de Don Joaquín, que se niega a abandonar sus tierras.
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie noStyle">
                            <div>
                                <figure class="gImg personaje">
                                    <img src="images/site/Paula_CARDONA_CARMONA.jpg">
                                </figure>
                                <header class="gDesc persona">
                                    <h1>Paula CARDONA CARMONA</h1>
                                    <h2>BORRASCA</h2>
                                    <h3>Cortometraje | 15 min.</h3>
                                    <h3>Ficción / Drama</h3>
                                    <a href="resumen-persona.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop personajes">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>En un viaje sin retorno, Caronte y Cerbero, recorren la bruma
                                                    espectral de la ciudad mientras la inclemencia de los combos
                                                    hace cumplir sus órdenes. Caronte, como el viejo barquero, lleva
                                                    a su amigo Cerbero por un último viaje antes de entregarlo a los
                                                    hombres que han sellado su destino.</p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>

                        <article class="itemSMovie noStyle">
                            <div>
                                <figure class="gImg personaje">
                                    <img src="images/site/Simon_Federico_AVILA_ALVARADO.jpg">
                                </figure>
                                <header class="gDesc persona">
                                    <h1>Simón Federico ÁVILA ALVARADO</h1>
                                    <h2>STARMAN</h2>
                                    <h3>Cortometraje | 20 min.</h3>
                                    <h3>Ficción / Sci Fi</h3>
                                    <a href="resumen-persona.php" class="openFancy cboxElement" data-rel="relelenco">
                                        <div class="sinop personajes">
                                            <div class="desc">
                                                <h5>Sinopsis</h5>
                                                <p>Con el fin del mundo, Bugs, un niño campesino ha quedado solo.
                                                    Tras años de esperar señales de otros sobrevivientes, se
                                                    encuentra con un cosmonauta extraterrestre perdido en la tierra.
                                                    Mientras lo ayuda a reparar su nave, se encariña con él y
                                                    sabotea su nave para que no pueda irse. Sin embargo, el
                                                    cosmonauta empieza a morir rápidamente. Preocupado porque, por
                                                    su culpa, corra la misma suerte que su padre, arregla la nave
                                                    para dejarlo ir, incluso si eso implica volver a estar solo.
                                                    Pero el encuentro le ha hecho madurar, cansado de esperar a que
                                                    alguien lo encuentre, toma su bicicleta y sale del pueblo por
                                                    primera vez en busca de otros sobrevivientes.</p>
                                            </div>
                                        </div>
                                    </a>
                                </header>
                            </div>
                        </article>
                    </div>

                </div>
            </div>
 -->


        </div>
    </div>
</div>