{% extends "templates/template.php" %}

{% block title %}
	{{title}}
{% endblock%}

{% block content %}

<h2 class="titleView">Journal du centre de loisirs</h2> <!-- Page d'affichage des différentes articles du journal du centre-->

<article class="containerSchedule">

	<div class="chapter">
		{{ postsSchedule | raw }}
	</div>

</article>


<div class="pagination"> 		<!-- Affiche la pagination et la selection des pages -->
    <p class ="nbPages">Pages: {{pagesSchedule | raw}} </p> 
</div>


{% endblock %}