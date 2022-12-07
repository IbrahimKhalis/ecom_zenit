$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function changeStatus(){
    $.ajax({
        type: "POST",
        url: "url",
        data: "data",
        dataType: "dataType",
        success: function (response) {
            
        }
    });
}

