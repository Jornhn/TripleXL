<div class="offset"></div>

<div class="container">
    <div class="col-md-12 default-container">
        <h1>Categorieën overzicht<?=$this->Html->link("Toevoegen", ['controller' => 'categorieën', 'action' => 'create'], ['class' => 'btn btn-primary btn-lg pull-right']).' ';?></h1>
        <hr>
        <?= $this->Flash->render('category-success') ?>
        <?= $this->Flash->render('category-error') ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Naam</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <?php if ($categories->isEmpty()) { ?>
                    <tr><td>U heeft nog geen categorieën toegevoegd.</td></tr>
                <?php } ?>
                <?php
                foreach($categories as $category){
                    echo "<tr><td>" . $category->id . "</td>";
                    echo "<td>" . $category->category . "</td>";
                    echo "<td>" . $this->Html->link("View", ['controller' => 'categorieën', 'action' => 'view/' . $category->id], ['class' => 'btn btn-info']) . "</td>";
                    echo "<td>" . $this->Html->link("Edit", ['controller' => 'categorieën', 'action' => 'edit/' . $category->id], ['class' => 'btn btn-primary']) . "</td>";
                    echo "<td>" . $this->Form->postLink("Delete", ['controller' => 'categorieën', 'action' => 'delete/' . $category->id], ['class' => 'btn btn-danger', 'confirm' => 'Weet je zeker dat je ' . $category->category . ' wilt verwijderen?']) . "</td>";
                }
                ?>
            </table>
        </div>
    </div>
</div>