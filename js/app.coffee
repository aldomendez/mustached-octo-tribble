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
		},{
			name:'user_id'
			display:'Numero de usuario'
			rules:'required|numeric'
		},{
			name:'comment'
			display:'Comentario'
			rules:'max_length[500]'
		}]
	regenerate:(data)->
		@validator = new FormValidator @target,@standardValidator,(err,evnt)->
			if err.length isnt 0
				evnt.preventDefault()
				console.log err
				_.map err,(err)->
					$.pnotify {
						title:'Error en el formulario'
						text: err.message
						type:'info'
					}
		return


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

	@get '#/error/:message',->
		$.pnotify {
			title:'Error en el formulario'
			text: @params['message']
			type:'info'
		}

	@get '#/success/:process/:id',->
		$.pnotify {
			title:'Proceso: ' + @params['process']
			text: 'Se genero el id: ' + @params['id']
			type:'success'
		}
		@redirect '#/view/' +@params['id']

	return

app.sammy.run '#/'