<div class="offset"></div>

<div class="container">
    <div class="col-md-12 default-container">
        <h1> Edit CV
            <span class="pull-right">
                <?= $this->Html->link("Back", ['action' => 'index'], ['class' => 'btn btn-primary btn-lg']) ?>
            </span>
        </h1>
        <hr>
        <?php echo $this->Form->create($cv,['class'=>'form-horizontal']);?>
        <!-- Text input-->
        <div class="form-group">
            <div class="col-md-12">
                <?php echo $this->Form->input('title', ['type'=>'text', 'id'=>'title', 'placeholder'=>'Title...', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
            </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
            <div class="col-md-12">
                <?php echo $this->Form->input('text', ['type'=>'textarea', 'id'=>'text', 'placeholder'=>'Tekst...', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
            </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
            <div class="col-md-12">
                <?php echo $this->Form->input('motivation', ['type'=>'textarea', 'id'=>'motivation', 'placeholder'=>'Motivatie...', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <div class="col-md-12">
                <?php echo $this->Form->input('video', ['type'=>'text', 'id'=>'title', 'placeholder'=>'Video...', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
            </div>
        </div>

        <hr>
        <!-- Button -->
        <div class="form-group">
            <div class="col-lg-12">
                <button id="save" name="save" class="btn btn-primary">Save</button>
            </div>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
