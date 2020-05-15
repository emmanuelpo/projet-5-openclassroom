<!-- Header/menu sur toutes les pages avec modifications du menu pour le responsive design-->
<nav id="menu" class="navbar navbar-expand-xl"> 
    <button class="navbar-toggler collapsed" id="menu-button" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="main-nav" aria-expanded="true" aria-label="Toggle navigation"><span class="navbar-toggler-icon">≡</span>
    </button>       
    <div class="navbar-collapse collapse" id="main-nav">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
                        {% if session.auth is defined %}
                                <li class="nav-item"><a class="nav-link" href="index.php?action=adminNews">Actualités</a></li>
                                <li class="nav-item"><a class="nav-link" href="index.php?action=adminSchedule">Journal du Centre</a></li>
                        {% else %}
                                <li class="nav-item"><a class="nav-link" href="index.php?action=news">Actualités</a></li>
                                <li class="nav-item"><a class="nav-link" href="index.php?action=schedule">Journal du Centre</a></li>
                        {% endif %}
                        {% if session.auth is defined %}
                                <li class="nav-item"><a class="nav-link" href="index.php?action=adminContact">Nous Contacter</a></li>
                        {% else %}
                                <li class="nav-item"><a class="nav-link" href="index.php?action=contact">Nous Contacter</a></li>
                        {% endif %}
                        {% if session.auth is defined %}
                                <li class="nav-item"><a class="nav-link" href="index.php?action=logout">Deconnexion</a></li>
                        {% else %}
                                <li class="nav-item"><a class="nav-link" href="index.php?action=login">Connexion</a></li>
                        {% endif %}
                        
            </ul>
    </div>    
</nav>
