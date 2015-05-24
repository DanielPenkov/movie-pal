<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $directorsMovie->movie_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $directorsMovie->movie_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Directors Movies'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Directors'), ['controller' => 'Directors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Director'), ['controller' => 'Directors', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="directorsMovies form large-10 medium-9 columns">
    <?= $this->Form->create($directorsMovie); ?>
    <fieldset>
        <legend><?= __('Edit Directors Movie') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
