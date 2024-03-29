<div class="offset"></div>

<div class="container">
    <div class="col-md-12 default-container">
        <h1>
            <?php if ($this->request->session()->read('Auth.User.account_type') >= 2): ?>
                Vacatures
            <?php else: ?>
                Mijn Vacatures
            <?php endif; ?>
            <span class="pull-right">
                <?= $this->Html->link("Toevoegen", ['action' => 'create'], ['class' => 'btn btn-primary btn-lg']) ?>
            </span>
        </h1>
        <hr/>
        <?= $this->Flash->render('vacancy-error') ?>
        <?= $this->Flash->render('vacancy-success') ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <?php if (!empty($first_vacancy)) : ?>
                    <th>Bedrijf</th>
                <?php endif; ?>
                <th>Title</th>
                <th>Tekst</th>
                <th>Status</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php if ($vacancies->isEmpty()) { ?>
                <tr>
                    <td colspan="6">U heeft nog geen vacature toegevoegd.</td>
                </tr>
            <?php } ?>
            <?php foreach ($vacancies as $vacancy): ?>
                <tr>
                    <td><?= $vacancy->id ?></td>
                    <?php if (!empty($vacancy->user)) : ?>
                        <td><?= $vacancy->user->company_name ?></td>
                    <?php endif; ?>
                    <td><?= $vacancy->title ?></td>
                    <td class="td-max-width"><?= substr($vacancy->text, 0, 150) ?></td>
                    <td>
                        <?php
                        if ($vacancy->status == 1) {
                            echo 'Actief';
                        } else {
                            echo 'Non actief';
                        }
                        ?>
                    </td>
                    <td><?= $this->Html->link("View", ['action' => 'view', $vacancy->id], ['class' => 'btn btn-info']) ?></td>
                    <td><?= $this->Html->link("Edit", ['action' => 'edit', $vacancy->id], ['class' => 'btn btn-primary']) ?></td>
                    <td>
                        <button onclick="confirmation(<?= $vacancy->id ?>)" class="btn btn-danger">Verwijderen</button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


