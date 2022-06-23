<?php
/**
 * @var bool $result - Database is seed result
 */
?>

<?php
$result = file_get_contents('http://news.my/api/tables_create');
$result = json_decode($result, true)['success'];
?>

<?php include 'partials/header.php';?>

<h1>Database generation</h1>

<div class="main-page">
    <?php if ($result):?>
        <p>The database was successfully generated and filled with demo data.</p>
    <?php else:; ?>
        <p>Error failing to generate database</p>
    <?php endif; ?>
</div>

<?php include 'partials/footer.php';?>
