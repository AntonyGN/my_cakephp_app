<?php
   if($errors) {
      foreach($errors as $error)
      foreach($error as $msg)
      echo '<font color="red">'.$msg.'</font><br>';
   } else {
      echo "No errors.";
   }
   echo $this->Form->create(NULL,array('url'=>'/validation'));
   echo $this->Form->control('username');
   echo $this->Form->control('password');
   echo $this->Form->button('Submit');
   echo $this->Form->end();
?>