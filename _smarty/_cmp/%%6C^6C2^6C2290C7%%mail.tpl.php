<?php /* Smarty version 2.6.14, created on 2014-07-15 16:54:04
         compiled from /home/www/autocom.net.ua/www/_smarty/content/mail.tpl */ ?>
<div>
<?php if ($this->_tpl_vars['submit'] == 1): ?>

<center>
	Ваше сообщение успешно отправлено. <a href="/message/">Вернуться к форме отправки сообщений</a>.
</center>	
<?php else: ?>
	
	<center><?php echo $this->_tpl_vars['list']; ?>
</center>
	
<?php endif; ?>

<?php if ($this->_tpl_vars['form_show'] == '1'): ?>

<?php if ($this->_tpl_vars['hc_code'] == '1'): ?>
<div style="color:#ff0000;" align="center">Введенные вами цифры не совпадают с данными на изображении</div>
<?php endif; ?>

<?php echo $this->_tpl_vars['form']; ?>

<?php endif; ?>
</div>