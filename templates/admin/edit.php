<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Отредактировать новость </title>
</head>
<body>

<div align="center"> <h2> Форма редактирования </h2>
    <form>
        <p> <strong> article id  <?php echo $this->article->id ?> </strong> </p>
        <p><textarea title="title" name="title" rows="3" cols="150" required > <?= $this->article->title; ?> </textarea>
        <p><textarea title="content" name="content" rows="20" cols="150" required > <?= $this->article->content; ?> </textarea>
        <p><input title="author_id" name="author_id" size="1" value="<?= $this->article->author_id ?> " />Author ID</p>
        <p class="form-submit">
            <input type="submit" formmethod="post" formaction="/admin/save/?id=<?= $this->article->id ?>" value="edit">
        </p>
    </form>
</div>

</body>
</html>