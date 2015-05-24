<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Countries Movie'), ['action' => 'edit', $countriesMovie->movie_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Countries Movie'), ['action' => 'delete', $countriesMovie->movie_id], ['confirm' => __('Are you sure you want to delete # {0}?', $countriesMovie->movie_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Countries Movies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Countries Movie'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Countries'), ['controller' => 'Countries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Country'), ['controller' => 'Countries', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="countriesMovies view large-10 medium-9 columns">
    <h2><?= h($countriesMovie->movie_id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Movie') ?></h6>
            <p><?= $countriesMovie->has('movie') ? $this->Html->link($countriesMovie->movie->title, ['controller' => 'Movies', 'action' => 'view', $countriesMovie->movie->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Country') ?></h6>
            <p><?= $countriesMovie->has('country') ? $this->Html->link($countriesMovie->country->id, ['controller' => 'Countries', 'action' => 'view', $countriesMovie->country->id]) : '' ?></p>
        </div>
    </div>
</div>
