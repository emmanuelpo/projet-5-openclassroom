{% extends "templates/template.php" %}

{% block title %}
	{{title}}
{% endblock%}

{% block content %}

	<h2 class="titleView">Réinitialisation du mot de passe</h2>

	<form method ="post">
				<label for="newPassword">Nouveau mot de passe : </label>
				<input type="password" name="newPassword">
				<input type="submit" value="Confirmer">
	</form>

{% endblock %}