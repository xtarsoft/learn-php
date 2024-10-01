<?php require view_path('layouts/app/head.php') ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p><?=isset($note['body']) ? htmlspecialchars($note['body']) : 'Note load error'?></p>
        <p class="mt-6">
            <a href="../../public/index.php" class="text-blue-500 hover:underline">Back to notes...</a>
        </p>
    </div>
</main>

<?php require view_path('layouts/app/footer.php') ?>