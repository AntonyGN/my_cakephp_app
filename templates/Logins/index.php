<?php
   echo $this->Form->create(NULL,array('url'=>'/login'));
   echo $this->Form->control('username');
   echo $this->Form->control('password');
   echo $this->Form->button('Submit');
   echo $this->Form->end();
?>