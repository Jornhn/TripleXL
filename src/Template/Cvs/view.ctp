<div class="offset"></div>

<div class="container">
    <div class="col-md-12 default-container">
        <h1> Details: <?= $cvs->title ?>
            <span class="pull-right"><?= $this->Html->link("Terug...", ['action' => 'index'], ['class' => 'btn btn-primary btn-lg']) ?></span>
        </h1>
        <hr>
        <table class="top-space col-lg-12 table table-striped">
            <tr>
                <th>Title: </th>
                <td><?= $cvs->title ?></td>
            </tr>
            <tr>
                <th>Tekst: </th>
                <td><?= $cvs->text ?></td>
            </tr>
            <tr>
                <th>Motivatie: </th>
                <td><?= $cvs->motivation ?></td>
            </tr>
            <tr>
                <th>Categorie</th>
                <td><?= $cvs->category->category ?></td>
            </tr>
            <tr>
                <th>Compententies</th>
                <td>
                    <?php foreach ($cvs->competences as $competence): ?>
                        <li><?= $competence->competence ?></li>
                    <?php endforeach; ?>
                </td>
            </tr>
            <tr>
                <th>Video: </th>
                <td>
                    <?php
                    if(strlen($cvs->video) < 10 ) {
                        echo 'U heeft helaas geen video! :(';
                    }
                    else {
                        echo '
                         <video width="320" height="240" controls>
                            <source src="../../videos/'.$cvs->video.'" type="video/mp4">
                        </video>';
                    }
                    ?>
                </td>
            </tr>
        </table>
        
        
        
    </div>
</div>
