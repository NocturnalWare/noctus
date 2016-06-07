var Vue    = require('./vue.min.js');

var newProduct = new Vue({
    el: '#newProduct',
    data: {
        product:{'name':'', 'description':'', 'category':'', 'price':'', 'active':'', 'onsale':'', 'upcomming':'', 'preorder':'', 'xsmall':'', 'small':'', 'medium':'', 'large':'', 'xlarge':'', 'xxlarge':'', 'xxxlarge':'', 'main_image':''},
        inventory:{'xsmall':'', 'small':'', 'medium':'', 'large':'', 'xlarge':'', 'xxlarge':'', 'xxxlarge':''},
        price:{'xsmall':'', 'small':'', 'medium':'', 'large':'', 'xlarge':'', 'xxlarge':'', 'xxxlarge':''},
        categories:['Tees', '¾ Tees', 'Tanks', 'Hoodies', 'Pants', 'Accessories', 'Ticket'],
    },
    methods:{
        addProduct: function(){
            var data = {};
            var url = jQuery('#newProduct').attr('route');
            var token = jQuery('#newProduct').attr('token');
            data.product = this.product; 
            data.inventory = this.inventory;
            data.prices = this.price;
            data._token = token;
            // console.log(data);
            jQuery.ajax({
                type: "POST",
                url: url,
                data: data,
                cache: false,
                success: function(response){      
                    window.location = response;
                }
            });
            return false;
        },
      doThing: function(){
        alert('thing');
      }
    },
    ready: function ready() {
    }

});

var orderManager = new Vue({
    el: '#orderManager',
    data:{},
    ready: function(){
    },

});
