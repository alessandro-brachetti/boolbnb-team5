
<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="card mb-3">
        <img class="card-img-top" src="<?php echo e(asset($apartment->img)); ?>" alt="<?php echo e($apartment->title); ?>">
        <div class="card-body">
            <h5 class="card-title"><?php echo e($apartment->title); ?></h5>
            <p class="card-text">Indirizzo: <?php echo e($apartment->address); ?></p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">N. Rooms: <?php echo e($apartment->n_rooms); ?></li>
            <li class="list-group-item">N. Beds: <?php echo e($apartment->n_beds); ?></li>
            <li class="list-group-item">N. Bathrooms: <?php echo e($apartment->n_bathrooms); ?></li>
            <li class="list-group-item">MQ: <?php echo e($apartment->mq); ?></li>
        </ul>
        <div class="card-body">
            Servizi:
            <?php $__currentLoopData = $apartment->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($loop->last): ?>
                    <span><?php echo e($service->service_name); ?></span>
                <?php else: ?> 
                    <span><?php echo e($service->service_name); ?>,</span>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="card-body">
            <a href="<?php echo e(route('admin.apartments.edit', ['apartment'=>$apartment->id])); ?>" class="card-link">Modifica</a>
            <a href="<?php echo e(route('admin.message.index', ['apartment'=>$apartment->id])); ?>" class="card-link">Messaggi</a>
            <a href="<?php echo e(route('admin.sponsor.index', ['apartment'=>$apartment->id])); ?>" class="card-link">Sponsor</a>
        </div>
      </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\misha\Desktop\Boolean\Final_project\boolbnb-team5\resources\views/admin/apartments/show.blade.php ENDPATH**/ ?>