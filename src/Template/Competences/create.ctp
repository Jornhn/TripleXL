<div class="offset"></div>

<div class="container">
    <div class="col-md-12 default-container">
        <h1>Competentie toevoegen<?=$this->Html->link("Terug", ['action' => 'index'], ['class' => 'btn btn-primary btn-lg pull-right']).' ';?></h1>
        <hr>
        <?= $this->Flash->render('competence-error') ?>
        <?php echo $this->Form->create('',['class'=>'form-horizontal']);?>

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
                $uri = $this->Url->build(['controller' => 'Cvs', 'action' => 'getCompetences']);
                echo $this->Form->input('category_id',['type'=>'select', 'class'=>'form-control ', 'data-url' => $uri,'options'=> $categories,'multiple'=>false,'div'=>false,'label'=>false, 'empty' => [0 => 'Kies een categorie...']]);
                ?>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="competence">Naam</label>
            <div class="col-md-6">
                <?=$this->Form->input('competence', ['type'=>'text', 'id'=>'competence', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="competence_description">Beschrijving</label>
            <div class="col-md-6">
                <?=$this->Form->input('competence_description', ['type'=>'textarea', 'id'=>'category_description', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
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
