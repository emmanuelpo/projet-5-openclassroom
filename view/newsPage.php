{% extends "templates/template.php" %}

{% block title %}
    {{title}}
{% endblock%}

{% block content %}

<div class="page_article">
    <div class="postPage">
    	<article class="container">
                <div class="news">
                        <h3>{{post.title}}</h3>
                        <em class="date_publish"> Mis en ligne le {{post.date_fr}} </em>
                        <p>{{post.content | raw}}</p>
                </div>
                <p class="prev_page">
                	{% if session.auth is defined %}
                		<a href="index.php?action=adminNews"> Retour à la liste des actualités</a>;
                	{% else %}
                		<a href="index.php?action=news"> Retour à la liste des actualités</a>;
                	{% endif %}
                </p>
    
    	</article>
        <section class ="commentaires">
            <div class="comment">
                {{ comments | raw }}
            </div>
        </section>
    </div>
    




    <section class="comment_form">

        	<h2>Poster votre Commentaire</h2>

            <form action="index.php?action=addComment&amp;id={{post.id}}" method="post">   <!-- Création et publication d'un commentaire sur une actualité -->
                <div>
                    <label for="author"> Auteur</label><br />
                    <input type="text" id="author" name="author" />
                </div><br />
                <div>
                    <label for="comment">Commentaire</label><br />
                    <textarea id="comment" name="comment" rows="8" cols="40"></textarea>
                </div>
                <div>
                    <input type="submit" />
                </div>
            </form>
        </section>
</div>

{% endblock%}