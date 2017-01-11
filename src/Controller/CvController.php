<?php
/**
 * Created by PhpStorm.
 * User: Emil
 * Date: 11-01-17
 * Time: 09:35
 */

namespace App\Controller;

class CvController extends AppController
{
    function index()
    {
        $cv = $this->Cv->find('all');
        $this->set(compact('cv'));
    }

    public function add()
    {
        $cv = $this->Cv->newEntity();
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

    // TODO: id moet cv_id worden van de user_id
    public function edit($id = 1)
    {
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

    // TODO: id moet cv_id worden van de user_id
    public function delete($id = 1)
    {
        $this->request->allowMethod(['post', 'delete']);

        $article = $this->Cv->get($id);
        if ($this->Cv->delete($article)) {
            $this->Flash->success(__('The article with id: {0} has been deleted.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }
}