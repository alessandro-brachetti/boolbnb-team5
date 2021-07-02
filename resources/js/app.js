Vue.config.devtools = true;
Vue.config.debug = true;

require('./bootstrap');
const { default: axios } = require('axios');

Vue.config.devtools = true;

let app = new Vue({
    el: '#root',
    data:{
        search: '',
        results: [],
        lat:'',
        lon:'',
    },

    computed: {
        filteredList() {
          return this.users.filter(user => {
            return user.name.toLowerCase().includes(this.search.toLowerCase())
          })
        }
      },

      methods:{
          responseApi:_.debounce(function() {
            if (this.search != '') {
              axios.get('https://api.tomtom.com/search/2/geocode/' + this.search + '.json', {
                params:{
                    key: 'DgxwlY48Gch9pmQ6Aw67y8KTVFViLafL',
                },
            }).then((response) =>{
                this.results = response.data.results;
                console.log(this.results);
            });
            } else {
              this.results = [];
            }
          }, 1000),

          getCords(lat,lon) {
            this.lat = lat;
            this.lon = lon;
            this.results = [];
          },

          getAddress(address){
            this.search=address;
          }
      }

});

Vue.config.devtools = true;
let payment = new Vue({
  el: '#payment',
  data:{
    clicked: false,
    selected: '',
    form: {
      payment_Method_Nonce: '',
      sponsor: '',
    }
  },
  methods:{
    startPayment() {
        braintree.dropin.create({
          authorization: "sandbox_ndhxjk7r_6x5mkttghp3xt46h",
          container: '#dropin-container'
        }, function (createErr, instance) {
          document.querySelector('#submit-button').addEventListener('click', function (e) {
            console.log(this.clicked);
            e.preventDefault();
            instance.requestPaymentMethod(function (err, payload) {
              document.querySelector('#nonce').value = payload.nonce;

            });
          });
        });
    },
    postResult(apartment_id) {
      this.form.payment_Method_Nonce = document.querySelector('#nonce').value;
      this.form.sponsor = this.selected;
      axios.post('/admin/payment/make', this.form).then((response) => {
        if(response.data.response.success = true){
          axios.post('/admin/sponsor/', {
            sponsor_type: this.selected,
            apartment_id: apartment_id
          }).then((response)=>{
            console.log(response);
          })
        }
      })
    },

    value(id){
      this.selected= id;
    }
  }

});

let welcome = new Vue({
  el: '#welcome',
  data:{
    search: '',
    results: [],
  },
  methods:{
    responseApi:_.debounce(function() {
      if (this.search != '') {
        axios.get('https://api.tomtom.com/search/2/geocode/' + this.search + '.json', {
          params:{
              key: 'DgxwlY48Gch9pmQ6Aw67y8KTVFViLafL',
          },
      }).then((response) =>{
          this.results = response.data.results;
      });
      } else {
        this.results = [];
      }
    }, 1000),

    getCords(lat,lon) {
      this.lat = lat;
      this.lon = lon;
      this.results = [];
    },
  }
});


let search = new Vue({
  el: '#search',
  data:{
    city: null,
    results: [],
    lon: '',
    lat: '',
    range: 20,
    filter: {
      rooms: 1,
      beds: 1,
    },
    services: ['WIFI', 'Posto macchina', 'Aria condizionata', 'Riscaldamento', 'TV', 'Bagno privato', 'Piscina','Portineria','Sauna','Vista mare'],
    checkedItems: [],
  },
  created() {
    let path = window.location.pathname;
    this.city = path.split('/search/')[1];

    if (this.city != null) {
      axios.get('https://api.tomtom.com/search/2/geocode/' + this.city + '.json', {
        params:{
            key: 'DgxwlY48Gch9pmQ6Aw67y8KTVFViLafL',
        },
    }).then((response) =>{
        console.log(response);
        let lon = response.data.results[0].position.lon;
        let lat = response.data.results[0].position.lat;
        this.lon = lon;
        this.lat = lat;



      // MARKERS PER MAPPA


    });
    // API TO GET APARTMENTS
    axios.get('/api/search').then((response)=>{
      let lon = this.lon;
      let lat = this.lat;

      var map = this.generateTomTomMap();


      for (var i = 0; i < response.data.data.length; i++) {
        let lat1 = response.data.data[i].latitude;
        let lon1 = response.data.data[i].longitude;

        var range = this.range;

        let y = lat1 - this.lat;
        let x = lon1 - this.lon;
        let distancekm = Math.sqrt(x*x+y*y)*100;

        if (distancekm <= range) {
          this.results.push(response.data.data[i]);
        }

        this.generateMarker(map);

      }
    });
    }
  },
  computed: {
      filteredServices() {
        if (this.checkedItems.length == 0) {
          return this.results;
        }else{
          axios.get('/api/search/filter?service=' + this.checkedItems).then((response)=>{
            console.log('FILTRO', response);
          });
          // var results = []

          // this.results.forEach(element => {
          //   element.services.filter(item => {
          //     // console.log('item',item)
          //     // console.log('include ', this.checkedItems.includes(item.service_name))

          //     if(this.checkedItems.includes(item.service_name) == true){
          //       console.log('prima cond');
          //       // console.log('da pushare se non esiste', results.indexOf(element) == -1)
          //       if(results.indexOf(element) == -1){
          //         results.push(element)
          //         console.log('seconda cond');
          //       }
          //     }
          //   });
          // });
          // return results
        }
      }
  },
  methods:{
    // FUNCTION THAT CHANGES SEARCH RANGE
    onRangeChange: _.debounce(function() {
      axios.get('/api/search').then((response)=>{

        let lon = this.lon;
        let lat = this.lat;

        var map = this.generateTomTomMap();

        for (var i = 0; i < response.data.data.length; i++) {
          let lat1 = response.data.data[i].latitude;
          let lon1 = response.data.data[i].longitude;

          var range = this.range;
          let y = lat1 - this.lat;
          let x = lon1 - this.lon;
          let distancekm = Math.sqrt(x*x+y*y)*100;
          // console.log(distancekm)
          var temp = response.data.data[i].id
          if (distancekm <= range ) {
            if(this.results.some(result => result.id === temp)){
              console.log("Object found inside the array.", distancekm <= range);
              this.generateMarker(map);

            } else{
              this.results.push(response.data.data[i]);
              this.generateMarker(map);
            }

          }else{
            let index = this.results.indexOf(this.results.find(result => result.id === temp))

            if (index != -1 && distancekm > range && this.results.some(result => result.id === temp ) ) {
              this.results.splice(index, 1);
            }
          }
        }
      });
    }, 1000),

    generateTomTomMap() {
      let lon = this.lon;
      let lat = this.lat;
      var map = tt.map({
      container: 'map',
      key: 'DgxwlY48Gch9pmQ6Aw67y8KTVFViLafL',
      center: [lon, lat],
      zoom: 10
      });

      map.addControl(new tt.FullscreenControl());
      map.addControl(new tt.NavigationControl());

      return map;
    },
    generateMarker(map) {
      for (let i = 0; i < this.results.length; i++) {

        let lon1 = this.results[i].longitude;
        let lat1 = this.results[i].latitude;

        var element = document.createElement('div');
        element.id = 'marker';
        var marker = new tt.Marker({element: element}).setLngLat([lon1, lat1]).addTo(map);
      }
    }
  }
});
