<div class="offset"></div>
<div class="container default-container">
    <?php echo $this->Form->create($users, ['class' => 'form-horizontal', 'data-toggle' => 'validator']); ?>
    <fieldset>
        <!-- Form Name -->
        <h1>Toevoegen
            <span class="pull-right">
        <?= $this->Html->link("Terug", ['action' => 'index'], ['class' => 'btn btn-primary btn-lg']) ?>
    </span>
        </h1>
        <hr>
        <!-- Text input-->
        <div class="form-group top-space hidden">
            <label class="col-md-3 control-label" for="id">#</label>
            <div class="col-md-6">
                <?php echo $this->Form->input('id', ['type' => 'text', 'id' => 'user_id', 'class' => 'form-control ', 'div' => false, 'label' => false, 'disabled' => 'true']); ?>
            </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group hidden">
            <label class="col-md-3 control-label" for="account-type">account-type</label>
            <div class="col-md-6">
                <?php echo $this->Form->input('account_type', ['type' => 'select', 'class' => 'form-control ', 'options' => ['0' => '0'], 'div' => false, 'label' => false]); ?>
            </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-3 control-label" for="salution">Aanhef</label>
            <div class="col-md-6">
                <?php echo $this->Form->input('salutation', ['type' => 'select', 'class' => 'form-control ', 'options' => ['Dhr.' => 'Dhr.', 'Mevr.' => 'Mevr.'], 'div' => false, 'label' => false, 'required']); ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="firstname">Voornaam</label>
            <div class="col-md-6">
                <?php echo $this->Form->input('firstname', ['type' => 'text', 'id' => 'firstname', 'class' => 'form-control ', 'div' => false, 'label' => false, 'required']); ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="insertion">Tussenvoegsel</label>
            <div class="col-md-6">
                <?php echo $this->Form->input('insertion', ['type' => 'text', 'id' => 'insertion', 'class' => 'form-control ', 'div' => false, 'label' => false]); ?>

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="lastname">Achternaam</label>
            <div class="col-md-6">
                <?php echo $this->Form->input('lastname', ['type' => 'text', 'id' => 'lastname', 'class' => 'form-control ', 'div' => false, 'label' => false, 'required']); ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="adress">Adres</label>
            <div class="col-md-6">
                <?php echo $this->Form->input('adress', ['type' => 'text', 'id' => 'adress', 'class' => 'form-control ', 'div' => false, 'label' => false, 'required']); ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="zip_code">Postcode</label>
            <div class="col-md-6">
                <?php echo $this->Form->input('zip_code', ['type' => 'text', 'id' => 'zip_code', 'class' => 'form-control ', 'div' => false, 'label' => false, 'required']); ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="place">Plaats</label>
            <div class="col-md-6">
                <?php echo $this->Form->input('place', ['type' => 'text', 'id' => 'place', 'class' => 'form-control ', 'div' => false, 'label' => false, 'required']); ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="phone_number">Telefoonnummer</label>
            <div class="col-md-6">
                <?php echo $this->Form->input('phone_number', ['type' => 'text', 'id' => 'phone_number', 'class' => 'form-control ', 'div' => false, 'label' => false, 'required']); ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="email">E-mail</label>
            <div class="col-md-6">
                <?php echo $this->Form->input('email', ['type' => 'text', 'id' => 'email', 'class' => 'form-control ', 'div' => false, 'label' => false, 'required']); ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group hidden">
            <label class="col-md-3 control-label" for="company_name">Bedrijfsnaam</label>
            <div class="col-md-6">
                <?php echo $this->Form->input('company_name', ['type' => 'text', 'id' => 'company_name', 'class' => 'form-control ', 'div' => false, 'label' => false]); ?>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group hidden">
            <label class="col-md-3 control-label" for="website">Website</label>
            <div class="col-md-6">
                <?php echo $this->Form->input('website', ['type' => 'text', 'id' => 'website', 'class' => 'form-control ', 'div' => false, 'label' => false]); ?>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="password">Password</label>
            <div class="col-md-6">
                <?php echo $this->Form->input('password', ['type' => 'password', 'class' => 'form-control', 'id' => 'inputPassword', 'error' => false, 'label' => false, 'required']) ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <hr>

        <!-- Button -->
        <div class="form-group">
            <div class="col-md-6">
                <?= $this->Form->button('Opslaan', ['class' => 'btn btn-primary']); ?>
            </div>
        </div>

    </fieldset>
    <?php echo $this->Form->end(); ?>
</div>