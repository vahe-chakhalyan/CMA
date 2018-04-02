<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="col-xs-9">
                <h1>Tables</h1>
            </div>
            <div class="col-xs-3 pull-right">
                <a href="<?php echo e(route('tables.create')); ?>" class="btn btn-success">
                    Create New Table
                </a>
            </div>
        </div>

        <?php if(!count($tables)): ?>
            <h1 class="text-center">No Tables show</h1>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Table Number</th>
                        <th scope="col">Name</th>
                        <th scope="col">status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $table): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($table->id); ?></td>
                            <td><?php echo e($table->name); ?></td>
                            <td><?php echo e(empty($table->waiter_id) ? 'free' : 'busy'); ?></td>
                            <td>
                                <a href="/tables/<?php echo e($table->id); ?>">
                                    Show
                                </a>
                                <a href="/tables/<?php echo e($table->id); ?>/edit" class="btn btn-sm btn-success">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
    </div>
    <form action="" method="post" id="table_delete_form">
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('DELETE')); ?>

    </form>
    <div class="col-xs-12 text-center">
        <?php echo e($tables->links()); ?>

    </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>