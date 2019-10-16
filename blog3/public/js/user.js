let that;
function doDel(_this){
    let id = $(_this).attr("data-id");
    let that = $(_this).parent().parent();
    console.log(that);
    $.ajax({
        url: "/user/del/" +id,
        method: "delete",
        data: {},
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function success(data) {
            console.log(data);
            if (data.status) {
                alert(data.info);
                that.remove();
                return;
            }else{
                alert(data.info);
            }

        }
    });
}
