<?php
echo $this->Form->create($manager);
echo $this->Form->input('id', array('type'=>'hidden'));
echo $this->Form->input('salutation');
echo $this->Form->input('firstname');
echo $this->Form->input('insertion');
echo $this->Form->input('lastname');
echo $this->Form->input('adress');
echo $this->Form->input('zip_code');
echo $this->Form->input('place');
echo $this->Form->input('phone_number');
echo $this->Form->input('email');
echo $this->Form->input('company_name', array('type'=>'hidden', 'disabled' => 'disabled'));
echo $this->Form->input('website', array('type'=>'hidden', 'disabled' => 'disabled'));
echo $this->Form->input('account_type', array('type'=>'hidden', 'disabled' => 'disabled'));
echo $this->Form->input('password', array('type'=>'hidden', 'disabled' => 'disabled'));
echo $this->Form->button('Verwijder');
echo $this->Form->end();
?>