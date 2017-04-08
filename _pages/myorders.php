<? if (empty($client->cst_category_id)) { ?>

<?=$_interface->MSG['AccessDenied']['msg1']?>
<?=$_interface->MSG['AccessDenied']['msg2']?>

<? } else { ?>

<? 	
	$_SERVER['REQUEST_URI'] = preg_replace('#hideTitles=1&getPage=[^=]+&_get_block=1#Uis','',$_SERVER['REQUEST_URI']);
	if ($_REQUEST['getPage'] == 'orders') {
		ob_clean();

		echo AutoResource_CallModule(
			'OrderListModule',
			'module.order-list.php',
			'DR_PHP',
			true
		);
		
		exit();
	
	} elseif ($_REQUEST['getPage'] == 'positions') {
		ob_clean();

		echo AutoResource_CallModule(
			'PositionListModule',
			'module.position-list.php',
			'DR_PHP',
			true
		);
		
		exit();
	} else {

if ($_COOKIE['orderTab'] == 'orders') {
	$orderTab = 'orders';
} else {
	$orderTab = 'positions';
}
$GLOBALS['hideTitles'] = true;
?>
<script type="text/javascript">

	var allLoaded = false;

	function switchOrders(el) {
		
		if (el == 'positions') {
			
			$('morders').style.display = 'none';
			$('torders').removeClass('tab_active');
			$('mpositions').style.display = 'block';
			$('tpositions').addClass('tab_active');
			setCookie('orderTab','positions');
			
			if (allLoaded == false) {
				$('mpositions').innerHTML = '<center><img src="/images/ajax-loader.gif" /></center>';
				loadContent('mpositions','/shop/myorders.html?hideTitles=1&getPage=positions&_get_block=1', false, false, true, false);
				allLoaded = true;
				
				$$('#mpositions .tipz').each(function(element,index) {
					var content = element.get('title');
					element.store('tip:title', '');
					element.store('tip:text', content);
				});
				var tipz = new Tips('.tipz',{
					className: 'tipz',
					fixed: false,
					hideDelay: 50,
					showDelay: 50
				});
				var dcm_datetime_picker = new Picker.Date.Range($('dcm_datetime'), {
					timePicker: false, 
					format: '%d.%m.%y',
					positionOffset: {x: 0, y: 0}, 
					pickerClass: 'datepicker_dashboard_ranger',
					useFadeInOut: !Browser.ie,
					columns: 1
				});
				var pst_arrival_date_picker = new Picker.Date.Range($('pst_arrival_date'), {
					timePicker: false, 
					format: '%d.%m.%y',
					positionOffset: {x: 0, y: 0}, 
					pickerClass: 'datepicker_dashboard_ranger',
					useFadeInOut: !Browser.ie,
					columns: 1
				});
				
				$$('#mpositions select').each(function(el){
					replaceSelect(el);
					$(el.id+'_ds').style.width='45px';
					$(el.id+'_ds').style.height='23px';
					$$('#'+el.id+'_ds .select-box-options').set('styles', {
						'width':'45px'
					});
					$$('#'+el.id+'_ds a').set('styles', {
						'overflow':'hidden'
					});
				});
				
				
			}
			
		} else {
			
			$('morders').style.display = 'block';
			$('torders').addClass('tab_active');
			$('mpositions').style.display = 'none';
			$('tpositions').removeClass('tab_active');
			setCookie('orderTab','orders');
			
			if (allLoaded == false) {
				$('morders').innerHTML = '<center><img src="/images/ajax-loader.gif" /></center>';
				loadContent('morders','/shop/myorders.html?hideTitles=1&getPage=orders&_get_block=1', false, false, true, false);
				allLoaded = true;
				$$('#morders .tipz').each(function(element,index) {
					var content = element.get('title');
					element.store('tip:title', '');
					element.store('tip:text', content);
				});
				var tipz = new Tips('.tipz',{
					className: 'tipz',
					fixed: false,
					hideDelay: 50,
					showDelay: 50
				});
				var date_picker = new Picker.Date.Range($('date'), {
					timePicker: false, 
					format: '%d.%m.%y',
					positionOffset: {x: 0, y: 0}, 
					pickerClass: 'datepicker_dashboard_ranger',
					useFadeInOut: !Browser.ie,
					columns: 1
				});
				
				$$('#morders select').each(function(el){
					replaceSelect(el);
					if (el.id == 'fo_ord_id') {
						$(el.id+'_ds').style.width='45px';
						$(el.id+'_ds').style.height='23px';
						$$('#'+el.id+'_ds .select-box-options').set('styles', {
							'width':'100%'
						});
					} else {
						$(el.id+'_ds').style.width='60px';
						$(el.id+'_ds').style.height='25px';
						$$('#'+el.id+'_ds .select-box-options').set('styles', {
							'width':'auto'
						});
					}
				});

			}
			
		}

		setWidth();
		
	}
	
	window.addEvent('domready', function() {
		$('m<?=($orderTab=='orders'?'positions':'orders')?>').style.display = 'none';
	}); 
</script>

<h1><?=$_interface->MSG['OrderListModule']['msg13']?></h1>
<div id="orders_tabs" class="flc">
	<ul>
		<li id="tpositions" <?=($orderTab=='positions'?'class="tab_active"':'')?> onclick="switchOrders('positions')"><?=$_interface->MSG['OrderListModule']['msg11']?><span class="tab_act"></span></li>
		<li id="torders" <?=($orderTab=='orders'?'class="tab_active"':'')?> onclick="switchOrders('orders')"><?=$_interface->MSG['OrderListModule']['msg12']?><span class="tab_act"></span></li>
	</ul>
</div>

<div id="morders">
<?
if ($orderTab == 'orders') {
	echo AutoResource_CallModule(
		'OrderListModule',
		'module.order-list.php',
		'DR_PHP',
		true
	);
}
?>
</div>

<div id="mpositions">
<?
if ($orderTab == 'positions') {
	echo AutoResource_CallModule(
		'PositionListModule',
		'module.position-list.php',
		'DR_PHP',
		true
	);
}
?>
</div>
<? } ?>

<? } ?>