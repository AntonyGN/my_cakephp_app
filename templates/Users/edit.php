<?php
   echo $this->Form->create($user, ['url' => ['action' => 'edit', $user->id]]);
   echo $this->Form->control('username');
   echo $this->Form->control('password');
   echo $this->Form->button('Submit');
   echo $this->Form->end();
?>

