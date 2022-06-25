<?php
/**
 * @var array $categories - categories array
 */
?>

<?php
$categories = file_get_contents($_ENV['API_DOMAIN'] . '/api/categories');
$categories = json_decode($categories, true);
?>

<div class="my-3">
    <ul class="list-disc list-inside">
        <?php foreach ($categories['categories'] as $item): ?>

            <?php require __DIR__ . '/category-list-item.php'; ?>

        <?php endforeach; ?>
    </ul>
</div>