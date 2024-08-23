<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;

class UsersController extends AppController
{
    public function add()
    {
        if ($this->request->is('post')) {
            $username = $this->request->getData('username');
            $hashPswdObj = new DefaultPasswordHasher();
            $password = $hashPswdObj->hash($this->request->getData('password'));

            $usersTable = $this->getTableLocator()->get('Users');
            $user = $usersTable->newEntity($this->request->getData());
            $user->username = $username;
            $user->password = $password;
            
            if ($usersTable->save($user)) {
                $this->Flash->success(__('User has been added successfully.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Failed to add the user.'));
            }
        }
    }

    public function index()
    {
        $usersTable = $this->getTableLocator()->get('Users');
        $query = $usersTable->find();
        $this->set('results', $query);
    }

    public function edit($id)
    {
        $usersTable = $this->getTableLocator()->get('Users');
        
        $user = $usersTable->get($id);
        if ($this->request->is(['post', 'put'])) {
            $user = $usersTable->patchEntity($user, $this->request->getData());
            if ($usersTable->save($user)) {
                $this->Flash->success(__('User has been updated successfully.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Failed to update the user.'));
            }
        }

        // Pre-fill the form with the existing user data
        $this->set('user', $user);
    }
}

?>