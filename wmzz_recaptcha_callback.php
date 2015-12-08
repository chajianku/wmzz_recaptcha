<?php
if (!defined('SYSTEM_ROOT')) { die('Insufficient Permissions'); } 

function callback_init() {
	option::add('plugin_wmzz_recaptcha','a:2:{s:2:"ak";s:0:"";s:2:"sk";s:0:"";}');
}

function callback_remove() {
	option::del('plugin_wmzz_recaptcha');
}
