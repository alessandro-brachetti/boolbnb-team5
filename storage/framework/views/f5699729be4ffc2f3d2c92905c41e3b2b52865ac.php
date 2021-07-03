

<?php $__env->startSection('content'); ?>
<main id="dashboard">

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
      <div class="col-lg-4 col-md-4 col-sm-12">
        <h5 class="title-admin user">
          Ciao, <span><?php echo e(Auth::user()->name); ?></span>
        </h5>
      </div>
      <div class="col-lg-8 col-md-8 col-sm-12">
        <h4 class="title-admin">
          I tuoi annunci sponsorizzati:
        </h4>
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
      <div class="tools col-lg-3 col-md-3 col-sm-12">
        <a href="<?php echo e(route('admin.apartments.index')); ?>">
          <div class="card my-card mmb-20" style="width: 18rem;">
            <div class="card-body">
              <p class="card-text my-card-text"> <i class="far fa-list-alt"></i>Gestisci gli annunci</p>
            </div>
          </div>
        </a>
        <a href="<?php echo e(route('admin.apartments.create')); ?>">
          <div class="card my-card" style="width: 18rem;">
            <div class="card-body">
              <p class="card-text my-card-text"> <i class="far fa-plus-square"></i>Crea un annuncio</p>
            </div>
          </div>
        </a>

      </div>

      <div class="col-lg-8 col-md-8 col-sm-12">
        <div class="apartments row">
          <?php echo e(count(Auth::user()->apartments)); ?>

      <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="card my-card mmb-20" style="width: 18rem;">
          <div class="card-body">
            <p class="card-text my-card-text"> <i class="far fa-list-alt"></i>Annunci Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  </p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="card my-card mmb-20" style="width: 18rem;">
          <div class="card-body">
            <p class="card-text my-card-text"> <i class="far fa-list-alt"></i>Messaggi Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="card my-card mmb-20" style="width: 18rem;">
          <div class="card-body">
            <p class="card-text my-card-text"> <i class="far fa-list-alt"></i>Visualizzazioni totali Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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

    <div class="row">
      <div class="col-lg-9 col-md-9 col-sm-12 offset-lg-3">
        <table class="table table-hover mmt-30">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">First</th>
              <th scope="col">Last</th>
              <th scope="col">Handle</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td colspan="2">Larry the Bird</td>
              <td>@twitter</td>
            </tr>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\misha\Desktop\Boolean\Final_project\boolbnb-team5\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>