$(document).ready(function(){
    $('#keyword').on('keyup',function(){
        $('#cari').hide();
        $('.loader').show();
        $.get('cari.php?keyword=' + $('#keyword').val(),function(data){
            $('.cont').html(data);
        }); 
    });

    $('#jenis_keyword').on('change', function() {
            $('#cari').hide();
            $('.loader').show();
            $.get('cari.php?keyword=' + $('#jenis_keyword').val(),function(data){
                $('.cont').html(data);
            });
    })

});
