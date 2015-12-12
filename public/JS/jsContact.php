<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">

	$(document).ready(function(){
		$('#submit').click(function(){
			var name=document.getElementById('name').value;
			var lname=document.getElementById('lname').value;
			var mail=document.getElementById('mail').value;
			var message=document.getElementById('message').value;
			var chk = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			
			if(name==''){
				$('#er').html('Enter your name');
				return false;
			}
			if(lname==''){
				$('#er').html('Enter your last name');
				return false;
			}
			if(mail==''){
				$('#er').html('Enter your mail');
				return false;
			}
			if(!chk.test(mail)){
				$('#er').html('Enter valid email');
				return false;
			}
			if(message==''){
				$('#er').html('Enter your message');
				return false;
			}
		});
	});

</script>
