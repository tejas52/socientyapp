<h1>Maintenance Charges</h1>
<?= $this->Html->link('Add Charge', ['action' => 'add']) ?>
<table border="1">
    <tr>
        <th>Society</th>
        <th>Wing</th>
        <th>Flat</th>
        <th>Month-Year</th>
        <th>Amount</th>
        <th>Penalty</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($charges as $charge): ?>
    <tr>
        <td><?= h($charge->society->name) ?></td>
        <td><?= h($charge->wing->name) ?></td>
        <td><?= h($charge->flat->flat_no) ?></td>
        <td><?= h($charge->month_number . '-' . $charge->year) ?></td>
        <td><?= h($charge->amount) ?></td>
        <td><?= h($charge->penalty) ?></td>
        <td><?= h($charge->status) ?></td>
        <td>
            <?= $this->Html->link('View', ['action' => 'view', $charge->id]) ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
