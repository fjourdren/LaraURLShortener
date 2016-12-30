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
			Session::flash("error", "Your link isn't valid, it need to start with http:// or https://.");
			return redirect('/');
		}


		$checkUrlInDb = Url::UrlWithTarget($target);
		if($checkUrlInDb!=false) {
			Session::flash("sucessId", $checkUrlInDb['attributes']['id']);
			return redirect('/');
		}


		$url = new Url();
		$id = $url->generateID();
		$url->target = $target;
		$url->save();


		Session::flash("sucessId", $id);
		return redirect('/');
	}


	public function redirect($id) {
		$url = Url::UrlWithId($id);

		if(!isset($url)) {
			Session::flash("error", "This link doesn't exist.");
			return redirect('/');
		}

		$target = $url->target;
		echo $target;
		return redirect(htmlentities($url->target));
	}

}
