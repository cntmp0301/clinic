@extends('layouts.app')

@section('content')

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
                    <table class="table align-items-center table-flush">
                        <div class="card-header border-0">
                            <div class="text-left">
                                <h3 class="mb-0">ตารางแสดงข้อมูลคนไข้เด็ก&nbsp;</h3>
                            </div>
                            <div class="text-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addpatientchild">+ เพิ่ม</button>
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
                                    {{$row -> contact}}
                                </td>
                                <td class="text-center">
                                    {{$row -> line_id}}
                                </td>
                                <td class="text-right">
                                    <!--<a data-toggle="modal" data-target="#custDetailModal" class="btn btn-info">รายละเอียด</a>-->
                                    <a href="{{ url('/general/customer/editCustomer/'.$row->customer_number) }}" title="รายละเอียด" data-toggle="tooltip" class="btn btn-primary"><i class="fas fa-solid fa-eye"></i></a>
                                    <a href="{{ url('/patientchild/addpatientchild/'.$row->id) }}" title="แก้ไขข้อมูล" data-toggle="tooltip" class="btn btn-primary"><i class="fas fa-edit fa-sm"></i></a>
                                    <!-- <a href="{{ url('/general/customer/softDeleteCustomer/'.$row->customer_number) }}" title="ลบข้อมูล" data-toggle="tooltip" class="btn btn-danger delbtn"><i class="fa fa-trash fa-sm" aria-hidden="true"></i></a> -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Card footer -->
                <div class="card-footer py-4">
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
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addpatientchild" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลคนไข้เด็ก</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('addpatientchild')}}" method="POST" enctype="multipart/form-data">
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
                            <option value="{{$row -> id}}">{{$row -> name}}</option>
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
                        <input type="file" class="form-control" name="users_image">
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

@endsection