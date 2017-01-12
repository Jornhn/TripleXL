<div class="offset"></div>

<div class="container">
    <div class="col-md-12 default-container">
        <h1> Mijn CV('s)
            <span class="pull-right">
                <?= $this->Html->link("Add", ['action' => 'add'], ['class' => 'btn btn-primary btn-lg']) ?>
            </span>
        </h1>
        <hr />
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Title</th>
                <th>Tekst</th>
                <th>Motivatie</th>
                <th>Categorieën</th>
                <th>Compententies</th>
                <th>Video</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($cv as $item): ?>
                <tr>
                    <td><?= $item->title ?></td>
                    <td><?= $item->text ?></td>
                    <td><?= $item->motivation ?></td>
                    <td>-</td>
                    <td>-</td>
                    <td><?= $item->video ?></td>
                    <td><?= $this->Html->link("Edit", ['action' => 'edit', $item->cv_id], ['class' => 'btn btn-primary']) ?></td>
                    <td><?= $this->Form->postLink('Delete', ['action' => 'delete', $item->cv_id], ['class' => 'btn btn-danger'], ['confirm' => 'Are you sure?']) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


