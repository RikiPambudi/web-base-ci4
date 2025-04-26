<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold"><?= $artikel['judul'] ?></h1>
        <div class="flex space-x-2">
            <a href="/artikel/edit/<?= $artikel['id'] ?>"
                class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
                <i class="fas fa-edit mr-2"></i>Edit
            </a>
            <a href="/artikel" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
        </div>
    </div>

    <div class="flex items-center text-gray-500 mb-6">
        <span class="mr-4">
            <i class="fas fa-user mr-1"></i> <?= $artikel['author'] ?>
        </span>
        <span class="mr-4">
            <i class="fas fa-calendar-alt mr-1"></i>
            <?= $artikel['tanggal_publikasi'] ? date('d M Y H:i', strtotime($artikel['tanggal_publikasi'])) : 'Belum dipublikasikan' ?>
        </span>
        <span class="px-2 py-1 text-xs font-semibold rounded-full 
            <?= $artikel['status'] === 'publish' ? 'bg-green-100 text-green-800' :
                ($artikel['status'] === 'draft' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') ?>">
            <?= ucfirst($artikel['status']) ?>
        </span>
    </div>

    <?php if ($artikel['meta_deskripsi']): ?>
        <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-6">
            <p class="font-semibold">Deskripsi:</p>
            <p><?= $artikel['meta_deskripsi'] ?></p>
        </div>
    <?php endif; ?>

    <div class="prose max-w-none mb-6">
        <?= $artikel['isi'] ?>
    </div>

    <?php if ($artikel['kata_kunci']): ?>
        <div class="mt-6 pt-6 border-t border-gray-200">
            <p class="font-semibold">Kata Kunci:</p>
            <div class="flex flex-wrap gap-2 mt-2">
                <?php foreach (explode(',', $artikel['kata_kunci']) as $kata): ?>
                    <span class="bg-gray-200 px-3 py-1 rounded-full text-sm"><?= trim($kata) ?></span>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>