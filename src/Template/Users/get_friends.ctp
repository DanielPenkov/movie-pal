


<div class="col-md-8">
  <h1>Friends</h1>
    <?php foreach ($users as $user): ?>
 
      <div class="col-md-6 col-sm-6 col-xs-12">
        
        <div class="friend-container">

          <div class="friend-image">
            <?php echo $this->Html->image('/webroot/img/user-alt-128.png', array( "alt" => "user-img",'height'=>80, 
                    'width'=>80, 'url' => array('controller' => 'users',
                     'action' => 'publicProfile',$user->id)));?>
          </div>

          <div class="friend-info">
            <div class="friend-name">
              <span class="title"><?php echo $user->username; ?></span>
            </div>
            
          </div>

        </div>
      </div>

    <?php endforeach; ?>

    </div>

    <div class="col-md-4">

    <h1>Find Friends</h1>
      <?php foreach ($peopleMayKnow as $user): ?>
 
      <div>
        
        <div class="friend-container">

          <div class="friend-image">
            <?php echo $this->Html->image('/webroot/img/user-alt-128.png', array( "alt" => "user-img",'height'=>80, 
                    'width'=>80, 'url' => array('controller' => 'users',
                     'action' => 'publicProfile',$user->id)));?>
          </div>

          <div class="friend-info">
            <div class="friend-name">
              <span class="title"><?php echo $user->username; ?></span>
            </div>
            
          </div>

        </div>
      </div>

    <?php endforeach; ?>
    </div>