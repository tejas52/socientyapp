<h1>Maintenance Charge</h1>
<p>Society: <?= h($charge->society->name) ?></p>
<p>Wing: <?= h($charge->wing->name) ?></p>
<p>Flat: <?= h($charge->flat->flat_no) ?></p>
<p>Month-Year: <?= h($charge->month_number . '-' . $charge->year) ?></p>
<p>Amount: <?= h($charge->amount) ?></p>
<p>Penalty: <?= h($charge->penalty) ?></p>
<p>Status: <?= h($charge->status) ?></p>

<h2>Payments</h2>
<?= $this->Html->link('Add Payment', ['controller' => 'MaintenancePayments', 'action' => 'add', $charge->id]) ?>
<table border="1">
    <tr>
        <th>Amount Paid</th>
        <th>Penalty Paid</th>
        <th>Date</th>
        <th>Mode</th>
        <th>Reference</th>
        <th>Remarks</th>
    </tr>
    <?php foreach ($charge->maintenance_payments as $payment): ?>
    <tr>
        <td><?= h($payment->paid_amount) ?></td>
        <td><?= h($payment->penalty_paid) ?></td>
        <td><?= h($payment->payment_date) ?></td>
        <td><?= h($payment->payment_mode) ?></td>
        <td><?= h($payment->reference_no) ?></td>
        <td><?= h($payment->remarks) ?></td>
    </tr>
    <?php endforeach; ?>
</table>
