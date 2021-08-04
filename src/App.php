<?php
/*
 * This file is part of the Nigatedev PHP framework core Application
 *
 *  (c) Abass Ben Cheik <abass@todaysdev.com>
 */
 
namespace Nigatedev\Core;

use Nigatedev\Diyan\Diyan;
use Nigatedev\Core\Http\Request;
use Nigatedev\Core\Http\Response;
use Nigatedev\Core\Http\Router;  
use Nigatedev\Core\Debugger\Debugger;

/**
 * The Nigatedev PHP framework main core application class
 *
 * @Author Abass Ben Cheik <abass@todaysdev.com>
 */
class App
{
  
    /**
     * @var App instance
     */
    public static App $app;
  
  
    /**
     * @var App instance
     */
    public static $APP_ROOT;
  
    /**
     * @var Diyan instance
     */
    public Diyan $diyan;
    /**
     * @var Response instance
     */
    public Response $response;
  
    /**
     * @var Request instance
     */
    public Request $request;
  
    /**
     * @var Router instance
     */
    public Router $router;
  
    /**
     * @var Debugger instance
     */
    public Debugger $debugger;
  
  
    public function __construct($appRoot)
    {
        self::$app = $this;
        self::$APP_ROOT = $appRoot;
        $this->request = new Request();
        $this->response = new Response();
        $this->debugger = new Debugger();
        $this->router = new Router($this->request);
        $this->diyan = new Diyan();
    }
    
    /**
     * @throws \AppCoreException
     *
     * @return HTTP Response and output
     */
    public function run()
    {
        echo $this->router->pathResolver();
    }
}
