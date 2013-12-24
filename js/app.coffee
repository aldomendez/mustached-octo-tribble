app = app || {}

class Views
	constructor:(@templateSource,@target)->
		@target = $ @target
		@el = $ @templateSource 
		@content = @el.html()
		@compileTemplete()
	render:(data)->
		@target.html(@template data);
	compileTemplete:()->
		@template = doT.template @content

class Validator
	constructor:(@target)->
		@generateValidator()
		@regenerate()
	generateValidator:(data)->
		@standardValidator = [{
			name:'system_id'
			display:'Maquina'
			rules:'required'
		},{
			name:'serial_num'
			display:'Numero de serie'
			rules:'required|numeric'
		}]
	regenerate:(data)->
		@validator = new FormValidator @target,@standardValidator,(err,evnt)->
			evnt.preventDefault()
			console.log err


app.brdcmps = new Views('#brdcmps-template','#brdcmps')
app.form = new Views('#form-template','#form')
app.brdcmps.render app.process
app.validator = new Validator('formElement')

app.sammy = Sammy '#brdcmps',->
	@get '#/capture/:id',()->
		console.log @params.id
		app.form.render app.process[@params.id]
		$('#process-help').slideUp()
		$('#form').slideDown()

	@get '#/',->
		$('#form').slideUp()
		$('#process-help').slideDown()

	return

app.sammy.run '#/'

$(document).ready ->
	$('#form').on 'submit',(e)->
		e.preventDefault()
		system_id = $('input[name=system_id]:checked', '#form').length
		if system_id then