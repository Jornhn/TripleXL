<div class="offset"></div>
<div class="container default-container">
    <div class="row">
        <div class="col-md-12">
            <h2>Dashboard</h2>
            <hr />
        </div>
        <div class="col-md-12">
            <h3>Activeiten</h3>
            <table class="table table-striped">
                <?php
                foreach ($activities as $activity) { ?>
                    <tr>
                        <td><?= $activity->description; ?><br /> <?= $activity->date; ?></td>
                    </tr>

                <?php } ?>
            </table>

        </div>
    </div>
</div>