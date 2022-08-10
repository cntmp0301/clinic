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
                                <h3 class="mb-0">ตารางแสดงรายการยา&nbsp;</h3>
                            </div>
                            <?php if (auth()->user()->type == 1) { ?>
                                <div class="text-right">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDrugs">+ เพิ่มรายการยา</button>
                                </div>
                            <?php } ?>
                        </div>

                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort text-center" data-sort="id">ลำดับ</th>
                                <th scope="col" class="sort text-center" data-sort="drug_name">ชื่อยา</th>
                                <th scope="col" class="sort text-center" data-sort="cost_price">ราคาต้นทุน</th>
                                <th scope="col" class="sort text-center" data-sort="sell_price">ราคาขาย</th>
                                <th scope="col" class="sort text-center" data-sort="item_qty">จำนวนคงเหลือ</th>
                                <th scope="col" class="sort text-center" data-sort="description">รายละเอียด</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach($data['drugslist'] as $row)
                            <tr>
                                <td class="text-center">
                                    {{$loop->index+1}}
                                </td>
                                <td class="text-center">
                                    {{$row -> drug_name}}
                                </td>
                                <td class="text-center">
                                    {{$row -> cost_price}}
                                </td>
                                <td class="text-center">
                                    {{$row -> sell_price}}
                                </td>
                                <td class="text-center">
                                    {{$row -> item_qty}}
                                </td>
                                <td class="text-center">
                                    {{$row -> description}}
                                </td>
                                <td class="text-right">
                                    <!--<a data-toggle="modal" data-target="#custDetailModal" class="btn btn-info">รายละเอียด</a>-->
                                    <a href="{{ url('/general/customer/editCustomer/'.$row->customer_number) }}" title="รายละเอียด" data-toggle="tooltip" class="btn btn-primary"><i class="fas fa-solid fa-eye"></i></a>
                                    <a href="{{ url('/patientchild/addpatientchild/'.$row->patient_id) }}" title="แก้ไขข้อมูล" data-toggle="tooltip" class="btn btn-primary"><i class="fas fa-edit fa-sm"></i></a>
                                    <!-- <a href="{{ url('/general/customer/softDeleteCustomer/'.$row->customer_number) }}" title="ลบข้อมูล" data-toggle="tooltip" class="btn btn-danger delbtn"><i class="fa fa-trash fa-sm" aria-hidden="true"></i></a> -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Card footer -->
                <!-- <div class="card-footer py-4">
                    <nav aria-label="...">
                        <ul class="pagination justify-content-end mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">
                                    <i class="fas fa-angle-left"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="fas fa-angle-right"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div> -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addDrugs" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลรายการยา</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('addDrugs')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label id="genDrugId" for="drug_id" class="text-primary required"><i class="fa fa-plus">&nbsp;สร้างรหัสยา</i></label>
                        <input type="text" class="form-control" id="drug_id" name="drug_id" readonly>
                    </div>
                    <div class="form-group">
                        <label> ชื่อยา </label>
                        <input type="text" name="drug_name" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label> ราคาต้นทุน </label>
                        <input type="text" name="cost_price" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>ราคาขาย</label>
                        <input type="text" name="sell_price" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label> จำนวน</label>
                        <input type="text" name="item_qty" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>รายละเอียด</label>
                        <input type="text" name="description" class="form-control" placeholder="">
                    </div>
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">
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

    $('#genDrugId').on('click', function() {
        var date = new Date();
        var components = [
            "DG-",
            date.getYear(),
            date.getMonth(),
            date.getDate(),
            date.getHours(),
            date.getMinutes(),
            date.getSeconds()
        ];

        var id = components.join("");
        $("#drug_id").val(id);
    });
</script>

@endsection