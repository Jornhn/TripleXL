<div class="offset"></div>
<div class="container default-container">
<h1>Details: <?= $users->firstname. ' ', $users->insertion. ' ', $users->lastname ?></h1>
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
            <td>Bedrijfs naam: </td>
            <td><?= $users->company_name ?></td>
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
<button class="vacature-button-open btn btn-default">Bekijk vacature</button>
<button class="vacature-button-closed btn btn-default">Sluit vacature</button>
    
<div class="vacature-table">    
    <h3>Bij behorende vacature</h3>
    <table class="col-lg-12 table table-striped">
        <?php foreach($cv as $cvs): ?>
            <tr>
                <td>Title:
                <td><?= $cvs->title ?></td>
            </tr>
            <tr>
                <td>Text: </td>
                <td><?= $cvs->text ?></td>
            </tr>
            <tr>
                <td>Motivation: </td>
                <td><?= $cvs->motivation ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<a href="../" class="btn btn-default">Terug</a>
</div>

