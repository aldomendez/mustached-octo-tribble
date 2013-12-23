app = app || {}

class Views
	constructor:(@templateSource,@target)->
		@target = $ @target
		@el = $ @templateSource 
		@content = @el.text()
		@compileTemplete()
	render:(data)->
		@target.html(@template data);
	compileTemplete:()->
		@template = doT.template @content

app.brdcmps = new Views('#brdcmps-template','#brdcmps')
app.form = new Views('#form-template','#form')
app.brdcmps.render app.process

app.sammy = Sammy '#machine-setup',->
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
		# e.preventDefault()
		# machine = $('input[name=machine]:checked', '#form').val()
		# alert machine