<div class="offset"></div>

<div class="container">
    <div class="col-md-12 default-container">
        <h1>Details: <?=$competence->competence ?><?=$this->Html->link("Terug", ['controller' => 'Competences', 'action' => 'index'], ['class' => 'btn btn-primary btn-lg pull-right']).' ';?></h1>
        <hr>
        <br>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <td>ID</td><td><?= $competence->id?></td>
                </tr>
                <tr>
                    <td>Categorie</td><td><?= $categorie->category; ?></td>
                </tr>
                <tr>
                    <td>Naam</td><td><?= $competence->competence; ?></td>
                </tr>
                <tr>
                    <td>Beschrijving</td><td><?= $competence->competence_description; ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>