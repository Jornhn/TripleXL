<div class="offset"></div>

<div class="container">
    <div class="col-md-12 default-container">
        <h1>Beheerder</h1>
        <hr>
        <?=$this->Html->link("Terug naar het overzicht", ['action' => 'index'], ['class' => 'btn btn-primary']).' ';?>
        <br>
        <br>
        <?= $this->Flash->render() ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <td>ID</td><td><?=$manager->id?></td>
                </tr>
                <tr>
                    <td>Aanhef</td><td><?=$manager->salution?></td>
                </tr>
                <tr>
                    <td>Voornaam</td><td><?=$manager->firstname?></td>
                </tr>
                <tr>
                    <td>Tussenvoegsel</td><td><?=$manager->insertion?></td>
                </tr>
                <tr>
                    <td>Achternaam</td><td><?=$manager->lastname?></td>
                </tr>
                <tr>
                    <td>Telefoonnummer</td><td><?=$manager->phone_number?></td>
                </tr>
                <tr>
                    <td>Email</td><td><?=$manager->email?></td>
                </tr>
                <tr>
                    <td>Account type</td><td><?=$manager->account_type?></td>
                </tr>
            </table>
        </div>
    </div>
</div>