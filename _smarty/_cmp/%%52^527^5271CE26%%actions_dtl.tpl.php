<?php /* Smarty version 2.6.14, created on 2014-09-04 17:39:31
         compiled from /home/www/autocom.net.ua/www/_smarty/content/actions_dtl.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eval', '/home/www/autocom.net.ua/www/_smarty/content/actions_dtl.tpl', 33, false),)), $this); ?>
<h1>Авто-разборка</h1>
<a href="/about/actions/" class="pageLink">Список</a>
<?php echo '<div class="pageContent">';  

	include(__spellPATH("SMARTY_LIB:/content/_sysTables/module.detail-template-func.php"));
	
	if ($validRequest) {

  //echo "<h1>".$this->_tpl_vars['CONTENT'][0]['str_title']."</h1>";

	global $_SYSTEM;
	if (!isset($_SYSTEM->PROMO_PARTS["site_title"]["prm_content"])) $_SYSTEM->SITE_TITLE = $this->_tpl_vars['caption'];
	if (!isset($_SYSTEM->PROMO_PARTS["description"]["prm_content"])) $_SYSTEM->DESCRIPTION = $this->_tpl_vars['caption'];
	
	$date = explode(' ',$this->_tpl_vars['datetime']);
	$this->_tpl_vars['russian_date'] = russian_date($date[0], 'array');
  echo '<br /><div class="actions"><div class="actions_caption2"><h2>';  echo $this->_tpl_vars['caption'];  echo '</h2></div>';  if ($this->_tpl_vars['img']):  echo '<div class="actions_image"><img src="';  echo $this->_tpl_vars['img'];  echo '" alt="';  echo $this->_tpl_vars['caption'];  echo '" title="';  echo $this->_tpl_vars['caption'];  echo '" /></div>';  endif;  echo '';  if ($this->_tpl_vars['full_text']):  echo '<div class="actions_fulltext">';  echo smarty_function_eval(array('var' => $this->_tpl_vars['full_text']), $this); echo '</div>';  endif;  echo '<div class="actions_bottom_date">';  echo _c_strftime('%d %B %Y', strtotime($this->_tpl_vars['datetime']));  echo '</div></div>';  

	}

  echo '</div>'; ?>