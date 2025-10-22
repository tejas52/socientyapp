<h1>Edit Society</h1>

<?= $this->Form->create($society) ?>
<?= $this->Form->control('name') ?>
<?= $this->Form->control('address') ?>
<?= $this->Form->button('Save') ?>
<?= $this->Form->end() ?>
