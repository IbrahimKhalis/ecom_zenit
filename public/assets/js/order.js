function change(){

    $.ajax({
        type: "POST",
        url: "{{ url('/order') }}",
        data: "data",
        dataType: "dataType",
        success: function (response) {
            
        }
    });
}