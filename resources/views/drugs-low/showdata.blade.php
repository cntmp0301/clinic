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
                                <h3 class="mb-0">ตารางแสดงรายการยา(ใกล้หมด)&nbsp;</h3>
                            </div>
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


@endsection