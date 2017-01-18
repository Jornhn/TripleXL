<div class="offset"></div>

<div class="container">
    <div class="col-md-12 default-container">
        <h1>Details: <?=$category->category?><?=$this->Html->link("Terug", ['controller' => 'categorieën', 'action' => 'index'], ['class' => 'btn btn-primary btn-lg pull-right']).' ';?></h1>
        <hr>
        <br>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <td><strong>ID</strong></td><td><?=$category->id?></td>
                </tr>
                <tr>
                    <td><strong>Naam</strong></td><td><?=$category->category?></td>
                </tr>
                <tr>
                    <td><strong>Beschrijving</strong></td><td><?=$category->category_description?></td>
                </tr>
                <tr>
                    <td>Competenties</td>
                    <td>
                        <?php
                        if(empty($category->categories_competences)) {
                            echo "<span class=\"label label-danger\">Geen gekoppelde competenties</span>";
                        }
                        else {
                            foreach($category->categories_competences as $competence) {
                                echo "<span class=\"label label-info\" title=\"" . $competence->title . "\">" . $competence->title . "</span> ";
                            }
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>