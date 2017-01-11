<h1>Mijn CV</h1>
<?= $this->Html->link(
    'Add CV',
    ['action' => 'add'],
    ['class' => 'btn btn-primary'])
?>

<?= $this->Html->link(
    'Edit CV',
    ['action' => 'edit'],
    ['class' => 'btn btn-primary'])
?>

<?= $this->Form->postLink(
    'Delete',
    ['action' => 'delete', 1],
    ['class' => 'btn btn-danger'],
    ['confirm' => 'Are you sure?'])
?>
<br /> <br />
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
