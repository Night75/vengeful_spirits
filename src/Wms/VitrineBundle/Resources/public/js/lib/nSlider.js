
;( function( $, window, undefined ) {

	$.nSlider = function( options, element ) {
		this.$el = $( element );
		this._init( options );
	};


	// the options
	$.nSlider.defaults = {
		// Items selectors to define 
		items : [], 
		// Button selector which will slide to the next items
		navNext : ".next", 
		// Button selector which will slide to the prev items
		navPrev : ".prev", 
		// default transition speed (ms)
		speed : 500,
		// default transition easing
		easing : 'ease'
	};


	$.nSlider.prototype = {
		_init : function( options ) {
			// options
			this.options = $.extend( true, {}, $.nSlider.defaults, options );
			// cache some elements and initialize some variables
			this._config();
			// initialize/bind the events
			this._initEvents();
		},
		_config : function(){
			// === Enregistrement des variables
			// Set de de container d'items
			this.itemSet = [];
			for(i in this.options.items){
				this.itemSet.push(this.$el.find(this.options.items[i]) )
			}
			// Bouton Next
			this.$navNext = this.$el.find(this.options.navNext);
			// Bouton Prev
			this.$navPrev = this.$el.find(this.options.navPrev);
			// Nombre d'items
			this.itemsCount = this.itemSet[0].length;
			// Index courant
			this.currentIndex = 0;

			// === Initialisation des elements initiaux
			// Classe selected
			for(y in this.itemSet){
				var $items = this.itemSet[y];
				$items.eq(0).addClass("selected");
			}

			this._slide();
		},
		_initEvents : function(){
			var self = this;
			if(this.itemsCount > 1){
				this.$navNext.on("click.nSlider", function(){ self._slide("NEXT")})
				this.$navPrev.on("click.nSlider", function(){ self._slide("PREV")})
			}
		},
		_slide : function(direction){

			for(y in this.itemSet){
				$items = this.itemSet[y];
				var $selectedItem = $items.filter(".selected");
				var $mask = $selectedItem.closest(".mask");
				var currentIndex = $items.index($selectedItem);
			
				if(direction == "NEXT"){
					this.currentIndex = (currentIndex < this.itemsCount - 1) ? ++currentIndex : 0;
				} else if(direction == "PREV"){
					this.currentIndex = (currentIndex > 0) ? --currentIndex : this.itemsCount - 1;
				}
				$selectedItem.removeClass("selected");

				$selectedItem = $items.eq(this.currentIndex)
				$selectedItem.addClass("selected");

				$mask.scrollTo($selectedItem, this.options.speed);
			}

		}
	};

	var logError = function( message ) {
		if ( window.console ) {
			window.console.error( message );
		}
	};

	$.fn.nSlider = function( options ) {
		if ( typeof options === 'string' ) {
			var args = Array.prototype.slice.call( arguments, 1 );
			this.each(function() {
				var instance = $.data( this, 'nSlider' );
				if ( !instance ) {
					logError( "cannot call methods on nSlider prior to initialization; " +
					"attempted to call method '" + options + "'" );
					return;	
				}
				if ( !$.isFunction( instance[options] ) || options.charAt(0) === "_" ) {
					logError( "no such method '" + options + "' for nSlider instance" );
					return;
				}
				instance[ options ].apply( instance, args );
			});
		} 
		else {
			this.each(function() {	
				//new $.nSlider( options, this ); 
				
				var instance = $.data( this, 'nSlider' );
				if ( instance ) {
					instance._init();
				}
				else {
					instance = $.data( this, 'nSlider', new $.nSlider( options, this ) );
				}
				
			});
		}
		return this;
	};

} )( jQuery, window );