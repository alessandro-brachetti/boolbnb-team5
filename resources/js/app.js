require('./bootstrap');
const { default: axios } = require('axios');

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

let payment = new Vue({
  el: '#payment',
  data:{
    selected: ''
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

          form.submit();
          
        });
      });
    });
  },

  methods:{
    value(id){
      this.selected= id;
      console.log(this.selected)
    }
  }

});