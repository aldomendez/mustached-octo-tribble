var bonderFormViewModel;

bonderFormViewModel = function() {
  this.machines = window.machines;
  this.process = window.process;
  this.processSelected = ko.observable();
  this.log = function() {
    return this.processSelected($('input[name=process]:checked').val());
  };
  return this;
};

ko.applyBindings(new bonderFormViewModel());
