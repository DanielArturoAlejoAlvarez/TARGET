<div class="row">
    <div class="col-md-7">
        <img class="img-fluid" src="<?php echo $user->USR_Avatar; ?>" alt="<?php echo $user->USR_Names; ?>">
    </div>
    <div class="col-md-5">
        <h2><?php echo $user->USR_Names; ?></h2>
        <h5><strong>EMAIL: </strong> <?php echo $user->USR_Email; ?></h5>
        <h5><strong>USER: </strong> <?php echo $user->USR_Username; ?></h5>
        <h6><strong>PHONE: </strong> <?php echo $user->USR_Phone; ?></h6>
        <h6><strong>ROLE: </strong> <?php echo $user->role; ?></h6>
    </div>    
</div>
