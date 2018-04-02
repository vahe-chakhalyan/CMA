<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-6 ">
                <form method="POST" action="/tables/<?php echo e($table->id); ?>" id="edit-order">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('PUT')); ?>


                    <div class="text-center">
                        <h3>Sorry, no view.</h3>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>