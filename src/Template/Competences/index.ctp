<div class="offset"></div>

<div class="container">
    <div class="col-md-12 default-container">
        <h1>Competenties overzicht<?=$this->Html->link("Toevoegen", ['controller' => 'Competences', 'action' => 'create'], ['class' => 'btn btn-primary btn-lg pull-right']).' ';?></h1>
        <hr>
        <?= $this->Flash->render('competence-success') ?>
        <?= $this->Flash->render('competence-error') ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Naam</th>
                    <th>Categorie</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <?php if($competences->isEmpty()){ ?>

                    <tr><td colspan="8">U heeft nog geen competenties toegevoegd.</td></tr>

                <?php }else{ ?>
                <?php
                foreach($competences as $competence){ ?>
                   <tr>
                       <td><?= $competence->id ?></td>
                       <td><?= $competence->title ?></td>
                       <td><?= $competence->category->category ?></td>
                       <td><?= $this->Html->link("View", ['controller' => 'Competences', 'action' => 'view/' . $competence->id], ['class' => 'btn btn-info']) ?></td>
                       <td><?= $this->Html->link("Edit", ['controller' => 'Competences', 'action' => 'edit/' . $competence->id], ['class' => 'btn btn-primary']) ?></td>
                       <td><?= $this->Form->postLink("Delete", ['controller' => 'Competences', 'action' => 'delete/' . $competence->id], ['class' => 'btn btn-danger', 'confirm' => 'Are you sure?']) ?></td>
                   </tr>
                <?php }} ?>
            </table>
        </div>
    </div>
</div>