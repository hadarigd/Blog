{{ foreach article }}
	<h3 align="center">Edit Articles</h3>
	<main class="articles">
		<div class="container">
			<div id="er" align="center"></div>
			<br/>
			<form action="index.php?page=admin" method="post">
				<table id="tbl" align="center">
					<input hidden type='text' name='id' value='{{ID}}'>
					<tr><td>Author:</td><td><input type="text" name="author" id="author" value='{{author}}'></td></tr>
					<tr><td>Article title:</td><td><input type="text" name="article_title_update" id="article_title" value='{{article_title}}'></td></tr>
					<tr><td>Text:</td><td><textarea rows="10" cols="100" name="text" id="text"  >{{text}}</textarea></td></tr>
					<tr><td></td><td><input type="submit" name="submit" id="submit" value="Submit"></td></tr>
				</table>
			</form>
		</div>
	</main>
{{ endforeach }}
