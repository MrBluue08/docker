$(document).ready(function(){
    console.log($('#typeSearch').val());
    let startList = $('#list').html();
    console.log(startList);
    setTimeout(function() {
        $('#searchBar').keyup(function(){
            let query = $(this).val();
            if(query != ''){
                $.ajax({
                    url: $('#typeSearch').val(),
                    method: 'GET',
                    data: {'searchBar': query},
                    dataType: 'json',
                    success: function(data){
                        $('#list').html(data);
                        console.log(data);
                    }
                })
            }else{
                $('#list').html(startList);
            }
        })
    }, 2000)
}
)