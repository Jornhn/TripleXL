<h1>Mijn CV</h1> <hr>
<?php
    echo $this->Html->link("Add", ['action' => 'add'], ['class' => 'btn btn-primary']).' ';
    echo $this->Html->link("Edit", ['action' => 'edit'], ['class' => 'btn btn-primary']).' ';
    echo $this->Html->link("Delete", ['action' => 'delete'], ['class' => 'btn btn-danger']). ' <br /> <br />';
?>
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