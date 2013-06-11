$(document).ready(function(){
	// ========================= GENERAL
	// ======= Affichage des widget independants (n'ayant pas de parent)
	$(".embedded-in-sonata").each(function(){
		if($(this).find("[data-parent-id]").length == 0){
			$(this).show();
		}
	})
	
	// ========================= WIDGET FILE / DELETE BOX
	// ==== Events 
	addFileDeleteStyle($("body p.filename").closest(".control-group"));
	$("body").on("click", ".form-delete-box input", function(){
		var index = $("body .form-delete-box input").index(this);
		$($(".filename").get(index))
			.toggleClass("line-through")
			.siblings("input").toggle();
	})
	
	
	// ========================= PARENT CLASS/ PARENT OPTION
	// ======= Liste
	$(".night-parent-list").change(function(){
		var listValue = $(this).find(":selected").text();							// Texte de l'option choisie
		var dataId = $(this).data("id");										// Identifieur de la liste parente

		// Affichage des enfants concernes (qui ont l'identifieur de la liste parente)
		$("[data-parent-id="+ dataId + "]").each(function(){
			var optsCompatibles = $(this).data("parent-option")
	
			if(optsCompatibles.indexOf(listValue) != -1){
				$(this).closest(".embedded-in-sonata").show();
			} else {
				$(this).removeAttr('checked').removeAttr('selected').val('').closest(".embedded-in-sonata").hide();
			}
		})
	})
	
});

// ========================= WIDGET FILE / DELETE BOX
function addFileDeleteStyle($div){
	$div.addClass("file-loaded");
}