$(document).ready(function () {

    yoursli = 1,
        allli = 0,

        $('.yours_li').click(function () {

            if (yoursli == 0 && allli == 1) {
                $('.yours_table').toggleClass('displaynone');
                $('.all_table').toggleClass('displaynone');
                $('.yours_li').removeClass('tab_down').addClass('tab_up');
                $('.all_li').removeClass('tab_up').addClass('tab_down');
                yoursli = 1;
                allli = 0;
            }

        })


    $('.all_li').click(function () {

        if (yoursli == 1 && allli == 0) {
            $('.yours_table').toggleClass('displaynone');
            $('.all_table').toggleClass('displaynone');
            $('.yours_li').removeClass('tab_up').addClass('tab_down');
            $('.all_li').removeClass('tab_down').addClass('tab_up');
            yoursli = 0;
            allli = 1;
        }
    })


    $('#fileupload').fileupload({
        url: 'upload/PlayerIconUpload.php',
        formData: {},
        dataType: 'json',
        autoUpload: true,
        acceptFileTypes: /(\.|\/)(jpg|png|gif|jpeg|bmp)$/i,
        disableImageResize: false,
        previewMaxWidth: 100,
        previewMaxHeight: 100,
    }).on('fileuploadsubmit', function (e, data) {
        $('#uploading_cover').css('display', 'inline-block');
    }).on('fileuploadprogressall', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
    }).on('fileuploaddone', function (e, data) {
        $('#uploading_cover').css('display', 'none');
        $('#player_avatar').attr('src', 'images/playericon/'+data.result.file.name);
        console.log(data);
    }).on('fileuploadfail', function (e, data) {

    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');


});
