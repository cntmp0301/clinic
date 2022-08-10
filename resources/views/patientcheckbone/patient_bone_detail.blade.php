@extends('layouts.app')

@section('content')

<div class="container-fluid mt-5">
    @include('modal/drugModal')
    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    รายละเอียดข้อมูลคนไข้กระดูก
                </button>
            </h5>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne">
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <br>
                    <div class="card">
                        <!-- <div class="card-body img-center">
                            <img id="preview-image-before-upload" src="" alt="preview image" width="150px" height="150px">
                        </div> -->
                        <div class="card-body img-center">
                            <img id="preview-image-before-upload" src="{{asset($data['patient_list'][0] -> users_image)}}" alt="preview image" width="200px" height="200px">
                        </div>
                        <!-- <div class="form-group col-md-4 center">
                            <input type="file" class="form-control" name="users_image" id="users_image" value="{{asset($data['patient_list'][0] -> users_image)}}">
                        </div> -->
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col-md-2">
                            <label for="patient_id">รหัสคนไข้</label>
                            <input type="text" class="form-control" id="patient_id" name="patient_id" value="{{$data['patient_list'][0] -> patient_id}}" readonly>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="patient_name">ชื่อ-นามสกุล</label>
                            <input type="text" class="form-control" id="patient_name" name="patient_name" value="{{$data['patient_list'][0] -> name}}" readonly>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="patient_nickname">ชื่อเล่น</label>
                            <input type="text" class="form-control" id="patient_nickname" name="patient_nickname" value="{{$data['patient_list'][0] -> nickname}}" readonly>
                        </div>

                        <div class="form-group col-md-1">
                            <label for="patient_sex">เพศ</label>
                            <select id="patient_sex" name="patient_sex" class="form-control" readonly>
                                @foreach($data['sex'] as $row)
                                <option value="{{$row -> id}}" {{($data['patient_list'][0]-> sex==$row -> id) ? 'selected' :''}}>{{$row -> sex_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="patient_birthdate">วัน/เดือน/ปีเกิด</label>
                            <input type="date" class="form-control" id="patient_birthdate" name="patient_birthdate" value="{{$data['patient_list'][0] -> birthdate}}" readonly>
                        </div>
                        <div class="form-group col-md-1">
                            <label for="patient_age">อายุ</label>
                            <input type="text" class="form-control" id="patient_age" name="patient_age" value="{{\Carbon\Carbon::parse($data['patient_list'][0] -> birthdate)->diff(\Carbon\Carbon::now())->format('%y')}}" readonly>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="patient_tel">เบอร์โทร</label>
                            <input type="text" class="form-control" name="patient_tel" value="{{$data['patient_list'][0] -> tel}}" readonly>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="patient_address">ที่อยู่</label>
                            <input type="text" class="form-control" name="patient_address" value="{{$data['patient_list'][0] -> address}}" readonly>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="patient_line_id">LINE ID</label>
                            <input type="text" class="form-control" name="patient_line_id" value="{{$data['patient_list'][0] -> line_id}}" readonly>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="patient_drug_allergy">ประวัติการแพ้ยา</label>
                            <!-- <input type="text" class="form-control" name="patient_drug_allergy" value=""> -->
                            <textarea class="form-control" id="patient_drug_allergy" name="patient_drug_allergy" rows="3" readonly>{{$data['patient_list'][0] -> drug_allergy}}</textarea>
                        </div>
                    </div>

                    <!-- <div class="text-right">
                        <a href="{{route('patientbone')}}" class="btn btn-default">ย้อนกลับ</a>
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div> -->

                </form>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    ประวัติการรักษา
                </button>
            </h5>
        </div>
        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort text-center" data-sort="">ลำดับ</th>
                                <th scope="col" class="sort text-center" data-sort="">วันที่</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach($data['patient_hitsories'] as $row)
                            <tr>
                                <td class="text-center">
                                    {{$loop -> index+1}}
                                </td>
                                <td class="text-center">
                                    {{$row -> date_history}}
                                </td>
                                <td class="text-right">
                                    <!-- <a href="{{ url('/general/customer/editCustomer/'.$row->patient_id) }}" title="รายละเอียด" data-toggle="tooltip" class="btn btn-primary"><i class="fas fa-solid fa-eye"></i></a> -->
                                    <a href="#" data-target="#showDetail" data-toggle="modal" data-id="{{ $row -> id }}" data-order="{{ $row -> order_id }}" data-date="{{ $row -> date_history }}" data-nextdate="{{ $row -> next_check }}" data-symptoms="{{ $row -> patient_symptoms }}" title="รายละเอียด" class="btn btn-primary btnDetail"><i class="fas fa-solid fa-eye"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="text-center">
        <a href="{{url('/patientcheckbone/patientBoneTreatment/'.$data['patient_list'][0] -> patient_id)}}" title="เพิ่มประวัติการรักษา" data-toggle="tooltip" class="btn btn-primary">เพิ่มประวัติการรักษา</a>
        <input id="addDrug" type="button" class="btn btn-danger" value="ย้อนกลับ">
    </div>
    <br>



</div>

<div class="modal fade" id="showDetail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">รายละเอียดการรักษา</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- <form action="{{route('updateType')}}" method="POST" enctype="multipart/form-data">
                @csrf -->
            <input type="hidden" name="idInModal" id="idInModal">
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label> วันที่ตรวจ </label>
                        <input type="text" name="dateHitsoryInModal" id="dateHitsoryInModal" class="form-control" readonly>

                    </div>
                    <div class="form-group col-md-6">
                        <label> วันที่นัดครั้งถัดไป </label>
                        <input type="text" name="nextDateInModal" id="nextDateInModal" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label> อาการ </label>
                    <textarea class="form-control" id="patientSymptomsInModal" name="patientSymptomsInModal" rows="3" readonly></textarea>
                    <!-- <input type="text" name="patientSymptomsInModal" id="patientSymptomsInModal" class="form-control"> -->
                </div>

                <label> ประวัติการจ่ายยา </label>
                <div class="table-responsive">
                    <table id="drugTab" class="table table-bordered table-sm align-items-center" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th scope="col" class="sort text-center" style="width: 20%">ลำดับ</th>
                                <th scope="col" class="sort text-center" style="width: 60%">ชื่อยา</th>
                                <th scope="col" class="sort text-center" style="width: 20%">จำนวน</th>
                            </tr>
                        </thead>
                        <tbody class="list">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
            </div>
            <!-- </form> -->
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button> -->
            </div>
        </div>
    </div>
</div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/js-cookie/js.cookie.js"></script>
<script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<!-- Argon JS -->
<script src="../assets/js/argon.js?v=1.2.0"></script>
<script src="../assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Datatable -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js|https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>



<script type="text/javascript">
    $(document).ready(function() {

        var sexindex = "{{$data['patient_list'][0]->sex}}";
        $('#inputSex').val(sexindex).change();

        //เพิ่มแถว
        $("#addDrug").on("click", function() {
            alert(1);
            var counter = $("#rowcounter").val();
            var newRow = $("<tr class=addedrow id=" + counter + ">");
            var cols = "";

            cols += '<td class="text-center"><label for="inputDrug" class="text-primary"><i class="fa fa-search searchDrug" data-toggle="modal" data-target="#drugSearchModal">&nbsp;ค้นหา</i></label></td>';
            cols += '<td class="text-center" style="width: 20%"><input type="text" class="form-control form-control-sm" name="drug_id[]"></td>';
            cols += '<td class="text-center" style="width: 20%"><input type="text" class="form-control form-control-sm" name="drug_name[]"></td>';
            cols += '<td class="text-center" style="width: 20%"><input type="text" class="form-control form-control-sm" name="drug_qty[]"></td>';
            cols += '<td class="text-center" style="width: 10%"><input type="text" class="form-control form-control-sm" name="cost_price[]"></td>';
            cols += '<td class="text-center" style="width: 10%"><input type="text" class="form-control form-control-sm" name="sell_price[]"></td>';
            cols += '<td class="text-center" style="width: 10%"><input type="text" class="form-control form-control-sm" name="drug_total_price[]"></td>';
            cols += '<td class="text-center"><input type="button" class="ibtnDel btn btn-md btn-danger btn-sm" value="ลบ"></td>';
            newRow.append(cols);
            $("#lastRow").before(newRow);
            counter++;
            $("#rowcounter").val(counter);
        });

        //ลบแถว
        $("table.order-list").on("click", ".ibtnDel", function(event) {
            $(this).closest("tr").remove();
            calculateGrandTotal();
        });

    });

    $('#employee_image').change(function() {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#preview-image-before-upload').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });

    $(document.body).on('click', '.searchDrug', function() {
        var rowId = $(this).closest('tr').attr('id');
        $("#rowId").val(rowId);
    });

    $('.btnSelectDrug').on('click', function() {
        var $rowId = $('#rowId').val();
        var $row = jQuery(this).closest('tr');
        var $columns = $row.find('td');
        $columns.addClass('row-highlight');
        var drugId = "";
        var drugName = "";
        var costPrice = "";
        var sellPrice = "";
        var count = 0;
        jQuery.each($columns, function(i, item) {
            item.innerHTML;
            if (count == 0) {
                drugId = item.innerHTML;
            }
            if (count == 1) {
                drugName = item.innerHTML;
            }
            if (count == 2) {
                costPrice = item.innerHTML;
            }
            if (count == 3) {
                sellPrice = item.innerHTML;
            }
            count++;
        });
        //Clear data

        //ส่งค่ามาแปะที่ฟอร์ม
        $("#" + $rowId).find('input[name="drug_id[]"]').val(drugId);
        $("#" + $rowId).find('input[name="drug_name[]"]').val(drugName);
        $("#" + $rowId).find('input[name="cost_price[]"]').val(costPrice);
        $("#" + $rowId).find('input[name="sell_price[]"]').val(sellPrice);

        $('#drugSearchModal').modal('hide');
    });

    $(document).ready(function() {
        $('#drugTab').DataTable({
            columnDefs: [{
                    "targets": 0, // your case first column
                    "className": "text-center",
                },
                {
                    "targets": 1,
                    "className": "text-center",
                },
                {
                    "targets": 2,
                    "className": "text-center",
                }
            ]
        });

        $("#showDetail").on("show.bs.modal", function(e) {
            $("#drugTab").DataTable().clear().draw();
            var id = $(e.relatedTarget).data('id');
            var orderId = $(e.relatedTarget).data('order');
            var date_hitsory = $(e.relatedTarget).data('date');
            var next_date = $(e.relatedTarget).data('nextdate');
            var patient_symptoms = $(e.relatedTarget).data('symptoms');
            $('#idInModal').val(id);
            $('#orderIdInModal').val(orderId);
            $('#dateHitsoryInModal').val(date_hitsory);
            $('#nextDateInModal').val(next_date);
            $('#patientSymptomsInModal').val(patient_symptoms);

            var _token = $('input[name="_token"').val();
            $.ajax({
                url: "{{route('fetchBoneDrugDetail')}}",
                method: "POST",
                data: {
                    orderId: orderId,
                    _token: _token
                },
                dataType: "json",
                success: function(result) {
                    console.log(result);
                    $.each(result.data.orders_detail, function(i, item) {
                        $("#drugTab").DataTable().row.add([
                            i + 1,
                            item.dname.drug_name,
                            item.amount
                        ]).draw();
                    });
                }
            })
            $(".dataTables_filter").hide();
            $(".dataTables_length").hide();
            $(".dataTables_info").hide();
            $(".dataTables_paginate").hide();
        });
    });
</script>
@endsection