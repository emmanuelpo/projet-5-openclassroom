{% extends "templates/template.php" %}

{% block title %}
	{{title}}
{% endblock%}

{% block content %}

<h2 class="titleView">Dernières Actualités du centre de loisirs</h2>

<article class="containerChapter">

	<div class="chapter">
		{{ postsNews | raw }}
		<?php
		$pass_hache = password_hash('1612ChenesBlancs', PASSWORD_DEFAULT);
		echo $pass_hache;
		?>
	</div>

</article>


<div class="pagination"> 		<!-- Affiche la pagination et la selection des pages -->
    <p class ="nbPages">Pages: {{pagesArticles | raw}} </p> 
</div>

{% endblock %}