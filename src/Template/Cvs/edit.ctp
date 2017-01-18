<div class="offset"></div>

<div class="container">
    <div class="col-md-12 default-container">
        <h1> CV wijzigen
            <span class="pull-right"><?= $this->Html->link("Terug", ['controller' => 'Cvs', 'action' => 'index'], ['class' => 'btn btn-primary btn-lg']) ?></span>
        </h1>
        <hr>
        <?php echo $this->Form->create($cvs,['class'=>'form-horizontal' ,'type'=>'file', 'data-toggle' => 'validator']);?>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="title">Titel</label>
            <div class="col-md-6">
                <?php echo $this->Form->input('title', ['type'=>'text', 'id'=>'title', 'placeholder'=>'', 'class'=>'form-control ', 'div'=>false, 'label'=>false, 'required']); ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>


        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-3 control-label" for="text">Tekst</label>
            <div class="col-md-6">
                <?php echo $this->Form->input('text', ['type'=>'textarea', 'id'=>'text', 'placeholder'=>'', 'class'=>'form-control ', 'div'=>false, 'label'=>false, 'required']); ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-3 control-label" for="motivation">Motivatie</label>
            <div class="col-md-6">
                <?php echo $this->Form->input('motivation', ['type'=>'textarea', 'id'=>'motivation', 'placeholder'=>'', 'class'=>'form-control ', 'div'=>false, 'label'=>false, 'required']); ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-3 control-label" for="category">Categorie</label>
            <div class="col-md-6">
                <?php
                $uri = $this->Url->build(['controller' => 'app', 'action' => 'getCompetences']);
                echo $this->Form->input('category_id',['type'=>'select', 'class'=>'form-control ', 'data-url' => $uri,'options'=> $categories,'multiple'=>false,'div'=>false,'label'=>false, 'empty' => [0 => 'Kies een categorie...'], 'required']); ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group" id="competence-container">
            <label class="col-md-3 control-label" for="competentie">Competenties</label>
            <div class="col-md-6">
                <?php echo $this->Form->input('categories_competences._ids', ['class' => 'form-control', 'options'=> '', 'div'=> false,'label' => false, 'required']); ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <!-- File Button -->
        <div class="form-group">
            <label class="col-md-3 control-label" for="video">Video</label>
            <div class="col-lg-6">
                <?php echo $this->Form->file('video'); ?>
            </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group" id="competence-container">
            <label class="col-md-3 control-label" for="status">Status</label>
            <div class="col-md-6">
                <?php
                $types = array(0 => 'Non actief', 1 => 'Actief');
                echo $this->Form->input('status', ['type' => 'select', 'class' => 'form-control', 'options'=> $types, 'div'=> false,'label' => false, 'required']);
                ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <hr>
        <!-- Button -->
        <div class="form-group">
            <div class="col-lg-12">
                <?=$this->Form->button('Opslaan', ['class'=>'btn btn-primary']);?>
            </div>
        </div>
        <?php echo $this->Form->end();
        ?>
    </div>
</div>
<script>
    var categoryId = $("#category-id").val();
    var url = $("#category-id").attr('data-url');

    $.post(url, { categoryId: categoryId }, function(result) {
        var html = [];
        for (var i = 0; i < result.result.length; i++) {
            html.push('<option value="'+result.result[i].id+'">'+result.result[i].title+'</option>');
        }

        $('#competence-container').removeClass('hidden');
        $('#categories-competences-ids').html(html.join(''));
    });
</script>
