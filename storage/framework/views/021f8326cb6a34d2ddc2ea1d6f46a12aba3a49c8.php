<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.14.0/maps/maps.css'>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.14.0/maps/maps-web.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm justify-content-between" style="max-height: 180px;">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <img src="/images/logo_boolbnb_4.png" alt="" style="max-width: 120px;">
                    <!-- <span style="font-size: 1.3rem; font-weight: 700; padding-left: 5px;">Boolbnb</span> -->
                    
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                    <!-- Left Side Of Navbar -->
                    <?php if(Route::current()->getName() != 'welcome'): ?>
                    <div v-cloak class="form-inline my-2 my-lg-0 ml-auto input-search-nav " id="welcome">
                        <div class="input">
                          <input class="form-control mr-sm-2 " id="searchInput" type="search" placeholder="Dove vuoi andare" aria-label="Search" v-model="search" @input="responseApi">
                        </div>
                        <div class="icon">
                          <img src="/images/search.png" alt="">
                        </div>

                          <ul class="search-results">
                            <a :href="(search != '' ? `/search/${search}` : '#')">
                                <li v-for="result in results" @click="search=result.address.freeformAddress, results=[]">{{result.address.freeformAddress}}</li>
                            </a>
                          </ul>

                    </div>
                    <?php endif; ?>

                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <div class="navbar-nav ml-auto" aria-labelledby="navbarSupportedContent1">
                                <a class="nav-item text-right" href="<?php echo e(route('dashboard')); ?>">Dashboard</a>

                                <a class="nav-item text-right logout" href="<?php echo e(route('logout')); ?>"
                                   onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Logout')); ?>

                                </a>



                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto desktop">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item">
                                <a class="nav-link mynavbutton login" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>

                            </li>
                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link mynavbutton register" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item">
                                <div class="mr-auto nav-buttons">
                                    <a class="mr-4 mynavbutton" href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
                                    <a class="logout mynavbutton" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>



                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

            <?php echo $__env->yieldContent('content'); ?>

    </div>
    

    <footer class="mpt-100 mpb-20">
      <div class="container">
        <div class="info row">
          <div class="col-lg-3 col-md-6 col-sm-12">
            <h5>Chi siamo</h5>
            <ul class="my-ul">
              <li><a href="https://www.linkedin.com/in/alessandro-brachetti/">Alessandro Brachetti</a></li>
              <li><a href="https://www.linkedin.com/in/giudittamarino/">Giuditta Marino</a></li>
              <li><a href="https://www.linkedin.com/in/lorenzo-de-sossi-3343b7213/">Lorenzo De Sossi</a></li>
              <li><a href="https://www.linkedin.com/in/michaelo-viktor-casubolo-91112420b/">Michaelo Viktor Casubolo</a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12">
            <h5>Informazioni</h5>
            <ul class="my-ul">
              <li><a href="#">Come funziona Boolbnb</a></li>
              <li><a href="#">Boolbnb Plus</a></li>
              <li><a href="#">Boolbnb for Work</a></li>
              <li><a href="#">Newsroom</a></li>
              <li><a href="#">Investitori</a></li>
              <li><a href="#">HotelTonight</a></li>
              <li><a href="#">Opportunità di lavoro</a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12">
            <h5>Community</h5>
            <ul class="my-ul">
              <li><a href="#"></a></li>
              <li><a href="#">Diversità e appartenenza</a></li>
              <li><a href="#">Alloggi per l'emergenza</a></li>
              <li><a href="#">Accessibilità</a></li>
              <li><a href="#">Invitare un ospite</a></li>
              <li><a href="#">Boolbnb Associates</a></li>
              <li><a href="#">Boolbnb.org</a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12">
            <h5>Assistenza</h5>
            <ul class="my-ul">
              <li><a href="#">La nostra risposta all'emergenza COVID-19</a></li>
              <li><a href="#">Servizio di supporto al vicinato</a></li>
              <li><a href="#">Centro Assistenza</a></li>
              <li><a href="#">Affidabilità e sicurezza</a></li>
              <li><a href="#">Opzioni di cancellazione</a></li>
            </ul>
          </div>
        </div>
        <div class="mmt-5 mmb-10 line row">
        </div>
        <div class="copyright row mpt-10">
          <div class="left col-lg-6 col-md-12">
            <ul class="my-ul">
              <li><a href="#">&copy; 2021 Boolbnb, Inc.</a></li>
              <li><a href="#">Privacy</a></li>
              <li><a href="#">Termini</a></li>
              <li><a href="#">Mappa del sito</a></li>
              <li><a href="#">Dettagli dell'azienda</a></li>
            </ul>
          </div>
          <div class="right col-lg-6 col-md-12 text-right">
            <div class="lang">
              <ul class="my-ul">
                <li><a href="#"><i class="fas fa-globe-africa"></i> Italiano(IT)</a></li>
                <li><a href="#"><i class="fas fa-euro-sign"></i> Eur</a></li>
              </ul>
            </div>
            <div class="social">
              <i class="fab fa-facebook-f"></i>
              <i class="fab fa-twitter"></i>
              <i class="fab fa-instagram"></i>
            </div>
          </div>
        </div>
      </div>
    </footer>
</body>
</html>

<style>
    [v-cloak] {
  display: none;
}
</style>
<?php /**PATH C:\Users\giudi\Desktop\BOOLEAN\ESERCIZI\ESERCIZI-SVOLGIMENTO\boolbnb-team5\resources\views/layouts/app.blade.php ENDPATH**/ ?>