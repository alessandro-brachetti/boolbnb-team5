
<?php $__env->startSection('content'); ?>



<div class="container">
    <div class="row">
        <h2>Appartamenti in evidenza:</h2>
    </div>
    <div class="row">
        <div class="apartments d-flex flex-wrap">
            <?php $__currentLoopData = $apartments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apartment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm">
                    <form id='<?php echo e($apartment->id); ?>' action="<?php echo e(route('views.store', ['apartment'=>$apartment->id])); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('POST'); ?>
                        
                        <div class="form-group">
                            <input type="hidden" name="apartment_id" value="<?php echo e($apartment->id); ?>">       
                        </div>
                        <div class="card" style="width: 18rem;" onclick="event.preventDefault(); document.getElementById('<?php echo e($apartment->id); ?>').submit()">
                            <div class="card-img-top" style="background: url(<?php echo e(asset($apartment->img)); ?>); height: 14rem; background-size: cover;"></div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo e($apartment->title); ?></h5>
                                <p class="card-text">Indirizzo: <?php echo e($apartment->address); ?></p>
                            </div>                       
                        </div>
                    </form>                  
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Alessandro\Desktop\Esercizi\boolbnb-team5\resources\views/welcome.blade.php ENDPATH**/ ?>