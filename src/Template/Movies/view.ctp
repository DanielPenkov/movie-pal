<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Movie'), ['action' => 'edit', $movie->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Movie'), ['action' => 'delete', $movie->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movie->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Movies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Recommendations'), ['controller' => 'Recommendations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recommendation'), ['controller' => 'Recommendations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Actors'), ['controller' => 'Actors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Actor'), ['controller' => 'Actors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Countries'), ['controller' => 'Countries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Country'), ['controller' => 'Countries', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Directors'), ['controller' => 'Directors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Director'), ['controller' => 'Directors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Genres'), ['controller' => 'Genres', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Genre'), ['controller' => 'Genres', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Writers'), ['controller' => 'Writers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Writer'), ['controller' => 'Writers', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="movies view large-10 medium-9 columns">
    <h2><?= h($movie->title) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Title') ?></h6>
            <p><?= h($movie->title) ?></p>
            <h6 class="subheader"><?= __('Year') ?></h6>
            <p><?= h($movie->year) ?></p>
            <h6 class="subheader"><?= __('Poster') ?></h6>
            <p><?= h($movie->poster) ?></p>
            <h6 class="subheader"><?= __('Type') ?></h6>
            <p><?= h($movie->type) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($movie->id) ?></p>
            <h6 class="subheader"><?= __('Rating') ?></h6>
            <p><?= $this->Number->format($movie->rating) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Description') ?></h6>
            <?= $this->Text->autoParagraph(h($movie->description)); ?>

        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Recommendations') ?></h4>
    <?php if (!empty($movie->recommendations)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Sender Id') ?></th>
            <th><?= __('Reciever Id') ?></th>
            <th><?= __('Movie Id') ?></th>
            <th><?= __('Notification Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($movie->recommendations as $recommendations): ?>
        <tr>
            <td><?= h($recommendations->id) ?></td>
            <td><?= h($recommendations->sender_id) ?></td>
            <td><?= h($recommendations->reciever_id) ?></td>
            <td><?= h($recommendations->movie_id) ?></td>
            <td><?= h($recommendations->notification_id) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Recommendations', 'action' => 'view', $recommendations->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Recommendations', 'action' => 'edit', $recommendations->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Recommendations', 'action' => 'delete', $recommendations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recommendations->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Actors') ?></h4>
    <?php if (!empty($movie->actors)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Name') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($movie->actors as $actors): ?>
        <tr>
            <td><?= h($actors->id) ?></td>
            <td><?= h($actors->name) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Actors', 'action' => 'view', $actors->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Actors', 'action' => 'edit', $actors->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Actors', 'action' => 'delete', $actors->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actors->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Countries') ?></h4>
    <?php if (!empty($movie->countries)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Country') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($movie->countries as $countries): ?>
        <tr>
            <td><?= h($countries->id) ?></td>
            <td><?= h($countries->country) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Countries', 'action' => 'view', $countries->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Countries', 'action' => 'edit', $countries->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Countries', 'action' => 'delete', $countries->id], ['confirm' => __('Are you sure you want to delete # {0}?', $countries->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Directors') ?></h4>
    <?php if (!empty($movie->directors)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Name') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($movie->directors as $directors): ?>
        <tr>
            <td><?= h($directors->id) ?></td>
            <td><?= h($directors->name) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Directors', 'action' => 'view', $directors->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Directors', 'action' => 'edit', $directors->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Directors', 'action' => 'delete', $directors->id], ['confirm' => __('Are you sure you want to delete # {0}?', $directors->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Genres') ?></h4>
    <?php if (!empty($movie->genres)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Genre') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($movie->genres as $genres): ?>
        <tr>
            <td><?= h($genres->id) ?></td>
            <td><?= h($genres->genre) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Genres', 'action' => 'view', $genres->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Genres', 'action' => 'edit', $genres->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Genres', 'action' => 'delete', $genres->id], ['confirm' => __('Are you sure you want to delete # {0}?', $genres->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Users') ?></h4>
    <?php if (!empty($movie->users)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Username') ?></th>
            <th><?= __('Email') ?></th>
            <th><?= __('Password') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($movie->users as $users): ?>
        <tr>
            <td><?= h($users->id) ?></td>
            <td><?= h($users->username) ?></td>
            <td><?= h($users->email) ?></td>
            <td><?= h($users->password) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Writers') ?></h4>
    <?php if (!empty($movie->writers)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Name') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($movie->writers as $writers): ?>
        <tr>
            <td><?= h($writers->id) ?></td>
            <td><?= h($writers->name) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Writers', 'action' => 'view', $writers->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Writers', 'action' => 'edit', $writers->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Writers', 'action' => 'delete', $writers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $writers->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
