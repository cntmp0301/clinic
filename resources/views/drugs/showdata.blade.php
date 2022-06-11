@extends('layouts.app')

@section('content')
<!-- SweetAlert2 -->
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <div class="text-left">
                        <h3 class="mb-0">ประเภทยา&nbsp;</h3>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addType">+ เพิ่ม</button>
                    </div>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table id="TypeNameTab" class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort text-center" data-sort="name">ลำดับ</th>
                                <th scope="col" class="sort text-center" data-sort="name">ชื่อประเภทยา</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach($data['typedrugslist'] as $row)
                            <tr>
                                <td class="text-center">
                                    {{$loop->index+1}}
                                </td>
                                <td class="text-center">
                                    {{$row -> typename}}
                                </td>
                                <td class="text-right">
                                    <!--<a data-toggle="modal" data-target="#custDetailModal" class="btn btn-info">รายละเอียด</a>-->
                                    <a href="{{ url('/general/customer/editCustomer/'.$row->customer_number) }}" title="รายละเอียด" data-toggle="tooltip" class="btn btn-primary"><i class="fas fa-solid fa-eye"></i></a>
                                    <!-- <button type='button' class='btn btn-primary' title="แก้ไขข้อมูล" onclick='editType("{{$row -> id}}","{{$row -> typename}}")'><i class="fas fa-edit fa-sm"></i></button> -->
                                    <a href="#" data-target="#editType" data-toggle="modal" data-id="{{ $row -> id }}" data-typename="{{ $row -> typename }}" title="แก้ไขข้อมูล" class="btn btn-primary"><i class="fas fa-edit fa-sm"></i></a>
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

<div class="modal fade" id="addType" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มประเภทยา</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('addtype')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label> ชื่อประเภทยา </label>
                        <input type="text" name="typename" class="form-control" placeholder="">
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

<div class="modal fade" id="editType" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แก้ไขประเภทยา</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('updateType')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="idInModal" id="idInModal">
                <div class="modal-body">
                    <div class="form-group">
                        <label> ชื่อประเภทยา </label>
                        <input type="text" name="typenameInModal" id="typenameInModal" class="form-control" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ออก</button>
                    <button type="submit" name="savebtn" class="btn btn-primary">บันทึก</button>
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
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script><!-- sweetalert2-->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script><!-- axios-->


<script type="text/javascript">
    $(document).ready(function() {

        $("#editType").on("show.bs.modal", function(e) {
            var id = $(e.relatedTarget).data('id');
            var typename = $(e.relatedTarget).data('typename');
            $('#idInModal').val(id);
            $('#typenameInModal').val(typename);
        });

    });
</script>
@endsection