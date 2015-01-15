$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-XSRF-TOKEN': $.cookie('XSRF-TOKEN')
        }
    });

    $(".tabs a").click(function(el){
        el.preventDefault();
        $(".tabs li").removeClass('active');
        $(this).parent('li').addClass('active');
        $('.panel').hide();
        $(this.hash).fadeIn();
    });
    $("#fine-uploader").fineUploaderS3({
        debug: true,
        validation: { itemLimit: 3 },
        signature: {
            endpoint: '/s3/signature',
            customHeaders: {
                'X-XSRF-TOKEN': $.cookie('XSRF-TOKEN')
            }
        },
        retry: { enableAuto: false },
        request: {
            endpoint: 'tapquote.s3.amazonaws.com/',
            accessKey: 'AKIAJZNIXSUBCNFAFSMQ'
        },
        scaling: {
            sendOriginal: false,
            sizes: [
                {name: "resized", maxSize: 500}
            ]
        },
        acceptFiles: 'image/*'
    })
        .on("submitted", function(event, id, name){
            var file = $(this).fineUploader("getFile", id);
            EXIF.getData(file, function() {
                console.log(EXIF.pretty(file));
            });
        })
        .on("statusChange", function(event, id, oldStatus, newStatus) {
            var netUploads = $(this).fineUploader("getRemainingAllowedItems");
            if(netUploads === 0) {
                $('.qq-upload-button').addClass('qq-hide');
            }
            else {
                $('.qq-upload-button').removeClass('qq-hide');
            }
        });
    $("#project_form").on("submit", function(e) {

        e.preventDefault();

        var project = $(this).serializeArray();

        var uploads = $("#fine-uploader").fineUploader("getUploads");

        var photos = [];

        $.each(uploads, function( index, element ) {
            photos.push('https://s3-us-west-2.amazonaws.com/tapquote/'+$("#fine-uploader").fineUploader("getKey", element.id));
        });

        project.push({name: 'project[photos]', value: photos});

        $.post( "/projects", project, function(){
        //    alert('Project Created.')
       //     window.location.reload();
        });

      });
      $("#pro_form").on("submit", function(e){

          e.preventDefault();
          var pro = $(this).serialize();

          $.post('/pros', pro, function(){
         //   alert('You are now registered.  Details will be sent via text.');
         //   window.location.reload();
          });

    });
});