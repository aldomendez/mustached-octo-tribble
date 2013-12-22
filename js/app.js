var Proceso, Views, app;

app = app || {};

Proceso = (function() {
  function Proceso() {
    this.proceso = app.proc;
  }

  Proceso.prototype.selectProcess = function(selectedProcess) {
    this.selectedProcess = selectedProcess;
  };

  Proceso.prototype.renderProcessList = function() {};

  return Proceso;

})();

Views = (function() {
  function Views(templateSource, target) {
    this.templateSource = templateSource;
    this.target = target;
    this.target = $(this.target);
    this.el = $(this.templateSource);
    this.content = this.el.text();
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

app.brdcmps = new Views('#brdcmps-template', '#brdcmps');

app.form = new Views('#form-template', '#form');

app.brdcmps.render(app.process);

app.sammy = Sammy('#machine-setup', function() {
  this.get('#/capture/:id', function() {
    console.log(this.params.id);
    return app.form.render(app.process[this.params.id]);
  });
  this.get('#/', function() {});
});

app.sammy.run('#/');
