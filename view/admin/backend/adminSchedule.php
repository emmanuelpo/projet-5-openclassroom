{% extends "templates/template.php" %}

{% block title %}
	{{title}}
{% endblock%}

{% block content %}

<h2 class="titleView">Journal du centre de loisirs</h2> <!-- Page d'affichage des différentes articles du journal du centre côté administrateur-->

<article class="containerChapter">

	<div class="chapter">
		{% for value in postSchedule %}
			<article class="programmeJour">
					<div class="containerProgramme">
						<div class="titre">
							{{value.title}}
						</div>
						<div class="contenu">
							{{ value.content | striptags | slice(0, 100) }}...
						</div>
						<div class="date_publi">
							<i> Mis en ligne le {{value.date_fr}}</i>
						</div>
						<em><a class="link" href="index.php?action=schedulePost&amp;id={{value.id}} ">Lire l'article</a></em>
						<em><a class="modifChapter" href="index.php?action=editSchedule&amp;id={{value.id}}"> (Modifier l'article)</a></em>
					</div>
				</article>
		{% endfor%}
	</div>

</article>

<div id="addChapter"> <!-- Bouton d'ajout d'un article -->
  	<button type="button" id="button" class="btn btn-primary"><a href="index.php?action=addSchedule">AJOUTER UN ARTICLE DU JOURNAL</a></button></div>


<div class="pagination"> 		<!-- Affiche la pagination et la selection des pages -->
    <p class ="nbPages">Pages:
    {% for i in 1..pNumber %}
	    <a class ="nbPages" href="index.php?action=adminSchedule&page={{ loop.index }}"> {{ loop.index }} </a>
	{% endfor %} </p> 
</div>


{% endblock %}