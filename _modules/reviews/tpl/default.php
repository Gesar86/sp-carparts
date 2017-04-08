<h1><?=$page_title?></h1>
<br />

<?if($submit == 1):?>
	
	<p>Ваше сообщение успешно отправлено. <a href="<?=$back_url?>">Вернуться к списку отвеченных вопросов</a>.</p>
	
<?else:?>


	<?if(count($questions) > 0):?>
	
		<?foreach ($questions as $key=>$item):?>
	
		<div  class="question">
			<div class="quest">
			<i><?=$item['text']?></i></div>
			<div class="answer" ><?=$item['reply_text']?></div>
		</div>
		<hr style="height: 1px;" />
	
		<?endforeach?>	
	
	<?endif?>
	<div id="answer_pager"><?=$list?></div>
	
	<script type="text/javascript">
	
		window.addEvent('domready', function() {
			$$('.question').each(function(el){
				el.addEvent('click', function(o){
					
					var myFx = new Fx.Slide(el.getElement('.answer'), {
						duration: 500,
						transition: Fx.Transitions.Pow.easeOut
					});
					myFx.toggle();
				});
				el.getElement('.answer').slide('hide');
			});
		}); 
	</script>
	
	<br />
	<h1>Задайте вопрос</h1>
	<p>Если вы не смогли найти ответ на интересующий вас вопрос на нашем сайте, вы можете задать его нашим специалистам. Для этого заполните предлагаемую форму: </span></p>
	
	<?=$form?>
<?endif?>