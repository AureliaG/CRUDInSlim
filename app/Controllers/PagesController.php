<?php
namespace App\Controllers;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class PagesController extends Controller {
 
    public function home(RequestInterface $request, ResponseInterface $response){
        $this->render($response, 'pages/home.twig');
    }

    public function register(RequestInterface $request, ResponseInterface $response) {
        $this->render($response, 'pages/register.twig');
    }

    public function postregister(RequestInterface $request, ResponseInterface $response) {

    }

    public function deleteregister(RequestInterface $request, ResponseInterface $response) {

    }

    public function updateregister(RequestInterface $request, ResponseInterface $response) {

    }

    public function allsusers(RequestInterface $request, ResponseInterface $response) {

    }


	
}
