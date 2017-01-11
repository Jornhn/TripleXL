<h1>Mijn CV</h1>
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
    <?= $this->Form->postLink(
    'Delete',
    ['action' => 'delete', 1],
    ['confirm' => 'Are you sure?'])
    ?>
<?php endforeach; ?>
