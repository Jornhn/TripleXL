<div class="offset"></div>

<div class="container">
    <div class="col-md-12 default-container">
        <h1> Details: <?= $vacancies->title ?>
            <span class="pull-right"><?= $this->Html->link("Terug", ['controller' => 'Vacancies', 'action' => 'index'], ['class' => 'btn btn-primary btn-lg']) ?></span>
        </h1>
        <hr>
        <table class="top-space col-lg-12 table table-striped">
            <tr>
                <th>Title:</th>
                <td><?= $vacancies->title ?></td>
            </tr>
            <tr>
                <th>Tekst:</th>
                <td><?= $vacancies->text ?></td>
            </tr>
            <tr>
                <th>Categorie</th>
                <td>
                    <?php if ($vacancies->category) : ?>
                        <span class="label label-info"><?= $vacancies->category->category ?></span>
                    <?php else : ?>
                        <span class="label label-danger">Geen gekoppelde categorie</span>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th>Compententies</th>
                <td>
                    <?php if ($vacancies->categories_competences) : ?>
                        <?php foreach ($vacancies->categories_competences as $competence): ?>
                            <span class="label label-info"><?= $competence->title ?></span>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <span class="label label-danger">Geen gekoppelde competenties</span>
                    <?php endif ?>
                </td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    <?php
                    if ($vacancies->status === 1) {
                        echo 'Actief';
                    } else {
                        echo 'Non actief';
                    }
                    ?>
                </td>
            </tr>
        </table>
    </div>
</div>
