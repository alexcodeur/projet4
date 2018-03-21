<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png"  href="../Web/Public/images/favicon.png" />
    <title><?= isset($title) ? htmlspecialchars($title) : 'Blog de Jean Forteroche' ?></title>
    <link href="../Web/Public/bootstrap/css/bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="../Web/Public/css/style.css" />
    <link rel="stylesheet" media="all and (max-device-width: 720px)" href="../Web/Public/css/smartphone.css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>

<div class="container-fluid">

    <header class="row">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="titre-entete">Jean Forteroche, billet simple pour l'Alaska</h1>
        </div>

    </header>

    <nav>
        <div class="row">
            <ul class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color: #0f0f0f; opacity: 0.9; padding-top: 15px; font-size: 1.5em;">
                <li class="col-lg-4 direction-menu">
                    <a href="/projet4/accueil-1" class="glyphicon glyphicon-home" style="color: white;"> Accueil</a>
                </li>
                <li class="col-lg-4  direction-menu">
                    <a href="#" class="glyphicon glyphicon-earphone" style="color: white;"> Contact</a>
                </li>
                <li class="col-lg-4 direction-menu">
                    <a href="/projet4/admin/" class="glyphicon glyphicon-user" style="color: white;"> Administration</a>
                </li>
            </ul>
        </div>
    </nav>

    <section class="row">
        <?= $content ?>
    </section>

    <footer class="row" style="font-size: 1.5em;">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <p>Réseaux sociaux</p>
            <a href="www.facebook.com">Facebook</a><br />
            <a href="www.twitter.com">Twitter</a><br />
            <a href="www.instagram.com">Instagram</a>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <p>Autres informations</p>
            <a href="#footer">Mention légale</a>
        </div>
    </footer>

</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="../Web/Public/bootstrap/js/bootstrap.min.js"></script>
<script src="../Web/Public/js/script.js"></script>

</body>
</html>

