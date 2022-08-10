@extends('layouts.app')

@section('content')
<html>
<style>
    .dataTables_filter {
        float: right;
    }

    .dataTables_info {
        float: left;
    }

    .dataTables_paginate {
        float: right;
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
                                <h3 class="mb-0">รายชื่อคนไข้รอตรวจ(เด็ก)&nbsp;</h3>
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
                            @foreach($data['patientlog'] as $row)
                            <tr>
                                <td class="text-center">
                                    {{$loop->index+1}}
                                </td>
                                <td class="text-center">
                                    {{$row -> patient_list -> name}}
                                </td>
                                <td class="text-center">
                                    {{$row -> patient_list -> nickname}}
                                </td>
                                <td class="text-center">
                                    {{$row -> patient_list -> sexname -> sex_name}}
                                </td>
                                <td class="text-center">
                                    {{$row -> patient_list -> tel}}
                                </td>
                                <td class="text-center">
                                    {{$row -> patient_list -> address}}
                                </td>
                                <td class="text-center">
                                    {{$row -> patient_list -> line_id}}
                                </td>
                                <td class="text-right">
                                    <!--<a data-toggle="modal" data-target="#custDetailModal" class="btn btn-info">รายละเอียด</a>-->
                                    <a href="{{url('/patientcheckchild/patientChildDetail/'.$row->patient_id)}}" title="รายละเอียด" data-toggle="tooltip" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
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
    $('#image').change(function() {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#preview_image').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });

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