
<?php $__env->startSection('content'); ?>
  <main id="index-messages">

    <div class="container mpb-30">
      <div class="info row mpt-50 mpb-20 text-center">
        <div class="col-12">
          <h1 class="title-admin">I tuoi messaggi</h1>
          <p>Rimani costantemente in contatto con i tuoi futuri clienti</p>
        </div>
      </div>
    </div>
    <?php if(count($messages)>0): ?>
    <div class="container-fluid greycontainer">
      <div class="container">
        <div class="messages row mpt-30">
          <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="totals col-lg-6 col-md-12 d-flex flex-wrap">
            <div class="card my-card mmb-20">
              <div class="card-body my-card-body">
                <div class="info">
                  <div class="user">
                    <p class="name"><i class="far fa-user"></i>
                     <span class="title">Mittente: </span><span class="content"><?php echo e($message->name); ?> <?php echo e($message->lastname); ?></span></p>
                  </div>
                  <div class="email">
                    <p><i class="far fa-envelope"></i> <span class="title">E-mail: </span> <span class="content"><?php echo e($message->email); ?></span></p>
                  </div>
                  <div class="message">
                    <p><i class="fas fa-quote-left"></i> <span class="title">Messaggio: </span> <span class="content"><?php echo e($message->message); ?></span></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php else: ?>
        <h4 class="text-center mpt-30">Non hai ancora nessun messaggio</h4>
        <?php endif; ?>
      </div>
    </div>
  </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\giudi\Desktop\BOOLEAN\ESERCIZI\ESERCIZI-SVOLGIMENTO\boolbnb-team5\resources\views/admin/messages/index.blade.php ENDPATH**/ ?>