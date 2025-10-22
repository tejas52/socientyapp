<h1>Flat Details</h1>

<p><strong>ID:</strong> <?= h($flat->id) ?></p>
<p><strong>Society:</strong> <?= h($flat->wing->society->name) ?></p>
<p><strong>Wing:</strong> <?= h($flat->wing->name ?? '-') ?></p>
<p><strong>Flat Number:</strong> <?= h($flat->flat_no) ?></p>
<p><strong>Owner:</strong> <?= h($flat->owner_name) ?></p>
<p><strong>Member:</strong> <?= h($flat->member->name ?? '-') ?></p>

<p>
    <?= $this->Html->link('✏ Edit', ['action' => 'edit', $flat->id], ['class' => 'button']) ?>
    <?= $this->Form->postLink('🗑 Delete', 
        ['action' => 'delete', $flat->id], 
        ['confirm' => 'Are you sure?', 'class' => 'button']) ?>
    <?= $this->Html->link('⬅ Back', ['action' => 'index'], ['class' => 'button']) ?>
</p>
