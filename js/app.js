var Views, app;

app = app || {};

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
  return $('#form').on('submit', function(e) {});
});
