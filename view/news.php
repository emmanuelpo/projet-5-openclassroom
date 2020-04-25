{% extends "templates/template.php" %}

{% block title %}
	{{title}}
{% endblock%}

{% block content %}

<h2 class="titleView">Dernières Actualités du centre de loisirs</h2><!-- Page d'affichage des différentes actualités-->

<article class="containerChapter">

	<div class="chapter">
		{{ postsNews | raw }}
	</div>

</article>


<div class="pagination"> 		<!-- Affiche la pagination et la selection des pages -->
    <p class ="nbPages">Pages: {{pagesArticles | raw}} </p> 
</div>

{% endblock %}