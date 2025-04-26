<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold"><?= $title ?></h1>
        <a href="/rikisetiyopambudi/base/public/artikel/create"
            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
            <i class="fas fa-plus mr-2"></i>Tambah Artikel
        </a>
    </div>

    <!-- Filter Form -->
    <form method="get" action="/artikel" class="mb-6 bg-gray-50 p-4 rounded-lg">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="start_date" class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
                <input type="date" id="start_date" name="start_date" value="<?= $startDate ?>"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border">
            </div>
            <div>
                <label for="end_date" class="block text-sm font-medium text-gray-700">Tanggal Akhir</label>
                <input type="date" id="end_date" name="end_date" value="<?= $endDate ?>"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border">
            </div>
            <div class="flex items-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded h-10">
                    <i class="fas fa-filter mr-2"></i>Filter
                </button>
                <a href="/artikel"
                    class="ml-2 bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded h-10 flex items-center">
                    <i class="fas fa-sync-alt mr-2"></i>Reset
                </a>
            </div>
        </div>
    </form>

    <!-- Artikel Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penulis
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal
                        Publikasi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php foreach ($artikel as $item): ?>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="font-medium text-gray-900"><?= $item['judul'] ?></div>
                            <div class="text-sm text-gray-500"><?= $item['slug'] ?></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-500"><?= $item['author'] ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                            <?= $item['tanggal_publikasi'] ? date('d M Y H:i', strtotime($item['tanggal_publikasi'])) : '-' ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                            <?= $item['status'] === 'publish' ? 'bg-green-100 text-green-800' :
                                ($item['status'] === 'draft' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') ?>">
                                <?= ucfirst($item['status']) ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center space-x-2">
                                <!-- Detail Button -->
                                <a href="/rikisetiyopambudi/base/public/artikel/detail/<?= urlencode($item['slug']) ?>"
                                    class="p-2 text-blue-600 hover:text-blue-900 hover:bg-blue-50 rounded-full"
                                    title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <!-- Edit Button -->
                                <a href="/rikisetiyopambudi/base/public/artikel/edit/<?= $item['id'] ?>"
                                    class="p-2 text-yellow-600 hover:text-yellow-900 hover:bg-yellow-50 rounded-full"
                                    title="Edit Artikel">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <!-- Status Dropdown -->
                                <form action="/rikisetiyopambudi/base/public/artikel/<?= $item['id'] ?>/status"
                                    method="post" class="inline">
                                    <?= csrf_field() ?>
                                    <div class="relative">
                                        <select name="status" onchange="this.form.submit()"
                                            class="appearance-none rounded border border-gray-300 text-sm py-1 pl-2 pr-6 focus:border-blue-500 focus:ring-blue-500 hover:cursor-pointer hover:bg-gray-50"
                                            title="Ubah Status">
                                            <option value="draft" <?= $item['status'] === 'draft' ? 'selected' : '' ?>>Draft
                                            </option>
                                            <option value="publish" <?= $item['status'] === 'publish' ? 'selected' : '' ?>>
                                                Publish</option>
                                            <option value="archive" <?= $item['status'] === 'archive' ? 'selected' : '' ?>>
                                                Archive</option>
                                        </select>
                                        <div
                                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <i class="fas fa-chevron-down text-xs"></i>
                                        </div>
                                    </div>
                                </form>

                                <!-- Delete Button -->
                                <form action="/rikisetiyopambudi/base/public/artikel/<?= $item['id'] ?>" method="post"
                                    class="inline">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit"
                                        class="p-2 text-red-600 hover:text-red-900 hover:bg-red-50 rounded-full"
                                        title="Hapus Artikel"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>