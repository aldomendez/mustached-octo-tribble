# Valor de un radio button 
  $('input[name=radioName]:checked', '#myForm').val()


###
# Backbone router Example
var AppRouter = Backbone.Router.extend({
    routes: {
        "posts/:id": "getPost",
        "*actions": "defaultRoute" // Backbone will try match the route above first
    }
});
// Instantiate the router
var app_router = new AppRouter;
app_router.on('route:getPost', function (id) {
    // Note the variable in the route definition being passed in here
    alert( "Get post number " + id );   
});
app_router.on('route:defaultRoute', function (actions) {
    alert( actions ); 
});
// Start Backbone history a necessary step for bookmarkable URL's
Backbone.history.start();
###

# Bien explicada la forma en la que se hacen los routes de Backbone
# http://www.codebeerstartups.com/2013/01/routers-in-backbone-js-learning-backbone-js