<?php require view_path('layouts/app/head.php') ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <ul>
            <?php if (empty($notes)): ?>
                <li>No notes found.</li>
            <?php else: ?>
            <?php foreach ($notes as $note): ?>
                <li>
                    <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
                        <?= htmlspecialchars($note['body']) ?>
                    </a>
                </li>
            <?php endforeach; ?>
            <?php endif; ?>
        </ul>
        <p class="mt-6">
            <a href="/notes/create" class="text-blue-500 hover:underline">Create a new note</a>
        </p>
    </div>
</main>

<?php require view_path('layouts/app/footer.php') ?>
