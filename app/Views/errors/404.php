<?php
header("HTTP/1.1 404 Not Found");
?>
<?php require_once __DIR__ . '/../partials/header.php'; ?>

<div class="flex h-72">
    <div class="m-auto text-center">
        <h1 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">404 Error</h1>
        <a class="hover:text-indigo-700" href="/">Go to main page</a>
    </div>

</div>
<?php require_once __DIR__ . '/../partials/footer.php'; ?>
