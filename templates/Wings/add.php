<h1>Add Wing</h1>
<?= $this->Form->create($wing) ?>
<fieldset>
    <legend><?= __('Add Wing') ?></legend>
    <?= $this->Form->control('society_id', ['options' => $societies, 'empty' => '-- Select Society --']) ?>
    <?= $this->Form->control('name') ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
