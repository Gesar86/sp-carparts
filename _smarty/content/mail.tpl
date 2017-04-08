<div>
{%if $submit == 1%}

<center>
	Ваше сообщение успешно отправлено. <a href="/message/">Вернуться к форме отправки сообщений</a>.
</center>	
{%else%}
	
	<center>{%$list%}</center>
	
{%/if%}

{%if $form_show == "1"%}

{%if $hc_code == "1"%}
<div style="color:#ff0000;" align="center">Введенные вами цифры не совпадают с данными на изображении</div>
{%/if%}

{%$form%}
{%/if%}
</div>