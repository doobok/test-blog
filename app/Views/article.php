<?php
/**
 * @var array $data - blog article
 */
?>

<?php
$data = file_get_contents('http://news.my/api/article/'. $id);
$data = json_decode($data, true);
?>

<?php include 'partials/header.php';?>

<h1><?= $data['article'][0]['title'];?></h1>

<div class="news-block">
    <p><?= $data['article'][0]['id'];?></p>


</div>

<?php include 'partials/footer.php';?>
