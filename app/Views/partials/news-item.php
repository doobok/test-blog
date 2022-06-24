<li class="flex py-3 my-2 bg-white rounded-md px-4">
    <div class="ml-4 flex flex-1 flex-col">
        <div>
            <div class="flex justify-between text-base font-medium text-gray-900">
                <h3>
                    <a <?= 'href="/article/' . $item['id'] . '"'; ?>>
                        <?= $item['title']; ?>
                    </a>
                </h3>
            </div>
            <p class="mt-1 text-sm text-gray-500 my-2"><?= $item['intro']; ?></p>
        </div>
        <div class="flex flex-1 items-end justify-between text-sm">
            <div class="flex">
                <a <?= 'href="/article/' . $item['id'] . '"'; ?>
                        class="font-medium text-indigo-600 hover:text-indigo-500">
                    Read more ...</a>
            </div>
        </div>
    </div>
</li>
