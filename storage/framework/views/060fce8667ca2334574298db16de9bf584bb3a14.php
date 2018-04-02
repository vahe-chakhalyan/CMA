<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-6 ">
                <form method="POST" action="/products" id="add-product">
                    <?php echo e(csrf_field()); ?>


                    <div class="form-group  <?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name"
                               value="<?php echo e(old('name') ? old('name') : ''); ?>" required>
                        <?php if($errors->has('name')): ?>
                            <span class="error help-block"><?php echo e($errors->first('name')); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group  <?php echo e($errors->has('price') ? ' has-error' : ''); ?>">
                        <label for="price">Price:</label>
                        <input type="text" class="form-control" id="price" placeholder="Enter price" name="price"
                               value="<?php echo e(old('price') ? old('price') : ''); ?>" required>
                        <?php if($errors->has('price')): ?>
                            <span class="error help-block"><?php echo e($errors->first('price')); ?></span>
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