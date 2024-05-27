$(document).ready(function() {
    var btns = $('.popUp');
    btns.each(function(){
        var ids = $(this).attr('id').split(',');
        var sponsor = ids[0];
        var room = ids[1];
    
        $(this).click(function() {
            if (confirm('¿Quieres sponsorizar esta sala?')) {
                // Construct the URL with query parameters
                var url = '/admin/sponsorRoom'; // Use the route's URL
                $.ajax({
                    url: url,
                    method: 'GET',
                    data: {
                        'sponsor': sponsor,
                        'room': room,
                    },
                    dataType: 'json',
                    success: function(data){
                        console.log('succes');
                    }
                })
            }
        });
    })
});
