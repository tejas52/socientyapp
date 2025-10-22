<h1>Wing: <?= h($wing->name) ?></h1>
<p><strong>ID:</strong> <?= h($wing->id) ?></p>
<p><strong>Society:</strong> <?= h($wing->society->name) ?></p>

<?= $this->Html->link('Edit', ['action' => 'edit', $wing->id]) ?>
<?= $this->Html->link('Back to List', ['action' => 'index']) ?>
