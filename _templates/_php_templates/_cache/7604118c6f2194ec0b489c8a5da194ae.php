<div id="CustomerBasketId" class="<?= (count($authButtons) > 0 ? 'wab' : '') ?>">

	<? if (!empty($login)) { ?>

		<?= $login['validationScript'] ?>
		<form id="<?= $login['id'] ?>" name="<?= $login['name'] ?>" action="<?= $login['action'] ?>" method="<?= $login['method'] ?>" onsubmit="<?= $login['onsubmit'] ?>">

			<?= $login['fields']['loginform']['html'] ?>

			<div class="login_title flc">
				<div class="login_caption leftside"><?= $MSG['LoginFormModule']['msg34'] ?></div>
				<div class="login_register rightside">
					<a href="/registration.html"><?= $MSG['LoginFormModule']['msg17'] ?></a></div>
			</div>

			<div class="login_inputs flc">
				<? if (!empty($LOGIN_ERROR)) { ?>

					<div class="login_error"><?= $LOGIN_ERROR ?></div>

				<? } ?>
				<div class="leftside"><?= $login['fields']['userlogin']['html'] ?></div>
				<div class="rightside"><?= $login['fields']['userpassword']['html'] ?></div>
			</div>
			<div class="login_buttons flc">
				<div class="user_remember leftside"><?= $login['fields']['remember']['html'] ?></div>
				<div class="rightside"><?= $login['fields']['login']['html'] ?></div>
			</div>
			<div class="login_recovery">
				<a href="/recover_password.html"><?= $MSG['LoginFormModule']['msg18'] ?></a>
			</div>

			<? if (count($authButtons) > 0) { ?>

				<div class="login_social">
					<?
					foreach ($authButtons as $authButton) {

						echo $authButton;

					}
					?>
				</div>

			<? } ?>

		</form>

	<? } elseif (($SMALL_BASKET) or ($CLIENT['cst_category_id'] == '')) { ?>

		<div id="auth_block">
			<div class="login_title flc">
				<div class="login_name leftside"><?= $USER_LOGIN ?></div>
				<div class="login_exit rightside"><?= $logout_link ?></div>
			</div>

			<div class="basket_info flc">
				<div class="basket_categ"><?= $MSG['LoginFormModule']['msg35'] ?>: <span><?= $CLIENT['name'] ?></span>
				</div>
				<div class="basket_balance"><?= $MSG['LoginFormModule']['msg26'] ?>: <span><?= $BALANCE_SUMM ?></span>
				</div>
			</div>
		</div>
	<? } ?>

</div>