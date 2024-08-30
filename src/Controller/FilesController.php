<?php
   namespace App\Controller;
   use App\Controller\AppController;
   use Cake\View\Helper\FormHelper;
   class FilesController extends AppController {
      public function index(){
         if ($this->request->is('post')) {
            $fileobject = $this->request->getData('submittedfile');
            $uploadPath = '../uploads/';
            $destination = $uploadPath.$fileobject->getClientFilename();
            // Existing files with the same name will be replaced.
            $fileobject->moveTo($destination);
         }
      }
   }
?>