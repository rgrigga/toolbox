<div class="envbadges">

    <div class="badgerow">
        <h4>Coming Soon</h4>
        <?php $msg="Coming Soon!" ?>
        <button id="deployBtn" onclick="alert('<?= $msg ?: 'Could not deploy. \n inline )' ?>');" class="btn btn-danger btn-mini">Click to deploy</button>
    </div>
    <?php
    if(Auth::check()){
        $currentrole=(Auth::user()->role)?:'guest';
    }else{
        $currentrole='guest';
    }
    //        if($app->currentUser->hasRole('admin')){
    //            $currentrole=$app->currentUser->userRole;
    ?>
    <div class="badgerow">
        <h4>role</h4>

        <?php badge($currentrole,'warning'); ?>
    </div>
    <?php
    //        }
    ?>
    <div class="badgerow">
        <h4>environment</h4>
        <?php badge(ENVIRONMENT,'warning'); ?>
    </div>
    <div class="badgerow">
        <?php
        h4("database");
        $db=Config::get('database');
        badge($db['default'],'warning');
        ?>
    </div>

    <div class="badgerow">
        <?php
        h4("branch:commit");
        badge(BRANCH.":".COMMIT,'warning');
        ?>
    </div>
    <div class="badgerow">
        <?php
        h4("tag");
        $tag=TAG;
        badge(!empty($tag)?$tag:"none",'warning');
        ?>
    </div>
</div>