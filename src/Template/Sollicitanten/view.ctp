<div class="container bg-custom">
<h1>Details: <?= $users->firstname. ' ', $users->insertion. ' ', $users->lastname ?></h1>
<table class="top-space col-lg-12 table table-striped">
        <tr>
            <td>User ID:
            <td><?= $users->id ?></td>
        </tr>
        <tr>
            <td>Aanhef: </td>
            <td><?= $users->salution ?></td>
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

<a href="http://localhost:8888/TripleXL/sollicitanten/" class="btn btn-default">Terug</a>
</div>