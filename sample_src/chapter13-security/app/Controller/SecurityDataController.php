<?php
App::uses('AppController', 'Controller');

class SecurityDataController extends AppController {
    public $uses = array('User');
    public $helpers = array('Form');

    public function index() {
        if (!empty($this->request->data)) {
            $this->User->save($this->request->data); //←（1）
        }
    }
}
