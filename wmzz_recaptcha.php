<?php
/*
Plugin Name: reCAPTCHA 注册验证码
Version: 1.0
Plugin URL: http://zhizhe8.net
Description: 在注册的时候，要求用户输入难度较高的 reCAPTCHA 验证码，来起到防止恶意注册和打击重复注册的作用
Author: 无名智者
Author Email: kenvix@vip.qq.com
Author URL: http://zhizhe8.net
For: V3.4+
*/
if (!defined('SYSTEM_ROOT')) { die('Insufficient Permissions'); } 

require SYSTEM_ROOT . '/plugins/wmzz_recaptcha/lib.php';

function wmzz_recaptcha_show() {
	echo '请输入验证码：';
	$s = option::pget('wmzz_recaptcha');
	echo recaptcha_get_html($s['ak']) . '<br/><br/>';
}

function wmzz_recaptcha_check() {
    $s = option::pget('wmzz_recaptcha');
	$resp = recaptcha_check_answer($s['sk'],
        $_SERVER["REMOTE_ADDR"],
        $_POST["recaptcha_challenge_field"],
        $_POST["recaptcha_response_field"]
    );
    if (!$resp->is_valid) {
        msg('注册失败，您输入的验证码有误');
    }
}

addAction('reg_page_2','wmzz_recaptcha_show');
addAction('admin_reg_1','wmzz_recaptcha_check');
