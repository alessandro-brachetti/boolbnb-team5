
<?php $__env->startSection('content'); ?>


<div class="container-fluid my-container-fluid">
  <div id="my-carousel" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner my-carousel-inner">
        <div class="carousel-item my-carousel-item active">
          <img class="d-block w-100" src="/images/panorama-1.jpg" alt="First slide">
        </div>
        <div class="carousel-item my-carousel-item">
          <img class="d-block w-100" src="/images/panorama-2.jpg" alt="Second slide">
        </div>
        <div class="carousel-item my-carousel-item">
          <img class="d-block w-100" src="/images/panorama-3.jpg" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#my-carousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#my-carousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    <div class="p-absolute">
      <div class="input-group">
        <div class="form-inline my-2 my-lg-0" id="welcome">
            <input class="form-control mr-sm-2" id="searchInput" type="search" placeholder="Es. Via roma 12, Palermo" aria-label="Search" v-model="search" @input="responseApi">
            <div class="">
              <ul>
                <a :href="(search != '' ? `/search/${search}` : '#')"><li v-for="result in results" @click="search=result.address.freeformAddress, results=[]">{{result.address.freeformAddress}}</li></a>
              </ul>
            </div>
        </div>
      </div>
    </div>
  </div>

</div>
<div class="container">
    <div class="row">
      <div class="col-md-12 d-flex">
        <h2>Appartamenti in evidenza</h2>
      </div>
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
                        <div class="card my-card mmb-30" style="width: 18rem;" title="Vedi i dettagli dell'appartamento">
                          <div class="card-img-top my-card-img-top">
                            <img src="<?php echo e(asset($apartment->img)); ?>" alt="">
                          </div>
                          <div class="card-body my-card-body">
                            <h5 class="card-title my-card-title"><?php echo e($apartment->title); ?></h5>
                            <div class="card-text my-card-text">
                              <p class="address">Indirizzo: <?php echo e($apartment->address); ?></p>
                              <p class="beds-rooms mpt-10"><span class="rooms">Stanze: <?php echo e($apartment->n_rooms); ?></span> <span class="circle">&#183;</span> <span class="beds">Letti: <?php echo e($apartment->n_beds); ?></span></p>
                            </div>
                          </div>
                        </div>
                    </form>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lollo\Desktop\Esercizi_Boolean\boolbnb-team5\resources\views/welcome.blade.php ENDPATH**/ ?>