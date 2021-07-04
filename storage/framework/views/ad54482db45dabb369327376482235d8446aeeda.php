
<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="card mb-3">
        <img class="card-img-top" src="<?php echo e(asset($apartment->img)); ?>" alt="<?php echo e($apartment->title); ?>">
        <div class="card-body">
            <h5 class="card-title"><?php echo e($apartment->title); ?></h5>
            <p class="card-text">Indirizzo: <?php echo e($apartment->address); ?></p>
            <input type="hidden" value="<?php echo e($apartment->longitude); ?>" id="long">
            <input type="hidden" value="<?php echo e($apartment->latitude); ?>" id="lat">         
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">N. Rooms: <?php echo e($apartment->n_rooms); ?></li>
            <li class="list-group-item">N. Beds: <?php echo e($apartment->n_beds); ?></li>
            <li class="list-group-item">N. Bathrooms: <?php echo e($apartment->n_bathrooms); ?></li>
            <li class="list-group-item">MQ: <?php echo e($apartment->mq); ?></li>
        </ul>
        <div class="card-body">
          Servizi:
          <?php $__currentLoopData = $apartment->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($loop->last): ?>
                  <span><?php echo e($service->service_name); ?></span>
              <?php else: ?> 
                  <span><?php echo e($service->service_name); ?>,</span>
              <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
    <div class="card-body">
      <?php if(!Auth::user() || Auth::user()->id != $apartment->user_id): ?>
            <form action="<?php echo e(route('messages.store')); ?>" method="post" name="form">
                <?php echo csrf_field(); ?>
                <?php echo method_field('POST'); ?>
                <input type="hidden" name="apartment_id" value="<?php echo e($apartment->id); ?>">
                <div class="form-group">
                  <label for="name">Nome</label>
                  <input class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name" type="text" name="name" value="<?php echo e(Auth::user() ? Auth::user()->name : ""); ?>">
                  <?php $__errorArgs = ['nome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-danger"> <?php echo e($message); ?></small>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
    
                <div class="form-group">
                  <label for="lastname">Cognome</label>
                  <input class="form-control <?php $__errorArgs = ['lastname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="lastname" type="text" name="lastname" value="<?php echo e(Auth::user() ? Auth::user()->lastname : ""); ?>">
                  <?php $__errorArgs = ['cognome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-danger"> <?php echo e($message); ?></small>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
    
                <div class="form-group">
                  <label for="email">Email</label>
                  <input class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" type="email" name="email" value="<?php echo e(Auth::user() ? Auth::user()->email : ""); ?>">
                  <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-danger"> <?php echo e($message); ?></small>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
    
                <div class="form-group">
                  <label for="message">Messaggio</label>
                  <textarea class="form-control <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="message" name="message" value=""></textarea>
                  <?php $__errorArgs = ['messaggio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-danger"> <?php echo e($message); ?></small>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
    
                <button class="btn btn-primary" type="button" name="button" data-toggle="modal" data-target="#exampleModal">Invia</button>

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
                        Hai inviato il messaggio con successo!
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="submit()">Ok</button>
                      </div>
                    </div>
                  </div>
                </div> 
            </form>      
          <?php endif; ?>
    </div>
    <div class="col-12">
      <div id="map"></div>
    </div>   
</div>
<style>
  #map { width: 100%; height: 50vh; }
  #marker::before {
  font-family: "Font Awesome 5 Free"; font-weight: 900; content: "\e065";
  font-size: 2em;
  }
</style>
<script>
  function submit() {
    form.submit();
  }
  
  const API_KEY = 'DgxwlY48Gch9pmQ6Aw67y8KTVFViLafL';
  let long = document.getElementById('long').value;
  let lat = document.getElementById('lat').value;

  var map = tt.map({
      key: API_KEY,
      container: 'map',
      center: [long, lat],
      zoom: 14,
      });

  var element = document.createElement('div');
  element.id = 'marker';
  var marker = new tt.Marker({element: element}).setLngLat([long, lat]).addTo(map);
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lollo\Desktop\Esercizi_Boolean\boolbnb-team5\resources\views/guests/show.blade.php ENDPATH**/ ?>