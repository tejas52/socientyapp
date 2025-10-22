<?php if ($charge): ?>
    <h3>Add Payment for <?= h($charge->flat->flat_no) ?> (<?= h($charge->month_number) ?>/<?= h($charge->year) ?>)</h3>
    <p>Total Due: <?= h($charge->amount) ?> | Penalty: <?= h($charge->penalty) ?> | Status: <?= h($charge->status) ?></p>
<?php endif; ?>

<?= $this->Form->create($payment) ?>
    <?= $this->Form->control('maintenance_charge_id', ['options'=>$charges, 'empty'=>'-- Select Charge --']) ?>
    <?= $this->Form->control('paid_amount') ?>
    <?= $this->Form->control('penalty_paid') ?>
    <?= $this->Form->control('payment_date') ?>
    <?= $this->Form->control('payment_mode') ?>
    <?= $this->Form->control('reference_no') ?>
    <?= $this->Form->control('remarks') ?>
<?= $this->Form->button(__('Save')) ?>
<?= $this->Form->end() ?>
