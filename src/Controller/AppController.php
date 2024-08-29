<?php
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;

class AppController extends Controller
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'username',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Authexs',
                'action' => 'login'
            ],
            'loginRedirect' => [
                'controller' => 'Authexs',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Authexs',
                'action' => 'login'
            ]
        ]);
    }

    public function beforeFilter(EventInterface $event): void
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index', 'view']);
        $this->set('loggedIn', $this->Auth->user());
    }
}
