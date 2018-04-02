<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="col-xs-9">
                <h1>Products</h1>
            </div>
            <div class="col-xs-3 pull-right">
                <a href="<?php echo e(route('products.create')); ?>" class="btn btn-success">
                    Create New Product
                </a>
            </div>
        </div>

        <?php if(!count($products)): ?>
            <h1 class="text-center">No Products show</h1>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($product->name); ?></td>
                            <td><?php echo e($product->price); ?></td>
                            <td>
                                <a href="/products/<?php echo e($product->id); ?>">
                                    Show
                                </a>
                                <a href="/products/<?php echo e($product->id); ?>/edit" class="btn btn-sm btn-success">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
    </div>
    <form action="" method="post" id="product_delete_form">
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('DELETE')); ?>

    </form>
    <div class="col-xs-12 text-center">
        <?php echo e($products->links()); ?>

    </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>