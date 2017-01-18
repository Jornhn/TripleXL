<div class="offset"></div>

<div class="container">
    <div class="col-md-12 default-container">
        <h1>Categorie "<?=$category->category?>" wijzigen <?=$this->Html->link("Terug", ['action' => 'index'], ['class' => 'btn btn-primary btn-lg pull-right']).' ';?></h1>
        <hr>
        <?= $this->Flash->render('category-error') ?>
        <?php echo $this->Form->create($category,['class'=>'form-horizontal']);?>

        <!-- Text input-->
        <div class="form-group">
            <div class="col-md-12">
                <?=$this->Form->input('id', ['type'=>'hidden', 'data-toggle' => 'validator'])?>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="category">Naam</label>
            <div class="col-md-6">
                <?=$this->Form->input('category', ['type'=>'text', 'id'=>'category', 'class'=>'form-control ', 'div'=>false, 'label'=>false, 'required']); ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="category_description">Beschrijving</label>
            <div class="col-md-6">
                <?=$this->Form->input('category_description', ['type'=>'textarea', 'id'=>'category_description', 'class'=>'form-control ', 'div'=>false, 'label'=>false, 'required']); ?>
                <div class="help-block with-errors"></div>
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
