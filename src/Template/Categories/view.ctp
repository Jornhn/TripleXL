<div class="offset"></div>

<div class="container">
    <div class="col-md-12 default-container">
        <h1>Details: <?=$category->category?><?=$this->Html->link("Terug", ['controller' => 'categorieën', 'action' => 'index'], ['class' => 'btn btn-primary btn-lg pull-right']).' ';?></h1>
        <hr>
        <br>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <td>ID</td><td><?=$category->id?></td>
                </tr>
                <tr>
                    <td>Naam</td><td><?=$category->category?></td>
                </tr>
                <tr>
                    <td>Beschrijving</td><td><?=$category->category_description?></td>
                </tr>
            </table>
        </div>
    </div>
</div>