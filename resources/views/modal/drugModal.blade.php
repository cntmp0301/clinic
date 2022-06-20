<div class="modal fade" id="drugSearchModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ค้นหาข้อมูลยา</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="drug" class="table table-bordered table-sm align-items-center" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th scope="col" class="sort text-center">รหัสยา</th>
                                <th scope="col" class="sort text-center">ชื่อยา</th>
                                <th scope="col" class="sort text-center">ราคาต้นทุน</th>
                                <th scope="col" class="sort text-center">ราคาขาย</th>
                                <th scope="col" class="sort text-center">จำนวน</th>
                                <th scope="col" class="sort text-center">คำอธิบาย</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach($data['druglist'] as $row)
                            <tr>
                                <td class="text-center">{{$row -> drug_id}}</td>
                                <td class="text-center">{{$row -> drug_name}}</td>
                                <td class="text-center">{{$row -> cost_price}}</td>
                                <td class="text-center">{{$row -> sell_price}}</td>
                                <td class="text-center">{{$row -> item_qty}}</td>
                                <td class="text-center">{{$row -> description}}</td>
                                <td class="text-center">
                                    <a class="btn btn-outline-info btnSelectDrug">เลือก</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#drug').DataTable();

        $('.btnSelectDrug').on('click', function() {
            // alert(1);
            var $rowId = $('#rowId').val()
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
    });
</script>