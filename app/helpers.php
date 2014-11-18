<?php

function is_admin(){
	return get_admin() != false;
}

function is_user(){
	return Auth::check();
}

function get_admin(){
	if(Session::has('admin')){
		return Session::get('admin');
	}
	return false;
}

function is_guest(){
	return !Auth::check() and !Session::has('admin');
}

function is_buyer(){
	return Auth::check() and Auth::user()->role=="Buyer";
}

function is_seller(){
	return Auth::check() and Auth::user()->role=="Seller";
}
?>