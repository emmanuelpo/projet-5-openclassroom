{% extends "templates/template.php" %}

{% block title %}
	{{title}}
{% endblock%}

{% block content %}

	<h2 class="titleView">Réinitialisation du mot de passe</h2>

	<form method ="post"> <!-- Formulaire permettant de mettre en place son nouveau mot de passe -->
		<div class="forminput_token">
			<label for="newPassword">Nouveau mot de passe : </label><br />
			<input type="password" name="newPassword"><br />
			<label for="confirmPassword">Confirmer le nouveau mot de passe : </label><br />
			<input type="password" name="confirmPassword"><br />
			<input class="succes_password" type="submit" value="Confirmer">
			<p>{{valid}} {{error}}</p>
		</div>
	</form>

{% endblock %}