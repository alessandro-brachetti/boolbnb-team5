
<?php $__env->startSection('content'); ?>
  <main id="index-messages">
    <!-- searchbar -->
    <div class="search">
      <div class="container">
        <div class="row justify-content-right">
          <div class="searchbar col-lg-3 offset-lg-9" id="welcome">
            <input id="searchInput" type="search" placeholder="Dove vuoi andare?" aria-label="Search" v-model="search" @input="responseApi">
            
            <div class="">
              <ul>
                <a v-cloak :href="(search != '' ? `/search/${search}` : '#')"><li v-for="result in results" @click="search=result.address.freeformAddress, results=[]">{{result.address.freeformAddress}}</li></a>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="info row mpt-30">
        <div class="col-12">
          <h4 class="title-admin">Messaggi ricevuti</h4>
        </div>
      </div>

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
    </div>
  </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Alessandro\Desktop\Esercizi\boolbnb-team5\resources\views/admin/messages/index.blade.php ENDPATH**/ ?>