<li>
    <a <?= 'href="/news/'. $item['id'] .'"'; ?>>
    <?= $item['name']; ?>
    </a>
</li>

<?php if(isset($item['children'])):?>
<ul>
    <?php foreach ($item['children'] as $item): ?>
        <?php include 'category-list-item.php';?>
    <?php endforeach; ?>
</ul>
<?php endif;?>
