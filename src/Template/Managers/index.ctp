<p>Klik <a href="managers/create">hier</a> om een beheerder toe te voegen</p>

<table>
    <tr>
        <th>Id</th>
        <th>Aanhef</th>
        <th>Voornaam</th>
        <th>Tussenvoegsel</th>
        <th>Achternaam</th>
        <th>Straat</th>
        <th>Postcode</th>
        <th>Woonplaats</th>
        <th>Telefoon nummer</th>
        <th>Email</th>
        <th>Account type</th>
        <th>Wijzigen</th>
        <th>Verwijderen</th>
    </tr>
    <?php
    foreach($managers as $manager){
        echo "<tr><td>" . $manager->id . "</td>";
        echo "<td>" . $manager->salutation . "</td>";
        echo "<td>" . $manager->firstname . "</td>";
        echo "<td>" . $manager->insertion . "</td>";
        echo "<td>" . $manager->lastname . "</td>";
        echo "<td>" . $manager->adress . "</td>";
        echo "<td>" . $manager->zip_code . "</td>";
        echo "<td>" . $manager->place . "</td>";
        echo "<td>" . $manager->phone_number . "</td>";
        echo "<td>" . $manager->email . "</td>";
        echo "<td>" . $manager->account_type . "</td>";
        echo "<td><a href='managers/edit/" . $manager->id . "'>Wijzig</i></a></td>";
        echo "<td><a href='managers/delete/" . $manager->id . "'>Verwijderen</i></a></td>";
    }
?>
</table>
