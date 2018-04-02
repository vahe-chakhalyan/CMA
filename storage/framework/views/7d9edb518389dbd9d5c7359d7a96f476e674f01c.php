<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="col-xs-9">
                <h1>Waiters</h1>
            </div>
            <div class="col-xs-3 pull-right">
                <a href="<?php echo e(route('users.create')); ?>" class="btn btn-success">
                    Create New User
                </a>
            </div>
        </div>

        <?php if(!count($waiters)): ?>
            <h1 class="text-center">No waiters show</h1>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $waiters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $waiter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo e($k+1); ?></th>
                            <td><?php echo e($waiter->name); ?></td>
                            <td>
                                <a href="/users/<?php echo e($waiter->id); ?>">
                                    Show
                                </a>
                                <a href="/users/<?php echo e($waiter->id); ?>/edit" class="btn btn-sm btn-success">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
    </div>
    <form action="" method="post" id="waiter_delete_form">
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('DELETE')); ?>

    </form>
    <div class="col-xs-12 text-center">
        <?php echo e($waiters->links()); ?>

    </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>