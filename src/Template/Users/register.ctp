<nav class="navbar navbar-fixed-top navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <b>Triple</b>XL
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a class="nav-link" href="/">Home</a></li>
                <li><a class="nav-link" href="/users/login">Login</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="offset"></div>
<div class="container">
    <div class="col-md-12 login-container">
        <?= $this->Flash->render() ?>
        <?= $this->Form->create($user) ?>
        <div class="form-group">
            <?= $this->Form->input('salution', ['class' => 'form-control', 'id' => 'inputSalutation']) ?>
        </div>
        <div class="form-group">
            <?= $this->Form->input('firstname', ['class' => 'form-control', 'id' => 'inputFirstname']) ?>
        </div>
        <div class="form-group">
            <?= $this->Form->input('insertion', ['class' => 'form-control', 'id' => 'inputInsrtion']) ?>
        </div>
        <div class="form-group">
            <?= $this->Form->input('lastname', ['class' => 'form-control', 'id' => 'inputLastname']) ?>
        </div>
        <div class="form-group">
            <?= $this->Form->input('adress', ['class' => 'form-control', 'id' => 'inputAdress']) ?>
        </div>
        <div class="form-group">
            <?= $this->Form->input('zip_code', ['class' => 'form-control', 'id' => 'inputZipcode']) ?>
        </div>
        <div class="form-group">
            <?= $this->Form->input('place', ['class' => 'form-control', 'id' => 'inputPlace']) ?>
        </div>
        <div class="form-group">
            <?= $this->Form->input('phone_number', ['type' => 'tel', 'class' => 'form-control', 'id' => 'inputPhonenumber']) ?>
        </div>

        <div class="form-group">
            <?= $this->Form->input('email', ['class' => 'form-control', 'id' => 'inputEmail']) ?>
        </div>
        <div class="form-group">
            <?= $this->Form->input('password', ['class' => 'form-control', 'id' => 'inputPassword']) ?>
        </div>
        <div class="form-group">
            <?= $this->Form->input('account_type', [
                'options' => ['candidate', 'company']
            ]) ?>
        </div>

        <?= $this->Form->button(__('Registreer'), ['class' => 'btn btn-primary']); ?>
        <?= $this->Form->end() ?>
    </div>
</div>