$(document).ready(function(){
// buat event ketika keyword ditulis
    $('#keyword').on('keyup',function(){
// hilangkan tombol cari
    $('#cari').hide();
// memunculkan icon loading 
    $('.loader').show();
// sistem load hanya bisa $_GET() versi load
    //    $('.cont').load('cari.php?keyword=' + $('#keyword').val());
    
//$.get()
       $.get('cari.php?keyword=' + $('#keyword').val(),function(data){
        $('.cont').html(data);
        // $('.loader').hide();
    }); 
    });

});
