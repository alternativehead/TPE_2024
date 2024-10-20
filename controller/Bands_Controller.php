<?php
require_once './model/Bands_Model.php';
require_once './view/Bands_View.php';
class BandsController
{
    private $model_bands;
    private $model_albums;
    private $view;

    public function __construct($res)
    {
        $this->model_bands = new BandsModel();
        $this->view = new BandsView($res->user);
        $this->model_albums = new AlbumsModel();
    }

    public function showBands()
    {
        $bands = $this->model_bands->getBands();
        $this->view->showBands($bands);
    }

    public function showCreateBand()
    {
        if (!isset($_SESSION['ID_USER'])) { #si no esta logueado
            header('Location:' . BASE_URL . "ShowLogin"); #se redirige al ShowLogin
        } else {
            $this->view->showCreateBand();
        }
    }

    public function createBand()
    {
        if (!isset($_SESSION['ID_USER'])) { #si no esta logueado
            header('Location:' . BASE_URL . "ShowLogin"); #se redirige al ShowLogin
        } else {
            $array = array($_POST['band'], $_POST['origin'], $_POST['year'], $_POST['description'], $_POST['active'], $_POST['members']); #lo que manda el usuario lo guardo en un array para un mejor manejo

            $i = 0;
            $j = 0;
            while ($i < count($array)) { #recorro el arreglo
                if ($array[$i] == '') { #si hay un elemento vacio
                    $j++; #j se incrementa
                }
                $i++;
            }
            if ($j != 0) { #si j se incremento
                $this->view->showCreateBand($j); #mando j como parametro que representaria la cantidad de campos vacios
            } else {
                $this->model_bands->createBand($array);
                header('Location:' . BASE_URL . 'Home');
            }
        }
    }

    public function showEditBand($id_band)
    {
        if (!isset($_SESSION['ID_USER'])) { #si no esta logueado
            header('Location:' . BASE_URL . "ShowLogin"); #se redirige al ShowLogin
        } else {
            $band_row = $this->model_bands->getBandRow($id_band);
            $this->view->showEditBand($band_row);
        }
    }

    public function editBand($id_band)
    {
        if (!isset($_SESSION['ID_USER'])) { #si no esta logueado
            header('Location:' . BASE_URL . "ShowLogin"); #se redirige al ShowLogin
        } else {

            $band = $_POST['band'];
            $origin = $_POST['origin'];
            $year = $_POST['year'];
            $description = $_POST['description'];
            $active = $_POST['active'];
            $members = $_POST['members'];
            $array = array($id_band, $band, $origin, $year, $description, $active, $members); #lo que manda el usuario lo guardo en un array para un mejor manejo

            $i = 0;
            $j = 0;
            while ($i < count($array)) { #recorro el arreglo
                if ($array[$i] == '') { #si hay un elemento vacio
                    $j++; #j se incrementa
                }
                $i++;
            }
            if ($j != 0) {  #si j se incremento
                $band_row = $this->model_bands->getBandRow($id_band);
                $this->view->showEditBand($band_row, $j); #mando j como parametro que representaria la cantidad de campos vacios
            } else {
                $this->model_bands->updateBandTable($array);
                header("Location:" . BASE_URL . "Bands");
            }
        }
    }

    public function deleteBand($id_band)
    {
        if (!isset($_SESSION['ID_USER'])) { #si no esta logueado
            header('Location:' . BASE_URL . "ShowLogin"); #se redirige al ShowLogin
        } else {
            $albums = $this->model_albums->getDiscography($id_band); #obtengo la discografia de la banda
            if ($albums) { #si contiene algo
                $this->view->showConfirmDelete($id_band, 'la banda que esta por eliminar contiene uno o mas albumes, esta seguro que desea realizar esta accion', ''); #mando un string de precaucion
            } else { #si no contiene nada
                $this->model_bands->deleteBand($id_band); #elimina la banda directamente
                header("Location:" . BASE_URL . "Bands");
            }
        }
    }

    public function confirmDeleteBand($id_band)
    {
        if (!isset($_SESSION['ID_USER'])) { #si no esta logueado
            header('Location:' . BASE_URL . "ShowLogin"); #se redirige al ShowLogin
        } else {
            if ($_POST['confirm'] == 1) { #si el admin eligio si
                $this->model_bands->deleteBand($id_band); #la banda se elimina
                header("Location:" . BASE_URL . "Bands");
            } else if ($_POST['confirm'] == 0) { #si eligio no
                header("Location:" . BASE_URL . "Bands"); #redirige
            } else if ($_POST['confirm'] == '') { #si vino vacio
                $this->view->showConfirmDelete($id_band, 'la banda que esta por eliminar contiene uno o mas albumes, esta seguro que desea realizar esta accion?', 'ingrese 0 para no y 1 para si'); #mando un string
            }
        }
    }
}
