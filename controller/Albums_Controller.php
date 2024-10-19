<?php
require_once './model/Albums_Model.php';
require_once './view/Albums_View.php';
class AlbumsController
{
    private $model;
    private $model_bands;
    private $view;

    public function __construct($res)
    {
        $this->model = new AlbumsModel();
        $this->model_bands = new BandsModel();
        $this->view = new AlbumsView($res->user);
    }

    public function showHome()
    {
        $albums_bands = $this->model->getAll();
        $this->view->showHome($albums_bands);
    }

    public function showEditAlbum($id_album)
    {
        if (!isset($_SESSION['ID_USER'])) { #comprueba si no se esta logueado
            header('Location:' . BASE_URL . "ShowLogin"); #se redirige al ShowLogin
        } else { #esta logueado, tiene los permisos
            $row_album = $this->model->getAlbum($id_album);
            $bandas = $this->model_bands->getBands();
            $this->view->showEdit($row_album, $bandas);
        }
    }

    public function editAlbumContent($id_album)
    {
        if (!isset($_SESSION['ID_USER'])) { #comprueba si no se esta logueado
            header('Location:' . BASE_URL . "ShowLogin"); #se redirige al ShowLogin
        } else { #esta logueado, tiene los permisos
            $album = $_POST['album'];
            $year = $_POST['year'];
            $genre = $_POST['genre'];
            $discography = $_POST['discography'];
            $description = $_POST['description'];
            $image = $_POST['image'];
            $id_band = $_POST['band'];
            $array = array($album, $year, $genre, $discography, $description, $image, $id_band); #guardo lo que mando el usuario en un array para un mayor manejo
            $i = 0;
            $j = 0;
            while ($i < count($array)) { #recorro el arreglo
                if ($array[$i] == '') { #si un elemento de la variable esta vacio
                    $j++; #se incrementa j en 1
                }
                $i++;
            }
            if ($j != 0) { #si j fue incrementado
                $row_album = $this->model->getAlbum($id_album);
                $bands = $this->model_bands->getBands();
                $this->view->ShowEdit($row_album, $bands, $j); #mando j por parametro que representaria la cantidad de campos vacios
            } else {
                $row_album = $this->model->getAlbum($id_album);
                array_push($array, $id_album); #pongo id_album como ultimo elemento del array
                $this->model->updateTables($array);
                header("Location:" . BASE_URL . "Home");
            }
        }
    }

    public function deleteAlbumContent($id_album)
    {
        if (!isset($_SESSION['ID_USER'])) { #comprueba si no se esta logueado
            header('Location:' . BASE_URL . "ShowLogin"); #se redirige al ShowLogin
        } else { #esta logueado, tiene los permisos
            $this->model->deleteAlbumRow($id_album);
            header("Location:" . BASE_URL . "Home");
        }
    }

    public function showCreateAlbum()
    {
        if (!isset($_SESSION['ID_USER'])) { #comprueba si no se esta logueado
            header('Location:' . BASE_URL . "ShowLogin"); #se redirige al ShowLogin
        } else { #esta logueado, tiene los permisos
            $bands = $this->model_bands->getBands();
            $this->view->showCreateAlbum($bands);
        }
    }

    public function createAlbum()
    {
        if (!isset($_SESSION['ID_USER'])) { #comprueba si no se esta logueado
            header('Location:' . BASE_URL . "ShowLogin"); #se redirige al ShowLogin
        } else { #esta logueado, tiene los permisos
            $array = array($_POST['album'], $_POST['year'], $_POST['genre'], $_POST['discography'], $_POST['description'], $_POST['image'], $_POST['band']);
            $i = 0;
            $j = 0;
            while ($i < count($array)) {
                if ($array[$i] == '') {
                    $j++;
                }
                $i++;
            }
            if ($j != 0) {
                $bands = $this->model_bands->getBands();
                $this->view->showCreateAlbum($bands, $j);
            } else {
                $this->model->createAlbum($array);
                header('Location:' . BASE_URL . 'Home');
            }
        }
    }

    public function showDescription($id_album)
    {
        $description = $this->model->getDescription($id_album);
        $this->view->showDescription($description);
    }

    public function showDiscography($id_band)
    {
        $discography = $this->model->getDiscography($id_band);
        $this->view->showDiscography($discography);
    }
}
