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
  function Views(id, target) {
    this.id = id;
    this.target = target;
    this.target = $(this.target);
    this.el = $(this.id);
    this.content = this.el.text();
    this.compileTemplete();
  }

  Views.prototype.render = function(data) {
    this.template(data);
    return this.target.html(this.template);
  };

  Views.prototype.compileTemplete = function() {
    return this.template = doT.template(this.content);
  };

  return Views;

})();

/*
// 1. Compile template function
var tempFn = doT.template("<h1>Here is a sample template {{=it.foo}}</h1>");
// 2. Use template function as many times as you like
var resultText = tempFn({foo: 'with doT'});
*/


app.form = new Views('#form-template', '#form');
