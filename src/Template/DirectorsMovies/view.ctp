<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Directors Movie'), ['action' => 'edit', $directorsMovie->movie_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Directors Movie'), ['action' => 'delete', $directorsMovie->movie_id], ['confirm' => __('Are you sure you want to delete # {0}?', $directorsMovie->movie_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Directors Movies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Directors Movie'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Directors'), ['controller' => 'Directors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Director'), ['controller' => 'Directors', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="directorsMovies view large-10 medium-9 columns">
    <h2><?= h($directorsMovie->movie_id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Movie') ?></h6>
            <p><?= $directorsMovie->has('movie') ? $this->Html->link($directorsMovie->movie->title, ['controller' => 'Movies', 'action' => 'view', $directorsMovie->movie->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Director') ?></h6>
            <p><?= $directorsMovie->has('director') ? $this->Html->link($directorsMovie->director->name, ['controller' => 'Directors', 'action' => 'view', $directorsMovie->director->id]) : '' ?></p>
        </div>
    </div>
</div>
