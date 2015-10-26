<!DOCTYPE html>
<html>
<head>
    <META http-equiv="X-UA-Compatible" content="IE=10" />   
    <META http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <META name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
	<link href="assets/js/bootstrap.js" rel="stylesheet"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head> 
<body>
    <div id="wrapper">
		<div id="page-wrapper" class="gray-bg">
            <div class="row">
                <div class="col-sm-offset-5 col-lg-2 padding-top">
					<div class="form-group">
						<input type="text" class="form-control" id="name" name="name" placeholder="Name">
					</div>
					<div class="form-group">
						<input type="email" class="form-control" id="email" name="email" placeholder="Email" onblur="exitval(1)">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="number" name="number" placeholder="Number" onblur="exitval(2)">
					</div>
					<div class="form-group">
						<select class="form-control" name="country" id="country">
							<option>Select Country</option>
							<option value="Austria">Austria</option>
							<option value="India">India</option>
							<option value="Japan">Japan</option>
							<option value="Paris">Paris</option>
						</select>
					</div>
					<button class="btn btn-success submitfrom" type="submit">Submit</button>
				
					<div class="msg hide">
						</br><p class="bg-success">Data inserted</p>
					</div>
					<div class="msg1">
						
					</div>
                </div>
            </div>
        </div>
    </div>  
  
</body>
<script>
    $(document).ready(function() {
       $(document).on( "click", ".submitfrom", function() {
			$.ajax({
				url: "home/insertdata",
				type: "POST",
				data:{name:$('#name').val(), email:$('#email').val(), number:$('#number').val(), country:$('#country').val()},
				async: false,
				success: function(data){
				   if(data == 'success'){
						$('.msg').removeClass('hide');
						$('#name').val('');$('#email').val('');$('#number').val('');$("#country").val($("#country option:first").val());
						setTimeout(function(){ $('.msg').addClass('hide'); }, 2000);
				   }
				}
			});
        });       
    });
	
	function exitval(val)
	{
		if(val == 1){
			var field = $('#email').val();
		}
		if(val == 2){
			var field = $('#number').val();
		}
		
		if(field != ''){
		$.ajax({
				url: "home/check_exit_values",
				type: "POST",
				data:{val:val, field:field},
				async: false,
				success: function(data){
				   if(data == 'exit'){
						if(val == 1){
							$('#email').val('');
							var msgval = 'Email';
						}
						if(val == 2){
							$('#number').val('');
							var msgval = 'Number';
						}
						$('.msg1').html('<p class="bg-success">'+msgval+' already exits</p>');
						setTimeout(function(){ $('.msg1').html(''); }, 2000);
				   }
				}
			});
		}
	}
</script>

