<div class="offset"></div>

<div class="container">
    <div class="col-md-12 default-container">
        <h1>Beheerders overzicht<?=$this->Html->link("Toevoegen", ['controller' => 'beheerders', 'action' => 'create'], ['class' => 'btn btn-primary btn-lg pull-right']).' ';?></h1>
        <hr>
        <?= $this->Flash->render('manager-success') ?>
        <?= $this->Flash->render('manager-error') ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Aanhef</th>
                        <th>Voornaam</th>
                        <th>Tussenvoegsel</th>
                        <th>Achternaam</th>
                        <th>Email</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <?php if ($managers->isEmpty()) { ?>
                    <tr><td>U heeft nog geen beheerders toegevoegd.</td></tr>
                <?php } ?>
                <?php
                foreach($managers as $manager){
                    echo "<tr><td>" . $manager->id . "</td>";
                    echo "<td>" . $manager->salutation . "</td>";
                    echo "<td>" . $manager->firstname . "</td>";
                    echo "<td>" . $manager->insertion . "</td>";
                    echo "<td>" . $manager->lastname . "</td>";
                    echo "<td>" . $manager->email . "</td>";
                    echo "<td>" . $this->Html->link("View", ['controller' => 'beheerders', 'action' => 'view/' . $manager->id], ['class' => 'btn btn-info']) . "</td>";
                    echo "<td>" . $this->Html->link("Edit", ['controller' => 'beheerders', 'action' => 'edit/' . $manager->id], ['class' => 'btn btn-primary']) . "</td>";
                    echo "<td>" . $this->Form->postLink("Delete", ['action' => 'delete/' . $manager->id], ['class' => 'btn btn-danger', 'confirm' => 'Are you sure?']) . "</td>";
                }
                ?>
            </table>
        </div>
    </div>
</div>