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
                        <!-- <div class="card-body img-center">
                            <img id="preview-image-before-upload" src="" alt="preview image" width="150px" height="150px">
                        </div> -->
                        <div class="card-body img-center">
                            <img id="preview-image-before-upload" src="{{asset($data['patient_list'][0] -> users_image)}}" alt="preview image" width="200px" height="200px">
                        </div>
                        <div class="form-group col-md-4 center">
                            <input type="file" class="form-control" name="users_image" id="users_image" value="{{asset($data['patient_list'][0] -> users_image)}}">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col-md-2">
                            <label for="patient_id">รหัสคนไข้</label>
                            <input type="text" class="form-control" id="patient_id" name="patient_id" value="{{$data['patient_list'][0] -> patient_id}}" readonly>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="patient_name">ชื่อ-นามสกุล</label>
                            <input type="text" class="form-control" id="patient_name" name="patient_name" value="{{$data['patient_list'][0] -> name}}">
                        </div>

                        <div class="form-group col-md-2">
                            <label for="patient_nickname">ชื่อเล่น</label>
                            <input type="text" class="form-control" id="patient_nickname" name="patient_nickname" value="{{$data['patient_list'][0] -> nickname}}">
                        </div>
                        
                        <div class="form-group col-md-1">
                            <label for="patient_sex">เพศ</label>
                            <select id="patient_sex" name="patient_sex" class="form-control">
                                @foreach($data['sex'] as $row)
                                <option value="{{$row -> id}}" {{($data['patient_list'][0]-> sex==$row -> id) ? 'selected' :''}}>{{$row -> sex_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="patient_birthdate">วัน/เดือน/ปีเกิด</label>
                            <input type="date" class="form-control" id="patient_birthdate" name="patient_birthdate" value="{{$data['patient_list'][0] -> birthdate}}">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="patient_age">อายุ</label>
                            <input type="text" class="form-control" id="patient_age" name="patient_age" value="{{\Carbon\Carbon::parse($data['patient_list'][0] -> birthdate)->diff(\Carbon\Carbon::now())->format('%y')}}" readonly>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="patient_tel">เบอร์โทร</label>
                            <input type="text" class="form-control" name="patient_tel" value="{{$data['patient_list'][0] -> tel}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="patient_address">ที่อยู่</label>
                            <input type="text" class="form-control" name="patient_address" value="{{$data['patient_list'][0] -> address}}">
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function() {

    });

    $('#patient_birthdate').on("change", function(event) {
        ageCalculator();
    });

    function ageCalculator() {
        var userinput = document.getElementById("patient_birthdate").value;
        var dob = new Date(userinput);
        if (userinput == null || userinput == '') {
            document.getElementById("message").innerHTML = "*โปรดเลือกวันเกิด !";
            return false;
        } else {

            //calculate month difference from current date in time
            var month_diff = Date.now() - dob.getTime();
            //convert the calculated difference in date format
            var age_dt = new Date(month_diff);
            //extract year from date    
            var year = age_dt.getUTCFullYear();
            //now calculate the age of the user
            var age = Math.abs(year - 1970);
            //display the calculated age
            // return document.getElementById("totalage").innerHTML =
            //     "Age is: " + age + " years. ";
            $("#patient_age").val(age);
        }
    }
</script>
@endsection