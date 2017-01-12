<div class="offset"></div>
<div class="container default-container">
<?php echo $this->Form->create($users,['class'=>'form-horizontal']);?>
<fieldset>

<!-- Form Name -->
<h1>Add</h1>

<!-- Text input-->
<div class="form-group top-space">
  <label class="col-md-3 control-label" for="id">#</label>
  <div class="col-md-6">
    <?php echo $this->Form->input('id', ['type'=>'text', 'id'=>'user_id', 'placeholder'=>'', 'class'=>'form-control ', 'div'=>false, 'label'=>false, 'disabled'=>'true']); ?>
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-3 control-label" for="salutation">Aanhef</label>
  <div class="col-md-6">
    <?php echo $this->Form->input('salution',['type'=>'select','class'=>'form-control ','options'=> [
      'Dhr.'=>'Dhr.',
      'Mevr.'=>'Mevr.',
    ],'div'=>false,'label'=>false]); ?>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="firstname">Voornaam</label>
  <div class="col-md-6">
    <?php echo $this->Form->input('firstname', ['type'=>'text', 'id'=>'firstname', 'placeholder'=>'', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="insertion">Tussenvoegsel</label>
  <div class="col-md-6">
    <?php echo $this->Form->input('insertion', ['type'=>'text', 'id'=>'insertion', 'placeholder'=>'', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="lastname">Achternaam</label>
  <div class="col-md-6">
    <?php echo $this->Form->input('lastname', ['type'=>'text', 'id'=>'lastname', 'placeholder'=>'', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="adress">Adres</label>
  <div class="col-md-6">
    <?php echo $this->Form->input('adress', ['type'=>'text', 'id'=>'adress', 'placeholder'=>'', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="zip_code">Postcode</label>
  <div class="col-md-6">
    <?php echo $this->Form->input('zip_code', ['type'=>'text', 'id'=>'zip_code', 'placeholder'=>'', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="place">Plaats</label>
  <div class="col-md-6">
    <?php echo $this->Form->input('place', ['type'=>'text', 'id'=>'place', 'placeholder'=>'', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="phone_number">Telefoonnummer</label>
  <div class="col-md-6">
    <?php echo $this->Form->input('phone_number', ['type'=>'text', 'id'=>'phone_number', 'placeholder'=>'', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="email">E-mail</label>
  <div class="col-md-6">
    <?php echo $this->Form->input('email', ['type'=>'text', 'id'=>'email', 'placeholder'=>'', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="company_name">Bedrijfsnaam</label>
  <div class="col-md-6">
    <?php echo $this->Form->input('company_name', ['type'=>'text', 'id'=>'company_name', 'placeholder'=>'', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="website">Website</label>
  <div class="col-md-6">
    <?php echo $this->Form->input('website', ['type'=>'text', 'id'=>'website', 'placeholder'=>'', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-3 control-label" for="password">Password</label>
  <div class="col-md-6">
    <?php echo $this->Form->input('password', ['type'=>'password', 'class' => 'form-control', 'id' => 'inputPassword', 'error' => false, 'label'=>false]) ?>
  </div>
</div>

<!-- Button -->
<div class="form-group">
    <div class="col-lg-6">
        <button id="save" name="save" class="btn btn-primary">Save</button> 
        <?php echo $this->Html->link("Terug", ['action' => 'index'], ['class' => 'btn btn-primary'])?>
    </div>
</div>
    

</fieldset>
<?php echo $this->Form->end(); ?>
</div>