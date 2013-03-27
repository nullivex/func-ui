<?php
/**
 *  OpenLSS - Lighter Smarter Simpler
 *
 *	This file is part of OpenLSS.
 *
 *	OpenLSS is free software: you can redistribute it and/or modify
 *	it under the terms of the GNU Lesser General Public License as
 *	published by the Free Software Foundation, either version 3 of
 *	the License, or (at your option) any later version.
 *
 *	OpenLSS is distributed in the hope that it will be useful,
 *	but WITHOUT ANY WARRANTY; without even the implied warranty of
 *	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *	GNU Lesser General Public License for more details.
 *
 *	You should have received a copy of the 
 *	GNU Lesser General Public License along with OpenLSS.
 *	If not, see <http://www.gnu.org/licenses/>.
 */

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
