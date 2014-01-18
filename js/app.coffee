app = app || {}

class Views
	constructor:(@templateSource,@target)->
		@target = $ @target			# Objeto jQuery con la referencia a el punto de incercion
		@el = $ @templateSource 	# Referencia a el elemento de la pagina donde esta el template
		@content = @el.html()		# Contenido para ser convertido en template
		@compileTemplete()			# Compila el template y lo deja listo para usar 
	render:(data)->
		@target.html @template data	# Aplica el template a los datos
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

# Se encarga de mostrar los datos del shear que se guardaron en la base de datos.
# cuando el direccionador obtiene los datos de la base de datos, los datos que
# recibe los pasa como parametro en la creacion de la funcion.
class StoredData
	constructor:(data)->
		@view = new Views '#update-template','#form'
		@data = data[0]
		@render()
		@populate()
		@hockHandlers()
	hockHandlers:->
		that = this
		# $('#cargar','#form').on 'click', that, @requestData
		$('#cargar','#form').on 'click', that, ->(window.location.hash = "#/view/#{that.data.PROCESS}/#{$('[name=ID]').val()}")
	requestData:(event)->
		# Prepara los datos que se enviaran
		data =
			id:$('[name=ID]').val()
			# event.data me pasa los datos de la funcion que lo llamo (padre)
			# data.PROCESS es el valor que me interesa
			process:event.data.data.PROCESS
		#obtiene la informacion de la base de datos
		$.getJSON 'getData.php', data, (data)=>
			console.log data
			console.log event.data
			event.data.data = data[0]
			event.data.populate
			if data.length > 1
				console.log 'Que paso aqui, hay 2 valores?'
			
			#llama al proceso que despliega la informacion
	render:->
		@view.render  _.findWhere(app.process,{name:app.requested.process})
		$('#process-help').slideUp()
		$('#form').slideDown()

	populate:->
		for k, v of @data
			if k is 'SYSTEM_ID'
				# este campo es diferente en su forma de asignar valores
				# por eso es que esta aparte
				$("[name=SYSTEM_ID][value=#{v}]",'#form').attr('checked', 'checked')
			if k isnt 'PASSFAIL'
				# Este campo no tiene campo para asignar valores y no quiero
				# advertencias en la aplicacion por que este 
				if $("[name=#{k}]",'#form')? 
					$("[name=#{k}]",'#form').val v

app.brdcmps = new Views('#brdcmps-template','#brdcmps')
app.form = new Views('#form-template','#form')
app.brdcmps.render app.process
app.validator = new Validator('formElement')

app.sammy = Sammy '#brdcmps',->
	@get '#/capture/:id',()->
		# console.log @params.id
		app.form.render app.process[@params.id]
		$('#process-help').slideUp()
		$('#form').slideDown()

	@get '#/',->
		$('#form').slideUp()
		$('#process-help').slideDown()

	@get '#/error/:message',->
		$.pnotify {
			title:'Error en el formulario'
			text: @params.message
			type:'info'
		}

	@get '#/success/:process/:id',->
		$.pnotify {
			title:'Proceso: ' + @params.process
			text: 'Se genero el id: ' + @params.id
			type:'success'
		}
		@redirect '#/view/' + @params.process + '/' + @params.id

	@get '#/view/:process/:id',->
		app.requested = {
			id:@params.id
			process:@params.process
		}
		$.getJSON 'getData.php', app.requested, (data)->
			app.viewId = new StoredData(data)

	@get '#/view',->
		app.brdcmps = new Views('#brdcmps-template','#brdcmps')
		app.form = new Views('#form-template','#form')

	return

app.sammy.run '#/'