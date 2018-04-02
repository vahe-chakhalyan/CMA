<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="col-xs-9">
                <h1>Order Details</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-9">
                <h2>
                    <?php echo e($table->name); ?>

                </h2>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Count</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php if($order->productsInOrder->count()): ?>
                    <?php $__currentLoopData = $order->productsInOrder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($pio->product->name); ?></td>
                            <td><?php echo e($pio->count); ?></td>
                            <td>
                                <a href="/tables/<?php echo e($table->id); ?>/orders/<?php echo e($order->id); ?>/edit" class="btn btn-sm btn-success">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-xs-9">
                <h3>
                    Total Amount: <?php echo e($order->total_amount); ?>

                </h3>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>