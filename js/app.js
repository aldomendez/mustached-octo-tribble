var bvm;

bvm =  function(){
  var self = this;

  self.path = ko.observableArray();
  self.machines = window.machines;
  self.process = window.process;
  self.processSelected = ko.observable();

  self.log = function(currentModelValue) {
    console.log( $('input[name=process]:checked').val() );
    return console.log(currentModelValue);
    self.path.push('asdfsdf');
  }
  
};
bva = new bvm();
ko.applyBindings(bva);
