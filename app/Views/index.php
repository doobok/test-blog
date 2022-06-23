<?php
/**
 * @var bool $db - Database is missing
 */
?>

<?php
$db = file_get_contents('http://news.my/api/tables');
$db = json_decode($db, true)['success'];
?>

<?php include 'partials/header.php';?>

<h1>Main page</h1>

<div class="main-page">
    <p>Hello this is start page!</p>

    <?php if (!$db):?>
    <p>Database is missing, test data needs to be generated.
        <a href="/seed">Click to generate them.</a>
    </p>
    <?php endif; ?>
</div>

<?php include 'partials/footer.php';?>
