<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Event\EventInterface;

class AuthexsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Auth');
        $this->loadComponent('Flash');
    }

    public function index()
    {
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error('Your username or password is incorrect.');
            }
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}
