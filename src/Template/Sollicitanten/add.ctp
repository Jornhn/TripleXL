<?php echo $this->Form->create('',['class'=>'form-horizontal']);?>
<fieldset>

<!-- Form Name -->
<h1>Add sollicitanten</h1>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="textinput">Text Input</label>
  <div class="col-md-6">
    <?php echo $this->Form->input('textinput', ['type'=>'text', 'id'=>'textinput', 'placeholder'=>'placeholder', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
    <p class="help-block">help</p>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="textinput">Text Input</label>
  <div class="col-md-6">
    <?php echo $this->Form->input('textinput', ['type'=>'text', 'id'=>'textinput', 'placeholder'=>'placeholder', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
    <p class="help-block">help</p>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="textinput">Text Input</label>
  <div class="col-md-6">
    <?php echo $this->Form->input('textinput', ['type'=>'text', 'id'=>'textinput', 'placeholder'=>'placeholder', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
    <p class="help-block">help</p>
  </div>
</div>

</fieldset>
<?php echo $this->Form->end(); ?>