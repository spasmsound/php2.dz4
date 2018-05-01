<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin-panel</title>
</head>
<body>

<h1 align="center">Админ-панель</h1>
<br>
<table border="solid">
    <th>ID</th>
    <th>TITLE</th>
    <th>LEAD</th>
    <th>AUTHOR</th>
    <th>EDIT</th>

    <?php foreach($this->articles as $article){ ?>
    <tr><td>
            <?php echo $article->id; ?>
        </td>
        <td>
            <?php echo$article->title; ?>
        </td>
        <td>
            <?php echo$article->content; ?>
        </td>
        <td>
            <?php echo$article->author->name ?>
        </td>
        <td><a href="/admin/edit/?id=<?php echo $article->id; ?> "> <button> EDIT </button> </a></td>
    <tr>
        <?php }; ?>
    </tr>
</table>
<br>
<div class="inputform" align="center"> <h2> Форма добавления </h2>
    <form>
        <p><textarea title="title" name="title" rows="3" cols="150" required > Article Title </textarea>
        <p><textarea title="content" name="content" rows="20" cols="150" required > Article Lead </textarea>
        <p><input title="author_id" name="author_id" value="author id"/></p>
        <p class="form-submit">
            <input type="submit" formmethod="POST" formaction="/admin/save" value="ADD">
        </p>
    </form>
</div>

</body>
</html>