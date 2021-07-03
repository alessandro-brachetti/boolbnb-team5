
<?php $__env->startSection('content'); ?>
    <div class="container">
      <div class="row">

            <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3">
                  <div>
                      <p>Nome: <?php echo e($message->name); ?></p>
                      <p>Cognome: <?php echo e($message->lastname); ?></p>
                      <p>Indirizzo e-mail: <?php echo e($message->email); ?></p>
                      <p>Messaggio: <?php echo e($message->message); ?></p>
                  </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Alessandro\Desktop\Esercizi\boolbnb-team5\resources\views/admin/messages/index.blade.php ENDPATH**/ ?>