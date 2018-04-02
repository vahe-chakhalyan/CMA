<?php $__env->startSection('content'); ?>
    <div class="error-page text-center">
        <h2 class="headline text-info"> 404</h2>
        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>
            <p>
                We could not find the page you were looking for.
                Meanwhile, you may <a href="/">return to dashboard</a> or try using the search form.
            </p>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>