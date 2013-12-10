# Genera la vista con la que vamos a trabajar
# 
# @example Genera la vista
#   view = new AlbumView()
# 
AlbumView = backbone.Model.extend {
	tag:'li'
	className:'album'
	initialize:()->
		_.bindAll @, 'render'
		@model.bind 'change', @render
		@template = _.template($('#album-template').html())
	render:()->
		renderedContent = @template @model.toJSON()
		$(@el).html renderedContent
		@
}