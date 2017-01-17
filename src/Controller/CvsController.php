<?php
/**
 * Created by PhpStorm.
 * User: Emil
 * Date: 11-01-17
 * Time: 09:35
 */

namespace App\Controller;

class CvsController extends AppController
{
    public $video = null;

    public function index()
    {
        $cvs = $this->Cvs->find()->contain(['Users'])->where(['cvs.user_id' => $this->Auth->user('id')]);
        $this->set(compact('cvs'));
    }

    public function view($id)
    {
        $cvs = $this->Cvs->get($id, ['contain' => ['Categories', 'Competences']]);

        if ($this->Auth->user('id') !== $cvs->user_id) {
            return $this->redirect(['controller' => 'Cv', 'action' => 'index']);
        }
        $this->set('cvs', $cvs);
    }

    public function create()
    {
        $cvs = $this->Cvs->newEntity();
        if ($this->request->is('post')) {
            $ext = substr(strtolower(strrchr($this->request->data['video']['name'], '.')), 1);
            $arr_ext = array("mp3", "mp4", "wma");
            $setNewFileName = time() . "_" . rand(000000, 999999);

            if (in_array($ext, $arr_ext)) {
                move_uploaded_file(($this->request->data['video']['tmp_name']), WWW_ROOT . '/videos/' . $setNewFileName . '.' . $ext);
                $this->video = $setNewFileName . '.' . $ext;
            }

            $cvs = $this->Cvs->patchEntity($cvs, $this->request->data);
            $cvs->user_id = $this->Auth->user('id');
            $cvs->video = $this->video;
            
            if ($this->Cvs->save($cvs)) {
                $this->Flash->set('De CV is succesvol opgeslagen!', ['key' => 'cv-success', 'params' => ['class' => 'alert alert-success']]);
                return $this->redirect(['action' => 'index']);
            }
            else {
                $this->Flash->set('Er ging iets mis! Controleer of alle velden correct ingevuld zijn.', ['key' => 'cv-error', 'params' => ['class' => 'alert alert-danger']]);
            }
        }
        $categories = $this->Cvs->Categories->find('list', ['keyField' => 'id', 'valueField' => 'category']);

        $this->set(compact('cvs', 'categories', 'competences'));
        $this->set('_serialize', ['cvs']);
    }

    public function edit($id = null)
    {
        $cvs = $this->Cvs->get($id, [
            'contain' => ['Categories']
        ]);

        if ($this->Auth->user('id') === $cvs->user_id) {
            if ($this->request->is(['patch', 'post', 'put'])) {
                $ext = substr(strtolower(strrchr($this->request->data['video']['name'], '.')), 1);
                $arr_ext = array("mp3", "mp4", "wma");
                $setNewFileName = time() . "_" . rand(000000, 999999);

                if (in_array($ext, $arr_ext)) {
                    move_uploaded_file(($this->request->data['video']['tmp_name']), WWW_ROOT . '/videos/' . $setNewFileName . '.' . $ext);
                    $this->video = $setNewFileName . '.' . $ext;
                }

                $cvs->video = $this->video;

                $cvs = $this->Cvs->patchEntity($cvs, $this->request->data);
                if ($this->Cvs->save($cvs)) {
                    $this->Flash->set('De CV is succesvol opgeslagen!', ['key' => 'cv-success', 'params' => ['class' => 'alert alert-success']]);

                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->set('Er ging iets mis! Controleer of alle velden correct ingevuld zijn.', ['key' => 'cv-error', 'params' => ['class' => 'alert alert-danger']]);
                }
            }
        }
        else {
            return $this->redirect(['controller' => 'Cvs', 'action' => 'index']);
        }
        $categories = $this->Cvs->Categories->find('list', ['keyField' => 'id', 'valueField' => 'category']);

        $this->set(compact('cvs', 'categories', 'competences'));
        $this->set('_serialize', ['cvs']);
    }

    public function delete($id)
    {
        $cvs = $this->Cvs->get($id);
        if ($this->Auth->user('id') === $cvs->user_id) {
            $this->request->allowMethod(['post', 'delete']);
            if ($this->Cvs->delete($cvs)) {
                $this->Flash->set('Uw CV is verwijderd!', ['key' => 'cv-success','params' => ['class' => 'alert alert-success']]);
                return $this->redirect(['action' => 'index']);
            }
        }
        else {
            return $this->redirect(['controller' => 'Cvs', 'action' => 'index']);
        }
    }
}
