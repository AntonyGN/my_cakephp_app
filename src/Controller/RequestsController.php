<?php
   namespace App\Controller;
   use App\Controller\AppController;
   use Cake\Http\Client;
   class RequestsController extends AppController{
      public function index(){
         $http = new Client();
         $response = $http->post('https://postman-echo.com/post', [
            'name'=> 'ABC',
            'email' => 'xyz@gmail.com'
         ]);
      }
   }
?>