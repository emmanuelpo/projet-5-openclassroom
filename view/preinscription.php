{% extends "templates/template.php" %}

{% block title %}
	{{title}}
{% endblock%}

{% block content %}

<form  method="post">
	<div class="forminput">
        <label for="login" class="login">Login:</label>
        <input type="text" name="username" id="login" required="required"/><br />
    </div>
    <div class="forminput">
        <label for="password"> Mot de Passe:</label>
        <input type="password" name="password" id="password" required="required"/><br />
    </div>
    <input type="submit" name="submit" value="Envoyer" class="submit"/>
</form>

Nom et prénom du parent

Nom et prénom de l'enfant

Dates d'inscriptions 
