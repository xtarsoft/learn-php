<?php require view_path('layouts/app/head.php') ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="max-w-sm mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="px-4 py-2">
                <h1 class="text-gray-900 font-bold text-2xl">Create a new note</h1>
                <form action="/notes/create" method="POST" class="mt-6">
                    <div class="mb-4">
                        <label for="body" class="block text-gray-700 text-sm font-bold mb-2">Note</label>
                        <textarea name="body" id="body" cols="30" rows="10" placeholder="Here's an idea for a note..."
                                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                        <input name="writer" id="writer" type="hidden" value="John Doe">
                    </div>
                    <div class="flex items center justify-between">
                        <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Create note
                        </button>
                        <a href="/notes"
                           class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                           type="button">
                            Cancel
                        </a>
                    </div>
</main>

<?php require view_path('layouts/app/footer.php') ?>
