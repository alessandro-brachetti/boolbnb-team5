
<?php $__env->startSection('content'); ?>


<div class="container-fluid my-container-fluid">
  <div id="my-carousel" class="carousel slide carousel-fade col-md-12 col-sm-12 col-xs-12" data-ride="carousel" style="padding-left:0; padding-right: 0;">
    <div class="carousel-inner my-carousel-inner">
        <div class="carousel-item my-carousel-item active">
          <div class="bg-slider" style="background-image: url('/images/01.jpg')">

          </div>
        </div>
        <div class="carousel-item my-carousel-item">
          <div class="bg-slider" style="background-image: url('/images/02.jpg')">

          </div>
        </div>
        <div class="carousel-item my-carousel-item">
          <div class="bg-slider" style="background-image: url('/images/03.jpg')">

          </div>
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
      <div class="my-input-group">
        <div class="form-inline my-2 my-lg-0 my-welcome" id="welcome">
        <div class="d-flex flex-column my-search">
            <input class="form-control my-form control mr-sm-2" id="searchInput" type="search" placeholder="Es. Via roma 12, Palermo" aria-label="Search" v-model="search" @input="responseApi">
        <div class="my-results">
          <ul>
            <a :href="(search != '' ? `/search/${search}` : '#')"><li v-for="result in results" @click="search=result.address.freeformAddress, results=[]">{{result.address.freeformAddress}}</li></a>
          </ul>
        </div>
      </div>
      </div>
    </div>


  </div>

</div>
<main id="welcome">
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3 d-flex justify-content-center title text-center">
        <h2>Appartamenti in evidenza</h2>
      </div>
    </div>
    <div class="row sponsorized d-flex">
      <div class="apartments d-flex flex-wrap">
        <?php $__currentLoopData = $apartments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apartment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-sm">
          <form id='<?php echo e($apartment->id); ?>' action="<?php echo e(route('views.store', ['apartment'=>$apartment->id])); ?>" method="post" style="display: flex; justify-content: center;">
            <?php echo csrf_field(); ?>
            <?php echo method_field('POST'); ?>

            <div class="form-group">
              <input type="hidden" name="apartment_id" value="<?php echo e($apartment->id); ?>">
            </div>
            <div onclick="event.preventDefault(); document.getElementById('<?php echo e($apartment->id); ?>').submit()" class="card my-card mmb-30" style="width: 18rem;" title="Vedi i dettagli dell'appartamento">
              <div class="card-img-top my-card-img-top">
                <div class="cover" style="background-image: url('<?php echo e(asset($apartment->img)); ?>')">
                </div>
                <div class="partnership d-flex justify-content-center align-items-center">
                  <span class="">Consigliato</span>
                </div>
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
    <div class="row">
      <div class="col-md-12 d-flex justify-content-center title text-center">
        <h5>Appartamenti disponibili</h2>
      </div>
    </div>
    <div class="row apartments">

    </div>
  </div>

</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\misha\Desktop\Boolean\Final_project\boolbnb-team5\resources\views/welcome.blade.php ENDPATH**/ ?>