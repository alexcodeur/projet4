<?php
const DEFAULT_APP = 'Frontend';

// Si l'application n'est pas valide, on va charger l'application par défaut qui se chargera de générer une erreur 404
if (!isset($_GET['app']) || !file_exists(__DIR__.'/../App/'.$_GET['app'])) $_GET['app'] = DEFAULT_APP;

// On commence par inclure la classe nous permettant d'enregistrer nos autoload
require 'lib/OCFram/SplClassLoader.php';

$controllerLoader = new SplClassLoader('App', __DIR__);
$controllerLoader->register();

$routerLoader = new SplClassLoader('OCFram', __DIR__.'/lib');
$routerLoader->register();

$modelLoader = new SplClassLoader('Model', __DIR__.'/lib/vendors');
$modelLoader->register();


$entityLoader = new SplClassLoader('Entity', __DIR__.'/lib/vendors');
$entityLoader->register();

// Il ne nous suffit plus qu'à déduire le nom de la classe et de l'instancier
$appClass = 'App\\'.$_GET['app'].'\\'.$_GET['app'].'Application';

$app = new $appClass;
$app->run();
