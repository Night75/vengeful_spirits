(function($){
	console.log("herhe");
	$.fn.nForm = function(options){
		var opts = $.extend({}, $.fn.nForm.defaults, options);
		
		return this.each(function(){
			console.log(this);
			var $form = $($(this).find("form"));
			
			// *************** ------------------- Options par defaut
			$.fn.nForm.defaults = {
				
			}
			
			
		})
	}
})