<li>
    <a
            class="capitalize transition-color duration-200 hover:text-indigo-700"
        <?= 'href="/news/' . $item['id'] . '"'; ?>>
        <?= $item['name']; ?>
    </a>
</li>

<?php if (isset($item['children'])): ?>
    <ul class="list-disc list-inside ml-5">
        <?php foreach ($item['children'] as $item): ?>
            <?php require __DIR__ . '/category-list-item.php'; ?>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
