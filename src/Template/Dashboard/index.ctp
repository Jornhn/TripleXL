<div class="offset"></div>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="default-container">
                <div class="user-image">
                    <img src="http://placekitten.com/g/200/200" alt="Profielfoto">
                </div>
                <div class="info-username">
                    <?= $fullname; ?>
                </div>
                <div class="info-email">
                    <?= $this->request->session()->read('Auth.User.email'); ?>
                </div>
                <div class="info-location">
                    <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                    <?= $this->request->session()->read('Auth.User.zip_code') . ', ' . $this->request->session()->read('Auth.User.place'); ?>
                </div>

                <div class="info-matches">

                    <?= $this->Html->link("Mijn CV('s)", ['controller' => 'Cvs', 'action' => 'index'], ['class' => 'btn btn-default'])?>
                    <?= $this->Html->link("Mijn Vacatures(s)", ['controller' => 'Vacancies', 'action' => 'index'], ['class' => 'btn btn-default'])?>
                    <?= $this->Html->link("Mijn Matches <span class=\"badge\">420</span>", ['controller' => 'Matches', 'action' => 'index'], ['class' => 'btn btn-default', 'escape' => false])?>
                    <?= $this->Html->link("Instellingen", ['controller' => 'Users', 'action' => 'settings'], ['class' => 'btn btn-default'])?>
                    <?= $this->Html->link("Uitloggen", ['controller' => 'Users', 'action' => 'logout'], ['class' => 'btn btn-danger logout'])?>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="default-container">
                <div class="form-group micropost">
                    <textarea class="form-control send-data" rows="3" placeholder="Compose Micropost"></textarea>
                </div>
                <div class="btn btn-primary send-update"><span class="fa fa-paper-plane-o" aria-hidden="true"></span> Verzend</div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="default-container">
                <div class="update-wrapper">

                    <?php foreach ($globalUpdates as $globalUpdate) { ?>
                        <div class="update-post">
                            <div class="update-image">
                                <div class="identifier"><?= $globalUpdate->type; ?></div>
                            </div>
                            <div class="update-info">
                                <span class="name">Update</span>
                                <span class="date"><?= $globalUpdate->date; ?></span>
                                <p class="message"><?= htmlspecialchars($globalUpdate->text); ?></p>
                            </div>
                        </div>
                    <?php } ?>
                    <?php foreach ($userUpdates as $userUpdate) { ?>
                        <div class="update-post">
                            <div class="update-image">
                                <div class="identifier"><?= $userUpdate->type; ?></div>
                            </div>
                            <div class="update-info">
                                <span class="name">U heeft een nieuwe match!</span>
                                <span class="date"><?= $userUpdate->date; ?></span>
                                <p class="message"><?= htmlspecialchars($userUpdate->text); ?></p>
                            </div>
                        </div>
                    <?php } ?>

<!--                    <div class="update-post">-->
<!--                        <div class="update-image">-->
<!--                            <div class="identifier">S</div>-->
<!--                        </div>-->
<!--                        <div class="update-info">-->
<!--                            <span class="name">Sven Oortwijn</span>-->
<!--                            <span class="date">2017-01-26 12:50</span>-->
<!--                            <p class="message">Lorem ipsum</p>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
            </div>
        </div>
    </div>
</div>
