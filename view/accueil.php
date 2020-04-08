{% extends "templates/template.php" %}

{% block title %}
	{{title}}
{% endblock%}

{% block content %}

<div id="titreAccueil">
	<h1> Centre de loisirs des Chênes Blancs </h1>
</div>

<div id="photoBanniere">
	<img class="banniereAccueil" src="public/image/BanniereCentre.png" alt="Banniere du centre de loisirs"/>
</div>

<div id="blocPrincipal">

	<article class="Actualite">
		<h3> Infos et actualités du centre de loisirs </h3>
		<div class="containerActualite">
			<div class="titreActu">
				{{posts.title}}
			</div>
			<div class="contenuActu">
				{{posts.ExtractContent | raw}}...
			</div>
			<div class="date_publi">
				Mis en ligne le {{posts.date_fr}}
			</div>
			<p>
				<em><a class="button" href="index.php?action=post&amp;id={{posts.id}}">Lire l'actualité </a></em>
			</p>
		</div>
	</article>

	<article class="programmeJour">
		<h3> Dernier article du Journal du centre </h3>
		<div class="containerProgramme">
			<div class="titreArticle">
				{{postSchedule.title}}
			</div>
			<div class="contenuArticle">
				{{postSchedule.ExtractContent | raw}}...
			</div>
			<div class="date_publi">
				Mis en ligne le {{postSchedule.date_fr}}
			</div>
			<p>
				<em><a class="fullChapter" href="index.php?action=schedulePost&amp;id={{postSchedule.id}}">Lire l'article </a></em>
			</p>
		</div>
	</article>


	<div id ="messageBienvenue">
		<article id="titreBienvenue">
			<h6>Bonjour et Bienvenue au Centre de loisirs des Chênes Blancs</h6>

			<p>Nous accueillons les enfants de 3 à 11 ans les mercredi, les petites et grandes vacances de 7h45 à 18h. </p>
		</article>

	</div>

	<div id="contact">
		<article>
			<h5>Contact</h5>
			<p>Adresse: 44 passage des Tilleuls 64100 Bayonne</p>
			<p>Mail: centrechenes@gmail.com</p>
			<p>Tel: 02 44 88 99 11</p>
		</article>
	</div>

</div>

<article id="meteo">
	<div class="card" style="width: 18rem;">
		<h5>Météo du jour de Bayonne </h5>
		<div class="image">
			<img class="image-weather" src="." alt="image météo" width="50" height="50" />
		</div>
		<div class="card-body">
			<div class="card-text">
				<p class="description-weather"></p>
				<p>
					<strong>Température :</strong> <span class="temp-weather"></span>
				</p>
			</div>
		</div>
	</div>
</article>

<div id="chene">
	<img class="image-chêne" alt="image de chêne" src="https://viagallica.com/v/img/chene_pedoncule_090_(dessin).gif">
	<p> Et n'oubliez pas: Les chênes sont nos amis donc protégez les</p>
</div>

<footer></footer>

{% endblock %}