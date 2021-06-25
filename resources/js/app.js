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
    created(){
        
        
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