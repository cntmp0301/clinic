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
                                <h3 class="mb-0">ตารางส่งรายชื่อคนไข้(เด็ก)&nbsp;</h3>
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
                                    <!-- <a href="{{url('/sendpatientchild/startPatientChildLog/'.$row->patient_id)}}" title="ส่งชื่อคนไข้" data-toggle="tooltip" class="btn btn-primary"><i class="fa-solid fa-check"></i></a> -->
                                    <button type='button' class='btn btn-primary' title="ส่งชื่อคนไข้" onclick='checkChildSwal("{{$row -> patient_id}}","{{$row -> name}}")'><i class="fa-solid fa-arrow-right-to-bracket"></i></button>
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

<div class="modal fade" id="addpatientbone" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลคนไข้เด็ก</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('addpatientbone')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label> ชื่อ </label>
                        <input type="text" name="name" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label> ชื่อเล่น </label>
                        <input type="text" name="nickname" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>เบอร์โทร</label>
                        <input type="text" name="tel" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label> ที่อยู่ </label>
                        <input type="text" name="contact" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>เพศ</label>
                        <select name="sex" class="form-control">
                            @foreach($data['sex'] as $row)
                            <option value="{{$row -> id}}">{{$row -> sex_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>อายุ</label>
                        <input type="text" name="age" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label> ประวัติการแพ้ยา </label>
                        <input type="text" name="drug_allergy" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>รูป</label>
                        <input type="file" class="form-control" name="users_image" id="users_image">
                    </div>
                    <div class="form-group">
                        <label> LINE ID </label>
                        <input type="text" name="line_id" class="form-control" placeholder="">
                    </div>
                    <input type="hidden" name="type" value="เด็ก">
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script><!-- sweetalert2-->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script><!-- axios-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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

    function checkChildSwal(patient_id, name) {
        var _token = $('input[name="_token"').val();
        $.ajax({
            url: "{{route('CheckDataChild')}}",
            method: "POST",
            data: {
                patient_id: patient_id,
                _token: _token
            },
            dataType: "json",
            success: function(result) {
                console.log(result.count_data);
                var count_data = result.count_data;
                if (count_data > 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'คุณส่งรายชื่อคนไข้ไปแล้ว!'
                    })
                } else {
                    Swal.fire({
                        title: 'คุณต้องการส่งคนไข้ชื่อ ' + name + ' ใช่หรือไม่?',
                        icon: 'warning',
                        showLoaderOnConfirm: true,
                        confirmButtonText: 'ตกลง',
                        showCancelButton: true,
                        cancelButtonText: 'ยกเลิก',
                        preConfirm: () => {
                            return axios
                                .post("{{route('startPatientChildLog')}}", {
                                    patient_id
                                })
                                .then(res => {
                                    return res.data;
                                })
                                .catch(err => {
                                    Swal.showValidationMessage(err.response.data.message);
                                });
                        },
                        allowOutsideClick: () => !Swal.isLoading()
                    }).then(result => {
                        Swal.fire({
                            icon: 'success',
                            title: result.value.message,
                        });
                    });
                }
            }
        })
    }

    // function checkChildSwal(patient_id,name) 
    // {
    //     Swal.fire({
    //         title: 'คุณต้องการส่งคนไข้ชื่อ '+ name +' ใช่หรือไม่?',
    //         icon: 'warning',
    //         showLoaderOnConfirm: true,
    //         confirmButtonText: 'ตกลง',
    //         showCancelButton: true,
    //         cancelButtonText: 'ยกเลิก',
    //         preConfirm: () => {
    //             return axios
    //                 .post("{{route('startPatientChildLog')}}", {
    //                     patient_id
    //                 })
    //                 .then(res => {
    //                     return res.data;
    //                 })
    //                 .catch(err => {
    //                     Swal.showValidationMessage(err.response.data.message);
    //                 });
    //         },
    //         allowOutsideClick: () => !Swal.isLoading()
    //     }).then(result => {
    //         Swal.fire({
    //             icon: 'success',
    //             title: result.value.message,
    //         });
    //     });
    // }
</script>
@endsection