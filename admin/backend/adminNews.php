{% extends "templates/template.php" %}

{% block title %}
	{{title}}
{% endblock%}

{% block content %}

<h2 class="titleView">Dernières Actualités du centre de loisirs</h2> <!-- Page d'affichage des différentes actualités côté administrateur-->

<article class="containerChapter">

	<div class="chapter">
		{{ postsNews | raw }}
	</div>

</article>

<div id="addChapter"> <!-- Bouton d'ajout d'une actualité -->
  	<button type="button" id="button" class="btn btn-primary"><a href="index.php?action=addNews">AJOUTER UNE ACTUALITE</a></button>
</div>

<div class="pagination"> 		<!-- Affiche la pagination et la selection des pages -->
    <p class ="nbPages">Pages: {{pagesArticles | raw}} </p> 
</div>

<section id="signalsComment"> <!-- Commentaires signalés -->
	<div class="comment_report">
		<h4 id="admin_comment_report"> Commentaires signalés</h4>
		{{reports | raw}}
	</div>
</section>

{% endblock %}