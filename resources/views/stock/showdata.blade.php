@extends('layouts.app')

@section('content')

<div class="container-fluid mt-5">
    @include('modal/tempDrugModal')
    <div class="card">
        <!-- <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    การรักษา
                </button>
            </h5>
        </div> -->

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne">
            <!-- <div class="card-body"> -->
            <form action="{{route('addStock')}}" method="post" enctype="multipart/form-data">
                @csrf
                <br>

                <div class="card">
                    <div class="card-header">
                        <div class="text-left">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                <h2>หน้าจัดการสต๊อกยา</h2>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="text-left col-md-3">
                                <label id="genStockId" for="stock_id" class="text-primary required"><i class="fa fa-plus">&nbsp;สร้างรหัสสต๊อก</i></label>
                                <input type="text" class="form-control readonly" id="stock_id" name="stock_id" style="background-color: #e9ecef;" required>
                            </div>
                            <div class="text-left col-md-3">
                                <label> วันที่เพิ่มสต๊อก </label>
                                <input type="text" name="dateStock" id="dateStock" class="form-control" value="<?php echo date('Y-m-d') ?>" readonly>
                            </div>
                            <div class="text-right col-md-6">
                                <!-- <input id="addDrug" type="button" class="btn btn-outline-primary btn-sm" value="เพิ่มยา"> -->
                                <input id="addDrug" type="button" class=" btn btn-primary" value="เพิ่มยา">
                            </div>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <input id="rowcounter" type="hidden" value="1">
                            <table id="drugList" class="table align-items-center table-bordered table-sm order-list" style="width:100%">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort text-center" data-sort=""></th>
                                        <th scope="col" class="sort text-center" data-sort="">รหัสยา</th>
                                        <th scope="col" class="sort text-center" data-sort="">ชื่อยา</th>
                                        <th scope="col" class="sort text-center" data-sort="">จำนวน</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    <tr id="0">
                                        <td class="text-center" style="width: 5%">
                                            <label for="inputDrug" class="text-primary"><i class="fa fa-search searchDrug" data-toggle="modal" data-target="#tempDrugSearchModal">&nbsp;ค้นหา</i></label>
                                        </td>
                                        <td class="text-center" style="width: 20%"><input type="text" class="form-control form-control-sm" name="drug_id[]" readonly></td>
                                        <td class="text-center" style="width: 20%"><input type="text" class="form-control form-control-sm" name="drug_name[]" readonly></td>
                                        <td class="text-center" style="width: 20%"><input type="text" class="form-control form-control-sm" name="drug_qty[]" required></td>
                                        <td class="text-center" style="width: 10%"></td>
                                    </tr>
                                    <input type="hidden" id="lastRow">
                                </tbody>
                            </table>

                            <input type="hidden" id="rowId">
                        </div>
                    </div>
                </div>
                <br>
                <div class="text-center">
                    <button type="submit" name="savebtn" class="btn btn-primary">อัพเดทสต๊อก</button>
                    <!-- <a href="" title="บันทึกประวัติการรักษา" data-toggle="tooltip" class="btn btn-primary">บันทึกประวัติการรักษา</a> -->
                    <input id="" type="button" class="btn btn-danger" value="ยกเลิก">
                </div>
                <br>
            </form>
            <!-- </div> -->
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script><!-- sweetalert2-->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script><!-- axios-->

<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function() {
        //เพิ่มแถว
        $("#addDrug").on("click", function() {
            // alert($("input[name='drug_id[]']").val());
            // $("input[name='drug_id[]']").each(function() {
            //     alert($(this).val());
            // });
            var counter = $("#rowcounter").val();
            var newRow = $("<tr class=addedrow id=" + counter + ">");
            var cols = "";
            cols += '<td class="text-center"><label for="inputDrug" class="text-primary"><i class="fa fa-search searchDrug" data-toggle="modal" data-target="#tempDrugSearchModal">&nbsp;ค้นหา</i></label></td>';
            cols += '<td class="text-center" style="width: 20%"><input type="text" class="form-control form-control-sm" name="drug_id[]" readonly></td>';
            cols += '<td class="text-center" style="width: 20%"><input type="text" class="form-control form-control-sm" name="drug_name[]" readonly></td>';
            cols += '<td class="text-center" style="width: 20%"><input type="text" class="form-control form-control-sm" name="drug_qty[]" required></td>';
            cols += '<td class="text-center"><input type="button" class="ibtnDel btn btn-md btn-danger btn-sm" value="ลบ"></td>';
            newRow.append(cols);
            $("#lastRow").before(newRow);
            counter++;
            $("#rowcounter").val(counter);
        });
        //ลบแถว
        $("table.order-list").on("click", ".ibtnDel", function(event) {
            $(this).closest("tr").remove();
        });

        $('.btnSelectDrug').on('click', function() {

            var $rowId = $('#rowId').val();
            var $row = jQuery(this).closest('tr');
            var $columns = $row.find('td');
            $columns.addClass('row-highlight');
            var drugId = "";
            var drugName = "";

            var count = 0;
            jQuery.each($columns, function(i, item) {
                item.innerHTML;
                if (count == 0) {
                    drugId = item.innerHTML;
                    drug_Id = item.innerHTML;
                }
                if (count == 1) {
                    drugName = item.innerHTML;
                }
                count++;
            });

            $("input[name='drug_id[]']").each(function() {
                drugId = drug_Id;

                // alert(drugId);
                // alert(($(this).val()));

                // กรณีที่จะเลือกยาใหม่แต่ซ้ำกับตัวเดิมที่เคยเลือกไปแล้ว
                if (drugId == ($(this).val())) {
                    drugId = drug_Id;
                    // alert(1);

                    Swal.fire({
                        icon: 'error',
                        text: 'ยาตัวนี้ถูกเลือกไปแล้ว'
                    })
                    exit;

                    // กรณีที่จะเลือกยาใหม่ 
                } else if (drugId = !($(this).val())) {

                    drugId = drug_Id;
                    // alert(2);

                    //Clear Data
                    $("#" + $rowId).find('input[name="drug_qty[]"]').val("");

                    //ส่งค่ามาแปะที่ฟอร์ม
                    $("#" + $rowId).find('input[name="drug_id[]"]').val(drugId);
                    $("#" + $rowId).find('input[name="drug_name[]"]').val(drugName);

                    $("button[class=close]").trigger('click');
                }

            });

            if (drugId = !($(this).val())) {

                drugId = drug_Id;
                // alert(3);

                //Clear Data
                $("#" + $rowId).find('input[name="drug_qty[]"]').val("");

                //ส่งค่ามาแปะที่ฟอร์ม
                $("#" + $rowId).find('input[name="drug_id[]"]').val(drugId);
                $("#" + $rowId).find('input[name="drug_name[]"]').val(drugName);

                $("button[class=close]").trigger('click');
            }

        });
    });
    $('#genStockId').on('click', function() {
        var date = new Date();
        var components = [
            "ST-",
            date.getYear(),
            date.getMonth(),
            date.getDate(),
            date.getHours(),
            date.getMinutes(),
            date.getSeconds()
        ];

        var id = components.join("");
        $("#stock_id").val(id);
    });

    $(document.body).on('click', '.searchDrug', function() {
        var rowId = $(this).closest('tr').attr('id');
        $("#rowId").val(rowId);
    });
</script>

@endsection