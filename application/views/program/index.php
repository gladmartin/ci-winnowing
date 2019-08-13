<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php $this->layout->get_title(); ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Tes Kemiripan</a></li>
        <li class="active">Index</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="row form-tes">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Form uji coba kemiripan dua judul skripsi.</h3>
                </div>
                <?php echo form_open() ?>
                <div class="box-body">
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="full_name">Judul 1.</label>
                            <textarea placeholder="Masukkan judul skripsi disini" required name="judul1" id="judul1" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="email">Judul 2</label>
                            <textarea required placeholder="Masukkan judul skripsi disini" name="judul2" id="judul2" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label for="password">N Gram</label>
                            <input value="5" required minlength="1" type="number" class="form-control" id="number" name="n_gram">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="window">Window</label>
                            <input value="4" required minlength="1" type="number" class="form-control" id="number" name="window">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="password">Bilangan Prima</label>
                            <select required name="bilangan_prima" id="bil-prima" class="form-control">
                                <?php
                                for ($i = 2; $i < 100; $i++) {
                                    $hitung = 0;
                                    for ($j = 1; $j <= $i; $j++) {
                                        if (($i % $j) == 0) $hitung++;
                                    }
                                    if ($hitung == 2) {
                                        echo "<option value='{$i}'>{$i}</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success btn-lg btn-flat">Proses</button>
                        <button type="reset" class="btn btn-lg btn-flat">Reset</button>
                    </div>
                </div>
                <!-- /.box-body -->
                </form>
            </div>
        </div>
    </div>

    <div class="hasil" style="display: none">
        <div class="row">
            <div class="col-sm-6">
                <div class="box judul1">
                    <div class="box-header with-border">
                        <h3 class="box-title">Judul 1.</h3>
                        <small class="sub"></small>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>N Gram</label>
                            <textarea disabled id="n-gram" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Rolling hash</label>
                            <textarea disabled cols="30" id="rolling-hash" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Window</label>
                            <textarea disabled cols="30" id="window" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Finger Prints</label>
                            <textarea disabled cols="30" id="fp" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <div class="col-sm-6">
                <div class="box judul2">
                    <div class="box-header with-border">
                        <h3 class="box-title">Judul 2</h3>
                        <small class="sub"></small>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>N Gram</label>
                            <textarea disabled id="n-gram" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Rolling hash</label>
                            <textarea disabled cols="30" id="rolling-hash" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Window</label>
                            <textarea disabled cols="30" id="window" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Finger Prints</label>
                            <textarea disabled cols="30" id="fp" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>

        <div class="row kesimpulan">
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Kesimpulan</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-5">
                                <table class="table table-borderless">
                                    <tr>
                                        <th>Jumlah Fingerprints judul 1</th>
                                        <td id="fp1">1</td>
                                    </tr>
                                    <tr>
                                        <th>Jumlah Fingerprints judul 2</th>
                                        <td id="fp2">1</td>
                                    </tr>
                                    <tr>
                                        <th>Union (Gabungan) Fingerprints 1 dan 2</th>
                                        <td id="union">1</td>
                                    </tr>
                                    <tr>
                                        <th>Intersection (fingerprints yang sama)</th>
                                        <td id="intersection">2</td>
                                    </tr>
                                    <!-- <tr>
                                        <th>(Union - Intersection) </th>
                                        <td id="uin">3</td>
                                    </tr> -->
                                    <tr class="bg-green">
                                        <th>Persentase Plagiarisme</th>
                                        <td id="persentase">3</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>

        <div class="text-center">
            <button type="button" id="proses-ulang" class="btn btn-success btn-lg btn-flat">Tes Lagi</button>
        </div>
    </div>

</section>
<!-- /.content -->