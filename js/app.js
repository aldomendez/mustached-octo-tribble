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
      }, {
        name: 'user_id',
        display: 'Numero de usuario',
        rules: 'required|numeric'
      }
    ];
  };

  Validator.prototype.regenerate = function(data) {
    this.validator = new FormValidator(this.target, this.standardValidator, function(err, evnt) {
      if (err.length !== 0) {
        evnt.preventDefault();
        console.log(err);
        return _.map(err, function(err) {
          return $.pnotify({
            title: 'Error en el formulario',
            text: err.message,
            type: 'info'
          });
        });
      }
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
