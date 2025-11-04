<h1>Wings : <?php echo $society->name; ?></h1>
<!-- <?= $this->Html->link('Add Wing', ['action' => 'add'], ['class' => 'button']) ?> -->

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        
        <?php
        foreach ($wings as $wing): ?>
        <tr>
            <td><?= h($wing->id) ?></td>
            <td>
                <?= $this->Html->link(
                    $wing->name,
                    [
                        'controller' => 'Wings',   // 👈 your target controller
                        'action' => 'getFlatsByWingId',
                        $wing->id
                    ]
                ) ?>
            </td>
            <td>
                <?= $this->Html->link('View', ['action' => 'view', $wing->id]) ?>
                <?= $this->Html->link('Edit', ['action' => 'edit', $wing->id]) ?>
                <?= $this->Form->postLink('Delete', ['action' => 'delete', $wing->id], ['confirm' => 'Are you sure?']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
