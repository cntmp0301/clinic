jQuery('.numbersOnly').keyup(function() {
    this.value = this.value.replace(/[^0-9\.]/g, '');
});

function diffdate(startdate, enddate) {
    days =
        (Date.parse(enddate) - Date.parse(startdate)) / (1000 * 60 * 60 * 24);
    return Math.ceil(days);
}

$(".delbtn").on("click", function () {
    return confirm("คุณต้องการลบข้อมูลใช่หรือไม่?");
});

$(".savebtn").on("click", function () {
    return confirm("คุณต้องการบันทึกข้อมูลใช่หรือไม่?");
});

Date.prototype.toInputFormat = function () {
    var yyyy = this.getFullYear().toString();
    var mm = (this.getMonth() + 1).toString(); // getMonth() is zero-based
    var dd = this.getDate().toString();
    return (
        yyyy +
        "-" +
        (mm[1] ? mm : "0" + mm[0]) +
        "-" +
        (dd[1] ? dd : "0" + dd[0])
    ); // padding
};

$(".dtab").DataTable({
    columnDefs: [
        {
            defaultContent: "-",
            targets: "_all",
        },
    ],
    language: {
        paginate: {
            previous: "<",
            next: ">",
        },
    },
    lengthMenu: [10, 20, 50, 100],
    oLanguage: {
        sSearch: "ค้นหา:",
        sLengthMenu: " แสดง _MENU_ รายการ/หน้า",
        sInfo: "รายการที่ _START_ ถึง _END_ จากทั้งหมด _TOTAL_ รายการ",
    },
});

function setStartDate(date) {
    return new Date(date.getFullYear(), date.getMonth(), date.getDate());
}
