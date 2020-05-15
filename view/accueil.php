{% extends "templates/template.php" %}

{% block title %}
	{{title}}
{% endblock%}

{% block content %}

<div id="titreAccueil"> <!-- Nom du centre de loisirs -->
	<h1> Centre de loisirs des Chênes Blancs </h1>
</div>

<div id="photoBanniere"> <!-- Photo décorative/bannière du site -->
	<img class="banniereAccueil" src="public/image/BanniereCentre.png" alt="Banniere du centre de loisirs"/>
</div>

<div id="blocPrincipal">

	<article class="Actualite"> <!-- Dernière actualité parue avec titre; contenu, date et lien vers l'actualité -->
		<h3> Infos et actualités du centre de loisirs </h3>
		<div class="containerActualite">
			<div class="titre">
				{{posts.title}}
			</div>
			<div class="contenu">
				{{posts.ExtractContent | raw}}...
			</div>
			<div class="date_publi">
				<i>Mis en ligne le {{posts.date_fr}}</i>
			</div>
			<p>
				<em><a class="link" href="index.php?action=post&amp;id={{posts.id}}">Lire l'actualité </a></em>
			</p>
		</div>
	</article>

	<article class="programmeJour"> <!-- Dernier article parue avec titre; contenu, date et lien vers l'article -->
		<h3> Dernier article du Journal du centre </h3>
		<div class="containerProgramme">
			<div class="titre">
				{{postSchedule.title}}
			</div>
			<div class="contenu">
				{{postSchedule.ExtractContent | raw}}...
			</div>
			<div class="date_publi">
				<i>Mis en ligne le {{postSchedule.date_fr}}</i>
			</div>
			<p>
				<em><a class="link" href="index.php?action=schedulePost&amp;id={{postSchedule.id}}">Lire l'article </a></em>
			</p>
		</div>
	</article>


	<div id ="messageBienvenue"> <!-- Message de description/bievenue du centre de loisirs -->
		<article id="titreBienvenue">
			<h3><i>Qui sommes nous ?</i></h3>

			<p>Bonjour à vous, le centre de loisirs des Chênes Blancs est un accueil de loisirs fraîchement rénové qui accueille les enfants âgés de 3 à 11 ans tous les mercredis et durant les vacances scolaires (hors vacances de Noël). Des jeux, des activités, des sorties sont mis en place par notre équipe d'animation et de direction afin que vos enfants s'épanouissent, découvrent et apprennent tout en s'amusant.
			</p>
			<p> Veuillez trouver ci-dessous le dossier d'inscription à nous remettre complété avec les différents éléments demandés et nous le retourner en main propre ou par voie postale afin d'inscrire vos enfants.</p>
			<a class ="link-download" href="public/fichiers/dossier-inscription.pdf" download="dossier-inscription.pdf" target="_blank"> Télecharger le dossier d'inscription</a>
		</article>

	</div>

	<div id ="photoCentre"> <!-- Différentes photos du centre de loisirs -->
		<img class="photoStructure" src="public/image/photoCentre.jpg" alt="Photo du centre de loisirs"/><br/>
		<img class="photoStructure" src="public/image/photoMultiSport.jpg" alt="Photo du centre de loisirs 2"/><br/>
		<img class="photoStructure" src="public/image/photoCentreInterieur.jpg" alt="Photo du centre de loisirs 3"/><br/>
	</div>

	<div id="contact_information">  <!-- Informations pour contacter le centre de loisirs -->
		<article>
			<h5>Contact</h5>
			<p>Adresse: 44 passage des Tilleuls 64100 Bayonne</p>
			<p>Mail: centrechenes@gmail.com</p>
			<p>Tel: 02 44 88 99 11</p>
		</article>
	</div>

</div>

<article id="meteo"> <!-- Cadre météo avec image descriptive de la météo du jour; la températur et petit descriptif -->
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

<div id="chene"> <!-- Photo du chêne avec message pour sauver les chênes -->
	<img class="image-chêne" alt="image de chêne" src="https://viagallica.com/v/img/chene_pedoncule_090_(dessin).gif">
	<p> Et n'oubliez pas:<br/> Les chênes sont nos amis donc protégez les</p>
</div>

<footer> <!-- Footer avec le copyright de la création du site -->
	<p> 2020 Copyright Centre de Loisirs des Chênes Blancs<br/>Tout droits réservés et toute reproduction interdite </p>
</footer>

{% endblock %}