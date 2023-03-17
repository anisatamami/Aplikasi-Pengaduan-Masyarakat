$(document).ready(function(){

    
$('#tampilLaporan').click(function(){
    var tglBayarSpp=$('#txtTglPengaduan').val();
    var url = window.location.origin+'/laporan/data-pengaduan';
    $.post(url,{txtTglPengaduan:tglBayarSpp},function(data){
        if(data!=null){
            $('#hasilCariLaporan').html(data);
        }
    });
});


$('a[data-confirm]').click(function(){
    var href = $(this).attr('href');
    var url = window.location.origin ;
    $('#myModal').find('.modal-title').text('Konfirmasi');
    $('#myModal').find('.modal-body').text($(this).attr('data-confirm'));
    $('#myModal').find('.btn-custom').text('Batal');
    $('#myModal').modal('show');
    $('#dataConfirmOK').show();
    $('#dataConfirmOK').attr('href',href)
    return false;
});


$(".alert").delay(2000).slideUp(200, function() {
    $(this).alert('close');
});


});