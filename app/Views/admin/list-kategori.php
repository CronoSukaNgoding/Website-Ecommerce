<?= $this->extend('Template/template') ?>

<?= $this->section('IsKonten') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">List Kategori Luxo Mall</h4>

                <button type="button" class="btn btn-primary btn-bg-gradient-x-purple-blue box-shadow-2" style="Margin-bottom: 10px;"
                    data-bs-toggle="modal" data-bs-target="#tambahkategori  ">
                    <i class="fas fa-plus"></i> Tambah data Kategori
                </button>

                

				<div class="table-responsive">
                    <table class="table table-bordered ">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Icon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        foreach ($kategori as $value):
                            ?>
                            <tr>
                                <th scope="row"><?= $no++?></th>
                                <td><?= $value->kategori?></td>
                                <td>
                                    <div class="col-lg-4">
                                        <div>
                                            <img src="<?= base_url('admin/kategori/'.$value->icon) ?>" alt="" class="rounded avatar-md">
                                            <p class="mt-2  mb-lg-0"></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-success btn-bg-gradient-x-purple-blue box-shadow-2" style="Margin-bottom: 10px;"
                                        data-bs-toggle="modal" data-bs-target="#editkategori<?= $value->id;?>">
                                        <i class="fas fa-pen"></i>
                                    </button>

                                    <button type="button" class="btn btn-danger btn-bg-gradient-x-purple-blue box-shadow-2" style="Margin-bottom: 10px;"
                                        data-bs-toggle="modal" data-bs-target="#hapuskategori<?= $value->id;?>">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                                <?php
                                endforeach;
                                ?>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
		<!-- Modal tambah Kategori -->
    
        <div class="modal fade text-left" id="tambahkategori" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel35"> Tambah data Kategori</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?=base_url("/kategori/tambah")?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="modal-body">
                            <div class="form-group floating-label-form-group">
                                <label for="edit_kategori">Kategori</label>
                                <input type="text" class="form-control" name="kategori" id="kategori"
                                    placeholder="Kategori" value="" autocomplete="off" required>
                            </div>
                            <div class="form-group floating-label-form-group">
                                <label for="edit_icon">Icon Kategori</label>
                                <input type="file" class="form-control" id="icon" name="icon" placeholder="Icon"
                                    value="" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        

        <!-- Modal edit Kategori -->
        <?php foreach($kategori as $value) : ?>
        <div class="modal fade text-left" id="editkategori<?= $value->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel35"> Edit data Kategori</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?=base_url("/kategori/editkategori/".$value->id)?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="modal-body">
                            <div class="form-group floating-label-form-group">
                                <label for="edit_kategori">Kategori</label>
                                <input type="text" class="form-control" name="kategori" id="kategori"
                                    placeholder="Kategori" value="<?= $value->kategori;?>" autocomplete="off" required>
                            </div>
                            <div class="form-group floating-label-form-group">
                                <label for="edit_icon">Icon Kategori</label>
                                <input type="file" class="form-control" id="icon" name="icon" placeholder="Icon"
                                    value="<?= $value->icon;?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

       

        <!-- Modal hapus -->
        <?php foreach($kategori as $value) : ?>
        <div class="modal fade text-left" id="hapuskategori<?= $value->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?=base_url("kategori/delete/". $value->id)?>" method="post">
                    <?= csrf_field(); ?>
                        <div class="modal-header">
                            <h3 class="modal-title" id="myModalLabel35"> Hapus Data Produk ini ?</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        </div> <!-- end col -->

        <!-- Modal hapus Sub -->
        
        </div> <!-- end col -->
	</div> 
</div> <!-- end row -->

<?=$this->endSection()?>