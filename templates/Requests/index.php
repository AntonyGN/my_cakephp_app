<h3>All Users from url : https://jsonplaceholder.typicode.com/users</h3>
<?php
   if($response) {
      foreach($response as $res => $val) {
         echo '<font color="gray">Name: '.$val["name"].' Email -'.$val["email"].'</font><br>';
      }
   }
?>