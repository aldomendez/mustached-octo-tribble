bonderFormViewModel = ()->
	@machines = window.machines
	@process = window.process
	@processSelected = ko.observable()
	@log = ()->
		@.processSelected $('input[name=process]:checked').val()
	@

ko.applyBindings new bonderFormViewModel()