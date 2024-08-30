<?php
   namespace App\Controller;
   use App\Controller\AppController;
   class PostsController extends AppController {
      public function index(){
         $this->loadModel('articles');
         $articles = $this->articles->find('all')->order(['articles.id ASC']);
         $this->set('articles', $this->paginate($articles, ['limit'=> '3']));
      }
   }
?>