<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-6 ">
                <form method="POST" action="/tables/<?php echo e($table->id); ?>" id="edit-table">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('PUT')); ?>


                    <input type="hidden" name="id" value="<?php echo e($table->id); ?>">
                    <div class="form-group  <?php echo e($errors->has('name') ? ' has-error' : ''); ?> col-xs-6">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name"
                               value="<?php echo e($table->name); ?>" required>
                        <?php if($errors->has('name')): ?>
                            <span class="error help-block"><?php echo e($errors->first('name')); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group  <?php echo e($errors->has('waiter') ? ' has-error' : ''); ?> col-xs-6">
                        <label for="waiter">Waiters:</label>

                        <select class="form-control input-box select-waiter" name="waiter" id="waiter" required>
                            <option selected value="null">Select Waiter</option>
                            <?php $__currentLoopData = $waiters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $waiter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($table->waiter_id == $waiter->id): ?>
                                    <option selected value="<?php echo e($waiter->id); ?>"><?php echo e($waiter->name); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($waiter->id); ?>"><?php echo e($waiter->name); ?></option>
                                <?php endif; ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <?php if($errors->has('waiter')): ?>
                            <span class="error help-block"><?php echo e($errors->first('waiter')); ?></span>
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