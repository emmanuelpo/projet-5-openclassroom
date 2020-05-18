{% extends "templates/template.php" %}

{% block title %}
	{{title}}
{% endblock%}

{% block content %}

	<h2 class="titleView">Mot de passe oublié</h2>

	<form  method="post"> <!-- Formulaire permettant de récupérer son mot de passe -->
		<div class="forminputpassword">
	        <label for="email" class ="email_label">Veuillez indiquer votre adresse mail </label></br >
	        <input type="text" placeholder="Adresse mail" name="email" class = "email_password" required="required"/>
			<button type="submit" class="email_submit"> Réinitialiser le mot de passe </button>
			<p  class ="succes_mail"> {{mail_send}} </p>
	    </div>
    </form>

{% endblock %}