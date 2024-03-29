<div class="offset"></div>
<div class="container">
    <div class="col-md-12 login-container">
        <h4>Inloggen</h4>
        <?= $this->Flash->render('login-error') ?>
        <?= $this->Flash->render('register-success') ?>
        <?= $this->Form->create('', ['data-toggle' => 'validator', 'role' => 'form']) ?>
        <div class="form-group">
            <?= $this->Form->input('email', ['class' => 'form-control', 'id' => 'inputEmail', 'label' => 'E-mail', 'required']) ?>
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
            <?= $this->Form->input('password', ['class' => 'form-control', 'id' => 'inputPassword', 'label' => 'Wachtwoord', 'required']) ?>
            <div class="help-block with-errors"></div>
        </div>

        <?= $this->Form->button(__('Login'), ['class' => 'btn btn-primary']); ?>
        <p class="login-register">Nog geen account? Registreer
            dan <?php echo $this->Html->link("hier", ['controller' => 'Users', 'action' => 'register']) ?> gratis!</p>
        <?= $this->Form->end() ?>
    </div>
</div>