
<?php $__env->startSection('content'); ?>

<div class="container-fluid" id="search">
    <div class="row">
        <div class="col-6">
            <div>
                <label for="points">Numero minimo stanze:</label>
                <input type="number" id="points" name="points" min="1" max="20" v-model="rooms">
            </div>
            
            <div>
                <label for="points">Numero minimo posti letto:</label>
                <input type="number" id="points" name="points" min="1" max="20" v-model="beds">
            </div>

            <div class="form-group">
                <p>Filtra per Servizi:</p>
                <div class="form-check form-check-inline" v-for="service in services">  
                  <input class="form-check-input" id="services" type="checkbox" v-model="checkedItems" :value="service">
                  <label> {{service}} </label>
                </div>      
            </div>

            <div>
                <span>{{range}} Km</span>
                <input type="range" v-model='range' name="" id="" min="15" max="100" @input="onRangeChange">
                <span>100 Km</span>
            </div>
            
            <div>               
                
                <div v-for="apartment in filteredResults" v-if="apartment.n_rooms >= rooms && apartment.n_beds >= beds">
                    <p>FIltrati:{{apartment.title}}</p>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div id="map"></div>
        </div>       
    </div>
</div>

<style>
    #map { width: 100%; height: calc(100vh - 4.375rem); }

    #marker::before {
    font-family: "Font Awesome 5 Free"; font-weight: 900; content: "\e065";
    font-size: 2em;
    }

    input {
    margin: .4rem;
    }   
  </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\giudi\Desktop\BOOLEAN\ESERCIZI\ESERCIZI-SVOLGIMENTO\boolbnb-team5\resources\views/guests/search.blade.php ENDPATH**/ ?>