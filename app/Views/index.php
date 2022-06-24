<?php
/**
 * @var bool $db - Database is missing
 */
?>

<?php
$db = file_get_contents($_ENV['API_DOMAIN']. '/api/tables');
$db = json_decode($db, true)['success'];
?>

<?php require_once __DIR__ . '/partials/header.php';?>

<h1 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Main page</h1>

<div class="main-page">
    <p class="text-lg">Hello this is start page!</p>

    <?php if (!$db):?>
    <div class="flex justify-center">
        <div class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Database is missing</h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">Database is missing, test data needs to be generated. Please push the button to generate them.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <a href="/seed" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">Generate</a>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="py-12 bg-white my-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">Make your choice</p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">Start searching for news from the relevant section</p>
            </div>

            <div class="mt-10">
                <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                    <div class="relative">
                        <dt>
                            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="2" aria-hidden="true">
                                    <path d="M21.604 13l-1.272 7h-16.663l-1.272-7h19.207zm-14.604-11h-6v7h2v-5h3.084c1.38 1.612 2.577 3 4.916 3h10v2h2v-4h-12c-1.629 0-2.305-1.058-4-3zm17 9h-24l2 11h20l2-11z"/>
                                </svg>
                            </div>
                            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Categories</p>
                        </dt>
                        <dd class="mt-2 ml-16 text-base text-gray-500">Categories rubricator. List of news categories</dd>
                        <a href="/category" class="pt-2 ml-16 text-base text-indigo-500">Read more...</a>
                    </div>

                    <div class="relative">
                        <dt>
                            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="2" aria-hidden="true">
                                    <path d="M10.119 16.064c2.293-.53 4.427-.994 3.394-2.946-3.147-5.941-.835-9.118 2.488-9.118 3.388 0 5.643 3.299 2.488 9.119-1.065 1.964 1.149 2.427 3.393 2.946 1.985.458 2.118 1.428 2.118 3.107l-.003.828h-1.329c0-2.089.083-2.367-1.226-2.669-1.901-.438-3.695-.852-4.351-2.304-.239-.53-.395-1.402.226-2.543 1.372-2.532 1.719-4.726.949-6.017-.902-1.517-3.617-1.509-4.512-.022-.768 1.273-.426 3.479.936 6.05.607 1.146.447 2.016.206 2.543-.66 1.445-2.472 1.863-4.39 2.305-1.252.29-1.172.588-1.172 2.657h-1.331c0-2.196-.176-3.406 2.116-3.936zm-10.117 3.936h1.329c0-1.918-.186-1.385 1.824-1.973 1.014-.295 1.91-.723 2.316-1.612.212-.463.355-1.22-.162-2.197-.952-1.798-1.219-3.374-.712-4.215.547-.909 2.27-.908 2.819.015.935 1.567-.793 3.982-1.02 4.982h1.396c.44-1 1.206-2.208 1.206-3.9 0-2.01-1.312-3.1-2.998-3.1-2.493 0-4.227 2.383-1.866 6.839.774 1.464-.826 1.812-2.545 2.209-1.49.345-1.589 1.072-1.589 2.334l.002.618z"/>
                                </svg>
                            </div>
                            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Authors</p>
                        </dt>
                        <dd class="mt-2 ml-16 text-base text-gray-500">List of our news authors</dd>
                        <a href="/authors" class="pt-2 ml-16 text-base text-indigo-500">Read more...</a>
                    </div>

                </dl>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/partials/footer.php';?>
