{% extends "templates/template.php" %}

{% block title %}
	{{title}}
{% endblock%}

{% block content %}

<h2 class="titleView">Nous contacter</h2>

<article class="containerContact">
	<div class="chapter">
		{% for values in contacts %}
			<article class="contact_us_admin">
					<p class="contact_us_admin_label"><u>Nom:</u> {{values.first_name}}</p>
					<p class="contact_us_admin_label"><u>Prénom:</u> {{values.last_name}}</p>
					<p class="contact_us_admin_label"><u>E-mail:</u> {{values.email}}</p>
					<p class="contact_us_admin_label"><u>Objet:</u> {{values.object_contact}}</p>
					<p>{{values.text_contact}}</p>
					<p><i> Envoyé le {{values.date_contact_fr}}</i></p>
					<p class="deleteContact"><a href="index.php?action=deleteContact&amp;id={{values.id}}"> Supprimer le formulaire reçu</a>
			</article>
		{% endfor %}
	</div>
</article>

{% endblock %}