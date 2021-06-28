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
        lon:''
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
      }
});

// https://api.tomtom.com/search/2/geocode/via domenico lancia di brolo 167.json?key=DgxwlY48Gch9pmQ6Aw67y8KTVFViLafL
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

  mounted(){
    braintree.dropin.create({
      authorization: "sandbox_ndhxjk7r_6x5mkttghp3xt46h",
      container: '#dropin-container'
    }, function (createErr, instance) {
      document.querySelector('#submit-button').addEventListener('click', function (e) {
        console.log(this.clicked)
        e.preventDefault();
        instance.requestPaymentMethod(function (err, payload) {
          document.querySelector('#nonce').value = payload.nonce;
          
        });
      });
    });
  },

  methods:{
    postResult(apartment_id) {
      this.form.payment_Method_Nonce = document.querySelector('#nonce').value;
      this.form.sponsor = this.selected;
      axios.post('/admin/payment/make', this.form).then((response) => {

        if(response.data.response.success = true){
          axios.post('/admin/sponsor/', {
            sponsor_type: this.selected,
            apartment_id: apartment_id
          }).then((response)=>{
            console.log(response)
          })
        }

        // if(response.data.response.success = true){
        //   document.querySelector('#form2').submit()
        // }
      })
    },

    value(id){
      this.selected= id;
      console.log(this.selected)
    }
  }

});

let welcome = new Vue({
  el: '#welcome',
  data:{
    search: '',
  },
});


let search = new Vue({
  el: '#search',
  data:{
    city: null,
  },
  created() {
    
    let path = window.location.pathname;
    this.city = path.split('/search/')[1];

    axios.get('https://api.tomtom.com/search/2/geocode/' + this.city + '.json', {
        params:{
            key: 'DgxwlY48Gch9pmQ6Aw67y8KTVFViLafL',
        }, 
    }).then((response) =>{
      let lon = response.data.results[0].position.lon;
      let lat = response.data.results[0].position.lat;
    
      const API_KEY = 'DgxwlY48Gch9pmQ6Aw67y8KTVFViLafL';
    
      var map = tt.map({
      key: API_KEY,
      container: 'map',
      center: [lon, lat],
      zoom: 12, 
      });

      var element = document.createElement('div');
      element.id = 'marker';
      var marker = new tt.Marker({element: element}).setLngLat([lon, lat]).addTo(map);
    });
        
  },
});