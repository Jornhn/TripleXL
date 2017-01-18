<div class="offset"></div>

<div class="container">
    <div class="col-md-12 default-container">
        <h1>Competentie wijzigen<?=$this->Html->link("Terug", ['controller' => 'competenties', 'action' => 'index'], ['class' => 'btn btn-primary btn-lg pull-right']).' ';?></h1>
        <hr>
        <?= $this->Flash->render('competence-error') ?>
        <?php echo $this->Form->create($competence,['class'=>'form-horizontal']);?>

        <!-- Text input-->
        <div class="form-group">
            <div class="col-md-12">
                <?=$this->Form->input('id', ['type'=>'hidden'])?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="category">Categorie</label>
            <div class="col-md-6">
                <?php
                echo $this->Form->input('category_id',['type'=>'select', 'class'=>'form-control ', 'options'=> $categories,'multiple'=>false,'div'=>false,'label'=>false, 'empty' => [0 => 'Kies een categorie...']]);
                ?>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="competence">Naam</label>
            <div class="col-md-6">
                <?=$this->Form->input('title', ['type'=>'text', 'id'=>'competence', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
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
