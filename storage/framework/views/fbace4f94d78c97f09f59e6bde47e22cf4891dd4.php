<?php $__env->startSection('content'); ?>
    <div class="error-page text-center">
        <h2 class="headline text-info"> 403</h2>
        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> Not Permitted.</h3>
            <p>
                You don't have permissions for this action.
            </p>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>