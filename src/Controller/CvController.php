<?php
/**
 * Created by PhpStorm.
 * User: Emil
 * Date: 11-01-17
 * Time: 09:35
 */

namespace App\Controller;

use Cake\Datasource\ConnectionManager;

class CvController extends AppController
{
    function index()
    {
        $id = $this->Auth->user('id');
        $cv = $this->Cv->find('all')->where(['user_id =' => $id]);

        $this->set(compact('cv'));
    }

    function view($id)
    {
        $cv = $this->Cv->get($id);
        $this->set('cv', $cv);
    }

    public function add()
    {
        $cv = $this->Cv->newEntity();
        $cv->user_id = $this->Auth->user('id');
        if ($this->request->is('post')) {
            $cv = $this->Cv->patchEntity($cv, $this->request->data);
            if ($this->Cv->save($cv)) {
                $this->Flash->success(__('Your CV has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your CV.'));
        }
        $this->set('cv', $cv);
    }

    public function edit($id)
    {
        $cv = $this->Cv->get($id);
        if ($this->Auth->user('id') === $cv['user_id']) {
            $cv = $this->Cv->get($id);
            if ($this->request->is(['post', 'put'])) {
                $this->Cv->patchEntity($cv, $this->request->data);
                if ($this->Cv->save($cv)) {
                    $this->Flash->success(__('Your CV has been updated.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Unable to update your CV.'));
            }
            $this->set('cv', $cv);
        }
        else {
            return $this->redirect(
                ['controller' => 'Cv', 'action' => 'index']
            );
        }
    }

    public function delete($id)
    {
        $cv = $this->Cv->get($id);
        if ($this->Auth->user('id') === $cv['user_id']) {
            $this->request->allowMethod(['post', 'delete']);
            if ($this->Cv->delete($cv)) {
                $this->Flash->success(__('The article with id: {0} has been deleted.', h($id)));
                return $this->redirect(['action' => 'index']);
            }
        }
        else {
            return $this->redirect(
                ['controller' => 'Cv', 'action' => 'index']
            );
        }
    }
}