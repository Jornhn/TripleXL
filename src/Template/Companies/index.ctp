<div class="offset"></div>
<div class="container default-container">
    <h1>Bedrijven
        <span class="pull-right">
        <?= $this->Html->link("Toevoegen", ['action' => 'create'], ['class' => 'btn btn-primary btn-lg']) ?>
    </span>

    </h1>
    <hr>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Bedrijfnaam</th>
            <th>URL</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php if ($users->isEmpty()) { ?>

            <tr>
                <td colspan="8">Er zijn nog geen bedrijven in het systeem.</td>
            </tr>

        <?php } else { ?>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user->id ?></td>
                    <td><?= $user->company_name ?></td>
                    <td><a href="http://<?= $user->website ?>"><?= $user->website ?></a></td>
                    <td><?php echo $this->Html->link("View", ['action' => 'view', $user->id], ['class' => 'btn btn-info']) ?></td>
                    <td><?php echo $this->Html->link("Edit", ['action' => 'edit', $user->id], ['class' => 'btn btn-primary']) ?></td>
                    <td>
                        <button onclick="confirmation(<?= $user->id ?>)" class="btn btn-danger">Verwijderen</button>
                    </td>
                </tr>
            <?php endforeach;
        } ?>

        </tbody>
    </table>
</div>