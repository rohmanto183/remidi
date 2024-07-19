
<?php $__env->startSection('title', 'Peminjaman'); ?>

<?php $__env->startSection('isihalaman'); ?>
    <h3><center>Data Peminjaman Buku</center><h3>
    <h3><center>Perpustakaan Universitas Semarang</center></h3>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPinjamTambah"> 
        Tambah Data Peminjaman 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Pinjam</td>
                <td align="center">Nama Petugas</td>
                <td align="center">Nama Anggota</td>
                <td align="center">Judul Buku</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            <?php $__currentLoopData = $pinjam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td align="center" scope="row"><?php echo e($index + $pinjam->firstItem()); ?></td>
                    <td align="center"><?php echo e($p->id_pinjam); ?></td>
                    <td><?php echo e($p->petugas->nama_petugas); ?></td>
                    <td><?php echo e($p->anggota->nama_anggota); ?></td>
                    <td><?php echo e($p->buku->judul); ?></td>
                    <td align="center">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalPinjamEdit<?php echo e($p->id_pinjam); ?>"> 
                            Edit
                        </button>

                        <!-- Awal Modal EDIT data Peminjaman -->
                        <div class="modal fade" id="modalPinjamEdit<?php echo e($p->id_pinjam); ?>" tabindex="-1" role="dialog" aria-labelledby="modalPinjamEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalPinjamEditLabel">Form Edit Data Peminjaman</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formpinjamedit" id="formpinjamedit" action="/pinjam/edit/<?php echo e($p->id_pinjam); ?> " method="post" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <?php echo e(method_field('PUT')); ?>

                                            <div class="form-group row">
                                                <label for="id_pinjam" class="col-sm-4 col-form-label">ID Pinjam</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="id_pinjam" name="id_pinjam" value="<?php echo e($p->id_pinjam); ?>" readonly>
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="petugas" class="col-sm-4 col-form-label">Nama Petugas</label>
                                                <div class="col-sm-8">
                                                    <select type="text" class="form-control" id="id_petugas" name="id_petugas">
                                                        <?php $__currentLoopData = $petugas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($pt->id_petugas == $p->id_petugas): ?>
                                                                <option value="<?php echo e($pt->id_petugas); ?>" selected><?php echo e($pt->nama_petugas); ?></option>
                                                            <?php else: ?>
                                                                <option value="<?php echo e($pt->id_petugas); ?>"><?php echo e($pt->nama_petugas); ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="anggota" class="col-sm-4 col-form-label">Nama Anggota</label>
                                                <div class="col-sm-8">
                                                    <select type="text" class="form-control" id="id_anggota" name="id_anggota">
                                                        <?php $__currentLoopData = $anggota; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($a->id_anggota == $p->id_anggota): ?>
                                                                <option value="<?php echo e($a->id_anggota); ?>" selected><?php echo e($a->nama_anggota); ?></option>
                                                            <?php else: ?>
                                                                <option value="<?php echo e($a->id_anggota); ?>"><?php echo e($a->nama_anggota); ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="judul" class="col-sm-4 col-form-label">Judul Buku</label>
                                                <div class="col-sm-8">
                                                    <select type="text" class="form-control" id="id_buku" name="id_buku">
                                                        <?php $__currentLoopData = $buku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($bk->id_buku == $p->id_buku): ?>
                                                                <option value="<?php echo e($bk->id_buku); ?>" selected><?php echo e($bk->judul); ?></option>
                                                            <?php else: ?>
                                                                <option value="<?php echo e($bk->id_buku); ?>"><?php echo e($bk->judul); ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="pinjamtambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data Peminjaman -->
                        |
                        <a href="pinjam/hapus/<?php echo e($p->id_pinjam); ?>" onclick="return confirm('Yakin mau dihapus?')">
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
    Halaman : <?php echo e($pinjam->currentPage()); ?> <br />
    Jumlah Data : <?php echo e($pinjam->total()); ?> <br />
    Data Per Halaman : <?php echo e($pinjam->perPage()); ?> <br />

    <?php echo e($pinjam->links()); ?>

    <!--akhir pagination-->

    <!-- Awal Modal tambah data Peminjaman -->
    <div class="modal fade" id="modalPinjamTambah" tabindex="-1" role="dialog" aria-labelledby="modalPinjamTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPinjamTambahLabel">Form Input Data Peminjaman</h5>
                </div>
                <div class="modal-body">

                    <form name="formpinjamtambah" id="formpinjamtambah" action="/pinjam/tambah " method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <label for="id_petugas" class="col-sm-4 col-form-label">Nama Petugas</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="id_petugas" name="id_petugas" placeholder="Pilih Nama Petugas">
                                    <option></option>
                                    <?php $__currentLoopData = $petugas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($pt->id_petugas); ?>"><?php echo e($pt->nama_petugas); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="id_anggota" class="col-sm-4 col-form-label">Nama Anggota</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="id_anggota" name="id_anggota" placeholder="Pilih Nama Anggota">
                                    <option></option>
                                    <?php $__currentLoopData = $anggota; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($a->id_anggota); ?>"><?php echo e($a->nama_anggota); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="id_buku" class="col-sm-4 col-form-label">Judul Buku</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="id_buku" name="id_buku" placeholder="Pilih Judul Buku">
                                    <option></option>
                                    <?php $__currentLoopData = $buku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($bk->id_buku); ?>"><?php echo e($bk->judul); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="pinjamtambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data Peminjaman -->
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\praktikum framework\perpus\resources\views/halaman/view_pinjam.blade.php ENDPATH**/ ?>