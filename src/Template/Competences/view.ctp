<div class="offset"></div>

<div class="container">
    <div class="col-md-12 default-container">
        <h1>Details: <?=$competences->title ?><?=$this->Html->link("Terug", ['controller' => 'competenties', 'action' => 'index'], ['class' => 'btn btn-primary btn-lg pull-right']).' ';?></h1>
        <hr>
        <br>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <td>ID</td><td><?= $competences->id?></td>
                </tr>
                <tr>
                    <td>Categorie</td><td><?= $competences->category->category; ?></td>
                </tr>
                <tr>
                    <td>Title</td><td><?= $competences->title; ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>