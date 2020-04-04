{% extends "templates/template.php" %}

{% block title %}
	{{titleNews}}
{% endblock%}

{% block content %}


<head>
{% block script %}
  <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=kj5j9xphg0gftti8bnn7r6wejkyn8f8zyii8mqhxdzxmvnhq"></script> <!-- Script de TinyMCE  -->
  <script>tinymce.init({selector:'textarea'});</script>
{% endblock%}
</head>


<section class="NewsText">

	<button type="button" class="btn btn-primary"><a href="index.php?action=adminNews"> Retour à la liste des actualités !</a></button>

	<form action="index.php?action=addNews" method="post">	<!-- Création d'une actualité avec son titre et son texte -->
		<div class="titleZone">
			<label for="title"> Titre de l'actualité </label>
			<input type="varchar" id="title" name="title" />
		</div>
		<div class="editZone">
			<label for="content"></label><br />
			<textarea id="content" name="content" style="height: 450px"></textarea>
		</div>	
		<div class="valider">
			<input type="submit" />
		</div>
	</form>

</section>

{% endblock %}