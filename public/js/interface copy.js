// Interface
$(document).ready(function () {
	loadMaxScrollTop();
	loadBtnMMenu();
	loadSubmenus();
	loadBtnToggle();
	loadBannerHome();
	loadSliderHSection();
	loadSliderPrefooter();
	loadSliderMovies();
	loadSliderNews();
	loadSliderAlertas();
	loadSliderHForma();
	loadSlidersIMovie();
	loadSliderImgs();
	loadSliderGVideos();
	loadSlidersPerson();
	loadTabsListMovies();
	loadTabsIMovie();
	loadTabsTeam();
	// loadSliderCalendar();
	loadFancyMulti();
	loadPlayerMusic();
	blurGeneralSelects();
	loadCalendarRange();
});

/* acordion */
$(".accordion-wrap").on("click", function () {
	$(this).children().eq(1).slideToggle(300);
	$(this).children().eq(0).toggleClass("accordion-no-bar");
	$(this).siblings().find(".accordion-header").removeClass("accordion-gold");
	$(this).siblings().find(".accordion-header i").removeClass("rotate-arrow");
	$(this).find(".accordion-header").toggleClass("accordion-gold");
	$(this).find(".arrow").toggleClass("rotate-arrow");

	$(".accordion-wrap .accordion-text")
		.not($(this).children().eq(1))
		.slideUp(300);
});

$(window).on({
	load: function () {
		pageLoading();
	},
	resize: function () {
		loadMaxScrollTop();
		resizeFancy();
	},
	scroll: function () {
		var st = $(this).scrollTop();
		if (st < 130 || st <= 0) {
			toggleSmallHeader("up");
		}
		// if (st < lastScrollTop || st <= 0) { toggleSmallHeader('up'); }
		else {
			toggleSmallHeader("down");
		}
		lastScrollTop = st;
		if (lastScrollTop > maxScrollTop) {
			lastScrollTop = maxScrollTop;
		}
	},
});

// Max scrollTop
var lastScrollTop = 0,
	maxScrollTop;
function loadMaxScrollTop() {
	maxScrollTop = $("#mainWrapper").innerHeight() - $(window).height();
}

// Small header
function toggleSmallHeader(event) {
	var header = $(".pageHeader"),
		classSmall = "smallHeader";
	if (header.length) {
		if (event === "up") {
			header.removeClass(classSmall);
		} else {
			header.addClass(classSmall);
		}
	}
}

// Menu mobile
function loadBtnMMenu() {
	var btnMMenu = $("#btnMMenu");
	if (btnMMenu.length) {
		btnMMenu.on("click", function (e) {
			e.preventDefault();
			toggleMMenu("");
		});
	}
}
function toggleMMenu(evento) {
	var wrapper = $("#mainWrapper"),
		claseM = "mmenuOpen";
	if (evento == "close") {
		wrapper.removeClass(claseM);
	} else {
		wrapper.toggleClass(claseM);
	}
}

// Submenus
function loadSubmenus() {
	var submenu1 = $(".mainMenu > ul > li > ul"),
		submenu2 = $(".mainMenu > ul > li > ul > li > ul");
	if (submenu1.length) {
		var parent = submenu1.parent("li"),
			btnS1 = parent.find("> a");
		parent.addClass("sm1");
		btnS1.addClass("btnS1 btnSMenu");
		$(".btnS1").on("click", function (e) {
			e.preventDefault();
			toggleSubmenu($(this), ".sm1");
		});
	}
	if (submenu2.length) {
		var parent = submenu2.parent("li"),
			btnS2 = parent.find("> a");
		parent.addClass("sm2");
		btnS2.addClass("btnS2 btnSMenu");
		$(".btnS2").on("click", function (e) {
			e.preventDefault();
			toggleSubmenu($(this), ".sm2");
		});
	}
}
function toggleSubmenu(btn, classSM) {
	var classActive = "smActive",
		submenuActive = $(classSM + "." + classActive),
		parent = btn.parent(classSM);
	if (parent.hasClass(classActive)) {
		submenuActive.removeClass(classActive);
	} else {
		submenuActive.removeClass(classActive);
		parent.addClass(classActive);
	}
}

// Toggle div
function loadBtnToggle() {
	var toggleDiv = $(".toggleDiv");
	if (toggleDiv.length) {
		toggleDiv.each(function () {
			var btnActual = $(this),
				div = $(btnActual.data("id"));
			btnActual.on("click", function (e) {
				e.preventDefault();
				if (btnActual.hasClass("windowClose")) {
					e.stopPropagation();
				}
				toggleGeneralDiv("toggle", btnActual, div);
			});
			if (btnActual.hasClass("windowClose")) {
				div.on("click", function (e) {
					e.stopPropagation();
				});
				$(window).on("click", function () {
					toggleGeneralDiv("close", btnActual, div);
				});
			}
		});
	}
}
function toggleGeneralDiv(event, btn, div) {
	var classOpen = "divOpen",
		classActive = "active";
	if (div.length) {
		if (event == "close") {
			div.removeClass(classOpen);
			btn.removeClass(classActive);
		} else {
			div.toggleClass(classOpen);
			btn.toggleClass(classActive);
		}
	}
}

// Slider Banner home
function loadBannerHome() {
	var sliderBanner = $(".sliderBanner");
	if (sliderBanner.length) {
		sliderBanner.slick({
			slide: ".gSlide",
			fade: true,
			arrows: false,
			dots: true,
			autoplay: true,
			autoplaySpeed: 7000,
			speed: 1500,
			pauseOnFocus: false,
			pauseOnHover: false,
			responsive: [
				{
					breakpoint: 768,
					settings: { adaptiveHeight: true, autoplay: false },
				},
			],
		});
	}
}

// Slider Small Section Home
function loadSliderHSection() {
	var sliderHSection = $(".sliderHSection");
	if (sliderHSection.length) {
		sliderHSection.slick({
			slide: ".gSlide",
			arrows: false,
			dots: false,
			autoplay: true,
			autoplaySpeed: 5000,
			speed: 500,
			pauseOnFocus: false,
			pauseOnHover: false,
			responsive: [
				{
					breakpoint: 768,
					settings: { adaptiveHeight: true, autoplay: false },
				},
			],
		});
	}
}

// Slider Prefooter Section Home
function loadSliderPrefooter() {
	var sliderPrefooter = $(".sliderPrefooter");
	if (sliderPrefooter.length) {
		sliderPrefooter.slick({
			slide: ".gSlide",
			arrows: false,
			dots: false,
			autoplay: true,
			autoplaySpeed: 5000,
			speed: 500,
			pauseOnFocus: false,
			pauseOnHover: false,
			responsive: [
				{
					breakpoint: 768,
					settings: { adaptiveHeight: true, autoplay: false },
				},
			],
		});
	}
}

// Slider movies
function loadSliderMovies(div) {
	var sliderMovies = $(".sliderMovies");
	if (div) {
		sliderMovies = div.find(".sliderMovies");
	}
	if (sliderMovies.length) {
		if (sliderMovies.hasClass("slick-initialized")) {
			sliderMovies[0].slick.setPosition();
		} else {
			sliderMovies.slick({
				slide: ".gSlide",
				arrows: true,
				dots: false,
				slidesToShow: 5,
				slidesToScroll: 5,
				infinite: false,
				speed: 750,
				responsive: [
					{
						breakpoint: 1024,
						settings: { slidesToShow: 4, slidesToScroll: 4 },
					},
					{
						breakpoint: 768,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 3,
							speed: 500,
						},
					},
					{
						breakpoint: 568,
						settings: { slidesToShow: 2, slidesToScroll: 2 },
					},
				],
			});
		}
	}
}

// Slider news
function loadSliderNews() {
	var sliderBGNews = $(".sliderBGNews"),
		sliderNews = $(".sliderNews"),
		asNavFor = false;
	if (sliderBGNews.length) {
		sliderBGNews.slick({
			slide: ".gSlide",
			fade: true,
			arrows: false,
			dots: false,
			speed: 750,
		});
		asNavFor = ".sliderBGNews";
	}
	if (sliderNews.length) {
		sliderNews.slick({
			slide: ".gSlide",
			adaptiveHeight: true,
			slidesToShow: 2,
			slidesToScroll: 2,
			arrows: true,
			dots: false,
			speed: 750,
			asNavFor: asNavFor,
			responsive: [
				{
					breakpoint: 768,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
						speed: 750,
					},
				},
			],
		});
	}
}

// Slider alertas
function loadSliderAlertas() {
	var sliderBGAlerts = $(".sliderBGAlerts"),
		sliderAlerts = $(".sliderAlerts"),
		asNavFor = false;
	if (sliderBGAlerts.length) {
		sliderBGAlerts.slick({
			slide: ".gSlide",
			fade: true,
			arrows: false,
			dots: false,
			speed: 750,
		});
		asNavFor = ".sliderBGAlerts";
	}
	if (sliderAlerts.length) {
		sliderAlerts.slick({
			slide: ".gSlide",
			adaptiveHeight: true,
			slidesToShow: 2,
			slidesToScroll: 2,
			arrows: true,
			dots: false,
			speed: 750,
			asNavFor: asNavFor,
			responsive: [
				{
					breakpoint: 768,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
						speed: 750,
					},
				},
			],
		});
	}
}

// Slider Formacion
function loadSliderHForma() {
	var sliderForma = $(".sliderForma");
	if (sliderForma.length) {
		sliderForma.slick({
			slide: ".gSlide",
			arrows: true,
			dots: false,
			speed: 500,
			slidesToShow: 4,
			slidesToScroll: 4,
			responsive: [
				{
					breakpoint: 768,
					settings: { slidesToShow: 3, slidesToScroll: 3 },
				},
				{
					breakpoint: 568,
					settings: { slidesToShow: 2, slidesToScroll: 2 },
				},
			],
		});
	}
}

// Slider Fotos y videos
function loadSlidersIMovie(div) {
	if (div) {
		var sliderVideos = div.find(".sliderVideos");
		sliderGallery = div.find(".sliderGallery");
		if (sliderVideos.hasClass("slick-initialized")) {
			sliderVideos[0].slick.setPosition();
		}
		if (sliderGallery.hasClass("slick-initialized")) {
			sliderGallery[0].slick.setPosition();
		}
	} else {
		var sliderPoster = $(".sliderPoster"),
			sliderVideos = $(".sliderVideos"),
			sliderGallery = $(".sliderGallery");
		if (sliderPoster.length) {
			sliderPoster.slick({
				slide: ".gSlide",
				fade: true,
				arrows: false,
				dots: true,
				speed: 500,
				adaptiveHeight: true,
			});
		}
		if (sliderVideos.length) {
			sliderVideos.slick({
				slide: ".gSlide",
				fade: true,
				arrows: false,
				dots: true,
				speed: 500,
			});
		}
		if (sliderGallery.length) {
			sliderGallery.slick({
				slide: ".gSlide",
				infinite: false,
				slidesToShow: 3,
				slidesToScroll: 1,
				arrows: false,
				dots: false,
				autoplay: true,
				autoplaySpeed: 3000,
				speed: 600,
				responsive: [
					{
						breakpoint: 568,
						settings: { slidesToShow: 2, slidesToScroll: 2 },
					},
				],
			});
		}
	}
}

// Slider imgs lightbox
function loadSliderImgs(div) {
	var sliderImg = $(".sliderImg");
	if (div) {
		sliderImg = div.find(".sliderImg");
	}
	if (sliderImg.length) {
		sliderImg.slick({
			slide: ".gSlide",
			fade: true,
			arrows: false,
			dots: false,
			speed: 500,
			adaptiveHeight: true,
		});
	}
}

// Slider general videos
function loadSliderGVideos() {
	var sliderGVideos = $(".sliderGVideos");
	if (sliderGVideos.length) {
		sliderGVideos.slick({
			slide: ".gSlide",
			arrows: true,
			dots: false,
			slidesToShow: 5,
			slidesToScroll: 5,
			infinite: false,
			speed: 750,
			responsive: [
				{
					breakpoint: 1024,
					settings: { slidesToShow: 4, slidesToScroll: 4 },
				},
				{
					breakpoint: 768,
					settings: { slidesToShow: 3, slidesToScroll: 3 },
				},
				{
					breakpoint: 568,
					settings: { slidesToShow: 2, slidesToScroll: 2 },
				},
			],
		});
	}
}

// Slider persona
function loadSlidersPerson() {
	var sliderPBig = $(".sliderPBig"),
		sliderPSmall = $(".sliderPSmall"),
		asNavFor = false;
	if (sliderPBig.length) {
		sliderPBig.slick({
			slide: ".gSlide",
			fade: true,
			adaptiveHeight: true,
			arrows: false,
			dots: false,
			speed: 500,
			asNavFor: ".sliderPSmall",
		});
		asNavFor = ".sliderPBig";
	}
	if (sliderPSmall.length) {
		sliderPSmall.slick({
			slide: ".gSlide",
			slidesToShow: 3,
			slidesToScroll: 1,
			arrows: true,
			dots: false,
			speed: 500,
			asNavFor: asNavFor,
			focusOnSelect: true,
			centerMode: true,
			centerPadding: "0px",
		});
	}
}

// Tabs intern movie
function loadTabsIMovie() {
	var gMTabs = $(".gMTabs");
	if (gMTabs.length) {
		gMTabs.tabs({
			heightStyle: "content",
			activate: function (event, ui) {
				loadSlidersIMovie(ui.newPanel);
			},
		});
	}
}

// Tabs list movies
function loadTabsListMovies() {
	var tabsLMovies = $(".tabsLMovies");
	if (tabsLMovies.length) {
		tabsLMovies.tabs({
			heightStyle: "content",
			activate: function (event, ui) {
				loadSliderMovies(ui.newPanel);
			},
		});
	}
}

// Tabs equipo
function loadTabsTeam() {
	var tabsTeam = $(".tabsTeam");
	if (tabsTeam.length) {
		tabsTeam.tabs({ heightStyle: "content" });
	}
}

// General select
function blurGeneralSelects() {
	var selects = $("select");
	if (selects.length) {
		selects.on("change", function () {
			$(this).blur();
		});
	}
}

// Fancy multimedia
function loadFancyMulti(div) {
	var openImage = $(".openImage"),
		openVideo = $(".openVideo"),
		openFancy = $(".openFancy");
	if (div) {
		(openImage = div.find(".openImage")),
			(openVideo = div.find(".openVideo")),
			(openFancy = div.find(".openFancy"));
	}
	if (openImage.length) {
		openImage.colorbox({
			maxWidth: "100%",
			maxHeight: "100%",
			className: "fImages",
			initialWidth: "100px",
			initialHeight: "100px",
			fixed: true,
			opacity: 0.9,
			transition: "fade",
			speed: 300,
			fadeOut: 300,
			returnFocus: false,
			overlayClose: false,
			escKey: true,
			closeButton: true,
			current: false,
			imgError: "Error al cargar la imagen.",
			rel: getRelFancy,
			title: getTitleFancy,
			onComplete: function () {
				loadBtnsFancy("open");
			},
			onClosed: function () {
				loadBtnsFancy("close");
			},
		});
	}
	if (openVideo.length) {
		openVideo.colorbox({
			iframe: true,
			className: "fVideos",
			width: "1160px",
			height: "662px",
			maxWidth: "100%",
			maxHeight: "100%",
			initialWidth: "100px",
			initialHeight: "100px",
			fixed: true,
			opacity: 0.9,
			transition: "fade",
			speed: 300,
			fadeOut: 300,
			returnFocus: false,
			overlayClose: false,
			escKey: true,
			closeButton: true,
			current: false,
			rel: getRelFancy,
			title: getTitleFancy,
			onComplete: function () {
				loadBtnsFancy("open");
			},
			onClosed: function () {
				loadBtnsFancy("close");
			},
		});
	}
	if (openFancy.length) {
		openFancy.colorbox({
			width: "100%",
			height: "100%",
			className: "fContent",
			initialWidth: "100px",
			initialHeight: "100px",
			fixed: true,
			opacity: 0.9,
			transition: "fade",
			speed: 300,
			fadeOut: 300,
			returnFocus: false,
			overlayClose: false,
			escKey: true,
			closeButton: false,
			current: false,
			rel: getRelFancy,
			title: false,
			onComplete: function () {
				loadBtnsFancy("open");
				loadFancyMulti($("#cboxLoadedContent"));
				loadSliderImgs($("#cboxLoadedContent")); //loadInFancy();
			},
			onClosed: function () {
				loadBtnsFancy("close");
			},
		});
	}
}
function resizeFancy() {
	var fancyContent = $("#colorbox.fContent"),
		fancyVideos = $("#colorbox.fVideos"),
		fancyImages = $("#colorbox.fImages");
	if (fancyContent.length) {
		$.colorbox.resize({ width: "100%", height: "100%" });
	}
	if (fancyVideos.length) {
		var widthWindow = $(window).width();
		if (widthWindow < 1160) {
			$.colorbox.resize({ width: "100%", height: "100%" });
		} else {
			$.colorbox.resize({ width: "1160px", height: "662px" });
		}
	}
	if (fancyImages.length) {
		$.colorbox.resize();
	}
}
function loadBtnsFancy(event) {
	var btnCF = $("#cboxLoadedContent .btnCF"),
		btnClose = $("#cboxClose"),
		classShow = "show";
	if (btnCF.length) {
		btnCF.on("click", function (e) {
			e.preventDefault();
			$.colorbox.close();
		});
	}
	if (event == "open") {
		btnClose.addClass(classShow);
		$("body").css("overflow", "hidden");
	} else {
		btnClose.removeClass(classShow);
		$("body").css("overflow", "auto");
	}
}
function getRelFancy() {
	var rel = $(this).data("rel");
	if (rel !== undefined) {
		return rel;
	} else {
		return false;
	}
}
function getTitleFancy() {
	var title = $(this).data("title");
	if (title !== undefined) {
		var htmlTitle = '<div class="titleFancy">' + title + "</div>";
		return htmlTitle;
	} else {
		return false;
	}
}
function closeAlert() {
	$.colorbox.close();
}

// General alert
(function ($) {
	$.createAlert = function (opt_user) {
		var opt_default = {
			title: "Titulo Alerta",
			content: "Texto Alerta",
			closeButton: true,
			acceptButton: true,
			labelAccept: "Aceptar",
			cancelButton: true,
			labelCancel: "Cancelar",
			onAccept: function () {},
			onCancel: function () {},
			onClosed: function () {},
		};
		var options = $.extend(opt_default, opt_user),
			conBtnClose = "",
			conTitulo = "",
			conButtons = "";
		if (options.closeButton === true) {
			conBtnClose =
				'<button class="cboxCF btnCF" type="button">close</button>';
		}
		if (options.title !== false) {
			conTitulo =
				'<div class="gATitle"><h2>' + options.title + "</h2></div>";
		}
		if (options.cancelButton === true || options.acceptButton === true) {
			conButtons = '<div class="gACBtns">';
			if (options.cancelButton === true) {
				conButtons =
					conButtons +
					'<button id="btnCancel" class="gBtn gButton" type="button"><span>' +
					options.labelCancel +
					"</span></button>";
			}
			if (options.acceptButton === true) {
				conButtons =
					conButtons +
					'<button id="btnAccept" class="gBtn gButton" type="button"><span>' +
					options.labelAccept +
					"</span></button>";
			}
			conButtons = conButtons + "</div>";
		}
		function loadBtnFunctions() {
			var btnA = $("#btnAccept"),
				btnC = $("#btnCancel");
			if (btnA.length) {
				btnA.on("click", function () {
					options.onAccept(); /*$.colorbox.close();*/
				});
			}
			if (btnC.length) {
				btnC.on("click", function () {
					options.onCancel();
					$.colorbox.close();
				});
			}
		}
		var htmlAlert =
			'<div class="gFancyT"><div class="gAlert">' +
			conBtnClose +
			conTitulo +
			'<div class="gADesc">' +
			options.content +
			"</div>" +
			conButtons +
			"</div></div>";
		$.colorbox({
			html: htmlAlert,
			width: "100%",
			height: "100%",
			className: "fContent",
			initialWidth: "100px",
			initialHeight: "100px",
			fixed: true,
			opacity: 0.8,
			transition: "fade",
			speed: 200,
			fadeOut: 200,
			returnFocus: false,
			overlayClose: false,
			escKey: false,
			closeButton: false,
			current: false,
			rel: false,
			title: false,
			onComplete: function () {
				loadBtnsFancy("open");
				resizeFancy();
				toggleLoading("close");
				loadBtnFunctions();
			},
			onClosed: function () {
				loadBtnsFancy("close");
				options.onClosed();
			},
		});
	};
})(jQuery);

// Player music
function loadPlayerMusic() {
	var jpCont = $("#jpCont"),
		jpPlayer = $("#jpPlayer");
	if (jpCont.length && jpPlayer.length) {
		var listSongs = jpCont.find(".listSongs").html();
		var cssSelector = {
			jPlayer: "#jpPlayer",
			cssSelectorAncestor: "#jpCont",
		};
		var playlist = JSON.parse(listSongs);
		var options = {
			volume: 1,
			swfPath: "/js",
			supplied: "webmv, ogv, m4v, oga, mp3",
			useStateClassSkin: true,
			autoBlur: false,
			smoothPlayBar: true,
			keyEnabled: false,
			audioFullScreen: false,
			cssSelector: {
				videoPlay: "",
				play: ".jp-play",
				pause: ".jp-pause",
				stop: "",
				seekBar: ".jpSeekbar",
				playBar: ".jpPlaybar",
				mute: ".jp-mute",
				unmute: ".jp-unmute",
				volumeBar: "",
				volumeBarValue: "",
				volumeMax: "",
				playbackRateBar: "",
				playbackRateBarValue: "",
				currentTime: ".jpCurrtime",
				duration: ".jpDuration",
				title: ".jpTitle",
				fullScreen: "",
				restoreScreen: "",
				repeat: "",
				repeatOff: "",
				gui: ".jpGui",
				noSolution: ".jpNoWork",
			},
			stateClass: {
				playing: "jpPlaying",
				seeking: "jpSeeking",
				muted: "jpMuted",
				looped: "jpLooped",
				fullScreen: "jpFullscreen",
				noVolume: "jpNovolume",
			},
		};
		jpPlayer = new jPlayerPlaylist(cssSelector, playlist, options);
	}
}

// Page loading
function pageLoading() {
	var pLoading = $("#pageLoading");
	if (pLoading.length) {
		pLoading.fadeOut(500);
	}
}

// Loading general
function toggleLoading(event) {
	var body = $("body");
	if (event == "open") {
		var loadExist = body.find(".gLoading");
		if (!loadExist.length) {
			var div = "<div class='gLoading'></div>";
			body.append(div);
		}
	} else {
		var loadExist = body.find(".gLoading");
		if (loadExist.length) {
			loadExist.remove();
		}
	}
}

// Calendar range
function loadCalendarRange() {
	var rangeCalendar = $(".rangeCalendar"),
		dayNames = [
			"Domingo",
			"Lunes",
			"Martes",
			"Miércoles",
			"Jueves",
			"Viernes",
			"Sábado",
		],
		dayNamesMin = ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
		monthNames = [
			"Enero",
			"Febrero",
			"Marzo",
			"Abril",
			"Mayo",
			"Junio",
			"Julio",
			"Agosto",
			"Septiembre",
			"Octubre",
			"Noviembre",
			"Diciembre",
		],
		monthNamesShort = [
			"Enero",
			"Febrero",
			"Marzo",
			"Abril",
			"Mayo",
			"Junio",
			"Julio",
			"Agosto",
			"Septiembre",
			"Octubre",
			"Noviembre",
			"Diciembre",
		]; //["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"];
	if (rangeCalendar.length) {
		rangeCalendar.each(function () {
			var thisCalendar = $(this);
			thisCalendar.daterangepicker({
				presetRanges: false,
				initialText: "Búsqueda por fecha",
				icon: "",
				applyButtonText: "Fijar",
				clearButtonText: "Limpiar",
				cancelButtonText: "Cancelar",
				dateFormat: "yy-mm-dd",
				altFormat: "yy-mm-dd",
				rangeSplitter: " / ",
				datepickerOptions: {
					dayNames: dayNames,
					dayNamesMin: dayNamesMin,
					monthNames: monthNames,
					monthNamesShort: monthNamesShort,
					changeMonth: true,
					changeYear: true,
					numberOfMonths: 1,
					minDate: null,
					maxDate: null,
				},
			});
		});
	}
}

/*
// Slider Calendar home
function loadSliderCalendar() {
    var sliderECal = $('.sliderECal');
    if (sliderECal.length) {
        sliderECal.slick({
            slide: '.gSlide', infinite: false, arrows: true, dots: false, speed: 1000, slidesToShow: 18, slidesToScroll: 18, draggable: false
        });
        changeNameMonth(0);
        sliderECal.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
            changeNameMonth(nextSlide);
        });

        // loadBtnCDay();
    }
}
function changeNameMonth(index) {
    var nameMonth = $('.gECalendar .nameMonth');
    if (nameMonth.length) {
        var itemCDay = $('.sliderECal .gSlide').eq(index).find('.itemCDay');
        if (itemCDay.length) {
            nameMonth.html(itemCDay.data('month') + ' - ' + itemCDay.data('year'));
        }
    }
}
function loadBtnCDay() {
    var btnCDay = $('.btnCDay.dce');
    if (btnCDay.length) {
        btnCDay.on('click', function (e) {
            e.preventDefault();
            var date = $(this).data('date');
            $.ajax({
                type: "POST",
                url: "ajax/getevento.php",
                data: { date: date },
                // cache: false, contentType: false, processData: false,
                beforeSend: function () { /*toggleLoading('open'); },
                error: function () { /*toggleLoading('close'); }
            }).done(function (result) {
                /*toggleLoading('close');
                console.log(result);
            });
        });
    }
}
*/
