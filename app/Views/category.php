<?php
/**
 * @var array $data - categories array
 */
?>

<?php
$data = file_get_contents($_ENV['API_DOMAIN'] . '/api/categories');
$data = json_decode($data, true);
?>

<?php require_once __DIR__ . '/partials/header.php'; ?>

<h1 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">News categories</h1>
<p class="text-lg">Select your category!</p>

<div class="my-3">
    <ul class="list-disc list-inside">
        <?php foreach ($data['categories'] as $item): ?>

            <?php include 'partials/category-list-item.php'; ?>

        <?php endforeach; ?>
    </ul>
</div>

<?php require_once __DIR__ . '/partials/footer.php'; ?>
