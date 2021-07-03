

<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <a href="<?php echo e(route('admin.apartments.index')); ?>">I tuoi appartamenti</a>
            <a href="<?php echo e(route('admin.apartments.create')); ?>">Aggiungi appartamento</a>          
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ciao <?php echo e(Auth::user()->name); ?> </div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <?php echo e(__('You are logged in!')); ?>

                </div>
            </div>
        </div>
    </div> 
    <?php $__currentLoopData = $apartments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apartment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
    <div class="row justify-content-center">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title my-card-title"><?php echo e($apartment->title); ?></h5>
                    <img src="<?php echo e(asset($apartment->img)); ?>" alt="" class="rounded float-left" style="height:50px;">
                    <?php $__currentLoopData = $apartment->sponsors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sponsor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($loop->first): ?> Data scadenza sponsor:
                        <p> <?php echo date('d/m/Y h:m:s', strtotime($sponsor->pivot->expiration_date)); ?> </p>             
                    <?php endif; ?>               
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div> 
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lollo\Desktop\Esercizi_Boolean\boolbnb-team5\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>