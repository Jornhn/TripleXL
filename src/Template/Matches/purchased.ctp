<script type="text/javascript">
    $(document).ready(function () {
        download = function(ele){
            var doc = new jsPDF();
            var d = new Date();
            var specialElementHandlers = {
                '#editor': function (element, renderer) {
                    return true;
                }
            };
            var div = '.' + ele;
            console.log(div);

            doc.fromHTML($(div).get(0), 15, 15, {
                'width': 170,
                'elementHandlers': specialElementHandlers
            });

            doc.save('4.pdf');
        };
    });
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
                <?php
                if($matches != NULL){
                ?>
                    <tr>
                        <th>Titel</th>
                        <th></th>
                    </tr>
                    </thead>
                    <?php
                    foreach($matches as $match){
                        ?>
                        <tr>
                            <td><?=$match->title?></td>
                            <td>
                                <button onClick="download('cv<?=$match->id?>')" class="cv-button-open btn btn-info">Download</button>
                            </td>
                                <div class="hidden cv<?=$match->id?>">
                                    <div><h1>Sollicitant gegevens:</h1>
                                        <h4>Naam</h4>
                                        <p><?= $match->applicant['salutation'] . " " . $match->applicant['firstname'] . " " . $match->applicant['insertion'] . " " . $match->applicant['lastname']?></p>
                                    </div>
                                    <div><h4>Email:</h4>
                                        <p><?= $match->applicant['email'] ?></p>
                                    </div>
                                    <div><h4>Woongegevens:</h4>
                                        <p><?= $match->applicant['adress'] ?></p>
                                        <p><?= $match->applicant['zip_code'] ?></p>
                                        <p><?= $match->applicant['place'] ?></p>
                                    </div>
                                    <div>
                                        <h1>CV gegevens:</h1>
                                        <h4>Title:</h4>
                                        <p><?= $match->title ?></p>
                                    </div>
                                    <div>
                                        <h4>Tekst:</h4>
                                        <p><?= $match->text ?></p>
                                    </div>
                                    <div>
                                        <h4>Motivatie:</h4>
                                        <?= $match->motivation ?>
                                    </div>
                                    <div>
                                        <h4>Categorie:</h4>
                                        <?php
                                        if ($match->category) {
                                            echo $match->category->category;
                                        } else {
                                            echo "Geen gekoppelde category";
                                        }
                                        ?>
                                    </div>
                                    <div>
                                        <h4>Competenties:</h4>
                                        <?php
                                        if ($match->categories_competences) {
                                            foreach ($match->categories_competences as $competence) {
                                                echo $competence->title . " ";
                                            }
                                        } else {
                                            echo "Geen gekoppelde competenties";
                                        }
                                        ?>
                                    </div>
                                    <div>
                                        <h4>Status:</h4>
                                        <?php
                                        if ($match->status === 1) {
                                            echo "Actief";
                                        } else {
                                            echo "Non-actief";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </tr>
                        <?php
                    }
                } else {
                    ?>
                <tr>
                    <th>Gekochte CV's</th>
                </tr>
                </thead>
                <tr>
                        <td>U heeft nog geen cv's gekocht</td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>