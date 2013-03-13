<?php

function alert($msg,$success=true,$delayed=false){
	//figure type
	if($success === true) $type = 'success';
	elseif($success === false) $type = 'error';
	else $type = 'warning';
	//deal with delayed alerts
	if($delayed){
		$alert = session('delayed_alert');
		if(!is_array($alert)) $alert = array();
		$alert[$type][]['msg'] = $msg;
		session('delayed_alert',$alert);
		return true;
	//add to runtime alerts
	} else {
		if(!class_exists('Tpl'))
			throw new Exception('Tpl library must be available for alerts');
		$alert = Tpl::_get()->get('alert');
		if(!is_array($alert)) $alert = array();
		$alert[$type][]['msg'] = $msg;
		Tpl::_get()->set('alert',$alert);
		return true;
	}
	return false;
}

function redirect($url){
	if(empty($url) && class_exists('Url') && Url::_isCallable('home'))
		$url = Url::home();
	elseif(empty($url))
		$url = '/'; //should get us home
	header('Location: '.$url);
	exit;
}
