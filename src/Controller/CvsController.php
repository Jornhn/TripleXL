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
    // In this public string the video path name is stored
    public $video = null;


    // This function gets all the CVs who are from the user where u logged in with.. If u are admin / super admin u will see all the cvs from everybody
    public function index()
    {
        // Get all the CV's matching the ID where u logged in with
        $cvs = $this->Cvs->find()->where(['user_id' => $this->Auth->user('id')]);

        // If user logged in is admin / super admin
        if ($this->Auth->user('account_type') >= 2) {
            // Get all the CV's
            $cvs = $this->Cvs->find()->contain(['Users']);
            $first_cv = $this->Cvs->find()->contain(['Users'])->first();
        }

        if ($this->Auth->user('account_type') === 1) {
            // If user is a company, redirect to index cuz not allowed!
            return $this->redirect(['controller' => 'Dashboard', 'action' => 'index']);
        }

        // set objects / arrays
        $this->set(compact('cvs', 'first_cv'));
    }

    // This function gets the CV where u clicked on in the index.. It will check if its from u or if the user is admin / super admin else u get redirected to the index
    public function view($id)
    {
        // Get the CV matching ID.
        $cvs = $this->Cvs->get($id, ['contain' => ['Categories', 'CategoriesCompetences']]);

        // If CV id = Auth ID or account_type is admin / super admin
        if ($this->Auth->user('id') === $cvs->user_id or $this->Auth->user('account_type') >= 2) {
            // set objects / arrays
            $this->set('cvs', $cvs);
        }
        else {
            // Redirect user if cv_id not matching with user logged in
            return $this->redirect(['controller' => 'Cvs', 'action' => 'index']);
        }
    }


    // This function creates a new CV.
    public function create()
    {
        // If request is a post
        if ($this->request->is('post')) {
            // Make a new Entity
            $cvs = $this->Cvs->newEntity();
            // get extention from video
            $ext = substr(strtolower(strrchr($this->request->data['video']['name'], '.')), 1);
            $arr_ext = array("mp3", "mp4", "wma");
            // set a random new video name
            $setNewFileName = time() . "_" . rand(000000, 999999);

            // if ext uploaded is in allowed arr_ext
            if (in_array($ext, $arr_ext)) {
                // place video in videos map
                move_uploaded_file(($this->request->data['video']['tmp_name']), WWW_ROOT . '/videos/' . $setNewFileName . '.' . $ext);
                // set the new filename in public $video
                $this->video = $setNewFileName . '.' . $ext;
            }
            else {
                $this->Flash->set('Alleen MP4 bestanden zijn toegestaan!', ['key' => 'cv-error', 'params' => ['class' => 'alert alert-success']]);
            }

            $cvs = $this->Cvs->patchEntity($cvs, $this->request->data);
            // set user_id to user_id where u logged in with
            $cvs->user_id = $this->Auth->user('id');
            // set video path to the path in $video
            $cvs->video = $this->video;

            // if able to save, save the entity in database
            if ($this->Cvs->save($cvs)) {
                $this->Flash->set('De CV is succesvol opgeslagen!', ['key' => 'cv-success', 'params' => ['class' => 'alert alert-success']]);
                return $this->redirect(['action' => 'index']);
            }
            else {
                $this->Flash->set('Er ging iets mis! Controleer of alle velden correct ingevuld zijn.', ['key' => 'cv-error', 'params' => ['class' => 'alert alert-danger']]);
            }
        }

        // if user is company, redirect
        if ($this->Auth->user('account_type') === 1) {
            return $this->redirect(['controller' => 'Dashboard', 'action' => 'index']);
        }

        // get all the categories and set them in $categories
        $categories = $this->Cvs->Categories->find('list', ['keyField' => 'id', 'valueField' => 'category']);

        // set all object / arrays
        $this->set(compact('cvs', 'categories', 'competences'));
    }


    // This function edits the CV with the ID u clicked on.
    public function edit($id = null)
    {
        // Get the CV matching ID
        $cvs = $this->Cvs->get($id, ['contain' => ['Categories', 'CategoriesCompetences']]);

        // If CV id = Auth ID or account_type is admin / super admin
        if ($this->Auth->user('id') === $cvs->user_id or $this->Auth->user('account_type') >= 2) {
            // If request is patch / post or put
            if ($this->request->is(['patch', 'post', 'put'])) {
                $cv = $this->Cvs->patchEntity($cvs, $this->request->data);
                $ext = substr(strtolower(strrchr($this->request->data['video']['name'], '.')), 1);
                $arr_ext = array("mp3", "mp4", "wma");
                // set a random new video name
                $setNewFileName = time() . "_" . rand(000000, 999999);

                // if ext uploaded is in allowed arr_ext
                if (in_array($ext, $arr_ext)) {
                    // place video in videos map
                    move_uploaded_file(($this->request->data['video']['tmp_name']), WWW_ROOT . '/videos/' . $setNewFileName . '.' . $ext);
                    // set the new filename in public $video
                    $this->video = $setNewFileName . '.' . $ext;
                }
                // set video path to the path in $video


                // if able to save, save the entity in database
                if ($this->Cvs->save($cv)) {
                    $this->Flash->set('De CV is succesvol opgeslagen!', ['key' => 'cv-success', 'params' => ['class' => 'alert alert-success']]);

                    return $this->redirect(['action' => 'index']);
                }
                else {
                    $this->Flash->set('Er ging iets mis! Controleer of alle velden correct ingevuld zijn.', ['key' => 'cv-error', 'params' => ['class' => 'alert alert-danger']]);
                }
            }
        }
        else {
            return $this->redirect(['controller' => 'Cvs', 'action' => 'index']);
        }

        // if user is company, redirect
        if ($this->Auth->user('account_type') === 1) {
            return $this->redirect(['controller' => 'Dashboard', 'action' => 'index']);
        }

        // get all the categories and set them in $categories
        $categories = $this->Cvs->Categories->find('list', ['keyField' => 'id', 'valueField' => 'category']);

        // set all object / arrays
        $this->set(compact('cvs', 'categories'));
    }


    // This function deletes the CV with the ID u clicked on.
    public function delete($id)
    {
        // get CV matching ID
        $cvs = $this->Cvs->get($id);
        // If CV id = Auth ID or account_type is admin / super admin
        if ($this->Auth->user('id') === $cvs->user_id or $this->Auth->user('account_type') >= 2) {
            // If cv is deleted
            if ($this->Cvs->delete($cvs)) {
                $this->Flash->set('Uw CV is verwijderd!', ['key' => 'cv-success', 'params' => ['class' => 'alert alert-success']]);
                return $this->redirect(['action' => 'index']);
            }
            else {
                $this->Flash->set('Er ging iets mis!', ['key' => 'cv-error', 'params' => ['class' => 'alert alert-danger']]);
            }
        }
        else {
            return $this->redirect(['controller' => 'Cvs', 'action' => 'index']);
        }

        // if user is company, redirect
        if ($this->Auth->user('account_type') === 1) {
            return $this->redirect(['controller' => 'Dashboard', 'action' => 'index']);
        }
    }
}
