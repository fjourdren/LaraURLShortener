<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Url;

class indexController extends Controller
{
    
	public function index() {
		return view('index');
	}


	public function postUrl() {
		$target = addslashes($_POST['url']);


		if (filter_var($target, FILTER_VALIDATE_URL) === FALSE) {
			Session::flash("danger", "Your link isn't valid, it need to start with http:// or https://.");
			return redirect('/');
		}


		$checkUrlInDb = Url::where('target', $target)->first();
		if($checkUrlInDb != false) {
			Session::flash("sucess", 'Your short link : <a href="'.$checkUrlInDb->Url().'">'.$checkUrlInDb->Url().'</a>');
			return redirect('/');
		}


		$url = new Url();
		$url->generateID();
		$url->target = $target;
		$url->save();

		Session::flash("sucess", 'Your short link : <a href="'.$url->Url().'">'.$url->Url().'</a>');
		return redirect('/');
	}


	public function redirect($id) {
		$url = Url::where('id', $id)->first();

		if(!isset($url)) {
			Session::flash("danger", "This link doesn't exist.");
			return redirect('/');
		}

		$target = $url->target;
		echo $target;
		return redirect(htmlentities($url->target));
	}

}
