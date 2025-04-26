<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Sistem Manajemen Artikel' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Additional CSS for sticky footer */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .flex-grow {
            flex: 1;
        }
    </style>
</head>

<body class="bg-gray-100 h-full">
    <nav class="bg-blue-600 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/artikel" class="text-xl font-bold">Manajemen Artikel</a>
            <!-- <div class="space-x-4">
                <a href="/artikel" class="hover:underline">Daftar Artikel</a>
                <a href="/artikel/create" class="hover:underline">Tambah Artikel</a>
            </div> -->
        </div>
    </nav>

    <main class="container mx-auto p-4 mt-4 flex-grow">
        <?php if (session()->getFlashdata('message')): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                <?= session()->getFlashdata('message') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?= $this->renderSection('content') ?>
    </main>

    <footer class="bg-gray-800 text-white p-4 mt-auto">
        <div class="container mx-auto text-center">
            &copy; <?= date('Y') ?> Sistem Manajemen Artikel
        </div>
    </footer>
</body>

</html>