<div class="offset"></div>
<div class="container default-container">
<h1>Details: <?= $users->firstname. ' ', $users->insertion. ' ', $users->lastname ?>
    <span class="pull-right">
        <?= $this->Html->link("Terug", ['action' => 'index'], ['class' => 'btn btn-primary btn-lg']) ?>
    </span>
</h1>
<hr>
<table class="top-space col-lg-12 table table-striped">
        <tr>
            <th>User ID:</th>
            <td><?= $users->id ?></td>
        </tr>
        <tr>
            <th>Aanhef: </th>
            <td><?= $users->salutation ?></td>
        </tr>
        <tr>
            <th>Voornaam: </th>
            <td><?= $users->firstname ?></td>
        </tr>
        <tr>
            <th>Tussenvoegsel: </th>
            <td><?= $users->insertion ?></td>
        </tr>
        <tr>
            <th>Achternaam: </th>
            <td><?= $users->lastname ?></td>
        </tr>
        <tr>
            <th>Adres: </th>
            <td><?= $users->adress ?></td>
        </tr>
        <tr>
            <th>Postcode: </th>
            <td><?= $users->zip_code ?></td>
        </tr>
        <tr>
            <th>Plaats: </th>
            <td><?= $users->place ?></td>
        </tr>
        <tr>
            <th>Telefoon nummer: </th>
            <td><?= $users->phone_number ?></td>
        </tr>
        <tr>
            <th>Email: </th>
            <td><?= $users->email ?></td>
        </tr>
</table>
<button class="vacature-button-open btn btn-info">Bekijk vacature</button>
<button class="vacature-button-closed btn btn-info">Sluit vacature</button>
    
<div class="top-space vacature-table">    
    <h3>Bij behorende CV</h3>
    <table class="col-lg-12 table table-striped">
        <?php foreach($cv as $cvs): ?>
            <tr>
                <td>Title:</td>
                <td id="cv-title"><?= $cvs->title ?></td>
            </tr>
            <tr>
                <td>Text: </td>
                <td id="cv-text"><?= $cvs->text ?></td>
            </tr>
            <tr>
                <td>Motivation: </td>
                <td id="cv-motivation"><?= $cvs->motivation ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</div>

