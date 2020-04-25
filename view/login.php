{% extends "templates/template.php" %}

{% block title %}
    {{title}}
{% endblock%}

{% block content %}

<h2 class="titleView">Page de Connexion</h2> <!-- Page de login pour se connecter à la partie administrateur du site -->

<section id="loginform">
	<div id="erreurLogin">
        {% if session.erreurLogin is defined %}
    			{{session.erreurLogin}}
        {% endif %}
    </div>
    <form  method="post">
	<div class="forminput">
        <label for="login" class="login">Login:</label>
        <input type="text" name="username" id="login" required="required"/><br />
    </div>
    <div class="forminput">
        <label for="password"> Mot de Passe:</label>
        <input type="password" name="password" id="password" required="required"/><br />
    </div>
    <input type="submit" name="submit" value="Se connecter" class="submit"/>
	</form>
</section>

{% endblock %}