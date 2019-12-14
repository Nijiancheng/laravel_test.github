let that;

function doDel(_this){
    let id = $(_this).attr("data-id");
    let that = $(_this).parent().parent();
    if(confirm("您是否要删除这条数据")){
        // console.log(that);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/user/del",
            method: "post",
            dataType: "json",
            data: {'id':id},
            success: function success(data) {
                if (data.status) {
                    alert(data.info);
                    // console.log(data.info);
                    that.remove();
                }else{
                    alert(data.info);
                }
            }
        });
    }

}
