app = app || {}

class Proceso
	constructor:->
		@proceso = app.proc
	selectProcess:(@selectedProcess)->
	renderProcessList:()->

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

	@get '#/',->

	return

app.sammy.run '#/'