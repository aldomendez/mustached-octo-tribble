app = app || {}

class Proceso
	constructor:->
		@proceso = app.proc

	selectProcess:(@selectedProcess)->

	renderProcessList:()->

class Views
	constructor:(@id,@target)->
		@target = $ @target
		@el = $ @id 
		@content = @el.text()
		@compileTemplete()
	render:(data)->
		@template data
		@target.html(@template);
	compileTemplete:()->
		@template = doT.template @content

###
// 1. Compile template function
var tempFn = doT.template("<h1>Here is a sample template {{=it.foo}}</h1>");
// 2. Use template function as many times as you like
var resultText = tempFn({foo: 'with doT'});
###

app.form = new Views('#form-template','#form');