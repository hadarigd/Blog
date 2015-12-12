{{ foreach article }}
    <table class="articles" align="center">
        <tr><td>Author: {{author}}</td></tr>
        <tr><td>Title: {{article_title}}</td></tr>
        <tr><td><br/>{{text}}</td></tr>
    </table>
    <a href='index.php?page=admin&edit_article=yes&edit_id={{ID}}'><button align="center" id="EditArticleButton">Edit Article</button></a>
    <br/>
    <a href='index.php?page=admin&delete_article=yes&delete_id={{ID}}'><button id="DeleteArticleButton">Delete Article</button></a>
{{ endforeach }}
<div align="center" class="insert">
    <h3 align="center">Insert articles</h3>
	<main class="articles">
		<div class="container">
			<div id="er" align="center"></div>
			<br/>
			<form action="#" method="post">
				<table id="tbl" align="center">
					<tr><td>Author:</td><td><input type="text" name="author" id="author"></td></tr>
					<tr><td>Article title:</td><td><input type="text" name="article_title_add" id="article_title"></td></tr>
					<tr><td>Text:</td><td><textarea rows="10" cols="100" name="text" id="text"></textarea></td></tr>
					<tr><td></td><td><input type="submit" name="submit" id="submit" value="Insert"></td></tr>
				</table>
			</form>
		</div>
	</main>
</div>
