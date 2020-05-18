{% extends "templates/template.php" %}

{% block title %}
	{{title}}
{% endblock%}

{% block content %}

<h2 class="titleView">Dernières Actualités du centre de loisirs</h2><!-- Page d'affichage des différentes actualités-->

<article class="containerChapter">
	<div class="chapter">
		{% for value in postsNews %}
			<article class="Actualite">
						<div class="containerActualite">
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
						<em><a class="link" href="index.php?action=post&amp;id={{value.id}}">Lire l'actualité </a></em>
						</p>
			</article>
		{% endfor %}
	</div>
</article>


<div class="pagination"> 		<!-- Affiche la pagination et la selection des pages -->
    <p class ="nbPages">Pages:
    	{% for i in 1..pNumber %}
    		<a class ="nbPages" href="index.php?action=news&page={{ loop.index }}"> {{ loop.index }} </a>
    	{% endfor %}
     </p> 
</div>

{% endblock %}