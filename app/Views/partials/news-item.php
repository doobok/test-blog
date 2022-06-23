<div class="news-item" style="border: 1px solid black">
    <div class="title">
        <a <?= 'href="/article/'. $item['id'] .'"'; ?>>
            <?= $item['title']; ?>
        </a>
    </div>

    <div class="description">
        <span><?= $item['intro']; ?></span>
    </div>
</div>

<br/>