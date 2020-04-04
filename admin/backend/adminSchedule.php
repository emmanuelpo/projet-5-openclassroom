{% extends "templates/template.php" %}

{% block title %}
	{{title}}
{% endblock%}

{% block content %}

<h2 class="titleView">Journal du centre de loisirs</h2>

<article class="containerChapter">

	<div class="chapter">
		{{ postsSchedule | raw }}
	</div>

</article>

<div id="addChapter">
  	<button type="button" id="button" class="btn btn-primary"><a href="index.php?action=addSchedule">AJOUTER UNE PAGE DU JOURNAL</a></button></div>


<div class="pagination"> 		<!-- Affiche la pagination et la selection des pages -->
    <p class ="nbPages">Pages: {{pagesSchedule | raw}} </p> 
</div>


{% endblock %}