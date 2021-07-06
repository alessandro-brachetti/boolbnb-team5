
<?php $__env->startSection('content'); ?>
<main id="index-admin">

  <div class="container mpt-50 mpb-20">
    <div class="info row mpb-20 text-center">
      <div class="col-12">
        <h1 class="title-admin">I tuoi annunci</h1>
        <p>Tutti gli alloggi che hai inserito a portata di click</p>
      </div>
    </div>
  </div>
  <div class="container-fluid grey-container">
    <div class="container">
      <div class="apartments row mpt-30">
        <?php $__currentLoopData = Auth::user()->apartments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apartment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="d-flex flex-wrap justify-content-center">
            <a href="<?php echo e(route('admin.apartments.show', ['apartment'=> $apartment->id])); ?>">
              <div class="card my-card mmb-30" title="Vedi i dettagli dell'appartamento">
                <div class="card-img-top my-card-img-top">
                  <div class="cover" style="background-image: url('<?php echo e(asset($apartment->img)); ?>')">
                  </div>
                </div>
                <div class="card-body my-card-body">
                  <h5 class="card-title my-card-title"><?php echo e($apartment->title); ?></h5>
                  <div class="card-text my-card-text">
                    <p class="address">Indirizzo: <span class="via"><?php echo e($apartment->address); ?></span> </p>
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
  </div>
</main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lollo\Desktop\Esercizi_Boolean\boolbnb-team5\resources\views/admin/apartments/index.blade.php ENDPATH**/ ?>