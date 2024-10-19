<?php
require_once './model/Bands_Model.php';
require_once './view/Bands_View.php';
class BandsController
{
    private $model;
    private $view;

    public function __construct($res)
    {
        $this->model = new BandsModel();
        $this->view = new BandsView($res->user);
    }

    public function showBands()
    {
        $bands = $this->model->getBands();
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
                $this->model->createBand($array);
                header('Location:' . BASE_URL . 'Home');
            }
        }
    }

    public function showEditBand($id_band)
    {
        if (!isset($_SESSION['ID_USER'])) { #si no esta logueado
            header('Location:' . BASE_URL . "ShowLogin"); #se redirige al ShowLogin
        } else {
            $band_row = $this->model->getBandRow($id_band);
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
                $band_row = $this->model->getBandRow($id_band);
                $this->view->showEditBand($band_row, $j); #mando j como parametro que representaria la cantidad de campos vacios
            } else {
                $this->model->updateBandTable($array);
                header("Location:" . BASE_URL . "Bands");
            }
        }
    }

    public function deleteBand($id_band)
    {
        if (!isset($_SESSION['ID_USER'])) { #si no esta logueado
            header('Location:' . BASE_URL . "ShowLogin"); #se redirige al ShowLogin
        } else {
            $this->model->deleteBand($id_band);
            header("Location:" . BASE_URL . "Bands");
        }
    }
}
