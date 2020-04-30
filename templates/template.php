<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>
            {% block title %}
            {% endblock%}
        </title>
        <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/sketchy/bootstrap.min.css" rel="stylesheet">
        <link href="public/css/style.css" rel="stylesheet" />
        <link rel="shortcut icon" type ="image/png" href="public/image/pencil.png"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    </head>

    <body>
    	   {% include 'view/header.php' %}
    	   {% block content %}{% endblock %}
    
        <script src="public/boostrap/js/jquery-3.4.1.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="public/js/jquery-3.3.1.min.js"></script>
        <script src="public/js/WeatherApp.js"></script>
    </body>
</html>