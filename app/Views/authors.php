<?php
/**
 * @var array $data - authors array
 */
?>

<?php
$data = file_get_contents($_ENV['API_DOMAIN']. '/api/authors');
$data = json_decode($data, true);
?>

<?php require_once __DIR__ . '/partials/header.php';?>

<h1 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Authors</h1>
<p class="text-lg">This is our authors</p>

<div class="news-block">
    <div class="flex flex-wrap my-3">

    <?php foreach ($data['authors'] as $item): ?>
    <a class="flex flex-nowrap space-x-3 p-3 items-center w-full sm:w-1/2 lg:w-1/3" <?= 'href="/author/'. $item['id'] .'"'; ?>>
<!--        <div>-->
            <div class="flex w-12 h-12">
                <img class="inline-block h-10 w-10 rounded-full ring-2 ring-white" src="<?= $item['photo']; ?>">
            </div>

        <div class="bg-white rounded-md w-full shadow-sm p-1">
            <p class="text-lg mb-1">
                <?= $item['name']; ?>
            </p>
            <p class="text-sm">
                <?= $item['about']; ?>
            </p>
        </div>

    </a>
    <?php endforeach; ?>
    </div>

</div>

<?php require_once __DIR__ . '/partials/footer.php';?>
