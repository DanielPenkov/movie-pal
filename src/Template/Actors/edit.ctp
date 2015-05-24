<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $actor->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $actor->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Actors'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="actors form large-10 medium-9 columns">
    <?= $this->Form->create($actor); ?>
    <fieldset>
        <legend><?= __('Edit Actor') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('movies._ids', ['options' => $movies]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
