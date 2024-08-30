<?php
   namespace App\Controller;
   use App\Controller\AppController;
   use Cake\I18n\FrozenTime;
   class DatesController extends AppController{
      public function index(){
         $time = FrozenTime::now();
         $now = FrozenTime::parse('now');
         $_now = $now->i18nFormat('yyyy-MM-dd HH:mm:ss');
         $this->set('timenow', $_now);
         $now = FrozenTime::parse('now');
         $nice = $now->nice();
         $this->set('nicetime', $nice);
         $hebrewdate = $now->i18nFormat(\IntlDateFormatter::FULL, null, 'en-IR@calendar=hebrew');
         $this->set("hebrewdate",$hebrewdate);
         $japanesedate = $now->i18nFormat(\IntlDateFormatter::FULL, null, 'en-IR@calendar=japanese');
         $this->set("japanesedate",$japanesedate);
         $time = FrozenTime::now();
         $this->set("current_year",$time->year);
         $this->set("current_month",$time->month);
         $this->set("current_day",$time->day);
      }
   }
?>