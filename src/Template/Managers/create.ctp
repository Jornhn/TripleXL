<div class="offset"></div>

<div class="container">
    <div class="col-md-12 default-container">
        <h1>Beheerder toevoegen</h1>
        <hr>
        <?=$this->Html->link("Terug naar het overzicht", ['action' => 'index'], ['class' => 'btn btn-primary']).' ';?>
        <br>
        <br>
        <?= $this->Flash->render() ?>
        <?php echo $this->Form->create('',['class'=>'form-horizontal']);?>

        <!-- Text input-->
        <div class="form-group">
            <div class="col-md-12">
                <?=$this->Form->input('id', ['type'=>'hidden'])?>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <div class="col-md-12">
                <?=$this->Form->input('salutation', ['type'=>'text', 'id'=>'salutation', 'placeholder'=>'Aanhef...', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <div class="col-md-12">
                <?=$this->Form->input('firstname', ['type'=>'text', 'id'=>'firstname', 'placeholder'=>'Voornaam...', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <div class="col-md-12">
                <?=$this->Form->input('insertion', ['type'=>'text', 'id'=>'insertion', 'placeholder'=>'Tussenvoegsel...', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <div class="col-md-12">
                <?=$this->Form->input('lastname', ['type'=>'text', 'id'=>'lastname', 'placeholder'=>'Achternaam...', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <div class="col-md-12">
                <?=$this->Form->input('adress', ['type'=>'text', 'id'=>'adress', 'placeholder'=>'Straat...', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <div class="col-md-12">
                <?=$this->Form->input('zip_code', ['type'=>'text', 'id'=>'zip_code', 'placeholder'=>'Postcode...', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <div class="col-md-12">
                <?=$this->Form->input('place', ['type'=>'text', 'id'=>'place', 'placeholder'=>'Woonplaats...', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <div class="col-md-12">
                <?=$this->Form->input('phone_number', ['type'=>'text', 'id'=>'phone_number', 'placeholder'=>'Telefoon nummer...', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <div class="col-md-12">
                <?=$this->Form->input('email', ['type'=>'text', 'id'=>'email', 'placeholder'=>'E-mail...', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
            </div>
        </div>

        <!-- Text input-->
        <div class="hidden">
            <div class="hidden">
                <?=$this->Form->input('account_type', ['type'=>'hidden', 'value'=>'2']); ?>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <div class="col-md-12">
                <?=$this->Form->input('password', ['type'=>'password', 'id'=>'password', 'placeholder'=>'Wachtwoord...', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
            </div>
        </div>
        <hr>

        <!-- Button -->
        <div class="form-group">
            <div class="col-lg-12">
                <?=$this->Form->button('Opslaan', ['class'=>'btn btn-primary']);?>
            </div>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
