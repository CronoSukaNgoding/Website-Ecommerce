<?= $this->extend('Template/template') ?>

<?= $this->section('IsKonten') ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Data Toko</h4>
                <p class="card-title-desc">Isi Form Berikut</p>

                <form action="<?=base_url("/data-toko/". $userid)?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="control-label" for="provinsi">Provinsi</label>
                                <select id="provinsi" name="provinsi" class="form-control select2">
                                    <option selected  >Pilih Provinsi</option>
                                    <?php foreach ($response1 as $value): ?>
                                        <option value="<?=$value->province_id?>"><?=$value->province?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>


                            <div class="mb-3">
                                <label class="control-label" for="kota">Kota</label>
                                <select id="kota" name="kota" class="form-control select2">
                                    
                                </select>
                            </div>   
                            <div class="mb-3">
                                <label for="jalan">jalan</label>
                                <textarea class="form-control" id="jalan" rows="3" name="jalan" placeholder="jalan"
                                autocomplete="off" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="rt">RT</label>
                                <input type="number" class="form-control" id="rt" name="rt" placeholder="Nomor HP"
                                value="" autocomplete="off" required>
                            </div>
                            <div class="mb-3">
                                <label for="rw">RW</label>
                                <input type="number" class="form-control" id="rw" name="rw" placeholder="Nomor HP"
                                value="" autocomplete="off" required>
                            </div>
                   
                        </div>

                    </div>

                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light">Batal</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<!-- CKEDITOR -->
<script src="/assets/js/pages/form-advanced.init.js"></script>
<script src="/assets/libs/select2/js/select2.min.js"></script>
<script>
        $(document).ready(function() {
            $("#provinsi").change(function() {
                var selectedProvinceId = $(this).val();
                console.log(selectedProvinceId);
                var kotaDropdown = $("#kota");

                // Mengirim permintaan AJAX untuk mendapatkan data kota berdasarkan province_id
                $.ajax({
                    url: "/get-kota-by-provinsi", // Ganti dengan URL endpoint yang sesuai di server
                    method: "GET",
                    data: { provinsi_id: selectedProvinceId },
                    dataType: "json",
                    success: function(data) {
                        // Menghapus semua opsi kota yang ada
                        kotaDropdown.find('option').not(':first').remove();

                        // Mengisi dropdown kota dengan opsi-opsi baru
                        $.each(data, function(index, city) {
                            kotaDropdown.append($('<option>', {
                                value: city.city_id,
                                text: city.city_name,
                                'data-province': city.province_id
                            }));
                        });
                    },
                    error: function() {
                        console.error('Terjadi kesalahan saat mengambil data kota.');
                    }
                });
            });
        });
        </script>

<?=$this->endSection()?>
