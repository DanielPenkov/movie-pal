<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Actors Movie'), ['action' => 'edit', $actorsMovie->movie_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Actors Movie'), ['action' => 'delete', $actorsMovie->movie_id], ['confirm' => __('Are you sure you want to delete # {0}?', $actorsMovie->movie_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Actors Movies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Actors Movie'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Actors'), ['controller' => 'Actors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Actor'), ['controller' => 'Actors', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="actorsMovies view large-10 medium-9 columns">
    <h2><?= h($actorsMovie->movie_id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Movie') ?></h6>
            <p><?= $actorsMovie->has('movie') ? $this->Html->link($actorsMovie->movie->title, ['controller' => 'Movies', 'action' => 'view', $actorsMovie->movie->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Actor') ?></h6>
            <p><?= $actorsMovie->has('actor') ? $this->Html->link($actorsMovie->actor->name, ['controller' => 'Actors', 'action' => 'view', $actorsMovie->actor->id]) : '' ?></p>
        </div>
    </div>
</div>
