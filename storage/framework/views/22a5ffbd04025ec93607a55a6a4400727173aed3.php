<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-xs-12">
                <form method="POST" action="/tables/<?php echo e($table->id); ?>/orders" id="add-order">
                    <?php echo e(csrf_field()); ?>



                    <div class="form-group  <?php echo e($errors->has('product') ? ' has-error' : ''); ?> col-xs-6">
                        <label for="products">Product:</label>

                        <select class="form-control input-box select-product" name="product" id="product" required>
                            <option selected value="null">Select Product</option>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <?php if($errors->has('product')): ?>
                            <span class="error help-block"><?php echo e($errors->first('product')); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group  <?php echo e($errors->has('count') ? ' has-error' : ''); ?> col-xs-6">
                        <label for="count">Count:</label>
                        <input type="text" class="form-control" id="count" placeholder="Enter count" name="count"
                               value="" required>
                        <?php if($errors->has('name')): ?>
                            <span class="error help-block"><?php echo e($errors->first('count')); ?></span>
                        <?php endif; ?>
                    </div>


                    <div class="col-xs-12 text-right">
                        <button type="reset" class="btn btn-md btn-default" id="cancel">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-md btn-primary" id="submit">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>