<div class="offset"></div>
<div class="container default-container">
    <?php echo $this->Form->create($users, ['class' => 'form-horizontal', 'data-toggle' => 'validator']); ?>
    <fieldset>

        <!-- Form Name -->
        <h1>Edit: <?= $users->company_name ?>
            <span class="pull-right">
        <?= $this->Html->link("Terug", ['action' => 'index'], ['class' => 'btn btn-primary btn-lg']) ?>
    </span>
        </h1>
        <hr>


        <!-- Text input-->
        <div class="form-group top-space">
            <label class="col-md-3 control-label" for="id">#</label>
            <div class="col-md-6">
                <?php echo $this->Form->input('id', ['type' => 'text', 'id' => 'user_id', 'placeholder' => '', 'class' => 'form-control ', 'div' => false, 'label' => false, 'disabled' => 'true', 'required']); ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-3 control-label" for="salution">Aanhef</label>
            <div class="col-md-6">
                <?php echo $this->Form->input('salutation', ['type' => 'select', 'class' => 'form-control ', 'options' => [
                    'Dhr.' => 'Dhr.',
                    'Mevr.' => 'Mevr.',
                ], 'div' => false, 'label' => false, 'required']); ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="firstname">Voornaam</label>
            <div class="col-md-6">
                <?php echo $this->Form->input('firstname', ['type' => 'text', 'id' => 'firstname', 'placeholder' => '', 'class' => 'form-control ', 'div' => false, 'label' => false, 'required']); ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="insertion">Tussenvoegsel</label>
            <div class="col-md-6">
                <?php echo $this->Form->input('insertion', ['type' => 'text', 'id' => 'insertion', 'placeholder' => '', 'class' => 'form-control ', 'div' => false, 'label' => false]); ?>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="lastname">Achternaam</label>
            <div class="col-md-6">
                <?php echo $this->Form->input('lastname', ['type' => 'text', 'id' => 'lastname', 'placeholder' => '', 'class' => 'form-control ', 'div' => false, 'label' => false, 'required']); ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="adress">Adres</label>
            <div class="col-md-6">
                <?php echo $this->Form->input('adress', ['type' => 'text', 'id' => 'adress', 'placeholder' => '', 'class' => 'form-control ', 'div' => false, 'label' => false, 'required']); ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="zip_code">Postcode</label>
            <div class="col-md-6">
                <?php echo $this->Form->input('zip_code', ['type' => 'text', 'id' => 'zip_code', 'placeholder' => '', 'class' => 'form-control ', 'div' => false, 'label' => false, 'required']); ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="place">Plaats</label>
            <div class="col-md-6">
                <?php echo $this->Form->input('place', ['type' => 'text', 'id' => 'place', 'placeholder' => '', 'class' => 'form-control ', 'div' => false, 'label' => false, 'required']); ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="phone_number">Telefoonnummer</label>
            <div class="col-md-6">
                <?php echo $this->Form->input('phone_number', ['type' => 'text', 'id' => 'phone_number', 'placeholder' => '', 'class' => 'form-control ', 'div' => false, 'label' => false, 'required']); ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="email">E-mail</label>
            <div class="col-md-6">
                <?php echo $this->Form->input('email', ['type' => 'text', 'id' => 'email', 'placeholder' => '', 'class' => 'form-control ', 'div' => false, 'label' => false, 'required']); ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="company_name">Bedrijfsnaam</label>
            <div class="col-md-6">
                <?php echo $this->Form->input('company_name', ['type' => 'text', 'id' => 'company_name', 'placeholder' => '', 'class' => 'form-control ', 'div' => false, 'label' => false, 'required']); ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="website">Website</label>
            <div class="col-md-6">
                <?php echo $this->Form->input('website', ['type' => 'text', 'id' => 'website', 'placeholder' => '', 'class' => 'form-control ', 'div' => false, 'label' => false, 'required']); ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <hr>

        <!-- Button -->
        <div class="form-group">
            <div class="col-lg-6">
                <button id="save" name="save" class="btn btn-primary">Opslaan</button>
            </div>
        </div>

    </fieldset>
    <?php echo $this->Form->end(); ?>
</div>