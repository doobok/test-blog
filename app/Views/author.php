<?php
/**
 * @var array $data - author news array
 */
?>

<?php
$data = file_get_contents($_ENV['API_DOMAIN'] . '/api/author/' . $id);
$data = json_decode($data, true);
?>

<?php require_once __DIR__ . '/partials/header.php'; ?>

<h1 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Author's Blog.</h1>

<ul class="mt-3">
    <?php foreach ($data['news'] as $item): ?>

        <?php require __DIR__ . '/partials/news-item.php'; ?>

    <?php endforeach; ?>
</ul>

<?php if (!$data['news']): ?>

    <?php require_once __DIR__ . '/partials/empty-category.php'; ?>

<?php endif; ?>

<?php require_once __DIR__ . '/partials/footer.php'; ?>
