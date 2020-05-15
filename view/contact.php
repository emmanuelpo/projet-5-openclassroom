{% extends "templates/template.php" %}

{% block title %}
	{{title}}
{% endblock%}

{% block content %}

<h2 class="titleView">Nous contacter</h2>

<div id="contactform">
	<form action="index.php?action=addFormContact" method="post">
		<div class="forminput">
			<label for="first_name">Nom :</label>
			<input type="text" id="first_name" name="first_name" required="required">
		</div>
		<div class="forminput">
			<label for="last_name">Prénom :</label>
			<input type="text" id="last_name" name="last_name" required="required">
		</div>
		<div class="forminput">
			<label for="email">E-mail :</label>
			<input type="email" id="email" name="email" required="required"> 
		</div>
		<div class="forminput">
			<label for="object_contact">Objet :</label>
			<input type="text" id="object_contact" name="object_contact" required="required">
		</div>
		<div>
			<label for="text_contact" id="message">Message :</label><br />
			<textarea id="text_contact" name="text_contact" rows="5" cols="43" required="required"></textarea>
		</div>
		<button type="submit" class="submit"> Envoyer </button>
		<div id="erreurLogin">
        	{% if session.validForm is defined %}
    			{{session.validForm}}
        	{% endif %}
    </div>
	</form>
</div>

{% endblock %}