<div class="offset"></div>

<div class="container">
    <div class="col-md-12 default-container">
        <h1> Details: <?= $cv->title ?>
            <span class="pull-right">
                <?= $this->Html->link("Terug", ['action' => 'index'], ['class' => 'btn btn-primary btn-lg']) ?>
            </span>
        </h1>
        <hr>
        <table class="top-space col-lg-12 table table-striped">
            <tr>
                <td>Title: </td>
                <td><?= $cv->title ?></td>
            </tr>
            <tr>
                <td>Tekst: </td>
                <td><?= $cv->text ?></td>
            </tr>
            <tr>
                <td>Motivatie: </td>
                <td><?= $cv->motivation ?></td>
            </tr>
            <tr>
                <td>Categorieën</td>
                <td></td>
            </tr>
            <tr>
                <td>Compententies</td>
                <td></td>
            </tr>
            <tr>
                <td>Video: </td>
                <td>
                    <?php
                    if(strlen($cv->video)<10 ) {
                        echo 'U heeft helaas geen video! :(';
                    }
                    else {
                        echo '
                         <video width="320" height="240" controls>
                            <source src="../../videos/'.$cv->video.'" type="video/mp4">
                        </video>';
                    }
                    ?>
                </td>
            </tr>
        </table>
        
        
        
    </div>
</div>
