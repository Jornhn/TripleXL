<div class="offset"></div>

<div class="container">
    <div class="col-md-12 default-container">
        <h1>Mijn Matches</h1>
        <hr>
        <div class="row">
            <?php if ($this->request->session()->read('Auth.User.account_type') == 0) {
                $count = 1;
                foreach ($matches as $key => $match) {
                    if (!is_null($match->vacancy)) {
                        ?>
                        <div class="col-xs-6 col-md-3">
                            <div class="thumbnail text-center">
                                <div class="img-match" data-content="#<?= $count; ?>">
                                    <img src="http://placekitten.com/242/200" alt="User Icon" />
                                </div>
                                <div class="caption">
                                    <h3><?= $match->vacancy->title; ?></h3>
                                    <p><?= $match->vacancy->user->company_name; ?></p>
                                    <p class="score">Score: <?= $match->score; ?></p>
                                    <p>
                                        <?php if (!empty($match->vacancy->user->website)) { ?>
                                            <a href="<?= $match->vacancy->user->website ?>" target="_blank" class="btn btn-info btn-block" role="button">Ga naar website</a>
                                        <?php } else {?>
                                            <a class="btn btn-info btn-block" role="button" disabled="disabled">Ga naar website</a>
                                        <?php } ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php
                    $count++;
                    }
                }
            } else if ($this->request->session()->read('Auth.User.account_type') == 1) {
                $count = 1;
                foreach ($matches as $key => $match) {
                    if (!is_null($match->cv)) {
                        ?>
                        <div class="col-xs-6 col-md-3">
                            <div class="thumbnail text-center">
                                <div class="img-match" data-content="#<?= $count; ?>">
                                    <img src="http://placekitten.com/242/200" alt="User Icon" />
                                </div>
                                <div class="caption">
                                    <h3><?= $match->cv->title; ?></h3>
                                    <p><?= $match->vacancy->title; ?></p>
                                    <p class="score">Score: <?= $match->score; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php
                    $count++;
                    }
                }
            } else {
                $count = 1;
                foreach ($matches as $key => $match) {
                    if (!is_null($match->cv) && !is_null($match->vacancy)) {
                        ?>
                        <div class="col-xs-6 col-md-3">
                            <div class="thumbnail text-center">
                                <div class="img-match" data-content="#<?= $count; ?>">
                                    <img src="http://placekitten.com/242/200" alt="User Icon" />
                                </div>
                                <div class="caption">
                                    <p><b>Bedrijf</b>: <?= $match->vacancy->user->company_name; ?></p>
                                    <?php
                                        $fullname = $match->cv->user->salutation . " " . $match->cv->user->firstname . " ";

                                        if (!empty($match->cv->user->insertion)) {
                                            $fullname .= $match->cv->user->insertion . " ";
                                        }

                                        $fullname .= $match->cv->user->lastname;
                                    ?>
                                    <p><b>Vacature</b>: <?= $match->vacancy->title; ?></p>
                                    <p><b>Sollicitant</b>: <?= $fullname; ?></p>
                                    <p><b>CV</b>: <?= $match->cv->title; ?></p>
                                    <p class="score">Score: <?= $match->score; ?></p>
                                </div>
                            </div>
                        </div>
                <?php
                        $count++;
                    }

                }
             } ?>
        </div>
    </div>
</div>