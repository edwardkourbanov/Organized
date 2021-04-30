$(function(){
	
	var entityMap = {
		'&': '&amp;',
		'<': '&lt;',
		'>': '&gt;',
		'"': '&quot;',
		"'": '&#39;',
		'/': '&#x2F;',
		'`': '&#x60;',
		'=': '&#x3D;'
	};

	function escapeHtml (string) {
		return String(string).replace(/[&<>"'`=\/]/g, function (s) {
			return entityMap[s];
		});
	}
	
	//Makes Create List Button clickable
	$(".add_list").click(function(){
		window.location = 'create_list_handler.php'
	});
	
	//Makes Create List Button LOOK clickable
	$(".add_list").hover(function(){
		$(".add_list").toggleClass("add_list_select");
	}, function(){
		$(".add_list").removeClass("add_list_select");
	});
	
	// FOLDER SECTION
	//Makes Create List Button clickable
	//$(".add_list_folder").click(function(){
	//	window.location = 'create_list_folder_handler.php'
	//});
	
	//Makes Create List Button LOOK clickable
	$(".add_list_folder").hover(function(){
		$(".add_list_folder").toggleClass("add_list_select");
	}, function(){
		$(".add_list_folder").removeClass("add_list_select");
	});
	
	///////////////////////////////////////////////
	//Editable text
	///////////////////////////////////////////////
	//Loop through all Labels with class 'editable'.
    $(".editable").each(function () {
        //Reference the Label.
        var label = $(this);
 
        //Add a TextBox next to the Label.
        label.after("<input type = 'text' style = 'display:none' />");
 
        //Reference the TextBox.
        var textbox = $(this).next();
 
        //Set the name attribute of the TextBox.
        textbox[0].name = this.id.replace("lbl", "txt");
 
        //Assign the value of Label to TextBox.
        textbox.val(label.html());
 
        //When Label is clicked, hide Label and show TextBox.
        label.click(function () {
            $(this).hide();
            $(this).next().show();
			$(textbox).focus();
        });
 
        //When focus is lost from TextBox, hide TextBox and show Label.
        textbox.focusout(function () {
            $(this).hide();
			if($(this).val() === "")
			{
				$(this).val("Title");
			}
            $(this).prev().html(escapeHtml($(this).val()));
            $(this).prev().show();
        });
		
    });
	
});