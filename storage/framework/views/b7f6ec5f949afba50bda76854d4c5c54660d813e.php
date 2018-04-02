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

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e($user->role); ?></td>
                    <td>
                        <a href="/users/<?php echo e($user->id); ?>/edit" class="btn btn-sm btn-success">
                            Edit
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <form action="" method="post" id="waiter_delete_form">
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('DELETE')); ?>

    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>