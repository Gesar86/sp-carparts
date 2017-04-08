<?= $MSG['RecoverPasswordModule']['msg9'] ?>

<? if (!isset($recovery['messages'])) { ?>

	<? if ($csStrictRegistration): ?>
		<?= $csStrictRegistration; ?>
	<? else: ?>
		<div class="ar_form">
			<?= $recovery['validationScript'] ?>
			<form id="<?= $recovery['id'] ?>" name="<?= $recovery['name'] ?>" action="<?= $recovery['action'] ?>" method="<?= $recovery['method'] ?>" onsubmit="<?= $recovery['onsubmit'] ?>">

				<? if ($csSendSmsRecoverPassword) { ?>
					<p><?= $MSG['RecoverPasswordModule']['msg15'] ?></p>
				<? } else { ?>
					<p><?= $MSG['RecoverPasswordModule']['msg10'] ?></p>
				<? } ?>
				<table border="0">

					<tr>
						<td class="fname"><?= $recovery['fields']['email']['caption'] ?>:</td>
						<td class="fvalue"><?= $recovery['fields']['email']['html'] ?></td>
					</tr>
					<? if ($csSendSmsRecoverPassword) { ?>
						<tr>
							<td class="fname"><?= $recovery['fields']['contact_phone']['caption'] ?>:</td>
							<td class="fvalue"><?= $recovery['fields']['contact_phone']['html'] ?></td>
						</tr>
					<? } ?>
					<tr>
						<td class="fname"><?= $recovery['fields']['reg_hc_code']['caption'] ?></td>
						<td class="fvalue">
							<table>
								<tr>
									<td class="fvalue_child"><?= $recovery['fields']['reg_hc_code']['html'] ?></td>
									<td class="fvalue_child"><?= $recovery['fields']['reg_hc_image']['html'] ?></td>
								</tr>
							</table>
						</td>
					</tr>

					<tr>
						<td class="fname"></td>
						<td class="fvalue"><?= $recovery['fields']['get_password']['html'] ?></td>
					</tr>

				</table>

				<?= $recovery['fields']['_prid']['html'] ?>
				<?= $recovery['fields']['subj']['html'] ?>

			</form>
		</div>
	<?endif ?>

<? } else { ?>

	<? $process_messages = & $recovery; ?>
	<?  ?><? if (count($process_messages['messages']) > 0) {
	
	foreach($process_messages['messages'] as $message) {
		
		echo $message;
		
	}

} ?><?  ?>

<? } ?>