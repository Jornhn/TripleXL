<div class="offset"></div>

<div class="container">
    <div class="col-md-12 default-container">
        <h1>Beheerders overzicht</h1>
        <hr>
        <?=$this->Html->link("Nieuwe Beheerder", ['action' => 'create'], ['class' => 'btn btn-primary']).' ';?>
        <hr>
        <?= $this->Flash->render() ?>
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
                <?php
                foreach($managers as $manager){
                    echo "<tr><td>" . $manager->id . "</td>";
                    echo "<td>" . $manager->salutation . "</td>";
                    echo "<td>" . $manager->firstname . "</td>";
                    echo "<td>" . $manager->insertion . "</td>";
                    echo "<td>" . $manager->lastname . "</td>";
                    echo "<td>" . $manager->email . "</td>";
                    echo "<td>" . $this->Html->link("View", ['action' => 'view/' . $manager->id], ['class' => 'btn btn-info']) . "</td>";
                    echo "<td>" . $this->Html->link("Edit", ['action' => 'edit/' . $manager->id], ['class' => 'btn btn-primary']) . "</td>";
                    echo "<td>" . $this->Form->postLink("Delete", ['action' => 'delete/' . $manager->id], ['class' => 'btn btn-danger']) . "</td>";
                }
                ?>
            </table>
        </div>
    </div>
</div>