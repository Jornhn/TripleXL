<div class="offset"></div>

<div class="container">
    <div class="col-md-12 default-container">
        <h1>
            <?php if ($this->request->session()->read('Auth.User.account_type') >= 2): ?>
                CV's
            <?php else: ?>
                Mijn CV's
            <?php endif; ?>
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
                <?php if (!empty($first_cv)) : ?>
                    <th>Gebruiker</th>
                <?php endif; ?>
                <th>Title</th>
                <th>Tekst</th>
                <th>Motivatie</th>
                <th>Status</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php if ($cvs->isEmpty()) { ?>
                <tr><td colspan="7">U heeft nog geen CV toegevoegd.</td></tr>
            <?php } ?>
            <?php foreach ($cvs as $cv): ?>
                <tr>
                    <td><?= $cv->id ?></td>
                    <?php if (!empty($cv->user)) :?>
                        <td><?= $cv->user->firstname?> <?= $cv->user->insertion ?> <?= $cv->user->lastname ?></td>
                    <?php endif; ?>
                    <td><?= $cv->title ?></td>
                    <td class="td-max-width"><?= substr($cv->text, 0, 150).'...' ?></td>
                    <td class="td-max-width"><?= substr($cv->motivation, 0, 150).'...' ?></td>
                    <td>
                        <?php
                        if ($cv->status === 1) {
                            echo 'Actief';
                        }
                        else {
                            echo 'Non actief';
                        }
                        ?>
                    </td>
                    <td><?= $this->Html->link("View", ['action' => 'view', $cv->id], ['class' => 'btn btn-info']) ?></td>
                    <td><?= $this->Html->link("Edit", ['action' => 'edit', $cv->id], ['class' => 'btn btn-primary']) ?></td>
                    <td><button onclick="confirmation(<?= $cv->id ?>)" class="btn btn-danger">Verwijderen</button></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


