<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Friends'), ['controller' => 'Friends', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Friend'), ['controller' => 'Friends', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="users view large-10 medium-9 columns">
    <h2><?= h($user->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Username') ?></h6>
            <p><?= h($user->username) ?></p>
            <h6 class="subheader"><?= __('Email') ?></h6>
            <p><?= h($user->email) ?></p>
            <h6 class="subheader"><?= __('Password') ?></h6>
            <p><?= h($user->password) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($user->id) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Friends') ?></h4>
    <?php if (!empty($user->friends)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('User Id') ?></th>
            <th><?= __('Friend Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->friends as $friends): ?>
        <tr>
            <td><?= h($friends->user_id) ?></td>
            <td><?= h($friends->friend_id) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Friends', 'action' => 'view', $friends->user_id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Friends', 'action' => 'edit', $friends->user_id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Friends', 'action' => 'delete', $friends->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $friends->user_id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Movies') ?></h4>
    <?php if (!empty($user->movies)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Title') ?></th>
            <th><?= __('Year') ?></th>
            <th><?= __('Description') ?></th>
            <th><?= __('Rating') ?></th>
            <th><?= __('Poster') ?></th>
            <th><?= __('Type') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->movies as $movies): ?>
        <tr>
            <td><?= h($movies->id) ?></td>
            <td><?= h($movies->title) ?></td>
            <td><?= h($movies->year) ?></td>
            <td><?= h($movies->description) ?></td>
            <td><?= h($movies->rating) ?></td>
            <td><?= h($movies->poster) ?></td>
            <td><?= h($movies->type) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Movies', 'action' => 'view', $movies->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Movies', 'action' => 'edit', $movies->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Movies', 'action' => 'delete', $movies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movies->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
