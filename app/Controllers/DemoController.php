<?php

namespace Controllers;

use Silex\Application;
use Silex\Api\ControllerProviderInterface;

use Models\DemoModel;

class DemoController implements ControllerProviderInterface{
    public function connect(Application $app){
        $indexController = $app['controllers_factory'];
        $indexController->get('/demo', [$this, 'index']);
        return $indexController;
    }
    public function index(Application $app){
        $themodel = new DemoModel($app);
        
        $twigdata = [
            'date' => $themodel->getdate()
        ];
        return $app['twig']->render('demo.twig', $twigdata);
    }
}
