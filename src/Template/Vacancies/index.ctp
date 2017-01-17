<div class="offset"></div>

<div class="container">
    <div class="col-md-12 default-container">
        <h1> Mijn Vacacture('s)
            <span class="pull-right">
                <?= $this->Html->link("Toevoegen", ['action' => 'create'], ['class' => 'btn btn-primary btn-lg']) ?>
            </span>
        </h1>
        <hr />
        <?= $this->Flash->render('vacancy-error') ?>
        <?= $this->Flash->render('vacancy-success') ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Tekst</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php if ($vacancies->isEmpty()) { ?>
                <tr><td>U heeft nog geen Vacature('s) toegevoegd.</td></tr>
            <?php } ?>
            <?php foreach ($vacancies as $vacancy): ?>
                <tr>
                    <td><?= $vacancy->id ?></td>
                    <td><?= $vacancy->title ?></td>
                    <td><?= $vacancy->text ?></td>
                    <td><?= $this->Html->link("View", ['action' => 'view', $vacancy->id], ['class' => 'btn btn-info']) ?></td>
                    <td><?= $this->Html->link("Edit", ['action' => 'edit', $vacancy->id], ['class' => 'btn btn-primary']) ?></td>
                    <td><?= $this->Form->postLink('Delete', ['action' => 'delete', $vacancy->id], ['confirm' => 'Are you sure?', 'class' => 'btn btn-danger']) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


