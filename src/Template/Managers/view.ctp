<div class="offset"></div>

<div class="container">
    <div class="col-md-12 default-container">
        <h1>Details: <?= $manager->firstname . " " . $manager->lastname?><?=$this->Html->link("Terug", ['action' => 'index'], ['class' => 'btn btn-primary btn-lg pull-right']).' ';?></h1>
        <hr>
        <br>
        <?= $this->Flash->render('manager-error') ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <td><strong>ID</strong></td><td><?=$manager->id?></td>
                </tr>
                <tr>
                    <td><strong>Aanhef</strong></td><td><?=$manager->salution?></td>
                </tr>
                <tr>
                    <td><strong>Voornaam</strong></td><td><?=$manager->firstname?></td>
                </tr>
                <tr>
                    <td><strong>Tussenvoegsel</strong></td><td><?=$manager->insertion?></td>
                </tr>
                <tr>
                    <td><strong>Achternaam</strong></td><td><?=$manager->lastname?></td>
                </tr>
                <tr>
                    <td><strong>Telefoonnummer</strong></td><td><?=$manager->phone_number?></td>
                </tr>
                <tr>
                    <td><strong>Email</strong></td><td><?=$manager->email?></td>
                </tr>
                <tr>
                    <td><strong>Account type</strong></td><td><?=$manager->account_type?></td>
                </tr>
            </table>
        </div>
    </div>
</div>