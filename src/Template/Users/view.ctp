<div class="offset"></div>

<div class="container">
    <div class="col-md-12 default-container">
        <h1> Accountgegevens
            <span class="pull-right">
                <?= $this->Html->link("Terug", ['controller' => 'Dashboard', 'action' => 'index'], ['class' => 'btn btn-primary btn-lg']) ?>
            </span>
        </h1>
        <hr>
        <table class="top-space col-lg-12 table table-striped">
            <tr>
                <th>Aanhef:</th>
                <td><?= $user->salutation ?></td>
            </tr>
            <tr>
                <th>Voornaam:</th>
                <td><?= $user->firstname ?></td>
            </tr>
            <tr>
                <th>Tussenvoegsel:</th>
                <td><?= $user->insertion ?></td>
            </tr>
            <tr>
                <th>Achternaam</th>
                <td><?= $user->lastname ?></td>
            </tr>
            <tr>
                <th>Adress</th>
                <td><?= $user->adress ?></td>
            </tr>
            <tr>
                <th>Postcode</th>
                <td><?= $user->zip_code ?></td>
            </tr>
            <tr>
                <th>Plaats</th>
                <td><?= $user->place ?></td>
            </tr>
            <tr>
                <th>Telefoonnummer</th>
                <td><?= $user->phone_number ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?= $user->email ?></td>
            </tr>
            <?php if ($this->request->session()->read('Auth.User.account_type') >= 1) { ?>
                <tr>
                    <th>Bedrijfsnaam</th>
                    <td><?= $user->company_name ?></td>
                </tr>
                <tr>
                    <th>Website</th>
                    <td><?= $user->website ?></td>
                </tr>
            <?php } ?>
            <tr>
                <th>Account soort</th>
                <td>
                    <?php if ($user->account_type == '0') { ?>
                        Sollicitant
                    <?php } else if ($user->account_type == '1') { ?>
                        Bedrijf
                    <?php } else if ($user->account_type == '2') { ?>
                        Beheerder
                    <?php } else if ($user->account_type == '3') { ?>
                        Super user
                    <?php } ?>
                </td>
            </tr>
        </table>
        <span class="pull-left">
                <?= $this->Html->link("Wijzig", ['controller' => 'Users', 'action' => 'edit'], ['class' => 'btn btn-primary btn-lg']) ?>
            </span>
    </div>
</div>
