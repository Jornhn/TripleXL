<div class="offset"></div>

<div class="container">
    <div class="col-md-12 default-container">
        <h1> Details: <?= $vacancies->title ?>
            <span class="pull-right"><?= $this->Html->link("Terug", ['controller' => 'Vacancies', 'action' => 'index'], ['class' => 'btn btn-primary btn-lg']) ?></span>
        </h1>
        <hr>
        <table class="top-space col-lg-12 table table-striped">
            <tr>
                <th>Title: </th>
                <td><?= $vacancies->title ?></td>
            </tr>
            <tr>
                <th>Tekst: </th>
                <td><?= $vacancies->text ?></td>
            </tr>
            <tr>
                <th>Categorie</th>
                <td><?= $vacancies->category->category ?></td>
            </tr>
            <tr>
                <th>Compententies</th>
                <td>
                    <?php foreach ($vacancies->competences as $competence): ?>
                        <li><?= $competence->competence ?></li>
                    <?php endforeach; ?>
                </td>
            </tr>
        </table>
    </div>
</div>
