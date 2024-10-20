<?php
require_once 'config.php';
require_once 'controller/User_Controller.php';
require_once 'controller/Albums_Controller.php';
require_once 'controller/Bands_Controller.php';
require_once 'libs/response.php';
require_once 'middlewares/User_Middlewares.php';

$action = 'home';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}
$params = explode('/' , $action);

$res = new Response();

switch ($params[0]) {
    case 'ShowLogin':
        $controller = new UserController();
        $controller->showLogin();
        break;
    case 'Login':
        $controller = new UserController();
        $controller->verificateLogin();
        break;
    case 'Home':
        UserMiddleware($res);
        $controller = new AlbumsController($res);
        $controller->showHome();
        break;
    case "Logout":
        $controller = new UserController();
        $controller->logout();
        break;
    case "ShowEditAlbum":
        UserMiddleware($res);
        $controller = new AlbumsController($res);
        $controller->showEditAlbum($params[1]);
    break;
    case 'EditAlbum':
        UserMiddleware($res);
        $controller = new AlbumsController($res);
        $controller->editAlbumContent($params[1]);
    break;
    case 'DeleteAlbum':
        UserMiddleware($res);
        $controller = new AlbumsController($res);
        $controller->deleteAlbumContent($params[1]);
        break;
    case 'ShowCreateAlbum':
        UserMiddleware($res);
        $controller = new AlbumsController($res);
        $controller->showCreateAlbum();
    break;
    case 'CreateAlbum':
        UserMiddleware($res);
        $controller = new AlbumsController($res);
        $controller->createAlbum();
        break;
    case 'Description':
        UserMiddleware($res);
        $controller = new AlbumsController($res);
        $controller->showDescription($params[1]);
        break;
    case 'Bands':
        UserMiddleware($res);
        $controller = new BandsController($res);
        $controller->showBands();
    break;
    case 'Discography':
        UserMiddleware($res);
        $controller = new AlbumsController($res);
        $controller->showDiscography($params[1]);
    break;
    case 'ShowCreateBand':
        UserMiddleware($res);
        $controller = new BandsController($res);
        $controller->showCreateBand();
    break;
    case 'CreateBand':
        UserMiddleware($res);
        $controller = new BandsController($res);
        $controller->createBand();
    break;
    case 'ShowEditBand':
        UserMiddleware($res);
        $controller = new BandsController($res);
        $controller->showEditBand($params[1]);
    break;
    case 'EditBand':
        UserMiddleware($res);
        $controller = new BandsController($res);
        $controller->editBand($params[1]);
    break;
    case 'DeleteBand':
        UserMiddleware($res);
        $controller = new BandsController($res);
        $controller->deleteBand($params[1]);
    break;
    case 'ConfirmDeleteBand':
        UserMiddleware($res);
        $controller = new BandsController($res);
        $controller->confirmDeleteBand($params[1]);
    break;
}
?>