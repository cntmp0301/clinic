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
                            <input type="text" class="form-control" id="patient_id" name="patient_id" value="{{$data['patient_list'][0] -> patient_id}}" readonly>
                        </div>

                        <div class="form-group col-md-7">
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

                        <div class="form-group col-md-1">
                            <label for="patient_age">อายุ</label>
                            <input type="text" class="form-control" id="patient_age" name="patient_age" value="{{$data['patient_list'][0] -> age}}" readonly>
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
            <div class="card">
                <div class="card-header">
                    <div class="text-left">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            ข้อมูลจ่ายยา
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
                                    <td class="text-center" style="width: 20%"><input type="text" class="form-control form-control-sm" name="drug_id[]"></td>
                                    <td class="text-center" style="width: 20%"><input type="text" class="form-control form-control-sm" name="drug_name[]"></td>
                                    <td class="text-center" style="width: 20%"><input type="text" class="form-control form-control-sm" name="drug_qty[]"></td>
                                    <td class="text-center" style="width: 10%"><input type="text" class="form-control form-control-sm" name="cost_price[]"></td>
                                    <td class="text-center" style="width: 10%"><input type="text" class="form-control form-control-sm" name="sell_price[]"></td>
                                    <td class="text-center" style="width: 10%"><input type="text" class="form-control form-control-sm" name="drug_total_price[]"></td>
                                    <td class="text-center" style="width: 10%"></td>
                                </tr>
                                <!--แทรก Row-->
                                <!-- <tr id="lastRowTax">
                                    <td class="text-center" colspan="5"></td>
                                    <td class="text-right">
                                        <H5>รวมเงินก่อนหักส่วนลดการค้า</H5>
                                    </td>
                                    <td class="text-center"></td>
                                    <td class="text-center"><input type="text" class="form-control form-control-sm" id="total_price" name="total_price" readonly></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr id="lastRowTax">
                                    <td class="text-center" colspan="5"></td>
                                    <td class="text-right">
                                        <H5>ส่วนลดการค้า(%)</H5>
                                    </td>
                                    <td class="text-center"><input type="number" class="form-control form-control-sm" id="discount_rate" name="discount_rate"></td>
                                    <td class="text-center"><input type="text" class="form-control form-control-sm" id="discount_price" name="discount_price" readonly></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr id="lastRowTax">
                                    <td class="text-center" colspan="5"></td>
                                    <td class="text-right">
                                        <H5>รวมเงินก่อนหักภาษี</H5>
                                    </td>
                                    <td class="text-center"></td>
                                    <td class="text-center"><input type="text" class="form-control form-control-sm" id="total_price_discount" name="total_price_discount" readonly></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr id="lastRowTax">
                                    <td class="text-center" colspan="5"></td>
                                    <td class="text-right">
                                        <H5>ฐานภาษี</H5>
                                    </td>
                                    <td class="text-center"></td>
                                    <td class="text-center"><input type="text" class="form-control form-control-sm" id="tax_base" name="tax_base" readonly></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr id="lastRowTax">
                                    <td class="text-center" colspan="5"></td>
                                    <td class="text-right">
                                        <H5>ภาษีมูลค่าเพิ่ม</H5>
                                    </td>
                                    <td class="text-center"><input type="number" class="form-control form-control-sm" id="vat_percentage" name="vat_percentage"></td>
                                    <td class="text-center"><input type="text" class="form-control form-control-sm" id="total_vat" name="total_vat" readonly></td>
                                    <td class="text-center"></td>
                                </tr> -->
                                <tr id="lastRow">
                                    <td class="text-center" colspan="5"></td>
                                    <td class="text-right">
                                        <H5>จำนวนเงินทั้งสิ้น</H5>
                                    </td>
                                    <td class="text-center"><input id="grandtotal" type="text" class="form-control form-control-sm" name="grandtotal" readonly></td>
                                    <td class="text-center"></td>
                                </tr>
                            </tbody>
                        </table>
                        <input type="hidden" id="rowId">
                    </div>
                </div>
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
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
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
        //ส่งค่ามาแปะที่ฟอร์ม
        $("#" + $rowId).find('input[name="drug_id[]"]').val(drugId);
        $("#" + $rowId).find('input[name="drug_name[]"]').val(drugName);
        $("#" + $rowId).find('input[name="cost_price[]"]').val(costPrice);
        $("#" + $rowId).find('input[name="sell_price[]"]').val(sellPrice);
        
        $('#drugSearchModal').modal('hide');
    });
</script>
@endsection