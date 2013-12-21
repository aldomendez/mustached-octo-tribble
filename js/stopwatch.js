var StopWatch;

StopWatch = (function() {
  function StopWatch(display, rate) {
    this.display = display;
    this.refreshRate = rate != null ? rate : 1000;
    this.startTime = 0;
    this.stopTime = 0;
  }

  StopWatch.prototype.start = function(miliseconds) {
    this.startTime = miliseconds != null ? new Date(miliseconds) : new Date();
    this.selfRunner(this);
    return this.startTime.valueOf();
  };

  StopWatch.prototype.selfRunner = function(that) {
    that.render();
    that.timer = setTimeout(that.selfRunner, that.refreshRate, that);
    return that.timer;
  };

  StopWatch.prototype.elapsed = function() {
    var dd, elapsed, hh, mi, remain;
    elapsed = (new Date() - this.startTime) / 1000;
    remain = 0;
    dd = Math.floor(elapsed / 86400);
    hh = Math.floor((elapsed % 86400) / 3600);
    mi = Math.floor((elapsed - (dd * 86400) - (hh * 3600)) / 60);
    if (dd === 0 && hh === 0 && mi === 0) {
      return "Hace unos segundos";
    } else {
      return "" + dd + "d " + hh + "h " + mi + "m";
    }
  };

  StopWatch.prototype.stop = function() {
    this.stopTime = new Date();
    this.render();
    window.clearTimeout(this.timer);
    return [this.elapsed(), this.stopTime];
  };

  StopWatch.prototype.render = function() {
    return this.display.html(this.elapsed());
  };

  return StopWatch;

})();
