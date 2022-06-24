<?php
/**
 * @var array $data - blog article
 */
?>

<?php
$data = file_get_contents($_ENV['API_DOMAIN'] . '/api/article/' . $id);
$data = json_decode($data, true);
?>

<?php require_once __DIR__ . '/partials/header.php'; ?>

<h1 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate"><?= $data['article'][0]['title']; ?></h1>

<div class="bg-white rounded-md mt-7">
    <div class="pt-6">

        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8">
            <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                <div class="space-y-6">
                    <p class="text-base italic text-lg text-gray-900"><?= $data['article'][0]['intro']; ?></p>
                </div>
            </div>
            <div class="mt-4 lg:mt-0 lg:row-span-3">
                <div>
                    <a
                            class=" flex items-center uppercase transition-color duration-200 text-gray-700 hover:text-indigo-700"
                        <?= 'href="/author/' . $data['article'][0]['author_id'] . '"'; ?>>
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="20" height="20" fill="currentColor"
                             viewBox="0 0 24 24">
                            <path d="M19 7.001c0 3.865-3.134 7-7 7s-7-3.135-7-7c0-3.867 3.134-7.001 7-7.001s7 3.134 7 7.001zm-1.598 7.18c-1.506 1.137-3.374 1.82-5.402 1.82-2.03 0-3.899-.685-5.407-1.822-4.072 1.793-6.593 7.376-6.593 9.821h24c0-2.423-2.6-8.006-6.598-9.819z"/>
                        </svg>
                        Author page
                    </a>
                </div>
            </div>
            <div class="py-10 lg:pt-6 lg:pb-16 lg:col-start-1 lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                <div class="mt-10">
                    <span class="text-sm font-medium text-gray-900">---</span>

                    <div class="mt-4">
                        <p class="text-base text-gray-900"><?= $data['article'][0]['text']; ?></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/partials/footer.php'; ?>
