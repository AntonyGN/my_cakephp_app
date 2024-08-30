<?php
   namespace App\Controller;
   use App\Controller\AppController;
   class LoginsController extends AppController {
      public function initialize() : void {
         parent::initialize();
         $this->loadComponent('Security');
      }
         public function index(){
      }
   }
?>