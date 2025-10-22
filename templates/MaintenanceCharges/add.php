<?= $this->Form->create($maintenanceCharge) ?>

<?= $this->Form->control('society_id', ['options' => $societies, 'empty'=>'-- Select Society --']) ?>
<?= $this->Form->control('wing_id', ['options' => $wings, 'empty'=>'-- Select Wing --']) ?>
<?= $this->Form->control('flat_id', ['options' => $flats, 'empty'=>'-- Select Flat --']) ?>

<?= $this->Form->control('month', ['type'=>'select', 'options'=>$months, 'empty'=>'-- Select Month --']) ?>
<?= $this->Form->control('year', ['type'=>'select', 'options'=>$yearOptions, 'empty'=>'-- Select Year --']) ?>

<?= $this->Form->control('amount') ?>
<?= $this->Form->control('penalty') ?>
<?= $this->Form->control('status', ['options' => ['Pending'=>'Pending','Paid'=>'Paid']]) ?>

<?= $this->Form->button(__('Save')) ?>
<?= $this->Form->end() ?>
