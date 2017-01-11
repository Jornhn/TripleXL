<?php
/**
 * Created by PhpStorm.
 * User: jornholterman
 * Date: 11-01-17
 * Time: 09:55
 */

namespace App\Controller;


class SollicitantenController extends AppController
{
    function index(){
        $this->loadModel('Users');
        $users = $this->Users->find('all');
        $this->set(compact('users'));
    }

    function view(){

    }

    function edit(){

    }

    function add(){

    }

}