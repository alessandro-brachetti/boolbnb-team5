
<?php $__env->startSection('content'); ?>

<div class="container-fluid advanced-search-page" id="search" >
    <div class="row">
        <div class="col-lg-5 offset-lg-1 col-md-12 col-sm-12 mobile d-flex flex-wrap flex-column justify-content-between">
            <h4 class="mt-3">Soggiorni nell'area selezionata della mappa</h4>
            <div id="filters" class="d-flex flex-wrap flex-column mt-1">
                
                <div class="first-line-filters d-flex flex-wrap justify-content-start">
                    <div class="mr-2">
                        <label for="points">Stanze:</label>
                        <input type="number" id="points" name="points" min="1" max="20" v-model="rooms">
                    </div>
                    
                    <div v-cloak class="mr-2">
                        <label for="points">Letti:</label>
                        <input type="number" id="points" name="points" min="1" max="20" v-model="beds">
                    </div>
        
                    <button class="btn services" type="button" data-toggle="modal" data-target="#myModal">Più filtri</button>
                </div>

                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body d-flex flex-wrap flex-column">
                            <h4>Più filtri</h4>
                            <div class="form-check form-check-inline" v-for="service in services">  
                                <input class="form-check-input" id="services" type="checkbox" v-model="checkedItems" :value="service">
                                <label> {{service}} </label>
                            </div>   
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" @click="checkedItems = []" data-dismiss="modal"><i class="fas fa-redo-alt"></i></button>
                            <button type="button" class="btn btn-success" data-dismiss="modal">Done</button>
                        </div>
                    </div>
                    </div>
                </div>

                <div v-cloak class="range-changer mt-4">
                    <h5>Aumenta il raggio di ricerca:</h5>
                    <span>{{range}} Km</span>
                    <input type="range" v-model='range' name="" id="" min="15" max="100" @input="onRangeChange">
                    <span>100 Km</span>
                </div>

            </div>
            
            <div class="overflowable">               
                <div v-cloak v-for="apartment in filteredResults" v-if="apartment.n_rooms >= rooms && apartment.n_beds >= beds">
                    <a :href="`/apartment/${apartment.id}`">
                        <div class="my-search-card row mb-2 ">
                            <div class="col-sm-4 image">
                                <div class="my-card-img">
                                    <div class="cover" :style="`background-image: url(/${apartment.img})`">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="my-card-body">
                                    <div class="my-card-title">
                                        <p>{{apartment.title}}</p>
                                    </div>
        
                                    <div class="my-card-text">
                                        <div class="address">
                                            <div class="via">{{apartment.address}}</div>
                                        </div>
                                        <div class="services d-flex">
                                            <div v-for="service in apartment.services" class="service d-flex flex-wrap mt-3 mr-2">
                                                <p class="sr"> {{ service.service_name }} </p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div id="map"></div>
        </div>       
    </div>
</div>

<style>
    #map { width: 100%; height: calc(100vh - 4.475rem); }

    #marker::before {
        font-family: "Font Awesome 5 Free"; font-weight: 900; content: "\e065";
        font-size: 1.5em;
        color: #fa6933;
        background-color: rgb(255, 255, 255);
        padding: .35em;
        border-radius: 50%;
        box-shadow: 10px 10px 15px -2px rgba(0,0,0,0.51);
    }

    input {
    margin: .4rem;
    }   

    [v-cloak] {
        display: none;
    }
  </style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    console.log($(window.innerHeight)[0], $('.navbar')[0].offsetHeight, $('#filters')[0].offsetHeight)

    

    
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\misha\Desktop\Boolean\Final_project\boolbnb-team5\resources\views/guests/search.blade.php ENDPATH**/ ?>