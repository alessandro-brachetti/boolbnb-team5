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
    selected: '',
    form: {
      payment_Method_Nonce: '',
      sponsor: '',
      apartment_id: ''
    }
  },

  mounted(){
    var form = document.querySelector('#form1');
 
    braintree.dropin.create({
      authorization: "sandbox_ndhxjk7r_6x5mkttghp3xt46h",
      container: '#dropin-container'
    }, function (createErr, instance) {
      form.addEventListener('submit', function (e) {
        e.preventDefault();
        instance.requestPaymentMethod(function (err, payload) {
          document.querySelector('#nonce').value = payload.nonce;
          this.form.payment_Method_Nonce = payload.name;

          // form.submit();
          
        });
      });
    });
  },

  methods:{
    postResult(apartment_id) {
      this.form.sponsor = this.selected;
      this.form.apartment_id = apartment_id;
      axios.post('/admin/payment/make', this.form).then((response) => {
        // console.log(this.form);
        console.log(response);
      })
    },

    value(id){
      this.selected= id;
      console.log(this.selected)
    }
  }

});