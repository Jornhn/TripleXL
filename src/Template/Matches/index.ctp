<div class="offset"></div>

<div class="container">
    <div class="col-md-12 default-container">
        <h1>
                Mijn Matches
            <?php if ($this->request->session()->read('Auth.User.account_type') == 1) : ?>
                    <button class="btn btn-info btn-buy pull-right">Betalen</button>
            <?php endif; ?>
        </h1>
        <hr>
        <div class="row">
            <?php
            if ($this->request->session()->read('Auth.User.account_type') == 0) :
                $count = 1;

                foreach ($matches as $key => $match) : ?>
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
                                    <?php if (!empty($match->vacancy->user->website)) : ?>
                                        <a href="<?= $match->vacancy->user->website ?>" target="_blank" class="btn btn-info btn-block" role="button">Ga naar website</a>
                                    <?php else :?>
                                        <a class="btn btn-info btn-block" role="button" disabled="disabled">Ga naar website</a>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                    </div>
            <?php $count++;
                endforeach;
            elseif ($this->request->session()->read('Auth.User.account_type') == 1) :
                $count = 1;
            ?>
                <?= $this->Form->create('', ['id' => 'buyForm']); ?>
            <?php
                foreach ($matches as $key => $match) : ?>
                    <div class="col-xs-6 col-md-3">
                        <div class="thumbnail text-center">
                            <div class="img-match" data-content="#<?= $count; ?>">
                                <img src="http://placekitten.com/242/200" alt="User Icon" />
                            </div>
                            <div class="caption">
                                <h3><?= $match->cv->title; ?></h3>
                                <p><?= $match->vacancy->title; ?></p>
                                <p class="score">Score: <?= $match->score; ?></p>

                                <div class="checkbox checkbox-danger">
                                        <?= $this->Form->checkbox('buySelection', ['id' => 'checkbox', 'class' => 'styled', 'hiddenField' => false]); ?>
                                        <label for="checkbox">
                                            Kopen
                                        </label>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php $count++;
                endforeach;
                ?>
                <?= $this->Form->end(); ?>
                <?php else :
                $count = 1;
                foreach ($matches as $key => $match) : ?>
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
            <?php $count++;
            endforeach;
            endif; ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){


        if (!$("#buyForm input:checkbox:checked").length)
        {
            $('.btn-buy').prop('disabled', true);
        }

        $('input:checkbox').click(function(){
            if (!$("#buyForm input:checkbox:checked").length)
            {
                $('.btn-buy').prop('disabled', true);
            } else {
                $('.btn-buy').prop('disabled', false);
            }

        });

        $('.btn-buy').click(function(e){
            $('#buyForm').submit();
            e.preventDefault();
        });
    });
</script>