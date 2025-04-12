<div class="container">
    <h1 class="mt-4"><?= $title ?></h1>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <?= $error ?><br>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('barang/update/' . $barang['id_barang']) ?>" method="post">
        <?= csrf_field() ?>
        <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control"
                value="<?= old('nama_barang', $barang['nama_barang'] ?? '') ?>" required>
        </div>
        <div class="form-group">
            <label>Quantity</label>
            <input type="number" name="qty" class="form-control" value="<?= old('qty', $barang['qty'] ?? '') ?>"
                required>
        </div>
        <div class="form-group">
            <label>Harga Beli</label>
            <input type="number" name="harga_beli" class="form-control"
                value="<?= old('harga_beli', $barang['harga_beli'] ?? '') ?>" required>
        </div>
        <div class="form-group">
            <label>Harga Jual</label>
            <input type="number" name="harga_jual" class="form-control"
                value="<?= old('harga_jual', $barang['harga_jual'] ?? '') ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?= base_url('barang') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>