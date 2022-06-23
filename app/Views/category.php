<?php
/**
 * @var array $data - categories array
 */
?>

<?php
$data = file_get_contents('http://news.my/api/categories');
$data = json_decode($data, true);
?>

<?php include 'partials/header.php';?>

<h1>News categories</h1>

<div>
    <ul>
        <?php foreach ($data['categories'] as $item): ?>

            <?php include 'partials/category-list-item.php';?>

        <?php endforeach; ?>
    </ul>
</div>

<?php include 'partials/footer.php';?>
