<h1><?=$MSG['ReportErrorModule']['msg17']?></h1>

<? if (count($report_error['messages']) > 0) { ?>

	<? $process_messages = &$report_error; ?>
	<?  ?><? if (count($process_messages['messages']) > 0) {
	
	foreach($process_messages['messages'] as $message) {
		
		echo $message;
		
	}

} ?><?  ?>

<? } else { ?>
<div class="ar_form">
	<p><?=$MSG['ReportErrorModule']['msg18']?></p>

	<?=$report_error['validationScript']?>
	<form id="<?=$report_error['id']?>" name="<?=$report_error['name']?>" action="<?=$report_error['action']?>" method="<?=$report_error['method']?>" onsubmit="<?=$report_error['onsubmit']?>">
	<table border="0" cellpadding="5" cellspacing="0">

	<tr>
	<td class="fname"><?=$report_error['fields']['error_type']['caption']?></td>
	<td class="fvalue"><?=$report_error['fields']['error_type']['html']?></td>
	</tr>

	<tr>
	<td class="fname" valign="top" style="padding-top:6px;"><?=$report_error['fields']['error_text']['caption']?></td>
	<td class="fvalue"><?=$report_error['fields']['error_text']['html']?></td>
	</tr>

	<tr>
	<td class="fname"><?=$report_error['fields']['contact_person']['caption']?></td>
	<td class="fvalue"><?=$report_error['fields']['contact_person']['html']?></td>
	</tr>

	<tr>
	<td class="fname"><?=$report_error['fields']['contact_email']['caption']?></td>
	<td class="fvalue"><?=$report_error['fields']['contact_email']['html']?></td>
	</tr>
	
	<tr><td class="fname"><?=$report_error['fields']['reg_hc_code']['caption']?></td>
	<td class="fvalue">
		<table>
			<tr>
				<td class="fvalue_child"><?=$report_error['fields']['reg_hc_code']['html']?></td>
				<td class="fvalue_child"><?=$report_error['fields']['reg_hc_image']['html']?></td>
			</tr>
		</table>
	</td></tr>

	<tr>
	<td></td>
	<td>
	<br/>

	<?=$report_error['fields']['send_error']['html']?>

	</td>
	</tr>

	</table>
	<?=$report_error['fields']['_prid']['html']?>
	<?=$report_error['fields']['subj']['html']?>
	</form>
</div>
<? } ?>