<div class="container">
<?php 
        require_once '../vendor/autoload.php';
        require_once '../framework/autoload.php';

        require_once "../controllers/MainController.php";
        require_once "../controllers/WheatleyController.php";
        require_once "../controllers/WheatleyImageController.php";
        require_once "../controllers/WheatleyInfoController.php";
        require_once "../controllers/GLaDOSController.php";
        require_once "../controllers/GLaDOSImageController.php";
        require_once "../controllers/GLaDOSInfoController.php";

        require_once "../controllers/Controller404.php";

        //require_once "../controllers/BaseController.php";
        //require_once "../controllers/TwigBaseController.php";

        $url = $_SERVER["REQUEST_URI"];

        $loader = new \Twig\Loader\FilesystemLoader('../views');
        $twig = new \Twig\Environment($loader, [
            "debug" => true // добавляем тут debug режим
        ]);
        $twig->addExtension(new \Twig\Extension\DebugExtension()); // и активируем расширение

        $context = [];

        $controller = new Controller404($twig);

        $pdo = new PDO("mysql:host=localhost;dbname=portal_db;charset=utf8", "root", "");

        if ($url == "/") {
            $controller = new MainController($twig);
        } /*elseif (preg_match("#^/GLaDOS#", $url)) {
            $controller = new GLaDOSController($twig);

            if (preg_match("#^/GLaDOS/image#", $url)) {
                $controller = new GLaDOSImageController($twig);
            } elseif (preg_match("#^/GLaDOS/info#", $url)) {
                $controller = new GLaDOSInfoController($twig);
            }
        } elseif (preg_match("#^/wheatley#", $url)) {
            $controller = new WheatleyController($twig);

            if (preg_match("#^/wheatley/image#", $url)) {
                $controller = new WheatleyImageController($twig);
            } elseif (preg_match("#^/wheatley/info#", $url)) {
                $controller = new WheatleyInfoController($twig);
            }
        }*/
        if ($controller) {
            $controller->setPDO($pdo); // а тут передаем PDO в контроллер
            $controller->get();
        }
?>
</div>
