<?php
if (!defined('SYSTEM_ROOT')) { die('Insufficient Permissions'); } 
if(ROLE != 'admin') { msg('权限不足'); }

global $i;

if($i['mode'][0] == 'test') {
	$s = option::pget('wmzz_recaptcha');
	$resp = recaptcha_check_answer($s['sk'],
        $_SERVER["REMOTE_ADDR"],
        $_POST["recaptcha_challenge_field"],
        $_POST["recaptcha_response_field"]
    );
    if (!$resp->is_valid) {
    	msg('验证码错误');
    } else {
    	msg('验证码正确');
    }
}