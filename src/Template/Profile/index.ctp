<div class="col-md-2 col-sm-4 col-xs-6">

<div class="list-group">

  <a href="#" class="list-group-item">
  	 <?php echo $this->Html->image('/webroot/img/user-alt-128.png', array( "alt" => "user-img",
  	 	'class'=> 'list-group-item img-responsive img-circle'));?>
  </a>

  <?php echo $this->Html->link('Profile', array('controller' => 'profile','action' => 'index'),
  	 array('class'=> 'list-group-item' ));?>


  <?php echo $this->Html->link('Friends', 'javascript:void(0)',
     array('class'=> 'list-group-item', 'onclick' =>'get_friends('.$authUser['id'].')' ));?>


  <?php echo $this->Html->link('Watching List', 'javascript:void(0)',
     array('class'=> 'list-group-item', 'onclick' =>'get_watching('.$authUser['id'].')' ));?>

  <?php echo $this->Html->link('Watched', 'javascript:void(0)',
     array('class'=> 'list-group-item', 'onclick' =>'get_watched('.$authUser['id'].')' ));?>

  <?php echo $this->Html->link('Recommended', 'javascript:void(0)',
  	 array('class'=> 'list-group-item', 'onclick' =>'get_recommended('.$authUser['id'].')' ));?>

</div>

</div>

<div class="col-md-10 col-sm-8 col-xs-6" id='profile-content'>

</div>



    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    </div>
 
  </div>
</div>

<script>
  $(document).ready(function(){  
      get_watching(<?php echo $authUser['id'] ?>);
   
  });
</script>