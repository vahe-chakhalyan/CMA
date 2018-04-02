<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-6 ">
                <form method="POST" action="/users" id="add-user">
                    <?php echo e(csrf_field()); ?>



                    <div class="form-group  <?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name"
                               value="<?php echo e(old('name') ? old('name') : ''); ?>" required>
                        <?php if($errors->has('name')): ?>
                            <span class="error help-block"><?php echo e($errors->first('name')); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group  <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                        <label for="name">E-mail:</label>
                        <input type="text" class="form-control" id="email" placeholder="Enter email" name="email"
                               value="<?php echo e(old('email') ? old('email') : ''); ?>" required>
                        <?php if($errors->has('email')): ?>
                            <span class="error help-block"><?php echo e($errors->first('email')); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group  <?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                        <label for="name">Password:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter password" name="password"
                               value="<?php echo e(old('password') ? old('password') : ''); ?>" required>
                        <?php if($errors->has('password')): ?>
                            <span class="error help-block"><?php echo e($errors->first('password')); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group  <?php echo e($errors->has('role') ? ' has-error' : ''); ?> col-xs-12">
                        <label for="type">Role:</label>

                        <select class="form-control input-box select-role" name="role" id="role" required>
                            <option disabled selected value="null">Select role</option>
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <?php if($errors->has('role')): ?>
                            <span class="error help-block"><?php echo e($errors->first('role')); ?></span>
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