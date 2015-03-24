<?php

    require_once__DIR__.'/../vendor/autoload.php';
    require_once__DIR__.'/../src/Course.php';
    require_once__DIR__.'/../src/Student.php';

    $app = new Silex\Application();
    $app['debug'] = true;

    $DB = new PDO('pgsql:host=localhost;dbname=university_registrar');

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path', => __DIR__.'/../views'
    ));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    




?>
