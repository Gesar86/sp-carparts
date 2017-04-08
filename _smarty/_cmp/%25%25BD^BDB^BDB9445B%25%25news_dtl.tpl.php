<?php /* Smarty version 2.6.14, created on 2014-10-02 19:48:39
         compiled from /home/www/autocom.net.ua/www/_smarty/content/news_dtl.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'eval', '/home/www/autocom.net.ua/www/_smarty/content/news_dtl.tpl', 27, false),)), $this); ?>
<h1>Новости</h1>
<a href="/about/news/" class="pageLink">Перечень новостей</a>
<?php echo '<div class="pageContent">';  

	include(__spellPATH("SMARTY_LIB:/content/_sysTables/module.detail-template-func.php"));
	
	if ($validRequest) {

  //echo "<h1>".$this->_tpl_vars['CONTENT'][0]['str_title']."</h1>";

	global $_SYSTEM;
	if (!isset($_SYSTEM->PROMO_PARTS["site_title"]["prm_content"])) $_SYSTEM->SITE_TITLE = $this->_tpl_vars['caption'];
	if (!isset($_SYSTEM->PROMO_PARTS["description"]["prm_content"])) $_SYSTEM->DESCRIPTION = $this->_tpl_vars['caption'];
	
	$date = explode(' ',$this->_tpl_vars['datetime']);
	$this->_tpl_vars['russian_date'] = russian_date($date[0], 'array');
  echo '<br /><div class="news"><div class="news_caption2"><h2>';  echo $this->_tpl_vars['caption'];  echo '</h2></div>';  if ($this->_tpl_vars['full_text']):  echo '<div class="news_fulltext">';  echo smarty_function_eval(array('var' => $this->_tpl_vars['full_text']), $this); echo '</div>';  endif;  echo '<div class="news_bottom_date">';  echo _c_strftime('%d %B %Y', strtotime($this->_tpl_vars['datetime']));  echo '</div></div>';  

	}

  echo '</div>'; ?>