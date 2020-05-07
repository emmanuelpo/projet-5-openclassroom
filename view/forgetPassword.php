{% extends "templates/template.php" %}

{% block title %}
	{{title}}
{% endblock%}

{% block content %}

	<h2 class="titleView">Mot de passe oublié</h2>

	<form  method="post">
		<div class="forminput">
	        <label for="email">E-mail: </label>
	        <input type="text" placeholder="Adresse mail" name="email" required="required"/>
	        <button type="submit"> Réinitialiser le mot de passe </button>
	    </div>
	    
    </form>

    {{ok |raw }}

{% endblock %}