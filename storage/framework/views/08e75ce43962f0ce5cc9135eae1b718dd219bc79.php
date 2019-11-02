<?php $__env->startSection('content'); ?>

    <div class="container-fluid app-body">
        <h3>Recent Posts Sent To Buffer </h3>
        <div class="row">
            <div class="col-md-8">

                <form method="get" action="<?php echo e(route('search')); ?>">
                    <div class="col-md-3">

                        <input type="text" class="form-control" name="query" value="<?php echo e(isset($query) ? $query : ''); ?>" placeholder="Search here ....">
                    </div>


                </form>


























            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover social-accounts">
                    <thead>
                    <tr>
                        <th>Group Name</th>
                        <th>Group Type</th>
                        <th>Account Name</th>
                        <th>Post Text</th>
                        <th>Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $buffer_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $buffer_post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($buffer_post->name); ?></td>
                            <td><?php echo e($buffer_post->type); ?></td>
                            <td><?php echo e($buffer_post->uname); ?></td>
                            <td><?php echo e($buffer_post->posttext); ?></td>
                            <td><?php echo e($buffer_post->time); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </tbody>


                </table>
            </div>

            <div>
                <div style="float: right;">
                    <?php echo e($buffer_posts->links()); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>