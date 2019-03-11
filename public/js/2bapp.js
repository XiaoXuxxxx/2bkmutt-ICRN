function checkEdit (token) {
    swal({
            title: "จะแก้ไขจริงหรอ?!",
            text: "เอาให้แน่ใจก่อนกดแก้เด้อออ...",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#26a69a",
            confirmButtonText: "แก้โลดดด",
            cancelButtonText: "เช็คใหม่แปป",
            closeOnConfirm: true
        },
        function () {
            window.location = "tools/edit-user";
        }
    );
}
