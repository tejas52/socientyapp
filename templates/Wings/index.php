<h1>Wings</h1>
<?= $this->Html->link('Add Wing', ['action' => 'add'], ['class' => 'button']) ?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Society</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($wings as $wing): ?>
        <tr>
            <td><?= h($wing->id) ?></td>
            <td><?= h($wing->society->name) ?></td>
            <td><?= h($wing->name) ?></td>
            <td>
                <?= $this->Html->link(' View ', '/wings/view/' . $wing->id) ?>
                <?= $this->Html->link(' Edit ', '/wings/edit/' . $wing->id) ?>
                <?= $this->Form->postLink(
                    'Delete',
                    ['controller' => 'Wings', 'action' => 'delete', $wing->id],
                    [
                        'confirm' => 'Are you sure you want to delete this Wing?',
                        'class' => 'btn btn-danger'
                    ]
                ) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
