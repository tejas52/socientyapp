<h1>Edit Wing</h1>
<?= $this->Form->create($wing) ?>
<fieldset>
    <legend><?= __('Edit Wing') ?></legend>
    <?= $this->Form->control('society_id', ['options' => $societies, 'empty' => '-- Select Society --']) ?>
    <?= $this->Form->control('name') ?>
</fieldset>
<?= $this->Form->button(__('Update')) ?>
<?= $this->Form->end() ?>
