<?php
   namespace App\Controller;
   use App\Controller\AppController;
   use Cake\I18n\I18n;
   class LocalizationsController extends AppController {
      public function index() {
         if($this->request->is('post')) {
            $locale = $this->request->getData('locale');
            I18n::setLocale($locale);
         }
      }
   }
?>