<div class="offset"></div>
<div class="container default-container">
<h1>Sollicitanten 
    <span class="pull-right">
        <?= $this->Html->link("Toevoegen", ['action' => 'create'], ['class' => 'btn btn-primary btn-lg']) ?>
    </span>
    
</h1>
<hr>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Aanhef</th>
            <th>Voornaam</th>
            <th>Tussenvoegsel</th>
            <th>Achternaam</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody> 
        <?php if($users->isEmpty()){ ?>
            
            <tr><td colspan="8">U heeft nog geen Sollicitant(en) toegevoegd.</td></tr>
            
        <?php }else{ ?>

        <?php foreach($users as $user): ?>
            <tr>
                <td><?= $user->id ?></td>
                <td><?= $user->salutation ?></td>
                <td><?= $user->firstname ?></td>
                <td><?= $user->insertion ?></td>
                <td><?= $user->lastname ?></td>
                <td><?php echo $this->Html->link("View", ['action' => 'view', $user->id], ['class' => 'btn btn-info'])?></td>
                <td><?php echo $this->Html->link("Edit", ['action' => 'edit', $user->id], ['class' => 'btn btn-primary'])?></td>
                <td><button onclick="confirmation(<?= $user->id ?>)" class="btn btn-danger">Verwijderen</button></td>
            </tr>
        <?php endforeach; } ?>

    </tbody>
    </table>
</div>

<script></script>