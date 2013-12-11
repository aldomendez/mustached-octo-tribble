var bonderFormViewModel;

bonderFormViewModel =  {
	path : ko.observableArray([])
  machines : window.machines
  process : window.process
  processSelected : ko.observable()
  this.log = function(currentModelValue) {
    //return this.processSelected($('input[name=process]:checked').val());
    //return console.log(currentModelValue);
    this.path.push(currentModelValue.name);
  }
};

ko.applyBindings(new bonderFormViewModel());
