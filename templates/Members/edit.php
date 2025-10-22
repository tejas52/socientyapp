<h1><?= $this->fetch('title') ?: 'Add/Edit Member' ?></h1>
<?= $this->Form->create($member) ?>
    <?= $this->Form->control('name') ?>
    <?= $this->Form->control('email') ?>
    <?= $this->Form->control('phone') ?>
    <?= $this->Form->control('society_id', ['options' => $societies]) ?>
    <?= $this->Form->control('wing_id', ['options' => $wings]) ?>
    <?= $this->Form->control('flat_id', ['options' => $flats]) ?>
    <?= $this->Form->button(__('Save')) ?>
<?= $this->Form->end() ?>
