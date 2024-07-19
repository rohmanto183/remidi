
<?php $__env->startSection('title', 'Anggota'); ?>

<?php $__env->startSection('isihalaman'); ?>
    <h3><center>Daftar Anggota Perpustakaan Universitas Semarang</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAnggotaTambah"> 
        Tambah Data anggota 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Anggota</td>
                <td align="center">NIM</td>
                <td align="center">Nama Anggota</td>
                <td align="center">Prodi</td>
                <td align="center">HP</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            <?php $__currentLoopData = $anggota; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td align="center" scope="row"><?php echo e($index + $anggota->firstItem()); ?></td>
                    <td><?php echo e($a->id_anggota); ?></td>
                    <td><?php echo e($a->nim); ?></td>
                    <td><?php echo e($a->nama_anggota); ?></td>
                    <td><?php echo e($a->prodi); ?></td>
                    <td><?php echo e($a->hp); ?></td>
                    <td align="center">
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalAnggotaEdit<?php echo e($a->id_anggota); ?>"> 
                            Edit
                        </button>
                         <!-- Awal Modal EDIT data Anggota -->
                        <div class="modal fade" id="modalAnggotaEdit<?php echo e($a->id_anggota); ?>" tabindex="-1" role="dialog" aria-labelledby="modalAnggotaEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalAnggotaEditLabel">Form Edit Data Anggota</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formanggotaedit" id="formanggotaedit" action="/anggota/edit/<?php echo e($a->id_anggota); ?> " method="post" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <?php echo e(method_field('PUT')); ?>

                                            <div class="form-group row">
                                                <label for="id_anggota" class="col-sm-4 col-form-label">nim</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukan NIM">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="nama_anggota" class="col-sm-4 col-form-label">Nama Anggota</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" value="<?php echo e($a->nama_anggota); ?>">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="prodi" class="col-sm-4 col-form-label">Prodi</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="prodi" name="prodi" value="<?php echo e($a->prodi); ?>">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="hp" class="col-sm-4 col-form-label">Hp</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="hp" name="hp" value="<?php echo e($a->hp); ?>">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="anggotatambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data buku -->
                        |
                        <a href="anggota/hapus/<?php echo e($a->id_anggota); ?>" onclick="return confirm('Yakin mau dihapus?')">
                            <button class="btn-danger">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <!--awal pagination-->
    Halaman : <?php echo e($anggota->currentPage()); ?> <br />
    Jumlah Data : <?php echo e($anggota->total()); ?> <br />
    Data Per Halaman : <?php echo e($anggota->perPage()); ?> <br />

    <?php echo e($anggota->links()); ?>

    <!--akhir pagination-->

    <!-- Awal Modal tambah data anggota -->
    <div class="modal fade" id="modalAnggotaTambah" tabindex="-1" role="dialog" aria-labelledby="modalAnggotaTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAnggotaTambahLabel">Form Input Data Aggota</h5>
                </div>
                <div class="modal-body">
                    <form name="formanggotatambah" id="formanggotatambah" action="/anggota/tambah " method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <label for="id_anggota" class="col-sm-4 col-form-label">NIM</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukan NIM">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="nama_anggota" class="col-sm-4 col-form-label">Nama Anggota</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" placeholder="Masukan Nama Anggota">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="prodi" class="col-sm-4 col-form-label">Prodi</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="prodi" name="prodi" placeholder="Masukan Prodi">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="hp" class="col-sm-4 col-form-label">HP</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="hp" name="hp" placeholder="Masukan HP">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="anggotatambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data buku -->
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\praktikum framework\perpus\resources\views/halaman/view_anggota.blade.php ENDPATH**/ ?>