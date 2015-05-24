<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $writer->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $writer->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Writers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="writers form large-10 medium-9 columns">
    <?= $this->Form->create($writer); ?>
    <fieldset>
        <legend><?= __('Edit Writer') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('movies._ids', ['options' => $movies]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
