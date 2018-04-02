<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="col-xs-9">
                <h1>Waiters</h1>
            </div>
            <div class="col-xs-3 pull-right">
                <a href="<?php echo e(route('tables.create')); ?>" class="btn btn-success">
                    Create New Table
                </a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php echo e($table->name); ?></td>
                    <td><?php echo e(empty($table->waiter_id) ? 'free' : 'busy'); ?></td>
                    <td>
                        <a href="/tables/<?php echo e($table->id); ?>/edit" class="btn btn-sm btn-success">
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
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>