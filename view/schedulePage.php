{% extends "templates/template.php" %}

{% block title %}
    {{titlePage}}
{% endblock%}

{% block content %}

<div class="postPage"> <!-- Affichage d'un seul article -->
    <article class="container">
            <div class="schedule">
                    <h3>{{post.title}}</h3>
                    <em class="date_publish"> Mis en ligne le {{post.date_fr}} </em>
                    <p>{{post.content | raw}}</p>
            </div>

            <p class="prev_page">
                {% if session.auth is defined %}
                    <a href="index.php?action=adminSchedule"> Retour à la liste des articles</a>;
                {% else %}
                    <a href="index.php?action=schedule"> Retour à la liste des articles</a>;
                {% endif %}
            </p>
    </article>
</div>

{% endblock%}