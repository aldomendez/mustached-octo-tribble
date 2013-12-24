var Validator, Views, app;

app = app || {};

Views = (function() {
  function Views(templateSource, target) {
    this.templateSource = templateSource;
    this.target = target;
    this.target = $(this.target);
    this.el = $(this.templateSource);
    this.content = this.el.html();
    this.compileTemplete();
  }

  Views.prototype.render = function(data) {
    return this.target.html(this.template(data));
  };

  Views.prototype.compileTemplete = function() {
    return this.template = doT.template(this.content);
  };

  return Views;

})();

Validator = (function() {
  function Validator(target) {
    this.target = target;
    this.generateValidator();
    this.regenerate();
  }

  Validator.prototype.generateValidator = function(data) {
    return this.standardValidator = [
      {
        name: 'system_id',
        display: 'Maquina',
        rules: 'required'
      }, {
        name: 'serial_num',
        display: 'Numero de serie',
        rules: 'required|numeric'
      }
    ];
  };

  Validator.prototype.regenerate = function(data) {
    return this.validator = new FormValidator(this.target, this.standardValidator, function(err, evnt) {
      evnt.preventDefault();
      return console.log(err);
    });
  };

  return Validator;

})();

app.brdcmps = new Views('#brdcmps-template', '#brdcmps');

app.form = new Views('#form-template', '#form');

app.brdcmps.render(app.process);

app.validator = new Validator('formElement');

app.sammy = Sammy('#brdcmps', function() {
  this.get('#/capture/:id', function() {
    console.log(this.params.id);
    app.form.render(app.process[this.params.id]);
    $('#process-help').slideUp();
    return $('#form').slideDown();
  });
  this.get('#/', function() {
    $('#form').slideUp();
    return $('#process-help').slideDown();
  });
});

app.sammy.run('#/');

$(document).ready(function() {
  return $('#form').on('submit', function(e) {
    var system_id;
    e.preventDefault();
    system_id = $('input[name=system_id]:checked', '#form').length;
    if (system_id) {

    }
  });
});
