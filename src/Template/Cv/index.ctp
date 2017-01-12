<div class="offset"></div>

<div class="container">
    <div class="col-md-12 default-container">
        <h1>Mijn CV</h1> <hr>
        <?php
            echo $this->Html->link("Add", ['action' => 'add'], ['class' => 'btn btn-primary']).' ';
            echo $this->Html->link("Edit", ['action' => 'edit'], ['class' => 'btn btn-primary']).' ';
            echo $this->Form->postLink('Delete', ['action' => 'delete'], ['class' => 'btn btn-danger'], ['confirm' => 'Are you sure?'])
        ?>
        <hr>
        <?php foreach ($cv as $item): ?>
            <p>
                <strong>Title:</strong>
                <?= $item->title ?>
            </p>
            <p>
                <strong>Teksts:</strong>
                <?= $item->text ?>
            </p>
            <p>
                <strong>Motivatie:</strong>
                <?= $item->motivation ?>
            </p>
            <p>
                <strong>Video:</strong>
                <?= $item->video ?>
            </p>
        <?php endforeach; ?>
    </div>
</div>
