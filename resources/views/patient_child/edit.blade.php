@extends('layouts.app')

@section('content')

<div class="container-fluid mt-5">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    แบบฟอร์มแก้ไขข้อมูลคนไข้เด็ก
                </button>
            </h5>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne">
            <div class="card-body">
                <form action="{{route('updatepatientchild')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <br>
                    <div class="card">
                        <div class="card-body img-center">
                            <img id="preview-image-before-upload" src="" alt="preview image" width="150px" height="150px">
                        </div>
                        <div class="form-group col-md-4 center">
                            <input type="file" class="form-control" name="employee_image" id="employee_image" value="">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col-md-1">
                            <label for="patient_id">รหัสคนไข้</label>
                            <input type="text" class="form-control" id="patient_id" name="patient_id" value="{{$data['patient_list'][0] -> id}}" readonly>
                        </div>

                        <div class="form-group col-md-7">
                            <label for="patient_name">ชื่อ-นามสกุล</label>
                            <input type="text" class="form-control" id="patient_name" name="patient_name" value="{{$data['patient_list'][0] -> name}}">
                        </div>

                        <div class="form-group col-md-2">
                            <label for="patient_nickname">ชื่อเล่น</label>
                            <input type="text" class="form-control" id="patient_nickname" name="patient_nickname" value="{{$data['patient_list'][0] -> nickname}}">
                        </div>
                        
                        <div class="form-group col-md-1">
                            <label for="patient_sex">เพศ</label>
                            <select id="inputSex" name="sex" class="form-control">
                                @foreach($data['sex'] as $row)
                                <option value="{{$row -> id}}" {{($data['patient_list'][0]-> sex==$row -> id) ? 'selected' :''}}>{{$row -> sex_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-1">
                            <label for="patient_age">อายุ</label>
                            <input type="text" class="form-control" id="patient_age" name="patient_age" value="{{$data['patient_list'][0] -> age}}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="patient_tel">เบอร์โทร</label>
                            <input type="text" class="form-control" name="patient_tel" value="{{$data['patient_list'][0] -> tel}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="patient_contact">ที่อยู่</label>
                            <input type="text" class="form-control" name="patient_contact" value="{{$data['patient_list'][0] -> contact}}">
                        </div>

                        <div class="form-group col-md-2">
                            <label for="patient_line_id">LINE ID</label>
                            <input type="text" class="form-control" name="patient_line_id" value="{{$data['patient_list'][0] -> line_id}}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="patient_drug_allergy">ประวัติการแพ้ยา</label>
                            <!-- <input type="text" class="form-control" name="patient_drug_allergy" value=""> -->
                            <textarea class="form-control" id="patient_drug_allergy" name="patient_drug_allergy" rows="3" >{{$data['patient_list'][0] -> drug_allergy}}</textarea>
                        </div>
                    </div>

                    <div class="text-right">
                        <a href="{{route('patientchild')}}" class="btn btn-default">ย้อนกลับ</a>
                        <!-- <button type="submit" class="btn btn-info">ดูตัวอย่าง</button> -->
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
<!--<script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>-->
<script src="../assets/vendor/js-cookie/js.cookie.js"></script>
<script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Argon JS -->
<script src="../assets/js/argon.js?v=1.2.0"></script>

<!-- Datatable -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js|https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>

<script type="text/javascript">
    $('#image').change(function() {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#preview_image').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });
</script>
@endsection