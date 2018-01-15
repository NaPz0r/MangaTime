<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <link href="microcms.css" rel="stylesheet" />
    <title>MangaTime - Homepage</title>
</head>
<body>
    <header>
        <h1>MangaTime</h1>
    </header>
    <?php foreach ($mangas as $manga): ?>
    <article>
        <h2><?php echo $manga->getNameManga() ?></h2>
        <p><?php echo $manga->getDatePublicationManga() ?></p>
        <p><?php echo $manga->getDescriptionManga() ?></p>
    </article>
    <?php endforeach ?>
</body>
</html>