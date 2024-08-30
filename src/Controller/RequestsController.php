<?php
   namespace App\Controller;
   use App\Controller\AppController;
   use Cake\Http\Client;
   class RequestsController extends AppController{
      public function index(){
         $http = new Client();
         $response = $http->get('https://jsonplaceholder.typicode.com/users');
         $stream = $response->getJson();
         $this->set('response',$stream);
      }
   }
?>