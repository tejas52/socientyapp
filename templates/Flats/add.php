<h1>Add Flat</h1>
<?= $this->Form->create($flat) ?>

<?= $this->Form->control('wing_id', ['options' => $wings, 'empty' => 'Select Wing']) ?>
<?= $this->Form->control('flat_no', ['label' => 'Flat Number']) ?>
<?= $this->Form->control('owner_name', ['label' => 'Owner Name']) ?>
<?= $this->Form->control('member_id', ['options' => $members, 'empty' => 'Assign Member']) ?>

<?= $this->Form->button(__('Save Flat')) ?>
<?= $this->Form->end() ?>

<p><?= $this->Html->link('⬅ Back', ['action' => 'index']) ?></p>
