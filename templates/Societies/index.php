<h1>Societies</h1>

<?= $this->Html->link('Add New Society', ['action' => 'add'], ['class' => 'button float-right']) ?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Created</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($societies as $society):
            ?>
<tr>
    <td><?= h($society->id) ?></td>
    <td><?= $this->Html->link($society->name, ['action' => 'getWingsBySocietyId', $society->id]) ?>
</td>
        <td><?= h($society->address) ?></td>
        <td><?= h($society->created) ?>
    </td>

    <td>
        <?= $this->Html->link('View', ['action' => 'view', $society->id]) ?>
    </td>
</tr>
<?php endforeach; ?>

    </tbody>
</table>
