
{{ foreach article }}
    <table class="articles" align="center">
        <tr><td>Author: {{author}}</td></tr>
        <tr><td>Title: {{article_title}}</td></tr>
        <tr><td><br/>{{text}}<hr/></td></tr>
    </table>
{{ endforeach }}

