@extends('template.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-sm-7">
                <?= $this->session->flashdata('message'); ?>
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Rincian Product</h3>

                            <hr>
                            
                            <form action="<?= route('checkout') ?>" method="post">
                                <?php foreach ($nota as $n) :
                                    $not = $n->maxKode; ?>

                                <?php endforeach ?>
                                <?php if (empty($not)) : ?>
                                    <input type="hidden" name="nota" value="TS<?= date('ymd') ?>1">
                                <?php else : ?>
                                    <input type="hidden" name="nota" value="TS<?= date('ymd') ?><?= $not + 1 ?>">
                                <?php endif ?>
                                <div class="row">
                                    <?php
                                    $subtotal_produk = 0;
                                    $jumlah_produk = 0;
                                    ?>
                                    <?php foreach ($cart as $key => $value) : ?>
                                        <input type="hidden" name="id[]" value="<?= $value['id'] ?>">
                                        <?php
                                        if ($value['type'] == 'barang') :
                                            $subtotal_produk += $value['price'] * $value['qty'];
                                            $jumlah_produk += $value['qty'];
                                        ?>
                                            <div class="col-md-8">
                                            <?php foreach($value['nm_karyawan'] as $nm_karyawan): ?>
                                            <span class="badge badge-secondary mr-1"><?= $nm_karyawan ?></span>
                                            <?php endforeach; ?>
                                            <br><br>
                                                <img width="80" class="img-thumbnail" src="<?= asset('assets') ?>/uploads/produk/<?= $value['picture'] ?>" alt="">
                                                <span style="margin-left: 20px;"><?= $value['name'] ?></span>
                                            </div>
                                            <div class="col-md-4">
                                                <p style="margin-top: 55px;" class="float-right"><?= $value['qty'] ?> x <strong>Rp.<?= number_format($value['price']) ?></strong> </p>
                                            </div>
                                            <div class="col-md-12">
                                                <hr>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach ?>
                                    <div class="container">
                                        
                                        <strong style="font-size: 20px;">Subtotal <?= $jumlah_produk ?> produk</strong> <strong style="float: right;font-size: 20px;">Rp. <?= number_format($subtotal_produk) ?></strong>
                                        <hr>
                                        <!-- <strong style="font-size: 20px;">Total</strong> <strong style="float: right; font-size: 22px;">Rp. <?= number_format($subtotal) ?></strong> -->
                                    </div>

                                    <hr>
                                    <?php
                                    $subtotal_order = 0;
                                    $jumlah_servis = 0;
                                    ?>
                                    <?php $total = $subtotal_produk + $subtotal_order ?>
                                    <!-- <div class="container">
                                    <strong style="font-size: 20px;">Total</strong> <strong style="float: right; font-size: 22px;">Rp. <?= number_format($subtotal_produk + $subtotal_order) ?></strong>
                                    <hr>
                                </div> -->

                                    <div class="container">
                                        <h3 class="text-center mb-4">Pembayaran</h3>
                                        <hr>

                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-md-4 col-form-label">Cash</label>
                                            <div class="col-md-6">
                                                <input type="number" name="cash" class="form-control pembayaran" value="0" id="cash">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-md-4 col-form-label">BCA Debit</label>
                                            <div class="col-md-6">
                                                <input type="number" name="bca_debit" class="form-control pembayaran" value="0" id="bca_debit">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-md-4 col-form-label">BCA Kredit</label>
                                            <div class="col-md-6">
                                                <input type="number" name="bca_kredit" class="form-control pembayaran" value="0" id="bca_kredit">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-md-4 col-form-label">Mandiri Debit</label>
                                            <div class="col-md-6">
                                                <input type="number" name="mandiri_debit" class="form-control pembayaran" value="0" id="mandiri_debit">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-md-4 col-form-label">Mandiri Kredit</label>
                                            <div class="col-md-6">
                                                <input type="number" name="mandiri_kredit" class="form-control pembayaran" value="0" id="mandiri_kredit">
                                            </div>
                                        </div>

                                        <!-- <div class="form-group row">
                                            <label for="staticEmail" class="col-md-4 col-form-label">Lokasi</label>
                                            <div class="col-md-6">
                                            <select name="lokasi" class="form-control select" required>
                                                    <option value="" >--Pilih Lokasi--</option>                                    
                                                    <option value="TAKEMORI">TAKEMORI</option>
                                                    <option value="SOONDOBU">SOONDOBU</option>                                 

                                            </select>
                                            </div>
                                        </div> -->

                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-md-4 col-form-label">No Meja</label>
                                            <div class="col-md-6">
                                                <input type="text" name="no_meja" class="form-control " >
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-md-4 col-form-label">No Nota</label>
                                            <div class="col-md-6">
                                                <input type="text" name="invoice" class="form-control " >
                                            </div>
                                        </div>  

                                        <hr>
                                        <input type="hidden" name="total" id="total" value="<?= $total; ?>">
                                       
                                        <button class="btn  btn-costume btn-block" id="btn_bayar" disabled >PROSES BAYAR <i class="fas fa-money-check-alt majoo"></i> <i class="fa fa-chevron-right majoo" style="float: right; "></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php $total = $subtotal_produk + $subtotal_order ?>
                </div>
            </div>
        </div>

</div>
<!--/. container-fluid -->
</section>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('#cash').on('change blur', function() {
            if ($(this).val().trim().length === 0) {
                $(this).val(0);
            }
        });
        $('#mandiri_kredit').on('change blur', function() {
            if ($(this).val().trim().length === 0) {
                $(this).val(0);
            }
        });
        $('#mandiri_debit').on('change blur', function() {
            if ($(this).val().trim().length === 0) {
                $(this).val(0);
            }
        });
        $('#bca_kredit').on('change blur', function() {
            if ($(this).val().trim().length === 0) {
                $(this).val(0);
            }
        });
        $('#bca_debit').on('change blur', function() {
            if ($(this).val().trim().length === 0) {
                $(this).val(0);
            }
        });
        $('.pembayaran').keyup(function() {
            var cash = parseInt($("#cash").val());
            var mandiri_debit = parseInt($("#mandiri_debit").val());
            var mandiri_kredit = parseInt($("#mandiri_kredit").val());
            var bca_debit = parseInt($("#bca_debit").val());
            var bca_kredit = parseInt($("#bca_kredit").val());

            var bayar = cash + mandiri_debit + mandiri_kredit + bca_kredit + bca_debit;

            var total = parseInt($("#total").val());
            if (total <= bayar) {
                $('#btn_bayar').removeAttr('disabled');
                // alert('tes')
            } else {
                // alert('tes1')
                $('#btn_bayar').attr('disabled', 'true');
            }
        });
        
        function bayar_default(){
            var cash = parseInt($("#cash").val());
            var mandiri_debit = parseInt($("#mandiri_debit").val());
            var mandiri_kredit = parseInt($("#mandiri_kredit").val());
            var bca_debit = parseInt($("#bca_debit").val());
            var bca_kredit = parseInt($("#bca_kredit").val());

            var bayar = cash + mandiri_debit + mandiri_kredit + bca_kredit + bca_debit;

            var total = parseInt($("#total").val());
            if (total <= bayar) {
                $('#btn_bayar').removeAttr('disabled');
                // alert('tes')
            } else {
                // alert('tes1')
                $('#btn_bayar').attr('disabled', 'true');
            }
		}

		bayar_default();
    });
</script>
@endsection