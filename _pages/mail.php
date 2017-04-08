<?php

require_once(__spellPATH("LIB:/human_check/lib.humancheck.php"));

$hc = new HumanCheck();
$smarty = new MySmarty();
$render = new PHP_DataRender();
$form_process = new Process("form_process", $render);
$formToDB = new FormToDatabase($_USER['adapter'], "mail", 'check_data', 'onSuccess', null);

$smarty->assign("form_show", "1");

$hc->image_href = '/_phplib/human_check/';

function onSuccess() {

	global $smarty, $CONST;
	$header = "FROM: " . $_REQUEST["email"];

	notifyAdmin($_REQUEST['caption'],
		'<meta http-equiv=content-type Content-Type: text/plain; charset="utf-8"; >
		<table  width="400">
		<tr>
		<td><strong>Тема сообщения:</strong></td>
		<td>' . $_REQUEST['caption'] . '</td>
</tr>
<tr>
<td><strong>Текст сообщения:</strong></td>
<td>' . $_REQUEST['text'] . '</td>
</tr>
<tr>
<td><strong>Контактный  E-mail:</strong></td>
<td>' . $_REQUEST['email'] . '</td>
</tr>
</table>', $header);

	$smarty->assign("form_show", "0");
	$smarty->assign("submit", "1");
}

function check_data() {

	global $hc, $smarty, $form_show;

	$res = true;

	if (!$hc->check("hc_code")) {
		$smarty->assign("submit", "0");
		$smarty->assign("form_show", "1");
		$smarty->assign("hc_code", "1");
		$res = false;
	}

	return $res;
}

//**************************************************************************************
//форма
//**************************************************************************************

$form = new CustomForm("zapis", $_SERVER["REQUEST_URI"], "POST");

$form->bindField(new TextArea("text", "@REQUEST", "350px", "100px"), "<span class=\"form_required_field\"><nobr>Текст сообщения *</nobr></span>", true);

$form->bindField(new Hidden("date", date("Y-m-d H:m:s")));

$form->bindField(new TextBox("caption", "@REQUEST", "350px"), "<span class=\"form_required_field\"><nobr>Тема сообщения *</nobr></span>", true);

$form->bindField(new EmailTextBox("email", "@REQUEST", "350px"), "<span class=\"form_required_field\"><nobr>Контактный  E-mail *</nobr></span>", true);

$form->bindField(new Hidden("date", date("Y-m-d H:m:s")));
$form->bindField(new ImageSubmit("submit", "/images/button_send.gif"));

$form->bindField(new HumanCheckImage("hc_image"));
$form->bindField(new TextBox("hc_code", "", "225px"), "<span class=\"form_required_field\">Введите цифры на <nobr>изображении *</nobr></span>", true);

$form->bindField(new Hidden("_prid", $form->instanceCount));
$form->bindField(new Hidden("subj", get_class($formToDB) . $formToDB->instanceCount));

$form->setStyle('
<table cellpadding="5" border="0" width="100%">
	<tr>
		<td><h1>Форма обратной связи</h1></td>
	</tr>
	<tr>
		<td valign="top">
			<%FormControl:caption@caption%>
			<br/>
			<%FormControl:caption%><br>
		</td>
	</tr>
	<tr>
		<td valign="top">
			<%FormControl:email@caption%><br/><%FormControl:email%>
		</td>
	</tr>
	<tr>
		<td valign="top">
			<%FormControl:text@caption%><br/><%FormControl:text%>
		</td>
	</tr>
	<tr>
		<td valign="top">
			<table cellpadding="3" cellspacing="0">
				<tr>
					<td>
						<%FormControl:hc_code@caption%>
						<br/>
						<%FormControl:hc_code%>
					</td>
					<td style="padding-left:35px;">
						<br />
						<img class="HumanCheck" vspace="10" src="/_phplib/human_check/hc_image.php?sid=' . session_id() . '">
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<input name="submit" value="Отправить" type="submit" class="submitButton">
		</td>
	</tr>
</table>

		<%FormControl:date%>
		<%FormControl:_prid%>
		<%FormControl:subj%>
');

//**************************************************************************************
//
//**************************************************************************************
$formToDB->bindForm($form);
$form_process->addState($form);
$form_process->addState($formToDB);
$smarty->assign("form", $form_process->render($render));

//**************************************************************************************
//вывод сообщений или дерева тем
//**************************************************************************************
echo $smarty->fetch("USER_SMARTY:/content/mail.tpl");