<?= $this->extend('/index'); ?>
<?= $this->section('jenis_file'); ?>
Images
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<!-- Form -->
<hr>
<section>
    <!-- Pesan Jika Berhasil Input -->
    <?php if(session('berhasil')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Alright!</strong> <?= session('berhasil'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <!-- Pesan Jika Gagal Input -->
    <?php if(session('gagal')): ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Ohhh!</strong> <?= session('gagal'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <form class="mt-4" action="<?= BASE_URL('/form-post/images'); ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Default file input example</label>
                    <input class="form-control" name="nama_file" type="text" id="formFile">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Default file input example</label>
                    <input class="form-control" required name="gambar" type="file" id="formFile">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</section>

<!-- Table -->
<hr>
<section class="mt-4">
    <table class="table">
        <thead class="table table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama File</th>
                <th scope="col">Extension File</th>
                <th scope="col">Size File</th>
                <th scope="col" class="text-center">File</th>
                <th scope="col" class="text-center"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $dt): ?>
            <tr>
                <th scope="row"><?= $dt['id']; ?></th>
                <td><?= $dt['name_file']; ?></td>
                <td><?= $dt['extension_file']; ?></td>
                <td><?= $dt['size_file']; ?></td>
                <td>
                    <center><img src="<?= BASE_URL('images/'.$dt['file']); ?>" alt="" height="150" width="150"></center>
                </td>
                <td>
                    <form action="/form-delete/<?= $dt['id']; ?>/images" method="post">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="delete">
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
<?= $this->endSection(); ?>