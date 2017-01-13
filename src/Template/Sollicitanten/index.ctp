<div class="offset"></div>
<div class="container default-container">
<h1>Sollicitanten</h1>
<?php echo $this->Html->link("Add", ['action' => 'add'])?>
<hr>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Aanhef</th>
            <th>Voornaam</th>
            <th>Tussenvoegsel</th>
            <th>Achternaam</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        <?php foreach($users as $user): ?>
            <tr>
                <td><?= $user->id ?></td>
                <td><?= $user->salutation ?></td>
                <td><?= $user->firstname ?></td>
                <td><?= $user->insertion ?></td>
                <td><?= $user->lastname ?></td>
                <td><?php echo $this->Html->link("View", ['action' => 'view', $user->id], ['class' => 'btn btn-primary'])?></td>
                <td><?php echo $this->Html->link("Edit", ['action' => 'edit', $user->id], ['class' => 'btn btn-primary'])?></td>
                <td><?php echo $this->Form->postLink('Delete', ['action' => 'delete', $user->id], ['class' => 'btn btn-danger'], ['confirm' => 'Are you sure?'])?></td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>
    
    <p> account_type 0 = Sollicitant<br>
        account_type 1 = Bedrijf<br>
        account_type 2 = Beheerder<br>
        account_type 3 = SuperUser
    
    
    </p>
</div>