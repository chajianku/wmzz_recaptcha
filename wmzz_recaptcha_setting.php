<?php
if (!defined('SYSTEM_ROOT')) { die('Insufficient Permissions'); } 

$s = option::pget('wmzz_recaptcha');
?>
<h2>reCAPTCHA 注册验证码</h2><br/>
<form action="setting.php?mod=plugin:wmzz_recaptcha" method="post">
	<div class="input-group">
	  <span class="input-group-addon">Public Key [ 公钥 ]</span>
	  <input type="text" class="form-control" name="ak" required="" value="<?php echo $s['ak'] ?>">
	</div><br>
	<div class="input-group">
	  <span class="input-group-addon">Private Key [ 私钥 ]</span>
	  <input type="text" class="form-control" name="sk" required="" value="<?php echo $s['sk'] ?>">
	</div><br>
	<button type="submit" class="btn btn-success" >保存设置</button>
</form>

<br/>
请在 reCAPTCHA API 管理页面，选择添加的域名，复制 Public Key 和 Private Key 到上面的表单中即可
<br/><br/>
<b>相关链接：</b><a href="https://www.google.com/recaptcha/admin#list" target="_blank">管理 reCAPTCHA API</a> | 
<a href="https://www.google.com/recaptcha/admin#createsite" target="_blank">添加 reCAPTCHA API</a>
<br/>你可能需要翻墙才能打开上述地址
<br/><br/><br/>
<div class="well">
<b>测试验证码：</b><br/>
<form action="index.php?plugin=wmzz_recaptcha&mod=test" method="post">
<?php wmzz_recaptcha_show(); ?>
<button type="submit" class="btn btn-primary" >提交</button>
</form>
</div>