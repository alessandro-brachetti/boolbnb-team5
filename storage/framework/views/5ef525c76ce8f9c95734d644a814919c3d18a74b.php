
<?php $__env->startSection('content'); ?>
<main id="index-admin">
  <!-- searchbar -->
  <div class="search row justify-content-right">
    <div class="container">
      <div class="col-lg-4 offset-lg-8">
          <input type="text" name="" value="" placeholder="Cerca un appartamento">
      </div>
    </div>
  </div>

  <div class="container">
    <div class="info row mpt-30">
      <div class="col-lg-6">
        <h4 class="title-admin">I tuoi annunci:</h4>
      </div>
      <div class="dashboard col-lg-6 text-right">
        <!-- <a href="<?php echo e(route('dashboard')); ?>"><button type="button" name="button" class="white-btn">Torna alla dashboard</button></a> -->

      </div>
    </div>
    <div class="apartments row mpt-30">
      <?php $__currentLoopData = Auth::user()->apartments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apartment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="d-flex flex-wrap justify-content-center">
          <a href="<?php echo e(route('admin.apartments.show', ['apartment'=> $apartment->id])); ?>">
            <div class="card my-card mmb-30" style="width: 23rem;" title="Vedi i dettagli dell'appartamento">
              <div class="card-img-top my-card-img-top">
                <div class="cover" style="background-image: url('<?php echo e(asset($apartment->img)); ?>')">

                </div>
                <!-- <img class="card-img-top" src="<?php echo e(asset($apartment->img)); ?>" alt="Card image cap"> -->
              </div>
              <div class="card-body my-card-body">
                <h5 class="card-title my-card-title"><?php echo e($apartment->title); ?></h5>
                <div class="card-text my-card-text">
                  <p class="address">Indirizzo: <?php echo e($apartment->address); ?></p>
                  <p class="beds-rooms mpt-10"><span class="rooms">Stanze: <?php echo e($apartment->n_rooms); ?></span> <span class="circle">&#183;</span> <span class="beds">Letti: <?php echo e($apartment->n_beds); ?></span></p>

                  <!-- azioni admin -->
                  <div class="actions mpt-30">
                    <div class="links col-4 text-center">
                      <a href="<?php echo e(route('admin.apartments.edit', ['apartment'=>$apartment->id])); ?>" title="Modifica"><i class="fas fa-edit"></i></a>
                    </div>
                    <div class="links col-4 text-center">
                      <a href="<?php echo e(route('admin.message.index', ['apartment'=>$apartment->id])); ?>" title="Messaggi"><i class="fas fa-envelope-open-text"></i></a>
                    </div>
                    <div class="links col-4 text-center">
                      <a href="<?php echo e(route('admin.sponsor.index', ['apartment'=>$apartment->id])); ?>" title="Sponsorizza"><i class="fas fa-search-dollar"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
  </div>
</main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\misha\Desktop\Boolean\Final_project\boolbnb-team5\resources\views/admin/apartments/index.blade.php ENDPATH**/ ?>