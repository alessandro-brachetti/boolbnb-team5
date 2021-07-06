
<?php $__env->startSection('content'); ?>


<div id="my-carousel" class="carousel slide carousel-fade col-md-12 col-sm-12 col-xs-12" data-ride="carousel" style="padding-left:0; padding-right: 0;">
  <div class="container-fluid my-container-fluid">
    <div class="carousel-inner my-carousel-inner">
        <div class="carousel-item my-carousel-item active">
          <div class="bg-slider" style="background-image: url('/images/sfondo-4.jpg')">

          </div>
        </div>
        <div class="carousel-item my-carousel-item">
          <div class="bg-slider" style="background-image: url('/images/sfondo-3.jpg')">

          </div>
        </div>
        <div class="carousel-item my-carousel-item">
          <div class="bg-slider" style="background-image: url('/images/sfondo-2.jpg')">

          </div>
        </div>
        <div class="carousel-item my-carousel-item">
          <div class="bg-slider" style="background-image: url('/images/sfondo-1.jpg')">

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
        <div class="slogan">
          <p style="color: white; font-size: 30px; font-weight: 800;">La tua vacanza ideale, dove e quando vuoi.</p>

        </div>
        <div class="form-inline my-2 my-lg-0 my-welcome my-dropdown" id="welcome" v-cloak>
          <div class="d-flex flex-column my-search">
            <input class="text-center" autocomplete="off" class="form-control my-form control mr-sm-2" id="searchInput" type="search" placeholder="Dove vuoi andare?" v-model="search" @input="responseApi">
        <div class="my-dropdown-menu my-results" autocomplete="off">
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
  <div class="container-fluid my-container-fluid bg-white">
    <div class="container">
      <div class="row mpt-25">
        <div class="col-md-12 d-flex justify-content-center flex-column">
          <h2 class="title-admin">Appartamenti in evidenza</h2>
          <p>Scopri i migliori appartamenti in circolazione dove trascorrere la tua vacanza da sogno.</p>
        </div>
      </div>
    </div>
  </div>
    <div class="container">
    <div class="row sponsorized d-flex">
      <div class="apartments mmt-50 mmb-50 d-flex flex-wrap">
        <?php $__currentLoopData = $apartments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apartment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <form class="mpt-20 mpb-20" id='<?php echo e($apartment->id); ?>' action="<?php echo e(route('views.store', ['apartment'=>$apartment->id])); ?>" method="post" style="display: flex; justify-content: center;">
            <?php echo csrf_field(); ?>
            <?php echo method_field('POST'); ?>

            <div class="form-group">
              <input type="hidden" name="apartment_id" value="<?php echo e($apartment->id); ?>">
            </div>
            <div onclick="event.preventDefault(); document.getElementById('<?php echo e($apartment->id); ?>').submit()" class="card my-card" style="width: 18rem;" title="Vedi i dettagli dell'appartamento">
              <div class="card-img-top my-card-img-top">
                <div class="cover" style="background-image: url('<?php echo e(asset($apartment->img)); ?>')">
                </div>
                <div class="partnership d-flex justify-content-center align-items-center">
                  <span class="">In Evidenza</span>
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
  </div>
  <div class="container-fluid my-container-fluid bg-white">
    <div class="container">
    <div class="row mpt-55">
      <div class="col-md-12 d-flex justify-content-center flex-column">
        <h2 class="title-admin">Aggiunti di recente</h2>
          <p>Esplora migliaia di appartamenti, tutti a tua disposizione.</p>
      </div>
    </div>
  </div>
  </div>
  <div class="container mpb-150">
    <div class="row apartments mmt-50" id="scroll">
      <div class="scroll col-md-12">
      <?php $__currentLoopData = $apartmentsNewest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apartmentNewest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <form id='<?php echo e($apartmentNewest->id); ?>' action="<?php echo e(route('views.store', ['apartment'=>$apartmentNewest->id])); ?>" method="post" style="display: flex; justify-content: center;">
          <?php echo csrf_field(); ?>
          <?php echo method_field('POST'); ?>

          <div class="form-group">
            <input type="hidden" name="apartment_id" value="<?php echo e($apartmentNewest->id); ?>">
          </div>
          <div onclick="event.preventDefault(); document.getElementById('<?php echo e($apartmentNewest->id); ?>').submit()" class="card my-card" style="width: 18rem;" title="Vedi i dettagli dell'appartamento">
            <div class="card-img-top my-card-img-top">
              <div class="cover" style="background-image: url('<?php echo e(asset($apartmentNewest->img)); ?>')">
              </div>
            </div>
            <div class="card-body my-card-body">
              <h5 class="card-title my-card-title"><?php echo e($apartmentNewest->title); ?></h5>
              <div class="card-text my-card-text">
                <p class="address">Indirizzo: <?php echo e($apartmentNewest->address); ?></p>
                <p class="beds-rooms mpt-10"><span class="rooms">Stanze: <?php echo e($apartmentNewest->n_rooms); ?></span> <span class="circle">&#183;</span> <span class="beds">Letti: <?php echo e($apartmentNewest->n_beds); ?></span></p>
              </div>
            </div>
          </div>
        </form>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    </div>
  </div>
</main>
    <script type="text/javascript">
        $('.typeahead').removeClass('dropdown-menu');
    </script>
<style media="screen">

/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #888;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555;
}
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\giudi\Desktop\BOOLEAN\ESERCIZI\ESERCIZI-SVOLGIMENTO\boolbnb-team5\resources\views/welcome.blade.php ENDPATH**/ ?>