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
                    <?php if ($this->request->session()->read('Auth.User.account_type') === 1): ?>
                        <?= $this->Html->link("Mijn Vacatures(s)", ['controller' => 'Vacancies', 'action' => 'index'], ['class' => 'btn btn-default']) ?>
                    <?php elseif ($this->request->session()->read('Auth.User.account_type') === 0): ?>
                        <?= $this->Html->link("Mijn CV('s)", ['controller' => 'Cvs', 'action' => 'index'], ['class' => 'btn btn-default']) ?>
                    <?php else: ?>
                        <?= $this->Html->link("Mijn Vacatures(s)", ['controller' => 'Vacancies', 'action' => 'index'], ['class' => 'btn btn-default']) ?>
                        <?= $this->Html->link("Mijn CV('s)", ['controller' => 'Cvs', 'action' => 'index'], ['class' => 'btn btn-default']) ?>
                    <?php endif; ?>
                    <?= $this->Html->link("Mijn Matches", ['controller' => 'Matches', 'action' => 'index'], ['class' => 'btn btn-default']) ?>
                    <?= $this->Html->link("Accountgegevens", ['controller' => 'Users', 'action' => 'view'], ['class' => 'btn btn-default']) ?>
                    <?= $this->Html->link("Uitloggen", ['controller' => 'Users', 'action' => 'logout'], ['class' => 'btn btn-danger logout']) ?>
                </div>
            </div>
        </div>
        <?php if ($this->request->session()->read('Auth.User.account_type') >= 2) { ?>
            <div class="col-md-9">
                <div class="default-container">
                    <div class="message-wrapper">
                        <?= $this->Flash->render('update-error') ?>
                        <?= $this->Flash->render('update-success') ?>
                    </div>

                    <?= $this->Form->create('', ['url' => ['controller' => 'Updates', 'action' => 'create']]) ?>
                    <div class="form-group micropost">
                        <?= $this->Form->input('text', ['type' => 'textarea', 'rows' => 3, 'placeholder' => 'Verzend een update naar alle gebruikers..', 'class' => 'form-control send-data', 'label' => false]); ?>
                    </div>
                    <?= $this->Form->button('<span class="fa fa-paper-plane-o" aria-hidden="true"></span> Versturen', ['class' => 'btn btn-primary send-updat', 'escape' => false]); ?>
                </div>
            </div>
        <?php } ?>
        <div class="col-md-9">
            <div class="default-container">
                <h3>Updates</h3>
                <hr/>
                <div class="update-wrapper">
                    <?php if ($globalUpdates->isEmpty() && $userUpdates->isEmpty()) { ?>
                        <b>U heeft op dit moment geen updates..</b>
                    <?php } ?>
                    <?php foreach ($globalUpdates as $globalUpdate) { ?>
                    <?php if ($this->request->session()->read('Auth.User.account_type') >= 2) { ?>
                    <div class="update-post post-deletable">
                        <?php } else { ?>
                        <div class="update-post">
                            <?php } ?>
                            <div class="update-image">
                                <?php if ($this->request->session()->read('Auth.User.account_type') >= 2) { ?>
                                    <?= $this->Html->link("<span class=\"glyphicon glyphicon-trash\"></span>", ['controller' => 'Updates', 'action' => 'delete', $globalUpdate->id], ['class' => 'delete-update', 'escape' => false, 'confirm' => 'Weet u zeker dat u deze update wilt verwijderen?']); ?>
                                <?php } ?>
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
                        <?php if ($this->request->session()->read('Auth.User.account_type') >= 2) { ?>
                        <div class="update-post post-deletable">
                            <?php } else { ?>
                            <div class="update-post">
                                <?php } ?>
                                <div class="update-image">
                                    <?php if ($this->request->session()->read('Auth.User.account_type') >= 2) { ?>
                                        <?= $this->Html->link("<span class=\"glyphicon glyphicon-trash\"></span>", ['controller' => 'Updates', 'action' => 'delete', $userUpdate->id], ['class' => 'delete-update', 'escape' => false, 'confirm' => 'Weet u zeker dat u deze update wilt verwijderen?']); ?>
                                    <?php } ?>
                                    <div class="identifier"><?= $userUpdate->type; ?></div>
                                </div>
                                <div class="update-info">
                                    <span class="name">U heeft een nieuwe match!</span>
                                    <span class="date"><?= $userUpdate->date; ?></span>
                                    <p class="message"><?= htmlspecialchars($userUpdate->text); ?></p>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
