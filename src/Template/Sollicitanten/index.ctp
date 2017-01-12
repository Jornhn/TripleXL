<div class="container bg-custom">
<h1>Sollicitanten</h1>
<a href="add">Sollicitant toevoegen</a>
<hr>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Aanhef</th>
            <th>Voornaam</th>
            <th>Tussenvoegsel</th>
            <th>Achternaam</th>
            <th>Account type</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        <?php foreach($users as $user): ?>
            <tr>
                <td><?= $user->id ?></td>
                <td><?= $user->salution ?></td>
                <td><?= $user->firstname ?></td>
                <td><?= $user->insertion ?></td>
                <td><?= $user->lastname ?></td>
                <td><?= $user->account_type ?></td>
                <td><?php echo $this->Html->link("View", ['action' => 'view', $user->id], ['class' => 'btn btn-primary'])?></td>
                <td><?php echo $this->Html->link("Edit", ['action' => 'edit', $user->id], ['class' => 'btn btn-primary'])?></td>
                <td><?php echo $this->Html->link("Edit", ['action' => 'edit', $user->id], ['class' => 'btn btn-primary'])?></td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>
</div>