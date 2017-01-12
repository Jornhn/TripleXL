<div class="offset"></div>
<div class="container">
    <div class="col-xs-12 login-container">
        <?= $this->Flash->render('register-error') ?>
        <?= $this->Form->create($user, ['id' => 'register-form']) ?>
        <div class="register-step" id="step-1">
            <h4>Registeren - Stap 1</h4>
            <div class="form-group">
                <p>Wilt u zich registreren als een sollicitant of als bedrijf?</p>
                <?= $this->Form->input('account_type', [
                    'options' => ['Sollicitant', 'Bedrijf'],
                    'class' => 'form-control',
                    'error' => false
                ]) ?>
            </div>
            <button class="btn btn-default next pull-right">Volgende</button>
        </div>
        <div class="register-step" id="step-2">
            <h4>Registeren - Stap 2</h4>
            <p>Uw contact gegevens</p>
            <div class="form-group">
                <?= $this->Form->input('salutation', ['class' => 'form-control', 'id' => 'inputSalutation', 'error' => false]) ?>
            </div>
            <div class="form-group">
                <?= $this->Form->input('firstname', ['class' => 'form-control', 'id' => 'inputFirstname', 'error' => false]) ?>
            </div>
            <div class="form-group">
                <?= $this->Form->input('insertion', ['class' => 'form-control', 'id' => 'inputInsrtion', 'error' => false]) ?>
            </div>
            <div class="form-group">
                <?= $this->Form->input('lastname', ['class' => 'form-control', 'id' => 'inputLastname', 'error' => false]) ?>
            </div>
            <div class="form-group">
                <?= $this->Form->input('phone_number', ['type' => 'tel', 'class' => 'form-control', 'id' => 'inputPhonenumber', 'error' => false]) ?>
            </div>
            <div class="form-group company">
                <?= $this->Form->input('company_name', ['type' => 'tel', 'class' => 'form-control', 'id' => 'inputCompany', 'error' => false]) ?>
            </div>
            <div class="form-group company">
                <?= $this->Form->input('website', ['type' => 'tel', 'class' => 'form-control', 'id' => 'inputWebsite', 'error' => false]) ?>
            </div>
            <button class="btn btn-default prev pull-left">Vorige</button>
            <button class="btn btn-default next pull-right">Volgende</button>
        </div>

        <div class="register-step" id="step-3">
            <h4>Registeren - Stap 3</h4>
            <p>Uw adres gegevens</p>
            <div class="form-group">
                <?= $this->Form->input('adress', ['class' => 'form-control', 'id' => 'inputAdress', 'error' => false]) ?>
            </div>
            <div class="form-group">
                <?= $this->Form->input('zip_code', ['class' => 'form-control', 'id' => 'inputZipcode', 'error' => false]) ?>
            </div>
            <div class="form-group">
                <?= $this->Form->input('place', ['class' => 'form-control', 'id' => 'inputPlace', 'error' => false]) ?>
            </div>
            <button class="btn btn-default prev pull-left">Vorige</button>
            <button class="btn btn-default next pull-right">Volgende</button>
        </div>

        <div class="register-step" id="step-final">
            <h4>Registeren - Laatste stap</h4>
            <p>Uw login gegevens</p>
            <div class="form-group">
                <?= $this->Form->input('email', ['class' => 'form-control', 'id' => 'inputEmail', 'error' => false]) ?>
            </div>
            <div class="form-group">
                <?= $this->Form->input('password', ['class' => 'form-control', 'id' => 'inputPassword', 'error' => false]) ?>
            </div>
            <button class="btn btn-default prev pull-left">Vorige</button>
            <?= $this->Form->button(__('Registreer'), ['class' => 'btn btn-primary pull-right register']); ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>

<script>
    $(document).ready(function(){

        $('.register').click(function(e){
            $('#register-form').submit();
            e.preventDefault();
        });

        if($(this).val() == 0){
            $('.company').hide();
        }

        $('#account-type').change(function(){
            if($(this).val() == 0){
                $('.company').hide();
            } else {
                $('.company').show();
            }
        });

        $('.register-step').each(function() {
            if($(this)[0].id == "step-1"){
                $(this).show();
            } else {
                $(this).hide();
            }
        });

        $('button.next').click(function(e){
            $(this).parent().hide();
            $(this).parent().next().show();
            e.preventDefault();
        });

        $('button.prev').click(function(e){
            $(this).parent().hide();
            $(this).parent().prev().show();
            e.preventDefault();
        });
    });
</script>