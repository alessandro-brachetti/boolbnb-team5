
<?php $__env->startSection('content'); ?>
<main id="index-sponsors">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>

</div>
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

  <div class="container" id="payment">
    <div class="sponsors row mpt-30">

      <h5 class="title-admin">Sponsorizza il tuo annuncio</h5>

    </div>
    <div class="row justify-content-center mmt-30">
      <?php $__currentLoopData = $sponsors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sponsor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="totals col-lg-4 col-md-4 col-sm-12 d-flex flex-wrap">
        <div class="card my-card mmb-20">
          <div class="card-body my-card-body">
            <input name="sponsor_type" type="radio" id="sponsor_type" value="<?php echo e($sponsor->id); ?>" aria-labelledby="sponsor_type-help" @input="value(<?php echo e($sponsor->id); ?>)" @click="startPayment">
                <label for="sponsor_type"><?php echo e($sponsor->name); ?></label>
                <small id="sponsor_type-help" class="form-text">
                <p>Prezzo: <?php echo e($sponsor->price); ?> euro</p>
                <p>Durata: <?php echo e($sponsor->duration); ?> ore</p>
            </small>
          </div>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="row">
      <div class="col-12 d-flex flex-column align-items-center">
        <div id="dropin-container"></div>
         <form name="form" id="form1" @submit.prevent="postResult(<?php echo e($apartments->id); ?>)">
          <div class="form-group">
              <input type="hidden" class="form-control" id="nonce" v-model="form.payment_Method_Nonce">
          </div>

          <button v-if="clicked == true" class="btn btn-success"> Sponsorizza </button>
          </form>
          <button v-if="clicked == false && selected != ''" class="btn" id="submit-button" @click="clicked = true"> Conferma </button>

          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Congratulazioni!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Hai sponsorizzato il tuo appartamento con successo!
                  </div>
                  <div class="modal-footer">
                    <a href="/dashboard" class="btn btn-secondary">Ok</a>
                  </div>
                </div>
              </div>
            </div>
      </div>
    </div>
  </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\misha\Desktop\Boolean\Final_project\boolbnb-team5\resources\views/admin/sponsors/index.blade.php ENDPATH**/ ?>