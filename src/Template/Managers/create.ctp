<div class="offset"></div>

<div class="container">
    <div class="col-md-12 default-container">
        <h1>Beheerder toevoegen<?=$this->Html->link("Terug", ['action' => 'index'], ['class' => 'btn btn-primary btn-lg pull-right']).' ';?></h1>
        <hr>
        <?= $this->Flash->render('manager-error') ?>
        <?php echo $this->Form->create('',['class'=>'form-horizontal']);?>

        <!-- Text input-->
        <div class="form-group">
            <div class="col-md-12">
                <?=$this->Form->input('id', ['type'=>'hidden'])?>
            </div>
        </div>

        <!-- Select field-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="salution">Aanhef</label>
            <div class="col-md-6">
                <?php echo $this->Form->input('salutation',['type'=>'select','class'=>'form-control ','options'=> [
                    'Dhr.'=>'Dhr.',
                    'Mevr.'=>'Mevr.',
                ],'div'=>false,'label'=>false]); ?>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="firstname">Voornaam</label>
            <div class="col-md-6">
                <?=$this->Form->input('firstname', ['type'=>'text', 'id'=>'firstname', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="insertion">Tussenvoegsel</label>
            <div class="col-md-6">
                <?=$this->Form->input('insertion', ['type'=>'text', 'id'=>'insertion', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="lastname">Achternaam</label>
            <div class="col-md-6">
                <?=$this->Form->input('lastname', ['type'=>'text', 'id'=>'lastname', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="adress">Straat</label>
            <div class="col-md-6">
                <?=$this->Form->input('adress', ['type'=>'text', 'id'=>'adress', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="zip_code">Postcode</label>
            <div class="col-md-6">
                <?=$this->Form->input('zip_code', ['type'=>'text', 'id'=>'zip_code', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="place">Woonplaats</label>
            <div class="col-md-6">
                <?=$this->Form->input('place', ['type'=>'text', 'id'=>'place', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="phone_number">Telefoon nummer</label>
            <div class="col-md-6">
                <?=$this->Form->input('phone_number', ['type'=>'text', 'id'=>'phone_number', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="email">E-mail</label>
            <div class="col-md-6">
                <?=$this->Form->input('email', ['type'=>'text', 'id'=>'email', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
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
            <label class="col-md-3 control-label" for="password">Wachtwoord</label>
            <div class="col-md-6">
                <?=$this->Form->input('password', ['type'=>'password', 'id'=>'password', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
            </div>
        </div>
        <hr>

        <!-- Button -->
        <div class="form-group">
            <div class="col-lg-6">
                <?=$this->Form->button('Opslaan', ['class'=>'btn btn-primary']);?>
            </div>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
