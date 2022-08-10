@extends('layouts.app')

@section('content')

<html>
<style>
    .dataTables_filter {
        float: right;
        margin-right: 25px;
    }

    .dataTables_info {
        float: left;
        margin-left: 25px;
    }

    .dataTables_paginate {
        float: right;
        margin-right: 20px;
    }
</style>

</html>

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->

                <!-- Light table -->
                <div class="table-responsive">
                    <!-- <div class="card-header border-0">
                        <h3 class="mb-0">Light table</h3>
                    </div> -->
                    <table class="table align-items-center table-flush dtab">
                        <div class="card-header border-0">
                            <div class="text-left">
                                <h3 class="mb-0">ตารางแสดงข้อมูลคนไข้กระดูก&nbsp;</h3>
                            </div>
                            <div class="text-right">
                                <button type="button" id="add" class="btn btn-primary" data-toggle="modal" data-target="#addpatientbone">+ เพิ่ม</button>
                            </div>
                        </div>
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort text-center" data-sort="name">ลำดับ</th>
                                <th scope="col" class="sort text-center" data-sort="name">ชื่อ-นามสกุล</th>
                                <th scope="col" class="sort text-center" data-sort="nickname">ชื่อเล่น</th>
                                <th scope="col" class="sort text-center" data-sort="sex">เพศ</th>
                                <th scope="col" class="sort text-center" data-sort="tel">เบอร์โทร</th>
                                <th scope="col" class="sort text-center" data-sort="address">ที่อยู่</th>
                                <th scope="col" class="sort text-center" data-sort="lineid">ไลน์ไอดี</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach($data['patientlist'] as $row)
                            <tr>
                                <td class="text-center">
                                    {{$loop->index+1}}
                                </td>
                                <td class="text-center">
                                    {{$row -> name}}
                                </td>
                                <td class="text-center">
                                    {{$row -> nickname}}
                                </td>
                                <td class="text-center">
                                    {{$row -> sexname -> sex_name}}
                                </td>
                                <td class="text-center">
                                    {{$row -> tel}}
                                </td>
                                <td class="text-center">
                                    {{$row -> address}}
                                </td>
                                <td class="text-center">
                                    {{$row -> line_id}}
                                </td>
                                <td class="text-right">
                                    <!--<a data-toggle="modal" data-target="#custDetailModal" class="btn btn-info">รายละเอียด</a>-->
                                    <a href="{{ url('/general/customer/editCustomer/'.$row->customer_number) }}" title="รายละเอียด" data-toggle="tooltip" class="btn btn-success"><i class="fas fa-solid fa-eye"></i></a>
                                    <a href="{{ url('/patientbone/editpatientbone/'.$row->patient_id) }}" title="แก้ไขข้อมูล" data-toggle="tooltip" class="btn btn-info"><i class="fas fa-edit fa-sm"></i></a>
                                    <!-- <a href="{{ url('/general/customer/softDeleteCustomer/'.$row->customer_number) }}" title="ลบข้อมูล" data-toggle="tooltip" class="btn btn-danger delbtn"><i class="fa fa-trash fa-sm" aria-hidden="true"></i></a> -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addpatientbone" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลคนไข้กระดูก</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('addpatientbone')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label id="genPatientId" for="patient_id" class="text-primary required"><i class="fa fa-plus">&nbsp;สร้างรหัสคนไข้</i></label>
                        <input type="text" class="form-control readonly" id="patient_id" name="patient_id" style="background-color: #e9ecef;" required>
                    </div>
                    <div class="form-group">
                        <label> ชื่อ </label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label> ชื่อเล่น </label>
                        <input type="text" id="nickname" name="nickname" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>เบอร์โทร</label>
                        <input type="text" id="tel" name="tel" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label> ที่อยู่ </label>
                        <input type="text" id="address" name="address" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>เพศ</label>
                        <select id="sex" name="sex" class="form-control">
                            @foreach($data['sex'] as $row)
                            <option value="{{$row -> id}}">{{$row -> sex_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>วัน/เดือน/ปีเกิด</label>
                            <input type="date" id="birthdate" name="birthdate" class="form-control" placeholder="" required>
                        </div>
                        <div class="col-md-6">
                            <label>อายุ</label>
                            <input type="text" id="totalage" name="totalage" class="form-control" placeholder="" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label> ประวัติการแพ้ยา </label>
                        <textarea type="text" id="drug_allergy" name="drug_allergy" class="form-control" placeholder="" row="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>รูป</label>
                        <input type="file" class="form-control" name="users_image" id="users_image">
                    </div>
                    <div class="form-group">
                        <label> LINE ID </label>
                        <input type="text" id="line_id" name="line_id" class="form-control" placeholder="" required>
                    </div>
                    <input type="hidden" name="type" value="1">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ออก</button>
                    <button type="submit" name="registerbtn" class="btn btn-primary">บันทึก</button>
                </div>
            </form>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button> -->
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
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js" defer></script>
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
    $('#add').on('click', function() {
        $("#patient_id").val("");
        $("#name").val("");
        $("#nickname").val("");
        $("#tel").val("");
        $("#address").val("");
        $("#birthdate").val("");
        $("#totalage").val("");
        $("#drug_allergy").val("");
        $("#users_image").val("");
        $("#line_id").val("");
    });
    $(".readonly").on('keydown paste focus mousedown', function(e) {
        if (e.keyCode != 9) // ignore tab
            e.preventDefault();
    });
    $('#genPatientId').on('click', function() {
        var date = new Date();
        var components = [
            "PB-",
            date.getYear(),
            date.getMonth(),
            date.getDate(),
            date.getHours(),
            date.getMinutes(),
            date.getSeconds()
        ];

        var id = components.join("");
        $("#patient_id").val(id);
    });
    $('#birthdate').on("change", function(event) {
        // calculateRow($(this).closest("tr"));
        ageCalculator();
    });

    function ageCalculator() {
        var userinput = document.getElementById("birthdate").value;
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
            $("#totalage").val(age);
        }
    }
    $(document).ready(function() {
        $(".dtab").DataTable({
            columnDefs: [{
                defaultContent: "-",
                targets: "_all",
            }, ],
            language: {
                paginate: {
                    previous: "<",
                    next: ">",
                },
            },
            lengthMenu: [10, 20, 50, 100],
            oLanguage: {
                sSearch: "ค้นหา : ",
                sLengthMenu: " แสดง _MENU_ รายการ/หน้า",
                sInfo: "รายการที่ _START_ ถึง _END_ จากทั้งหมด _TOTAL_ รายการ",
            },
        });
        $(".dataTables_length").hide();
        //$(".dataTables_info").hide();
    });
</script>
@endsection