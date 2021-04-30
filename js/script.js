$(function(){
	
	///////////////////////////////////////////////////////////////////////////
	/*                        MENU BAR Functionality */
	///////////////////////////////////////////////////////////////////////////
	//Home Button Functionality
	$("#home").click(function(){
		window.location = 'signed_in.php'
	});
	$("#home").hover(function(){
		$("#home").toggleClass("menubar_select");
	}, function(){
		$("#home").removeClass("menubar_select");
	});

	//Sign-In Button Functionality
	$("#sign_in_menubar_button").click(function(){
		window.location = 'sign_in.php'
	});
	$("#sign_in_menubar_button").hover(function(){
		$("#sign_in_menubar_button").toggleClass("menubar_select");
	}, function(){
		$("#sign_in_menubar_button").removeClass("menubar_select");
	});

	//Register Button Functionality
	$("#register_menubar_button").click(function(){
		window.location = 'register.php'
	});
	$("#register_menubar_button").hover(function(){
		$("#register_menubar_button").toggleClass("menubar_select");
	}, function(){
		$("#register_menubar_button").removeClass("menubar_select");
	});
	
	//Create Folder Button Functionality
	$("#create_folder_menubar_button").click(function(){
		window.location = 'create_folder_signed_in.php'
	});
	$("#create_folder_menubar_button").hover(function(){
		$("#create_folder_menubar_button").toggleClass("menubar_select");
	}, function(){
		$("#create_folder_menubar_button").removeClass("menubar_select");
	});
	
	//Calendar Button Functionality
	$("#calendar_menubar_button").click(function(){
		window.location = 'calendar.php'
	});
	$("#calendar_menubar_button").hover(function(){
		$("#calendar_menubar_button").toggleClass("menubar_select");
	}, function(){
		$("#calendar_menubar_button").removeClass("menubar_select");
	});

	//Signout Button Functionality
	$("#menubar_signed_in").click(function(){
		window.location = 'logout_handler.php'
	});
	$("#menubar_signed_in").hover(function(){
		$("#menubar_signed_in").toggleClass("menubar_select");
	}, function(){
		$("#menubar_signed_in").removeClass("menubar_select");
	});
	
	
});