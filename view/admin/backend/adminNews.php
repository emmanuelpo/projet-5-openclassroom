{% extends "templates/template.php" %}

{% block title %}
	{{title}}
{% endblock%}

{% block content %}

<h2 class="titleView">Dernières Actualités du centre de loisirs</h2> <!-- Page d'affichage des différentes actualités côté administrateur-->

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
						<em><a class="link" href="index.php?action=post&amp;id={{value.id}}">Lire l'actualité</a></em>
						<em><a class="modifChapter" href="index.php?action=editNews&amp;id={{value.id}}"> (Modifier l'actualité)</a></em>
					</div>
			</article>
		{% endfor %}
	</div>

</article>

<div id="addChapter"> <!-- Bouton d'ajout d'une actualité -->
  	<button type="button" id="button" class="btn btn-primary"><a href="index.php?action=addNews">AJOUTER UNE ACTUALITE</a></button>
</div>

<div class="pagination"> 		<!-- Affiche la pagination et la selection des pages -->
    <p class ="nbPages">Pages:
	    {% for i in 1..pNumber %}
	    		<a class ="nbPages" href="index.php?action=adminNews&page={{ loop.index }}"> {{ loop.index }} </a>
	    {% endfor %}
    </p> 
</div>

<section id="signalsComment"> <!-- Permet d'afficher la liste des commentaires signalés -->
	<div class="comment_report">
		<h4 id="admin_comment_report"> Commentaires signalés</h4>
			{% for value in report %}
					<div class="comment_publish">
		                <strong class="commentPseudo">{{value.author}}</strong>
		                <p> le {{value.date_comment_fr}}</p> 
		                <p>{{value.comment}}</p>
		                <p class="signalComment"><a  href="index.php?action=validComment&amp;id={{value.id}}"> (Valider le Commentaire)</a>
		                {% if session.auth is defined %}
		                	<a href="index.php?action=deleteComment&amp;id={{value.id}}">(Supprimer le commentaire)</a>
		                {% endif %}
			            </p>
			        </div>
			{% endfor %}
	</div>
</section>

{% endblock %}