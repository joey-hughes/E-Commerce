/* Parse and submit comment. */
function submitComment () {
	// Remove any previous errors (the user might have fixed them).
	$("#errors").empty();
	
	var error = false;
	// Check that their name only has letters & numbers.
	var reg = /^[a-zA-Z0-9]+$/;
	if (!reg.test($("#name_input").val())) {
		error = true;
		$("#errors").append("ERROR: name can only contain a-z, A-Z, 0-9<br>");
	}
	
	if ($("#text_input").val() == "") {
		error = true;
		$("#errors").append("ERROR: text field is empty!");
	}
	
	// If no error, submit.
	if (!error) {
		var data_in = {}
		// Prepare POST data.
		data_in["user"] = $("#name_input").val();
		data_in["rating"] = $("#rating_input").val();
		data_in["content"] = $("#text_area").val();
		data_in["game_id"] = $("#game_id").val();
		
		// Note to self: might need to adjust address....relative to address
		// of page that calls function, or to the JS file itself.
		$.post("submitComment.php", data_in, function(data_out, status) {
			if (status == "success") {
				// Clear forms and give confirmation message.
				$("#name_input").val("");
				$("#text_area").val("");
				$("#errors").append(data_out);
			}
			else {
				$("#errors").append("Failed to submit comment.");
			}
		});
	}
}