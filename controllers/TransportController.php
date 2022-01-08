<?php 

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Route;
use app\models\Bus;
use app\models\Manager;
use app\models\Office;
use app\core\Application;

class TransportController extends Controller{
    public function addManager(Request $request, Response $response){
        if(!Application::$app->isLoggedIn()){
            $response->redirect("/");
            exit;
        }
        $user = Application::$app->user;
        if(!$user->isSuper()){
            $response->redirect("/");
            exit;
        }
        $this->setLayout("auth");
        if($request->isPost()){
            $user->loadData($request->getBody());
            if($user->changeVals('role', 'manager')){
                Application::$app->session->setFlash('success', "succesfully added to managers");
                $response->redirect("/");
                exit;

            }
            
        }
        return $this->render("addmanager", [
            'model' => $user,
            'manager' => $manager
        ]);

    }
    public function addOffice(Request $request, Response $response){
        if(!Application::$app->isLoggedIn()){
            $response->redirect("/");
            exit;
        }
        $user = Application::$app->user;
        if(!$user->isManager()){
            $response->redirect("/");
            exit;
        }
        $this->setLayout("auth");
        $model = new Office();
        if($request->isPost()){
            $model->loadData($request->getBody());
            if($model->validate() && $model->add()){
                Application::$app->session->setFlash('success', "succesfully created a new office");
                $response->redirect("/");
                exit;

            }
        }
        return $this->render("createoffice", [
            'model' => $model
        ]);
    }
    public function addOfficer(Request $request, Response $response){
        if(!Application::$app->isLoggedIn()){
            $response->redirect("/");
            exit;
        }
        $user = Application::$app->user;
        if(!$user->isManager()){
            $response->redirect("/");
            exit;
        }
        $this->setLayout("auth");
        if($request->isPost()){
            $user->loadData($request->getBody());
            if($user->changeVals('role', 'officer')){
                Application::$app->session->setFlash('success', "succesfully added to officers");
                $response->redirect("/");
                exit;

            }
        }
        return $this->render("addofficer", [
            'model' => $user
        ]);

    }
    public function addEmployee(Request $request, Response $response){
        if(!Application::$app->isLoggedIn()){
            $response->redirect("/");
            exit;
        }
        $user = Application::$app->user;
        if(!$user->isOfficer()){
            $response->redirect("/");
            exit;
        }
        $this->setLayout("auth");
        if($request->isPost()){
            $user->loadData($request->getBody());
            if($user->changeVals('role', 'employee')){
                Application::$app->session->setFlash('success', "succesfully added to employees");
                $response->redirect("/");
                exit;

            }
        }
        return $this->render("addemployee", [
            'model' => $user
        ]);

    }
    public function addBus(Request $request, Response $response){
        if(!Application::$app->isLoggedIn()){
            $response->redirect("/");
            exit;
        }
        $user = Application::$app->user;
        if(!$user->isManager()){
            $response->redirect("/");
            exit;
        }
        $this->setLayout("auth");
        $model = new Bus();
        if($request->isPost()){
            $model->loadData($request->getBody());
            if($model->validate() && $model->add()){
                Application::$app->session->setFlash('success', "succesfully added a new bus");
                $response->redirect("/");
                exit;

            }
        }
        return $this->render("addbus", [
            'model' => $model
        ]);
    }
    public function addRoute(Request $request, Response $response){
        if(!Application::$app->isLoggedIn()){
            $response->redirect("/");
            exit;
        }
        $user = Application::$app->user;
        if(!$user->isOfficer()){
            $response->redirect("/");
            exit;
        }
        $this->setLayout("auth");
        $model = new Route();
        if($request->isPost()){
            $model->loadData($request->getBody());
            if($model->validate() && $model->add()){
                Application::$app->session->setFlash('success', "succesfully created a route");
                $response->redirect("/");
                exit;

            }
        }
        return $this->render("createroute", [
            'model' => $model
        ]);
    }
}
?>