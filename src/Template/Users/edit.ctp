<div class="offset"></div>

<div class="container">
    <div class="col-md-12 default-container">
        <h1>Account wijzigen <?=$this->Html->link("Terug", ['action' => 'view'], ['class' => 'btn btn-primary btn-lg pull-right']).' ';?></h1>
        <hr>
        <?= $this->Flash->render('manager-error') ?>
        <?=$this->Form->create($manager,['class'=>'form-horizontal', 'data-toggle' => 'validator']);?>

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
                ],'div'=>false,'label'=>false, 'required']); ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="firstname">Voornaam</label>
            <div class="col-md-6">
                <?=$this->Form->input('firstname', ['type'=>'text', 'id'=>'firstname', 'class'=>'form-control ', 'div'=> false, 'label'=> false, 'required']); ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="insertion">Tussenvoegsel</label>
            <div class="col-md-6">
                <?=$this->Form->input('insertion', ['type'=>'text', 'id'=>'insertion', 'class'=>'form-control ', 'div'=> false, 'label'=> false]); ?>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="lastname">Achternaam</label>
            <div class="col-md-6">
                <?=$this->Form->input('lastname', ['type'=>'text', 'id'=>'lastname', 'class'=>'form-control ', 'div'=> false, 'label'=> false, 'required']); ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="adress">Straat</label>
            <div class="col-md-6">
                <?=$this->Form->input('adress', ['type'=>'text', 'id'=>'adress', 'class'=>'form-control ', 'div'=> false, 'label'=>  false, 'required']); ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="zip_code">Postcode</label>
            <div class="col-md-6">
                <?=$this->Form->input('zip_code', ['type'=>'text', 'id'=>'zip_code', 'class'=>'form-control ', 'div'=> false, 'label'=> false, 'required']); ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="place">Woonplaats</label>
            <div class="col-md-6">
                <?=$this->Form->input('place', ['type'=>'text', 'id'=>'place', 'class'=>'form-control ', 'div'=> false, 'label'=> false, 'required']); ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="phone_number">Telefoon nummer</label>
            <div class="col-md-6">
                <?=$this->Form->input('phone_number', ['type'=>'text', 'id'=>'phone_number', 'class'=>'form-control ', 'div'=> false, 'label'=> false, 'required']); ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="email">E-mail</label>
            <div class="col-md-6">
                <?=$this->Form->input('email', ['type'=>'text', 'id'=>'email', 'class'=>'form-control ', 'div'=> false, 'label'=> false, 'required']); ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <?php if ($this->request->session()->read('Auth.User.account_type') >= 1) { ?>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="company_name">Bedrijfsnaam</label>
            <div class="col-md-6">
                <?=$this->Form->input('company_name', ['type'=>'text', 'id'=>'company_name', 'class'=>'form-control ', 'div'=> false, 'label'=> false]); ?>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="website">Website</label>
            <div class="col-md-6">
                <?=$this->Form->input('website', ['type'=>'text', 'id'=>'website', 'class'=>'form-control ', 'div'=> false, 'label'=> false]); ?>
            </div>
        </div>

        <?php } ?>

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