<?php

namespace App\Controllers\web;

use App\Controllers\MyApiRest;
use App\Models\web\BannerWebModel;
use App\Models\web\NoticiaWebModel;
use App\Models\web\VideohomeWebModel;

class Home extends  MyApiRest
{
	protected $format    = 'json';


	public function index()
	{
		return view('home');
	}


	public function getBanners()
	{
		$banners = new BannerWebModel();
		$array = ['img_ban as imagenban', 'lin_bam as link'];
		$data = $banners->select($array)->where('tip_ban', 1)->orderBy('ord_ban')->findAll();
		return view('components/home/1-banner', ['banners' => $data]);
	}


	public function getTexts()
	{
		$banners = new BannerWebModel();
		$array = ['txt_ban as texto'];
		$data = $banners->select($array)->where('tip_ban', 2)->orderBy('ord_ban')->findAll();
		return view('components/home/2-cifras', ['textos' => $data]);
	}

	public function getNoticiaRecomienda()
	{
		$noticia = new NoticiaWebModel();
		$array = ['img_not as imangen', 'lin_not as url', 'fue_not as fuente', 'tit_not as titulo', 'fec_not as fecha', 'ent_not as estradilla'];
		$data = $noticia->select($array)->where('tip_not<', 3)->orderBy('ord_not , tip_not , cod_not')->findAll();
		return view('components/home/3-noticias', ['noticias' => $data]);
	}


	public function getVideo()
	{
		$video = new VideohomeWebModel();
		$array = ['you_vid as youtube', 'img_vid as imagen', 'tit_vid as titulo', 'sti_vid as subtitulo', 'ent_not as entradilla'];
		$data = $video->select($array)->findAll();
		return view('components/home/4-videos', ['video' => $data[0]]);
	}


	public function getDestacados()
	{
		$noticia = new NoticiaWebModel();
		$array = ['img_not as imangen', 'lin_not as url', 'fue_not as fuente', 'tit_not as titulo', 'fec_not as fecha', 'ent_not as estradilla'];
		$data = $noticia->select($array)->where('tip_not', 3)->orderBy('ord_not')->findAll();
		// print_r($data);
		return view('components/home/5-alertas', ['noticias' => $data]);
	}


	public function getLogos()
	{
		$banners = new BannerWebModel();
		$array = ['img_ban as imagenban'];
		$data = $banners->select($array)->where('tip_ban', 3)->orderBy('ord_ban')->findAll();
		return view('components/home/6-prefooter', ['logos' => $data]);
	}

	public function info(){
		// echo phpinfo();
		echo '';
	}
}