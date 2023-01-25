@extends('layout.mainUser')

@section('judul')
PREDICT
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Quick Example</h3>
    </div>


    <form method="POST" action="{{ url('/user/predict/post') }}">
        <div class="card-body">
            <div class="form-group">
                @csrf
                <?php $count = 1; ?>
                <?php foreach ($data as $eachdata) { ?>
                    <?php foreach ($eachdata as $value) { ?>
                        <label>Pertanyaan Ke-<?php echo $count ?>:</b> <?php print($value) ?> </label>
                    <?php } ?>
                    <div class="custom-control custom-radio">
                        <input class="form-check-input" type="radio" name="pertanyaan<?php echo $count - 1 ?>" value="15" required>
                        <label class="form-check-label">Tidak Pernah</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="form-check-input" type="radio" name="pertanyaan<?php echo $count - 1 ?>" value="35">
                        <label class="form-check-label">Kadang-Kadang</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="form-check-input" type="radio" name="pertanyaan<?php echo $count - 1 ?>" value="50">
                        <label class="form-check-label">Selalu</label>
                    </div>
                    <br>
                    <?php $count++ ?>
                <?php } ?>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Penjelasan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                a) Tidak pernah, opsi ini bukan berarti gejala tersebut tidak muncul sama sekali, gejala tersebut pasti pernah muncul atau dialami sesekali dengan intensitas kemunculan yang sangat rendah yang hampir tidak muncul atau tidak teramati.
                <br>
                b) Kadang-kadang, opsi ini mencerminkan kemunculan gejala yang beberapa kali muncul dalam situasi yang sama, namun masih teramati, dan tidak selalau muncul dengan intensitas kemunculan diluar tidak pernah dan selalu.
                <br>
                c) Selalu dengan, opsi ini mencerminkan kemunculan gejala dengan intenitas yang tinggi pada setiap situasi, atau gejala selalu muncul setiap hari dalam aktivitas sehari-hari dan lebih sering teramati.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection