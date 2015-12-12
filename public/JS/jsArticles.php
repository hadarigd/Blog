<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">

	$(document).ready(function() {
		$('#submit').click(function() {
			var author=document.getElementById('author').value;
			var article_title=document.getElementById('article_title').value;
			var text=document.getElementById('text').value;
			
			var chk = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			
			if(author==''){
				$('#er').html('Enter the author of the article');
				return false;
			}
			if(article_title==''){
				$('#er').html('Enter your article title');
				return false;
			}
			
			if(text==''){
				$('#er').html('Write your article');
				return false;
			}
		});
	});

</script>
