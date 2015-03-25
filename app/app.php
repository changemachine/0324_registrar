    <?php

    require_once __DIR__.'/../vendor/autoload.php';
    // require_once __DIR__.'/../src/Course.php';
    // require_once __DIR__.'/../src/Student.php';

    $app = new Silex\Application();
    // $app['debug'] = true;
    // $DB = new PDO('pgsql:host=localhost;dbname=university_registrar');

    // $app->register(new Silex\Provider\TwigServiceProvider(), array(
    //     'twig.path' => __DIR__.'/../views'
    // ));

    // use Symfony\Component\HttpFoundation\Request;
    // Request::enableHttpMethodParameterOverride();

    $app->get("/", function() {
        // return $app['twig']->render('index.html.twig');
        return 'hi';
    });


    return $app;



    ?>
