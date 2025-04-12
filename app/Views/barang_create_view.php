<div class="container">
    <h1 class="mt-4"><?= $title ?></h1>

    <?php if (isset($errors)): ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error): ?>
                <?= $error ?><br>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form action="/rikisetiyopambudi/base/public/barang/store" method="post">
        <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Quantity</label>
            <input type="number" name="qty" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Harga Beli</label>
            <input type="number" name="harga_beli" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Harga Jual</label>
            <input type="number" name="harga_jual" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/rikisetiyopambudi/base/public/barang" class="btn btn-secondary">Batal</a>
    </form>
</div>