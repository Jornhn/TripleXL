<h1>Add CV</h1>
<hr>
<?php echo $this->Form->create($cv,['class'=>'form-horizontal']);?>
<fieldset>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-3 control-label" for="title">Title</label>
        <div class="col-md-6">
            <?php echo $this->Form->input('title', ['type'=>'text', 'id'=>'title', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>

        </div>
    </div>

    <!-- Textarea -->
    <div class="form-group">
        <label class="col-md-3 control-label" for="text">Text</label>
        <div class="col-md-6">
            <?php echo $this->Form->input('text', ['type'=>'textarea', 'id'=>'text', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
        </div>
    </div>

    <!-- Textarea -->
    <div class="form-group">
        <label class="col-md-3 control-label" for="motivation">Motivation</label>
        <div class="col-md-6">
            <?php echo $this->Form->input('motivation', ['type'=>'textarea', 'id'=>'motivation', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
        </div>
    </div>

    <!-- Button -->
    <div class="form-group">
        <div class="col-lg-6">
            <button id="save" name="save" class="btn btn-primary">Save</button>
        </div>
    </div>

</fieldset>
<?php echo $this->Form->end(); ?>
