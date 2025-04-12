<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Flash Message</title>
</head>

<body>

    <?php
    if (session()->getFlashData('success')) {
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert"> <?= session()->getFlashData('success') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
    }
    ?>

    <?php
    if (session()->getFlashData('danger')) {
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert"> <?= session()->getFlashData('danger') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
    }
    ?>

    <?php
    if (session()->getFlashData('info')) {
        ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert"> <?= session()->getFlashData('info') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
    }
    ?>
    <div class="m-8">
        <a href="<?= base_url('setpesan/success') ?>" class="btn btn-success m-1">Kirim Pesan Success</a>
        <a href="<?= base_url('setpesan/info') ?>" class="btn btn-info m-1">Kirim Pesan Info</a>
        <a href="<?= base_url('setpesan/danger') ?>" class="btn btn-danger m-1">Kirim Pesan Danger</a>
        <table class="table table-striped mt-3">
            <tr>
                <th>Nama</th>
            </tr>
            <th>Umur</th>
            <tr>
                <td>Budi</td>
                <th>12</th>
            </tr>
        </table>
    </div>

    <h2>Kalkulator Sederhana</h2>
    <form action="<?= base_url('home/calculate'); ?>" method="post">
        <input type="number" name="num1" required>
        <select name="operator">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input type="number" name="num2" required>
        <button type="submit">Hitung</button>
    </form>



    <?php if (isset($result)): ?>
        <h3>Hasil: <?= $result; ?></h3>
    <?php endif; ?>



</body>

</html>