<div>亲爱的必应管理员<font color="#f77616"><b><span style="border-bottom: 1px dashed rgb(204, 204, 204); z-index: 1; position: static;" t="7" onclick="return false;" data="210062419" isout="1"><?php echo $adminname; ?></span></b></font>，您好！</div>

<p>您的找回密码链接如下：</p>

<?php $url = \Yii::$app->urlManager->createAbsoluteUrl(['site/reset-pwd', 'timestamp' => $timestamp, 'email' => $email, 'token' => $token]); ?>

<p><a href="<?php echo $url; ?>">点击找回</a></p>

<p>该链接5分钟内有效，请勿传递给别人！</p>

<p>该邮件为系统自动发送，请勿回复！</p>

<p>如非本人操作，请及时访问xxx.com重置密码。​</p>
<b>必应团队</b>


