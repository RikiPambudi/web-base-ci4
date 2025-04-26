<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6"><?= $title ?></h1>

    <form action="/rikisetiyopambudi/base/public/artikel/update/<?= $artikel['id'] ?>" method="post">
        <?= csrf_field() ?>

        <div class="grid grid-cols-1 gap-6">
            <!-- Judul -->
            <div>
                <label for="judul" class="block text-sm font-medium text-gray-700">Judul Artikel</label>
                <input type="text" id="judul" name="judul"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border"
                    value="<?= old('judul', $artikel['judul']) ?>">
            </div>

            <!-- Slug -->
            <div>
                <label for="slug" class="block text-sm font-medium text-gray-700">Slug (URL)</label>
                <input type="text" id="slug" name="slug"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border"
                    value="<?= old('slug', $artikel['slug']) ?>">
                <p class="mt-1 text-sm text-gray-500">URL ramah SEO untuk artikel ini</p>
            </div>

            <!-- Isi Artikel -->
            <div>
                <label for="isi" class="block text-sm font-medium text-gray-700">Isi Artikel</label>
                <textarea id="isi" name="isi" rows="10"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border"><?= old('isi', $artikel['isi']) ?></textarea>
            </div>

            <!-- Author -->
            <div>
                <label for="author" class="block text-sm font-medium text-gray-700">Penulis</label>
                <input type="text" id="author" name="author"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border"
                    value="<?= old('author', $artikel['author']) ?>">
            </div>

            <!-- Tanggal Publikasi -->
            <div>
                <label for="tanggal_publikasi" class="block text-sm font-medium text-gray-700">Tanggal Publikasi</label>
                <input type="datetime-local" id="tanggal_publikasi" name="tanggal_publikasi"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border"
                    value="<?= old('tanggal_publikasi', $artikel['tanggal_publikasi'] ? date('Y-m-d\TH:i', strtotime($artikel['tanggal_publikasi'])) : '') ?>">
                <p class="mt-1 text-sm text-gray-500">Kosongkan untuk mempublikasikan sekarang</p>
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select id="status" name="status"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border">
                    <option value="draft" <?= old('status', $artikel['status']) === 'draft' ? 'selected' : '' ?>>Draft
                    </option>
                    <option value="publish" <?= old('status', $artikel['status']) === 'publish' ? 'selected' : '' ?>>
                        Publish</option>
                    <option value="archive" <?= old('status', $artikel['status']) === 'archive' ? 'selected' : '' ?>>
                        Archive</option>
                </select>
            </div>

            <!-- Meta Deskripsi -->
            <div>
                <label for="meta_deskripsi" class="block text-sm font-medium text-gray-700">Meta Deskripsi (SEO)</label>
                <textarea id="meta_deskripsi" name="meta_deskripsi" rows="3"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border"><?= old('meta_deskripsi', $artikel['meta_deskripsi']) ?></textarea>
                <p class="mt-1 text-sm text-gray-500">Deskripsi singkat untuk mesin pencari (maks. 255 karakter)</p>
            </div>

            <!-- Kata Kunci -->
            <div>
                <label for="kata_kunci" class="block text-sm font-medium text-gray-700">Kata Kunci (SEO)</label>
                <input type="text" id="kata_kunci" name="kata_kunci"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border"
                    value="<?= old('kata_kunci', $artikel['kata_kunci']) ?>">
                <p class="mt-1 text-sm text-gray-500">Pisahkan dengan koma (contoh: artikel, blog, tutorial)</p>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end space-x-4">
                <a href="/rikisetiyopambudi/base/public/artikel/detail/<?= $artikel['slug'] ?>"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded">
                    <i class="fas fa-times mr-2"></i>Batal
                </a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded">
                    <i class="fas fa-save mr-2"></i>Simpan Perubahan
                </button>
            </div>
        </div>
    </form>
</div>

<script>
    // Auto generate slug from judul
    document.getElementById('judul').addEventListener('input', function () {
        const judul = this.value;
        const slug = judul.toLowerCase()
            .replace(/[^\w\s-]/g, '') // Remove non-word chars
            .replace(/[\s_-]+/g, '-') // Replace spaces and underscores with -
            .replace(/^-+|-+$/g, ''); // Trim - from start and end

        document.getElementById('slug').value = slug;
    });
</script>
<?= $this->endSection() ?>