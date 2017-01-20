<div class="offset"></div>
<div class="container">
    <div class="col-md-12 default-container">
        <?php echo $this->Form->create($contact, ['class' => 'form-horizontal', 'data-toggle' => 'validator']); ?>
        <fieldset>

            <h1>Edit: Contactpagina
                <span class="pull-right">
                <?= $this->Html->link("Terug", ['action' => 'index'], ['class' => 'btn btn-primary btn-lg']) ?>
            </span>
            </h1>
            <hr>

            <div class="row">

                <div class="col-md-6 ">

                    <label for="contact_text">Contact Tekst</label>
                    <!-- Textarea -->
                    <div class="form-group">
                        <div class="col-md-12">
                            <?php echo $this->Form->input('contact_text', ['type' => 'textarea', 'id' => 'contact_text', 'class' => 'form-control ', 'div' => false, 'label' => false, 'rows' => '20']); ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 ">
                    <!-- Textarea -->
                    <label for="about_text">About Tekst</label>
                    <div class="form-group">
                        <div class="col-md-12">
                            <?php echo $this->Form->input('about_text', ['type' => 'textarea', 'id' => 'about_text', 'class' => 'form-control ', 'div' => false, 'label' => false, 'rows' => '20']); ?>
                        </div>
                    </div>
                </div>

            </div>

            <hr>
            <!-- Button -->
            <div class="form-group">
                <div class="col-lg-6">
                    <?= $this->Form->button('Opslaan', ['class' => 'btn btn-primary']); ?>
                </div>
            </div>

        </fieldset>
        <?php echo $this->Form->end(); ?>
    </div>

</div>
</div>
