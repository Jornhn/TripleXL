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
                <td><?= $user->user_id ?></td>
                <td><?= $user->salution ?></td>
                <td><?= $user->firstname ?></td>
                <td><?= $user->insertion ?></td>
                <td><?= $user->lastname ?></td>
                <td><?= $user->account_type ?></td>
                <td><a href="http://localhost:8888/TripleXL/sollicitanten/view?id=<?php echo $user->user_id ?>" class="btn btn-default">Bekijken</a></td>
                <td><a href="http://localhost:8888/TripleXL/sollicitanten/edit?id=<?php echo $user->user_id ?>" class="btn btn-default">Wijzigen</a></td>
                <td><a id="" class="btn btn-danger sollicitant-delete">Verwijderen</a></td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>