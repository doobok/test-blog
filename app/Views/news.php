<?php
/**
 * @var array $data - news array
 */
?>

<?php
$data = file_get_contents('http://news.my/api/news/'. $id);
$data = json_decode($data, true);
?>

<?php include 'partials/header.php';?>

<h1>Новости</h1>

<div class="news-block">
    <?php foreach ($data['news'] as $item): ?>

        <?php include 'partials/news-item.php';?>

    <?php endforeach; ?>
</div>

<?php include 'partials/footer.php';?>
