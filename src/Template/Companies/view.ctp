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
            <td>User ID:
            <td><?= $users->id ?></td>
        </tr>
        <tr>
            <td>Aanhef: </td>
            <td><?= $users->salutation ?></td>
        </tr>
        <tr>
            <td>Voornaam: </td>
            <td><?= $users->firstname ?></td>
        </tr>
        <tr>
            <td>Tussenvoegsel: </td>
            <td><?= $users->insertion ?></td>
        </tr>
        <tr>
            <td>Achternaam: </td>
            <td><?= $users->lastname ?></td>
        </tr>
        <tr>
            <td>Adres: </td>
            <td><?= $users->adress ?></td>
        </tr>
        <tr>
            <td>Postcode: </td>
            <td><?= $users->zip_code ?></td>
        </tr>
        <tr>
            <td>Plaats: </td>
            <td><?= $users->place ?></td>
        </tr>
        <tr>
            <td>Telefoon nummer: </td>
            <td><?= $users->phone_number ?></td>
        </tr>
        <tr>
            <td>Email: </td>
            <td><?= $users->email ?></td>
        </tr>
        <tr>
            <td>Website: </td>
            <td><?= $users->website ?></td>
        </tr>
        <tr>
            <td>Account type: </td>
            <td><?= $users->account_type ?></td>
        </tr>

</table>
<button class="vacature-button-open btn btn-info">Bekijk vacature</button>
<button class="vacature-button-closed btn btn-info">Sluit vacature</button>
    
<div class="top-space vacature-table">    
    <h3>Bij behorende Vacature</h3>
    <table class="col-lg-12 table table-striped">
        <?php foreach($vacancies as $vacancie): ?>
            <tr>
                <td>Title:</td>
                <td id="cv-title"><?= $vacancie->title ?></td>
            </tr>
            <tr>
                <td>Text: </td>
                <td id="cv-text"><?= $vacancie->text ?></td>
            </tr>
            <tr>
                <td>Date: </td>
                <td id="cv-date"><?= $vacancie->date ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</div>

