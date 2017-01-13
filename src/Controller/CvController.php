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
    public $video = null;

    function index()
    {
        $cv = $this->Cv->find()->contain(['Users'])->where(['cv.user_id' => $this->Auth->user('id')]);
        $category = $this->Cv->Category->find('list', ['limit' => 200]);
        $this->set(compact('cv', 'category'));
    }

    function view($id)
    {
        $cv = $this->Cv->get($id, ['contain' => ['Users', 'Category']]);
        $this->set('cv', $cv);
    }

    public function create()
    {
        $cv = $this->Cv->newEntity();
        if ($this->request->is('post')) {
            $ext = substr(strtolower(strrchr($this->request->data['video']['name'], '.')), 1);
            $arr_ext = array("mp3", "mp4", "wma");
            $setNewFileName = time() . "_" . rand(000000, 999999);

            if (in_array($ext, $arr_ext)) {
                move_uploaded_file(($this->request->data['video']['tmp_name']), WWW_ROOT . '/videos/' . $setNewFileName . '.' . $ext);
                $this->video = $setNewFileName . '.' . $ext;
            }

            $cv = $this->Cv->patchEntity($cv, $this->request->data);
            $cv->user_id = $this->Auth->user('id');
            $cv->video = $this->video;

            if ($this->Cv->save($cv)) {
                $this->Flash->success(__('The cv has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cv could not be saved. Please, try again.'));
            }
        }
        $category = $this->Cv->Category->find('list', ['keyField' => 'category._ids', 'valueField' => 'category']);
        $this->set(compact('cv', 'category'));
        $this->set('_serialize', ['cv']);
    }

    public function edit($id = null)
    {
        $cv = $this->Cv->get($id, [
            'contain' => ['Category']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ext = substr(strtolower(strrchr($this->request->data['video']['name'], '.')), 1);
            $arr_ext = array("mp3", "mp4", "wma");
            $setNewFileName = time() . "_" . rand(000000, 999999);

            if (in_array($ext, $arr_ext)) {
                move_uploaded_file(($this->request->data['video']['tmp_name']), WWW_ROOT . '/videos/' . $setNewFileName . '.' . $ext);
                $this->video = $setNewFileName . '.' . $ext;
            }

            $cv->video = $this->video;

            $cv = $this->Cv->patchEntity($cv, $this->request->data);
            if ($this->Cv->save($cv)) {
                $this->Flash->success(__('The cv has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cv could not be saved. Please, try again.'));
            }
        }
        $users = $this->Cv->Users->find('list', ['limit' => 200]);
        $category = $this->Cv->Category->find('list', ['limit' => 200]);
        $this->set(compact('cv', 'users', 'category'));
        $this->set('_serialize', ['cv']);
    }

    public function delete($id)
    {
        $cv = $this->Cv->get($id);
        if ($this->Auth->user('id') === $cv['user_id']) {
            $this->request->allowMethod(['post', 'delete']);
            if ($this->Cv->delete($cv)) {
                $this->Flash->set('Uw CV is verwijderd!', ['key' => 'cv-success','params' => ['class' => 'alert alert-success']]);
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