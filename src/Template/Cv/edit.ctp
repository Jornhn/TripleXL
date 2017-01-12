<div class="offset"></div>

<div class="container">
    <div class="col-md-12 default-container">
        <h1> Verander CV
            <span class="pull-right">
                <?= $this->Html->link("Terug", ['action' => 'index'], ['class' => 'btn btn-primary btn-lg']) ?>
            </span>
        </h1>
        <hr>
        <?php echo $this->Form->create($cv,['class'=>'form-horizontal']);?>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="title">Titel</label>
            <div class="col-md-6">
                <?php echo $this->Form->input('title', ['type'=>'text', 'id'=>'title', 'placeholder'=>'', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
            </div>
        </div>


        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-3 control-label" for="text">Tekst</label>
            <div class="col-md-6">
                <?php echo $this->Form->input('text', ['type'=>'textarea', 'id'=>'text', 'placeholder'=>'', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
            </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-3 control-label" for="motivation">Motivatie</label>
            <div class="col-md-6">
                <?php echo $this->Form->input('motivation', ['type'=>'textarea', 'id'=>'motivation', 'placeholder'=>'', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
            </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-3 control-label" for="category">Categorie</label>
            <div class="col-md-6">
                <?php echo $this->Form->input('selectbasic',['type'=>'select','class'=>'form-control ','options'=> [
                    'Option one'=>'Option one',
                    'Option two'=>'Option two',
                ],'div'=>false,'label'=>false]); ?>
            </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-3 control-label" for="competention">Competenties</label>
            <div class="col-md-6">
                <?php echo $this->Form->input('selectbasic',['type'=>'select','class'=>'form-control ','options'=> [
                    'Option one'=>'Option one',
                    'Option two'=>'Option two',
                ],'div'=>false,'label'=>false]); ?>
            </div>
        </div>

        <!-- Text input -->
        <div class="form-group">
            <label class="col-md-3 control-label" for="video">Video</label>
            <div class="col-md-6">
                <?php echo $this->Form->input('video', ['type'=>'text', 'id'=>'video', 'placeholder'=>'', 'class'=>'form-control ', 'div'=>false, 'label'=>false]); ?>
            </div>
        </div>
        <hr>
        <!-- Button -->
        <div class="form-group">
            <div class="col-lg-12">
                <button id="save" name="save" class="btn btn-primary">Opslaan</button>
            </div>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
