/*$('.schedule-datepicker').datepicker({
    Default: true,
    todayHighlight : true,
    format: 'dd-mm-yyyy',
    autoclose: true
}); */

// ACTIVATE DATE 
$("#competition_type").change(function(){
    var type = $("#competition_type").val();
    
    if(type == 1){
        $('#schedule_datepicker_end_date').css('display', 'none');
        $('#schedule_datepicker_start_date').css('display', 'block');
    }else if(type == 2){
        $('#schedule_datepicker_end_date').css('display', 'block');
        $('schedule_datepicker_start_date').css('display', 'block');
    }else if(type == 3){
        $('#schedule_datepicker_end_date').css('display', 'block');
        $('schedule_datepicker_start_date').css('display', 'block');
    }else{
        $('#schedule_datepicker_end_date').css('display', 'block');
        $('schedule_datepicker_start_date').css('display', 'block');
    }    
});


$("#type").change(function(){
    var type = $("#type").val();

    if(type == 'free'){
        $('#price').val(0);
    }else if(type == 'buy'){
        $('#price').val('');
    }
}); 

$('.select2').select2({
    placeholder: 'Choose one',
    searchInputPlaceholder: 'Search options'
});


$(document).ready(function() {
        
    var baseurl=window.location.origin;

    // app form submit
    $('#AppSubmitButton').click(function(e){
        e.preventDefault();
        for ( instance in CKEDITOR.instances ) {
            CKEDITOR.instances[instance].updateElement();  
        }
        var data = new FormData(document.getElementById("AppForm"));
    
        /*Ajax Request Header setup*/
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });   
    
        /* Submit form data using ajax*/
        $.ajax({
            url: baseurl+"/content/admin/app_update",
            method: 'post',
            data: data,
            dataType : "json", 
            contentType: false,
            processData: false,
            cache: false,
            global: false,
            beforeSend: function() { 
                    $("#AppSubmitButton").prop('disabled', true); // disable button
                    },
            success: function(response){
                //------------------------
                alert(response.message);
                window.location.href = baseurl+'/content/admin/app-list'; 
            
                //--------------------------
            },
            error: function (reject) {
                var errors = $.parseJSON(reject.responseText);
                            
                $.each(errors.errors, function (key, val) {
                                
                    $("#" + key + "_error").text(val);
                
                });
                        
                $("#AppSubmitButton").prop('disabled', false); // disable button
            }

        });
    });
   
    //wallpaper form submit
    $('#WallpaperSubmitButton').click(function(e){
        e.preventDefault();

        for ( instance in CKEDITOR.instances ) {
            CKEDITOR.instances[instance].updateElement();
        }
        var data = new FormData(document.getElementById("WallpaperForm"));
        // console.log(data);
        alert('fine');

        /*Ajax Request Header setup*/
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });   

        /* Submit form data using ajax*/
        $.ajax({
            url: baseurl+"/content/admin/app_wallpaper",
            method: 'post',
            data: data,
            dataType : "json", 
            contentType: false,
            processData: false,
            cache: false,
            global: false,
            beforeSend: function() { 
                $("#WallpaperSubmitButton").prop('disabled', true); // disable button
            },
            success: function(response){
                //------------------------
                alert(response.message);
                window.location.href = baseurl+'/content/admin/wallpaper-list'; 
            
                //--------------------------
            },
            error: function (reject) {
                var errors = $.parseJSON(reject.responseText);
                            
                $.each(errors.errors, function (key, val) {
                                
                    $("#" + key + "_error").text(val);
                
                });
                        
                $("#WallpaperSubmitButton").prop('disabled', false); // disable button
            }

        });
    });

    //video form submit
    $('#VideoSubmitButton').click(function(e){
        e.preventDefault();

        for ( instance in CKEDITOR.instances ) {
            CKEDITOR.instances[instance].updateElement();
        }

        var data = new FormData(document.getElementById("VideoForm"));

        /*Ajax Request Header setup*/
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });   
    
        /* Submit form data using ajax*/
        $.ajax({
            url: baseurl+"/content/admin/video_store",
            method: 'post',
            data: data,
            dataType : "json", 
            contentType: false,
            processData: false,
            cache: false,
            global: false,
            beforeSend: function() { 
                $("#VideoSubmitButton").prop('disabled', true); // disable button
            },
            success: function(response){
                //------------------------
                alert(response.message);
                window.location.href = baseurl+'/content/admin/video-list'; 
                
                //--------------------------
            },
            error: function (reject) {
                var errors = $.parseJSON(reject.responseText);
                            
                $.each(errors.errors, function (key, val) {
                                
                    $("#" + key + "_error").text(val);
                
                });
                        
                $("#VideoSubmitButton").prop('disabled', false); // disable button
            }

        });
    });

    //Game table
    var table;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // User table
    table = $('#UsrTable').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": baseurl+"/game/admin/ajax_game_list",
            "type": "POST"
        },

        columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'image' },
            { data: 'description' },
            { data: 'rule' },
            { data: 'action' }
         ]
    });

    MediaTable = $('#MediaTable').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": baseurl+"content/admin/media/ajax_media_list",
            "type": "POST",
             dataSrc: 'data'
        },

        columns: [
            { data: 'Id' },
            { data: 'Media Type' },
            { data: 'Images' },
            { data: 'Status' },
            { data: 'Created at' },
            { data: 'Updated at' },
            { data: 'Action' }
        ]
    });

    //App table
    var apptable;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //datatables
    apptable = $('#AppTable').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": baseurl+"/content/admin/ajax_content_list",
            "type": "POST",
            "data" : {  post_type : 'application'},
        },

        columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'image' },
            { data: 'description' },
            { data: 'top_chart' },
            { data: 'action' }
         ]
    });

    //Wallaper table
    var wallpapertable;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //datatables
    wallpapertable = $('#WallpaperTable').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": baseurl+"/content/admin/ajax_wallpaper_content_list",
            "type": "POST",
            "data" : {  post_type : 'wallpaper'},
        },

        columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'image' },
            { data: 'description' },
            { data: 'top_chart' },
            { data: 'action' }
         ]
    });

    //video table
    var videotable;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //datatables
    videotable = $('#videoTable').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": baseurl+"/content/admin/ajax_video_content_list",
            "type": "POST",
            "data" : {  post_type : 'video'},
        },

        columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'image' },
            { data: 'description' },
            { data: 'top_chart' },
            { data: 'action' }
         ]
    });

    //Competition table
    var table1;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
 
    //datatables
    table1 = $('#CompetitionTable').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": baseurl+"/admin/competition/ajax_competition_list",
            "type": "POST",
            dataSrc: 'data'
        },

        columns: [
            { data: 'Id' },
            { data: 'Game Name' },
            { data: 'Competition Type' },
            { data: 'Start Date' },
            { data: 'End Date' },
            { data: 'Created at' },
            { data: 'Updated at' },
            { data: 'Action' }
        ]
    });

    

    //Edit Category
    $(document).on("click", "#edit_cat", function(e){
        e.preventDefault();
        var cat_uuid = $(this).data("cat_uuid");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type : "POST",
            dataType : "json",
            enctype: 'application/x-www-form-urlencoded',
            url : baseurl + "/category/admin/category_details",
            data : 
            { 
                cat_uuid : cat_uuid,
            },
        }).done(function(data){
            if (data.success = true) {
                jQuery('form[name="editCategoryForm"]').find('input[name="name"]').val(data.cat_dtl.name);
                jQuery('form[name="editCategoryForm"]').find('input[name="cat_uuid"]').val(data.cat_dtl.uuid);
                $('#editCategoryModel').modal('toggle');
            }
        });
    });

    //Delete Category
    $(document).on("click", "#delete_cat", function(e){
        e.preventDefault();
        var cat_uuid = $(this).data("cat_uuid");

        swal("Are you sure?", "Once deleted, you will not be able to recover this category!", "warning",
            {
                buttons: true,
                dangerMode: true,
            }
        )
        .then((willDelete) => {

            // console.log(willDelete.value);
            if (willDelete.value == true) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type : "POST",
                    dataType : "json",
                    enctype: 'application/x-www-form-urlencoded',
                    url : baseurl + "/delete_category",
                    data : 
                    { 
                        cat_uuid : cat_uuid,
                    },
                }).done(function(data){
                    
                    if (data.success == true) {
                        swal("Done!", data.msg, 'success');

                        window.location.reload();
                    }  

                });
            }
        });
    });

    //Edit Banner Image
    $(document).on("click", "#edit_bnr", function(e){
        e.preventDefault();
        var bnr_id = $(this).data("bnr_id");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type : "POST",
            dataType : "json",
            enctype: 'application/x-www-form-urlencoded',
            url : baseurl + "/banner_details",
            data : 
            { 
                bnr_id : bnr_id,
            },
        }).done(function(data){
            if (data.success = true) {
                var imgsrc = baseurl+'/uploads/banner/'+data.bnr_dtl.image;
                document.querySelector('.bnr_img').setAttribute('src', imgsrc);
                $('select[name^="game_id"] option[value="'+data.bnr_dtl.game_id+'"]').attr("selected","selected");
                jQuery('form[name="editBannerForm"]').find('input[name="banner_id"]').val(data.bnr_dtl.id);
                $('#editBannerModel').modal('toggle');
            }
        });
    });
    
    //Add or Remove from top chart
    $(document).on("change", "#top_chart", function(e){
        e.preventDefault();
        var val = '';
        var post_id = $(this).data("post_id");
        const checked = $(this).is(':checked');

        if (checked == true) {
            val = 1;
        }else{
            val = 0;
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type : "POST",
            dataType : "json",
            url : baseurl + "/save_top_chart",
            data : {  
                post_id : post_id,
                val : val
            },
            success: function(data) {
                
                if (data.success == true) {
                    swal("Done!", data.msg, 'success');
                }    
            }

        });
    });

    //Activate or Deactivate banner
    $(document).on("change", "#banner_status", function(e){
        e.preventDefault();
        var val = '';
        var banner_id = $(this).data("banner_id");
        const checked = $(this).is(':checked');

        if (checked == true) {
            val = 1;
        }else{
            val = 0;
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type : "POST",
            dataType : "json",
            url : baseurl + "/save_banner_status",
            data : {  
                banner_id : banner_id,
                val : val
            },
            success: function(data) {
                
                
                if (data.success == true) {
                    swal("Done!", data.msg, 'success');
                }    
            }

        });
    });

    //Delete banner
    $(document).on("click", "#delete_bnr", function(e){
        var banner_id = $(this).data("banner_id");

        swal("Are you sure?", "Once deleted, you will not be able to recover this banner!", "warning",
            {
                buttons: true,
                dangerMode: true,
            }
        )
        .then((willDelete) => {

            if (willDelete.value == true) {
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type : "POST",
                    dataType : "json",
                    url : baseurl + "/delete_banner",
                    data : {  
                        banner_id : banner_id,
                    },
                    success: function(data) {
                        
                        if (data.success == true) {
                            swal("Done!", data.msg, 'success',
                                {
                                    buttons: false,
                                }
                            );

                            window.location.reload();
                        } 
                    }
                });

            }
        });

        
    });

    //Activate or Deactivate category
    $(document).on("change", "#category_status", function(e){
        e.preventDefault();
        var val = '';
        var category_id = $(this).data("category_id");
        const checked = $(this).is(':checked');

        if (checked == true) {
            val = 1;
        }else{
            val = 0;
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type : "POST",
            dataType : "json",
            url : baseurl + "/save_category_status",
            data : {  
                category_id : category_id,
                val : val
            },
            success: function(data) {
                
                
                if (data.success == true) {
                    swal("Done!", data.msg, 'success');
                }    
            }

        });
    });

    //Users list 
    var userTable;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //datatables
    userTable = $('#userTable').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": baseurl+"/admin/user/ajax_user_list",
            "type": "POST",
            "data" : {},
        },

        columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'msisdn' },
            { data: 'package' },
            { data: 'lastchange' },
            { data: 'nextcharge' },
            { data: 'subs_stat' },
            { data: 'is_ban' },
         ]
    });
    
    //Ban User or Remove User Ban category
    $(document).on("change", "#ban_user", function(e){
        e.preventDefault();
        var val = '';
        var user_uuid = $(this).data("user_uuid");
        const checked = $(this).is(':checked');

        if (checked == true) {
            val = 1;
        }else{
            val = 0;
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type : "POST",
            dataType : "json",
            url : baseurl + "/save_ban_user",
            data : {  
                user_uuid : user_uuid,
                val : val
            },
            success: function(data) {
                
                
                if (data.success == true) {
                    swal("Done!", data.msg, 'success');
                }    
            }

        });
    });

    //Delete App, Wallpaper, Video
    $(document).on("click", "#del_content", function(e){
        var post_id = $(this).data("post_id");

        swal("Are you sure?", "Once deleted, you will not be able to recover this content!", "warning",
            {
                buttons: true,
                dangerMode: true,
            }
        )
        .then((willDelete) => {

            // console.log(willDelete.value);
            if (willDelete.value == true) {
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type : "POST",
                    dataType : "json",
                    url : baseurl + "/delete_content",
                    data : {  
                        post_id : post_id,
                    },
                    success: function(data) {
                        
                        if (data.success == true) {
                            swal("Done!", data.msg, 'success',
                                {
                                    buttons: false,
                                }
                            );

                            window.location.reload();
                        } 
                    }
                });

            }
        });

        
    });

    //Delete Competition
    $(document).on("click", ".del_comp", function(e){
        var comp_id = $(this).data("comp_id");

        swal("Are you sure?", "Once deleted, you will not be able to recover this competition!", "warning",
            {
                buttons: true,
                dangerMode: true,
            }
        )
        .then((willDelete) => {

            // console.log(willDelete.value);
            if (willDelete.value == true) {
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type : "POST",
                    dataType : "json",
                    url : baseurl + "/delete_competition",
                    data : {  
                        comp_id : comp_id,
                    },
                    success: function(data) {
                        
                        
                        if (data.success == true) {
                            swal("Done!", data.msg, 'success',
                                {
                                    buttons: false,
                                }
                            );

                            window.location.reload();
                        } 
                    }
                });

            }
        });

        
    });
    
    //Delete Game
    $(document).on("click", "#del_game", function(e){
        var game_uuid = $(this).data("game_uuid");

        swal("Are you sure?", "Once deleted, you will not be able to recover this game!", "warning",
            {
                buttons: true,
                dangerMode: true,
            }
        )
        .then((willDelete) => {
            if (willDelete.value == true) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type : "POST",
                    dataType : "json",
                    url : baseurl + "/delete_game",
                    data : {  
                        game_uuid : game_uuid,
                    },
                    success: function(data) {
                        
                        
                        if (data.success == true) {
                            swal("Done!", data.msg, 'success',
                                {
                                    buttons: false,
                                }
                            );

                            window.location.reload();
                        } 
                    }
                });
            }
        });
    });

    /* Image preview */
    // $('.input-images').imageUploader();
    /*if (window.File && window.FileList && window.FileReader) {
        
        $("#imagefiles").on("change", function(e) {
            
            const myFileList = [];
            const myNewFileList = [];
            var files = e.target.files; 
            filesLength = files.length;

            $.each(files, function(indx, itm){

                // var f = files[indx];
                var fileReader = new FileReader();
                
                /*let list = new DataTransfer();
                let imgFile = new File(["content"], itm);
                list.items.add(imgFile);

                $('input:file#imagefiles')[0].files = list.files*/
                
                // myFileList.push(list.files);
                // console.log('myFileList: ', myFileList);

                /*fileReader.onload = (function(e) {
                    
                    var file = e.target;
                    
                    $("<span class=\"preview_img  pip_"+indx+"\">" +
                        "<img class=\"imageThumb thumb\" src=\"" + file.result + "\" title=\"" + file.name + "\"width=200px height=200px/>" +
                        // "<br/><span class=\"remove\" data-img_indx="+indx+">Remove</span>" +
                        "</span>"
                    ).insertAfter("#screenshots");

                    /*$.each(myFileList, function(i, mfl){
                        // fileInput.files = mfl;
                        $('input:file#imagefiles')[0].files = mfl;
                    });*/
                    
                    // console.log('Files: ', files);
                    
                    /*$(".remove").click(function(ev){
                        
                        ev.preventDefault();
                        
                        var img_indx = $(this).data('img_indx');
                        
                        // const dt = new DataTransfer()

                        /*for (let file of $('input:file#imagefiles')[0].files)
                            if (file !== $('input:file#imagefiles')[0].files[0]) 
                            dt.items.add(file)*/

                        // $('input:file#imagefiles')[0].onchange = null // remove event listener
                        //$('input:file#imagefiles')[0].files = dt.files // this will trigger a change event

                        //$(this).parent(".pip_"+img_indx).remove();

                        /*$.each(myFileList, function(idx, fl){
                            if (idx != img_indx) {
                                myNewFileList.push(fl);
                            }
                        });*/
                        
                        // console.log('myNewFileList: ', myNewFileList);
                        
                        /*$.each(myNewFileList, function(ixd, fle){
                            // fileInput.files = fle;
                            $('input:file#imagefiles')[0].files = fle;
                        });*/

                        
                    /*});

                });
                
                fileReader.readAsDataURL(itm);
            });
            // console.log('Files: ', files);
        });
    } else {
        alert("Your browser doesn't support to File API")
    }*/

    //Deselect app media image
    $(document).on("click", ".deselect_post_img", function(e){
        var post_id = $(this).data("post_id");
        var post_uuid = $(this).data("post_uuid");
        var img_name = $(this).data("img_name");
        var upload_index = $(this).data("upload_index");
        
        var THIS = $(this);

        swal("Are you sure?", "Once deleted, you will not be able to recover this image!", "warning",
            {
                buttons: true,
                dangerMode: true,
            }
        )
        .then((willDelete) => {
            if (willDelete.value == true) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type : "POST",
                    dataType : "json",
                    url : baseurl + "/delete_post_media",
                    data : {  
                        post_id : post_id,
                        img_name : img_name,
                        post_uuid : post_uuid,
                    },
                    success: function(data) {
                       
                        if (data.status == true) {
                            THIS.remove();
				            $('.upload_img_'+upload_index).remove();
                        } 
                    }
                });
            }
        });
    });

    //Winner List Filter With Game Name
    $(document).on("change", "#game_filter", function(e){
        var game_uuid = $(this).val();
        $(".prize_status_filter").removeClass("active_bg");
        
        winnerDataTable(0,game_uuid);
    });
    
    //Winner List Filter With Prize Sattus
    $(document).on("click", ".prize_status_filter", function(e){
        $('select option[value="0"]').attr("selected",true);
        var prize_status = $(this).data("status");
        $(".prize_status_filter").removeClass("active_bg");
        $(this).addClass('active_bg');

        winnerDataTable(prize_status, 0);
    });

    //Winner List Admin
    function winnerDataTable(prize_status, game_uuid) {
        
        $('#WinnerListTable').DataTable({ 
            
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "destroy" : true,
    
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": baseurl+"/admin/report/ajax_winner_list",
                "type": "POST",
                "data": {
                    prize_status: prize_status,
                    game_uuid: game_uuid
                },
                dataSrc: 'data'
            },
    
            columns: [
                { data: 'Competition Game' },
                { data: 'Type' },
                { data: 'Winner Name' },
                { data: 'Winner Position' },
                { data: 'Winner MSISDN' },
                { data: 'Email' },
                { data: 'Coins' },
                { data: 'Period' },
                { data: 'Prize Status' }
            ]
        }); 

    }

    winnerDataTable(0,0);

    // Change Winner List Prize Status
    $(document).on("change", ".set_prize_status", function(e){
        var prize_status = $(this).val();
        var win_id = $(this).find(':selected').data('win_id');
        

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type : "POST",
            dataType : "json",
            enctype: 'application/x-www-form-urlencoded',
            url : baseurl + "/admin/report/update_prize_status",
            data : 
            { 
                win_id : win_id,
                prize_status : prize_status,
            },
        }).done(function(data){
            
            if (data.status == true) {
                swal("Done!", data.msg, 'success');

                // window.location.reload();
            }  

        });

    });



    //Download Report Admin
    function downloadReportDataTable(from_date, to_date) {
        
        $('#DownloadReportTable').DataTable({ 
            
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "destroy" : true,
    
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": baseurl+"/admin/report/ajax_download_report",
                "type": "POST",
                "data": {
                    from_date: from_date,
                    to_date: to_date
                },
                dataSrc: 'data'
            },
    
            columns: [
                { data: 'Download Date' },
                { data: 'Total Download' },
                { data: 'Product Name' },
                { data: 'Product Id' },
                { data: 'User Id' },
                { data: 'Phone Number' }
            ]
        }); 

    }

    downloadReportDataTable(0,0);

    //Download Report List Filter With Date
    $(document).on("click", "#date_filter_btn", function(e){

        var from_date = $("#from_date").val();
        var to_date = $("#to_date").val();

        if (from_date == '') {
            from_date = 0;
        }
        if (to_date == '') {
            to_date = 0;
        }

        downloadReportDataTable(from_date, to_date);
    });

    $('#sample_2').DataTable();
    

    // $('.summernote').summernote();

    /*$('#example2').DataTable({
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ items/page',
        }
    });*/
    /*$('#example2').DataTable({
         responsive: true,
         language: {
           searchPlaceholder: 'Search...',
           sSearch: '',
           lengthMenu: '_MENU_ items/page',
        }
    });*/

    /**/
    $(function(){
        'use script'

        $('#example2').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          },
          columnDefs: [ {
            'targets': [1],
            'orderable': false,
            "ordering": false
          }],
          "aaSorting": []
        });
    });


    /*$(function(){
        'use script'

        $('#datepicker1').datepicker();
        $('#datepicker2').datepicker();
        $('#datepicker3').datepicker();

        $('.select2').select2({
          placeholder: 'Choose one',
          searchInputPlaceholder: 'Search options'
        });

        $('.off-canvas-menu').on('click', function(e){
            e.preventDefault();
            var target = $(this).attr('href');
            $(target).addClass('show');
          });
  
  
          $('.off-canvas .close').on('click', function(e){
            e.preventDefault();
            $(this).closest('.off-canvas').removeClass('show');
          })
  
          $(document).on('click touchstart', function(e){
            e.stopPropagation();
  
            // closing of sidebar menu when clicking outside of it
            if(!$(e.target).closest('.off-canvas-menu').length) {
              var offCanvas = $(e.target).closest('.off-canvas').length;
              if(!offCanvas) {
                $('.off-canvas.show').removeClass('show');
              }
            }
          });
  
          document.body.addEventListener('click', function(e){
            e.stopPropagation()
        })
    });*/



   
    $('.off-canvas-menu').on('click', function(e){
        e.preventDefault();
        var target = $(this).attr('href');
        
        $(target).addClass('show');
    });


    $('.off-canvas .close').on('click', function(e){
        e.preventDefault();
        $(this).closest('.off-canvas').removeClass('show');
    })

    $(document).on('click touchstart', function(e){
        e.stopPropagation();

        // closing of sidebar menu when clicking outside of it
        if(!$(e.target).closest('.off-canvas-menu').length) {
          var offCanvas = $(e.target).closest('.off-canvas').length;
          if(!offCanvas) {
            $('.off-canvas.show').removeClass('show');
          }
        }
    });
    
    
    /*var forms = document.querySelectorAll('.needs-validation');*/
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    
});

