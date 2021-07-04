
<?php $__env->startSection('content'); ?>
  <main id="index-messages">
    <div class="container">
      <div class="row">
        <div class="form-inline my-2 my-lg-0" id="welcome">
            <input class="form-control mr-sm-2" id="searchInput" type="search" placeholder="Es. Via roma 12, Palermo" aria-label="Search" v-model="search" @input="responseApi">
            
            <div class="">
              <ul>
                <a :href="(search != '' ? `/search/${search}` : '#')"><li v-for="result in results" @click="search=result.address.freeformAddress, results=[]">{{result.address.freeformAddress}}</li></a>
              </ul>
            </div>
        </div>
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
  </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lollo\Desktop\Esercizi_Boolean\boolbnb-team5\resources\views/admin/messages/index.blade.php ENDPATH**/ ?>