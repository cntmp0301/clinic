@extends('layouts.app')

@section('content')

<div class="container-fluid mt-5">
    @include('modal/drugModal')
    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    การรักษา
                </button>
            </h5>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne">
            <div class="card-body">
                <form action="{{route('addPatientChildTreatment')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <br>
                    <input type="hidden" name="patient_id" id="patient_id" value="{{$data['patient_list'][0] -> patient_id}}">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label> ชื่อคนไข้ </label>
                            <input type="text" name="patient_name" id="patient_name" class="form-control" value="{{$data['patient_list'][0] -> name}}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label id="genOrderId" for="order_id" class="text-primary required"><i class="fa fa-plus">&nbsp;สร้างหมายเลขใบจ่ายยา</i></label>
                            <input type="text" class="form-control" id="order_id" name="order_id" readonly>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label> วันที่ตรวจ </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                <input id="dateHitsory" name="dateHitsory" class="form-control " placeholder="Select date" type="date" value="<?php echo date('Y-m-d') ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label> วันที่นัดครั้งถัดไป </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                <input id="nextDate" name="nextDate" class="form-control " placeholder="Select date" type="date">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label> อาการ </label>
                        <textarea class="form-control" id="patientSymptoms" name="patientSymptoms" rows="3"></textarea>
                        <!-- <input type="text" name="patientSymptoms" id="patientSymptoms" class="form-control"> -->
                    </div>


                    <div class="card">
                        <div class="card-header">
                            <div class="text-left">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    ข้อมูลการจ่ายยา
                                </button>
                            </div>
                            <div class="text-right">
                                <input id="addDrug" type="button" class="btn btn-outline-primary btn-sm" value="เพิ่มข้อมูลยา">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <input id="rowcounter" type="hidden" value="1">
                                <table id="drugList" class="table align-items-center table-bordered table-sm order-list" style="width:100%">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" class="sort text-center" data-sort=""></th>
                                            <th scope="col" class="sort text-center" data-sort="">รหัสยา</th>
                                            <th scope="col" class="sort text-center" data-sort="">ชื่อยา</th>
                                            <th scope="col" class="sort text-center" data-sort="">จำนวน</th>
                                            <th scope="col" class="sort text-center" data-sort="">ราคาต้นทุน</th>
                                            <th scope="col" class="sort text-center" data-sort="">ราคาขาย</th>
                                            <th scope="col" class="sort text-center" data-sort="">จำนวนเงิน</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        <tr id="0">
                                            <td class="text-center" style="width: 5%">
                                                <label for="inputDrug" class="text-primary"><i class="fa fa-search searchDrug" data-toggle="modal" data-target="#drugSearchModal">&nbsp;ค้นหา</i></label>
                                            </td>
                                            <td class="text-center" style="width: 20%"><input type="text" class="form-control form-control-sm" name="drug_id[]" readonly></td>
                                            <td class="text-center" style="width: 20%"><input type="text" class="form-control form-control-sm" name="drug_name[]" readonly></td>
                                            <td class="text-center" style="width: 20%"><input type="text" class="form-control form-control-sm" name="drug_qty[]" required></td>
                                            <td class="text-center" style="width: 10%"><input type="text" class="form-control form-control-sm" name="cost_price[]" readonly></td>
                                            <td class="text-center" style="width: 10%"><input type="text" class="form-control form-control-sm" name="sell_price[]" readonly></td>
                                            <td class="text-center" style="width: 10%"><input type="text" class="form-control form-control-sm" name="drug_total_price[]" readonly></td>
                                            <td class="text-center" style="width: 10%"></td>
                                        </tr>
                                        <tr id="lastRow">
                                            <td class="text-center" colspan="4"></td>
                                            <td class="text-right">
                                                <H5>ส่วนลด(%)</H5>
                                            </td>
                                            <td class="text-center"><input type="number" class="form-control form-control-sm" id="discount_rate" name="discount_rate"></td>
                                            <td class="text-center"><input type="text" class="form-control form-control-sm" id="discount_price" name="discount_price" readonly></td>
                                            <td class="text-center"></td>
                                        </tr>
                                        <tr id="lastRow">
                                            <td class="text-center" colspan="4"></td>
                                            <td class="text-right">
                                                <H5>จำนวนเงินทั้งสิ้น</H5>
                                            </td>
                                            <td class="text-center"></td>
                                            <td class="text-center"><input id="grandtotal" type="text" class="form-control form-control-sm" name="grandtotal" readonly></td>
                                            <td class="text-center"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <input type="hidden" id="rowId">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="text-center">
                        <button type="submit" name="savebtn" class="btn btn-primary">บันทึกประวัติการรักษา</button>
                        <!-- <a href="" title="บันทึกประวัติการรักษา" data-toggle="tooltip" class="btn btn-primary">บันทึกประวัติการรักษา</a> -->
                        <input id="addDrug" type="button" class="btn btn-danger" value="ยกเลิก">
                    </div>
                    <br>
                </form>
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
<script src="../assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" defer></script>
<!-- Datatable -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js|https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />





<script type="text/javascript">
    $(document).ready(function() {
        $('#genOrderId').on('click', function() {
            var date = new Date();
            var components = [
                "DC-",
                date.getYear(),
                date.getMonth(),
                date.getDate(),
                date.getHours(),
                date.getMinutes(),
                date.getSeconds()
            ];

            var id = components.join("");
            $("#order_id").val(id);
        });

        var sexindex = "{{$data['patient_list'][0]->sex}}";
        $('#inputSex').val(sexindex).change();

        //เพิ่มแถว
        $("#addDrug").on("click", function() {
            var counter = $("#rowcounter").val();
            var newRow = $("<tr class=addedrow id=" + counter + ">");
            var cols = "";

            cols += '<td class="text-center"><label for="inputDrug" class="text-primary"><i class="fa fa-search searchDrug" data-toggle="modal" data-target="#drugSearchModal">&nbsp;ค้นหา</i></label></td>';
            cols += '<td class="text-center" style="width: 20%"><input type="text" class="form-control form-control-sm" name="drug_id[]" readonly></td>';
            cols += '<td class="text-center" style="width: 20%"><input type="text" class="form-control form-control-sm" name="drug_name[]" readonly></td>';
            cols += '<td class="text-center" style="width: 20%"><input type="text" class="form-control form-control-sm" name="drug_qty[]" required></td>';
            cols += '<td class="text-center" style="width: 10%"><input type="text" class="form-control form-control-sm" name="cost_price[]" readonly></td>';
            cols += '<td class="text-center" style="width: 10%"><input type="text" class="form-control form-control-sm" name="sell_price[]" readonly></td>';
            cols += '<td class="text-center" style="width: 10%"><input type="text" class="form-control form-control-sm" name="drug_total_price[]" readonly></td>';
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

        $("table.order-list").on("change", 'input[name^="sell_price"], input[name^="drug_qty"], input[name^="discount_rate"]', function(event) {
            calculateRow($(this).closest("tr"));
            calculateGrandTotal();
        });

        function calculateRow(row) {
            var price = +row.find('input[name^="sell_price"]').val();
            var qty = +row.find('input[name^="drug_qty"]').val();
            // var discount = +row.find('input[name^="discount_price"]').val();
            row.find('input[name^="drug_total_price"]').val((price * qty));
        }

        function calculateGrandTotal() {
            var total_price = 0;
            var discount = $("#discount_rate").val();

            $("table.order-list").find('input[name^="drug_total_price"]').each(function() {
                total_price += +$(this).val();
            });

            var discount_price = discount * total_price.toFixed(2) / 100;
            var grandtotal = total_price - discount_price;

            $("#discount_price").val(discount_price.toFixed(2));
            $("#grandtotal").val(grandtotal.toFixed(2));
        }

    });

    $('#employee_image').change(function() {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#preview-image-before-upload').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });

    $(document).ready(function() {
        $('#dateHitsory').datepicker();
        $('#dateHitsory').datepicker('setDate', 'today');
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
        //Clear Data
        $("#" + $rowId).find('input[name="drug_qty[]"]').val("");
        $("#" + $rowId).find('input[name="drug_total_price[]"]').val("");
        $('[name="discount_rate"]').val("");
        $('[name="discount_price"]').val("");
        $('[name="grandtotal"]').val("");

        //ส่งค่ามาแปะที่ฟอร์ม
        $("#" + $rowId).find('input[name="drug_id[]"]').val(drugId);
        $("#" + $rowId).find('input[name="drug_name[]"]').val(drugName);
        $("#" + $rowId).find('input[name="cost_price[]"]').val(costPrice);
        $("#" + $rowId).find('input[name="sell_price[]"]').val(sellPrice);

        $('#drugSearchModal').modal('hide');
    });
</script>
@endsection