<div class="offset"></div>

<div class="container">
    <div class="col-md-12 default-container">
        <h1>Categorieën overzicht<?=$this->Html->link("Nieuwe categorie", ['action' => 'create'], ['class' => 'btn btn-primary pull-right']).' ';?></h1>
        <hr>
        <?= $this->Flash->render('category-success') ?>
        <?= $this->Flash->render('category-error') ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Naam</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <?php
                foreach($categories as $category){
                    echo "<tr><td>" . $category->id . "</td>";
                    echo "<td>" . $category->category . "</td>";
                    echo "<td>" . $this->Html->link("View", ['action' => 'view/' . $category->id], ['class' => 'btn btn-info']) . "</td>";
                    echo "<td>" . $this->Html->link("Edit", ['action' => 'edit/' . $category->id], ['class' => 'btn btn-primary']) . "</td>";
                    echo "<td>" . $this->Form->postLink("Delete", ['action' => 'delete/' . $category->id], ['class' => 'btn btn-danger', 'confirm' => 'Are you sure?']) . "</td>";
                }
                ?>
            </table>
        </div>
    </div>
</div>