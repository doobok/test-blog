<?php
/**
 * @var array $data - authors array
 */
?>

<?php
$data = file_get_contents('http://news.my/api/authors');
$data = json_decode($data, true);
?>

<?php include 'partials/header.php';?>

<h1>Authors</h1>

<div class="news-block">
    <ul>

    <?php foreach ($data['authors'] as $item): ?>
    <li>
        <a <?= 'href="/author/'. $item['id'] .'"'; ?>>
            <?= $item['name']; ?>
        </a>
    </li>
    <?php endforeach; ?>
    </ul>

</div>

<?php include 'partials/footer.php';?>
