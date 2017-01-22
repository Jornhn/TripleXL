<script type="text/javascript">
    $(document).ready(function () {
        var doc = new jsPDF();
        var d = new Date();
        var specialElementHandlers = {
            '#editor': function (element, renderer) {
                return true;
            }
        };
    });
    download = function(ele){
        var div = '.' + ele;
        // All units are in the set measurement for the document
        // This can be changed to "pt" (points), "mm" (Default), "cm", "in"
        doc.fromHTML($(div).get(0), 15, 15, {
            'width': 170,
            'elementHandlers': specialElementHandlers
        });
        doc.save('4.pdf');
    }
</script>
<div class="offset"></div>

<div class="container">
    <div class="col-md-12 default-container">
        <h1>overzicht van gekochte data<?=$this->Html->link("Terug", ['controller' => 'dashboard', 'action' => 'index'], ['class' => 'btn btn-primary btn-lg pull-right']).' ';?></h1>
        <hr>
        <?= $this->Flash->render('matches-success') ?>
        <?= $this->Flash->render('matches-error') ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Titel</th>
                    <th></th>
                </tr>
                </thead>
                <!--                --><?php //if ($matches->isEmpty()) { ?>
                <!--                    <tr><td colspan="9">U heeft nog geen beheerders toegevoegd.</td></tr>-->
                <!--                --><?php //} ?>
                <?php
                foreach($matches as $match){
                    ?>
                    <tr>
                        <td><?=$match->id ?></td>
                        <td><?=$match->title?></td>
                        <td>
                            <button onclick="download(cv<?=$match->id?>)" class="cv-button-open btn btn-info">Download</button>
                        </td>
                    <tr>
                        <td colspan="3" class="hidden">
                            <div class="cv<?=$match->id?>">
                                <div><h2>Title:</h2>
                                    <p><?= $match->title ?></p>
                                </div>
                                <div>
                                    <h2>Tekst:</h2>
                                    <p><?= $match->text ?></p>
                                </div>
                                <div>
                                    <h2>Motivatie:</h2>
                                    <?= $match->motivation ?>
                                </div>
                                <div>
                                    <h2>Categorie:</h2>
                                    <?php
                                    if ($match->category) {
                                        echo $match->category->category;
                                    } else {
                                        echo "Geen gekoppelde category";
                                    }
                                    ?>
                                </div>
                                <div>
                                    <h2>Competenties:</h2>
                                    <?php
                                    if ($match->categories_competences) {
                                        foreach ($match->categories_competences as $competence) {
                                            echo $competence->title;
                                        }
                                    } else {
                                        echo "Geen gekoppelde competenties";
                                    }
                                    ?>
                                </div>
                                <div>
                                    <h2>Status:</h2>
                                    <?php
                                    if ($match->status === 1) {
                                        echo "Actief";
                                    } else {
                                        echo "Non-actief";
                                    }
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>