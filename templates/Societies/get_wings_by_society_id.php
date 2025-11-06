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
