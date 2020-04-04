{% extends "templates/template.php" %}

{% block title %}
	{{title}}
{% endblock%}

{% block content %}

<h2 class="titleView">Dernières Actualités du centre de loisirs</h2>

<article class="containerChapter">

	<div class="chapter">
		{{ postsNews | raw }}
	</div>

</article>

<div id="addChapter">
  	<button type="button" id="button" class="btn btn-primary"><a href="index.php?action=addNews">AJOUTER UNE ACTUALITE</a></button>
</div>

<section id="signalsComment">
	<div class="comment_report">
		{{reports | raw}}
	</div>
</section>



<div class="pagination"> 		<!-- Affiche la pagination et la selection des pages -->
    <p class ="nbPages">Pages: {{pagesArticles | raw}} </p> 
</div>



{% endblock %}