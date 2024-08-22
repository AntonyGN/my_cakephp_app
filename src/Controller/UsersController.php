<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher;

class UsersController extends AppController
{
    public function add()
    {
        if ($this->request->is('post')) {
            $username = $this->request->getData('username');
            $hashPswdObj = new DefaultPasswordHasher;
            $password = $hashPswdObj->hash($this->request->getData('password'));

            // Use the new method for getting the table
            $usersTable = $this->getTableLocator()->get('users');
            $user = $usersTable->newEntity($this->request->getData());
            $user->username = $username;
            $user->password = $password;
            
            $this->set('user', $user);
            
            if ($usersTable->save($user)) {
                echo "User is added.";
            } else {
                echo "Failed to add user.";
            }
        }
    }
}

?>