{% extends "templates/template.php" %}

{% block title %}
	{{titleNews}}
{% endblock%}

{% block content %}

<head>
	{% block script %}
		<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=kj5j9xphg0gftti8bnn7r6wejkyn8f8zyii8mqhxdzxmvnhq"></script> <!-- Script de TinyMCE  -->
		<script>tinymce.init({selector:'textarea'});</script>
	{% endblock %}
</head>

<section class="postText"> <!-- Edition d'une actualité -->

	<div class="buttonText">
		<button type="button" id="button" class="btn btn-primary"><a href="index.php?action=adminNews"> Retour à la liste 	des actualités !</a></button>
	</div>

	<form action="index.php?action=editNews&amp;id={{post.id}}" method="post"> <!-- Modification d'un article avec son titre et son texte -->
		<div class="titleZone">
			<label for="title"> Titre de l'actualité </label>
			<input type="varchar" style="width: 300px" id="title" name="title" value="{{post.title}}" />
		</div>
		<div class="editZone">
			<label for="content"></label><br />
			<textarea id="content" name="content" style="height: 450px">{{post.content}}</textarea>
		</div>	
		<div class="valider">
			<br/><input type="submit" />
		</div>
	</form>

	<div class="buttonText">
	    <button type="button" id="button" class="btn btn-primary"><a href="index.php?action=deleteNews&amp;id={{_get.id}}"> Supprimer l'actualité</a></button>
	</div>

</section>

{% endblock%}