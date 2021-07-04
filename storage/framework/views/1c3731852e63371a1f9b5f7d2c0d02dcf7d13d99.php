

<?php $__env->startSection('content'); ?>
<main id="dashboard">

  <!-- searchbar -->
  <div class="search">
    <div class="container">
      <div class="row justify-content-right">
        <div id="welcome" class=" searchbar col-lg-4 offset-lg-4 col-md-6">
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
      <div class="col-lg-4 col-md-12 col-sm-12">
        <h5 class="title-admin user">
          Ciao, <?php echo e(Auth::user()->name); ?>

        </h5>
      </div>
        <!-- <div class="col-md-8">
            <div class="card"> -->
                <!-- <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <?php echo e(__('You are logged in!')); ?>

                </div> -->
            <!-- </div>
        </div> -->
    </div>
    <div class="content row mpt-30">
      <div class="tools col-lg-3 col-md-12 col-sm-12 d-flex flex-wrap">
          <div class="card my-card mmb-15">
            <a href="<?php echo e(route('admin.apartments.index')); ?>">
              <div class="card-body">
                <p class="card-text my-card-text"> <i class="far fa-list-alt"></i>Gestisci gli annunci</p>
              </div>
            </a>
          </div>

          <div class="card my-card mmb-15">
            <a href="<?php echo e(route('admin.apartments.create')); ?>">
              <div class="card-body">
                <p class="card-text my-card-text"> <i class="far fa-plus-square"></i>Crea un annuncio</p>
              </div>
            </a>
          </div>
          <div class="card my-card mmb-15">
            <a href="<?php echo e(route('logout')); ?>"
             onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">
            <div class="card-body">
               <p class="card-text my-card-text">
                 <i class="fas fa-arrow-circle-left"></i>  <?php echo e(__('Logout')); ?></p>
            </div>

            </a>
          </div>

      </div>

      <div class="totals col-lg-3 col-md-4 col-sm-12 d-flex flex-wrap">
        <div class="card my-card mmb-15">
          <div class="card-body my-card-body">
            <div class="title">
              <p class="number"><?php echo e(count(Auth::user()->apartments)); ?></p>
              <p class="card-text my-card-text">Annunci</p>
            </div>
            <div class="icon">
              <i class="fas fa-bullhorn"></i>
            </div>

          </div>
        </div>
      </div>
      <div class="totals col-lg-3 col-md-4 col-sm-12 d-flex flex-wrap">
        <div class="card my-card mmb-15">
          <div class="card-body my-card-body">
            <div class="title">
                <?php ($count=0); ?>
                <?php $__currentLoopData = Auth::user()->apartments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apartment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $apartment->messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php ($count++); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <p class="number"><?php echo e($count); ?></p>
                <p class="card-text my-card-text">Messaggi</p>
            </div>
            <div class="icon">
              <i class="far fa-envelope"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="totals col-lg-3 col-md-4 col-sm-12 d-flex flex-wrap">
        <div class="card my-card mmb-15">
          <div class="card-body my-card-body">
            <div class="title">
                <?php ($count=0); ?>
                <?php $__currentLoopData = Auth::user()->apartments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apartment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $apartment->views; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php ($count++); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <p class="number"><?php echo e($count); ?></p>
              </p>
              <p class="card-text my-card-text">Visualizzazioni</p>
            </div>
            <div class="icon">
              <i class="far fa-eye"></i>
            </div>
          </div>
        </div>
      </div>

        <!-- <div class="apartments row">
        <?php $__currentLoopData = $apartments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apartment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="card my-card mmb-30" style="width: 21rem;" title="Vedi i dettagli dell'appartamento">
                <div class="card-img-top my-card-img-top">
                  <img class="card-img-top" src="<?php echo e(asset($apartment->img)); ?>" alt="Card image cap">
                </div>
                <div class="card-body my-card-body">
                  <h5 class="card-title my-card-title"><?php echo e($apartment->title); ?></h5>
                  <div class="card-text my-card-text">
                    <p class="address mpt-10">Indirizzo: <?php echo e($apartment->address); ?></p>
                    <?php $__currentLoopData = $apartment->sponsors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sponsor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($loop->first): ?>
                      <p class="expiration"> <span>Fino al:</span> <?php echo date('d/m/Y h:m:s', strtotime($sponsor->pivot->expiration_date)); ?> </p>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div> -->

    </div>

    <div class="row sponsors">
      <div class="col-lg-9 col-md-12 col-sm-12 offset-lg-3">
        <div class="card my-card">
          <div class="my-card-body">
            <table class="table table-borderless my-table">
              <thead>
                <tr>
                  <th scope="col" col-span=2>Alloggio</th>
                  <th scope="col">Scadenza promozione</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $apartments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apartment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php $__currentLoopData = $apartment->sponsors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sponsor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td style="width: 70%;"><?php echo e($apartment->title); ?></td>
                  <?php if($loop->first): ?>
                  <td> <?php echo date('d/m/Y h:m:s', strtotime($sponsor->pivot->expiration_date)); ?> </td>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lollo\Desktop\Esercizi_Boolean\boolbnb-team5\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>