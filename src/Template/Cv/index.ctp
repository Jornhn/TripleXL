<div class="offset"></div>

<div class="container">
    <div class="col-md-12 default-container">
        <h1> Mijn CV('s)
            <span class="pull-right">
                <?= $this->Html->link("Toevoegen", ['action' => 'create'], ['class' => 'btn btn-primary btn-lg']) ?>
            </span>
        </h1>
        <hr />
        <?= $this->Flash->render('cv-error') ?>
        <?= $this->Flash->render('cv-success') ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Tekst</th>
                <th>Motivatie</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php if ($cv->isEmpty()) { ?>
                <tr><td>U heeft nog geen CV('s) toegevoegd.</td></tr>
            <?php } ?>
            <?php foreach ($cv as $item): ?>
                <tr>
                    <td><?= $item->id ?></td>
                    <td><?= $item->title ?></td>
                    <td><?= $item->text ?></td>
                    <td><?= $item->motivation ?></td>
                    <td><?= $this->Html->link("View", ['action' => 'view', $item->id], ['class' => 'btn btn-info']) ?></td>
                    <td><?= $this->Html->link("Edit", ['action' => 'edit', $item->id], ['class' => 'btn btn-primary']) ?></td>
                    <td><?= $this->Form->postLink('Delete', ['action' => 'delete', $item->id], ['class' => 'btn btn-danger'], ['confirm' => 'Are you sure?']) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


