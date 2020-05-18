{% extends "templates/template.php" %}

{% block title %}
	{{title}}
{% endblock%}

{% block content %}

<h2 class="titleView">Journal du centre de loisirs</h2> <!-- Page d'affichage des différentes articles du journal du centre-->

<article class="containerSchedule">

	<div class="chapter">
		{% for value in postSchedule %}
			<article class ="programmeJour">
					<div class="containerProgramme">
						<div class="titre">
							{{value.title}}
						</div>
						<div class="contenu">
							{{ value.content | slice(0, 100) | raw }}...
						</div>
						<div class="date_publi">
							<i>Mis en ligne le {{value.date_fr}}</i>
						</div>
					</div>
				
				<p>
				<em><a class="link" href="index.php?action=schedulePost&amp;id={{value.id}}">Lire l'article </a></em>
				</p>
				</article>
		{% endfor %}
	</div>

</article>


<div class="pagination"> 		<!-- Affiche la pagination et la selection des pages -->
    <p class ="nbPages">Pages: 
	    {% for i in 1..pNumber %}
	    	<a class ="nbPages" href="index.php?action=schedule&page={{ loop.index }}"> {{ loop.index }} </a>
	    {% endfor %} </p> 
</div>


{% endblock %}