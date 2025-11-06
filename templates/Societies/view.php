<h1>Society Details</h1>

<p><strong>ID:</strong> <?= h($society->id) ?></p>
<p><strong>Society:</strong> <?= h($society->name) ?></p>


<p>
    <?= $this->Html->link('✏ Edit', ['action' => 'edit', $society->id], ['class' => 'button']) ?>
    <?= $this->Form->postLink('🗑 Delete', 
        ['action' => 'delete', $society->id], 
        ['confirm' => 'Are you sure?', 'class' => 'button']) ?>
    <?= $this->Html->link('⬅ Back', ['action' => 'index'], ['class' => 'button']) ?>
</p>
