var StoredData, Validator, Views, app;

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
      }, {
        name: 'comment',
        display: 'Comentario',
        rules: 'max_length[500]'
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

StoredData = (function() {
  function StoredData(data) {
    this.view = new Views('#update-template', '#form');
    this.data = data[0];
    this.render();
    this.populate();
  }

  StoredData.prototype.render = function() {
    this.view.render(_.findWhere(app.process, {
      name: app.requested.process
    }));
    $('#process-help').slideUp();
    return $('#form').slideDown();
  };

  StoredData.prototype.populate = function() {
    var k, v, _ref, _results;
    _ref = this.data;
    _results = [];
    for (k in _ref) {
      v = _ref[k];
      if (k === 'SYSTEM_ID') {
        $("[name=SYSTEM_ID][value=" + v + "]", '#form').attr('checked', 'checked');
      }
      if (k !== 'PASSFAIL') {
        if ($("[name=" + k + "]", '#form') != null) {
          _results.push($("[name=" + k + "]", '#form').val(v));
        } else {
          _results.push(void 0);
        }
      } else {
        _results.push(void 0);
      }
    }
    return _results;
  };

  return StoredData;

})();

app.brdcmps = new Views('#brdcmps-template', '#brdcmps');

app.form = new Views('#form-template', '#form');

app.brdcmps.render(app.process);

app.validator = new Validator('formElement');

app.sammy = Sammy('#brdcmps', function() {
  this.get('#/capture/:id', function() {
    app.form.render(app.process[this.params.id]);
    $('#process-help').slideUp();
    return $('#form').slideDown();
  });
  this.get('#/', function() {
    $('#form').slideUp();
    return $('#process-help').slideDown();
  });
  this.get('#/error/:message', function() {
    return $.pnotify({
      title: 'Error en el formulario',
      text: this.params.message,
      type: 'info'
    });
  });
  this.get('#/success/:process/:id', function() {
    $.pnotify({
      title: 'Proceso: ' + this.params.process,
      text: 'Se genero el id: ' + this.params.id,
      type: 'success'
    });
    return this.redirect('#/view/' + this.params.process + '/' + this.params.id);
  });
  this.get('#/view/:process/:id', function() {
    app.requested = {
      id: this.params.id,
      process: this.params.process
    };
    return $.getJSON('getData.php', app.requested, function(data) {
      return app.viewId = new StoredData(data);
    });
  });
});

app.sammy.run('#/');
