$(document).ready(function() {
    $('.schedule-datepicker').datepicker({
        todayHighlight : true,
        format: 'dd-mm-yyyy',
        autoclose: true
    });

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
});

$(document).ready(function() {

    var baseurl=window.location.origin;

    //Game table
    var table;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //datatables
    table = $('#UserDataTable').DataTable({

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
            { data: 'view' },
            { data: 'action' }
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
            "url": baseurl+"/content/admin/ajax_content_list",
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
            "url": baseurl+"/content/admin/ajax_content_list",
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
    table1 = $('#CompetitionDataTable').DataTable({

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
                jQuery('form[name="editCategoryForm"]').find('input[name="name"]').val(data.cat_dtl[0].name);
                jQuery('form[name="editCategoryForm"]').find('input[name="cat_uuid"]').val(data.cat_dtl[0].uuid);
                $('#editCategoryModel').modal('toggle');
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
});

$(document).ready(function() {

    var baseURL = window.location.origin;

    $('.input-image').imageUploader({
        multiple: false,
        imagesInputName:'image',
        preloadedInputName:'preloaded',
        label:'Drag & Drop files here or click to browse'

    });

    /* Icon image privew */
    $('#icon_image').change(function(){
        var img = `<img src="${URL.createObjectURL(event.target.files[0])}" class="rounded" >`;
        $('.icon_image').html(img);
    });

    /* Banner image privew */
    $('#banner_image').change(function(){
        var img = `<img src="${URL.createObjectURL(event.target.files[0])}" class="rounded" >`;
        $('.banner_image').html(img);
    });

    /* Thum image privew */
    $('#thumb_image').change(function(){
        var img = `<img src="${URL.createObjectURL(event.target.files[0])}" class="rounded" >`;
        $('.thumb_image').html(img);
    });


    /* 1st Prize image privew */
    $('#first_prizeicon_image').change(function(){
        var img = `<img src="${URL.createObjectURL(event.target.files[0])}" class="rounded" >`;
        $('.first_prizeicon_image').html(img);
    });

    /* 2nd Prize image privew */
    $('#second_prizeicon_image').change(function(){
        var img = `<img src="${URL.createObjectURL(event.target.files[0])}" class="rounded" >`;
        $('.second_prizeicon_image').html(img);
    });

    /* 3rd Prize image privew */
    $('#third_prizeicon_image').change(function(){
        var img = `<img src="${URL.createObjectURL(event.target.files[0])}" class="rounded" >`;
        $('.third_prizeicon_image').html(img);
    });

    /*add game image preview*/
    $('#gameImages').change(function(){

        var total_file = document.getElementById("gameImages").files.length;

        for(var i=0; i<total_file; i++)
        {
            var img = `
            <div class="card d-inline-block wd-100 ht-75 mg-r-45 carImg mg-b-20">
            <i data-feather="x" class="pos-absolute wd-25 ht-25 bg-white rounded-15 pd-4 r--8 t--15 remove remove_btn" style="cursor: pointer;">X</i>
            <img src="${URL.createObjectURL(event.target.files[i])}" style="height: inherit; width: 98px;border-radius: 7px;">
            </div>
            `;

            $('#preview-image').append(img);
            $(".remove").click(function(){
                $(this).parent(".card").remove();
            });
        }
    });

    /* Thum image privew */
    $('#cover_image').change(function(){
        var img = `<img src="${URL.createObjectURL(event.target.files[0])}" class="rounded" >`;
        $('.cover_image').html(img);
    });

    /* Button click loader */
    $('#cmn_btn').on('click', function() {
        var text = $('#cmn_btn').text();
        // $('#cmn_btn').button('loading');
        var forms = document.querySelectorAll('.needs-validation');
        Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                $('#cmn_btn').html('<img src="'+baseURL+'/images/loader-img.gif" width=20 />');
                if (!form.checkValidity()) {
                    event.preventDefault()
                    $('#cmn_btn').html(text);
                }
            }, false)
        });
    });

    $('.status_btn').on('change', function() {

        var status = '';
        var cat_uuid = $(this).data('cat_uuid');

        if ($(this).prop('checked')) {
            status = '1';
        }else{
            status = '0';
        }

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: baseURL+'/admin/category/update_status',
            data:{
                cat_uuid: cat_uuid,
                status: status,
            }
        }).done(function(data) {
            if (data.status == true) {
                swal({
                    title: "Success",
                    text: data.msg,
                    icon: "success",
                });
            }else{
                swal({
                    title: "Error",
                    text: data.msg,
                    icon: "error",
                });
            }
        })
    });

    // Game delete
    $(document).on("click", ".game_del", function(e){

        e.preventDefault();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this game!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {

            if (willDelete) {
                var game_uuid = $(this).data('game_uuid');

                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                });
                $.ajax({
                    type: 'POST',
                    dataType: 'JSON',
                    url: baseURL+'/game/admin/delete',
                    data: {
                        game_uuid: game_uuid,
                    },
                }).done(function (data) {
                    // console.log(data);
                    if (data.status == true) {
                        swal({
                            title: "Success",
                            text: data.msg,
                            icon: "success",
                        });
                        setTimeout(function(){
                            window.location.href = baseURL+'/game/admin/list'
                        }, 2000);
                    }else{
                        swal({
                            title: "Error",
                            text: data.msg,
                            icon: "error",
                        });
                    }
                });
            }
        });
    });

    // Competition delete
    $(document).on("click", ".comp_del", function(e){

        e.preventDefault();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this competition!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {

            if (willDelete) {
                var comp_id = $(this).data('comp_id');

                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                });
                $.ajax({
                    type: 'POST',
                    dataType: 'JSON',
                    url: baseURL+'/admin/competition/delete',
                    data: {
                        comp_id: comp_id,
                    },
                }).done(function (data) {
                    // console.log(data);
                    if (data.status == true) {
                        swal({
                            title: "Success",
                            text: data.msg,
                            icon: "success",
                        });
                        setTimeout(function(){
                            window.location.href = baseURL+'/game/admin/list'
                        }, 2000);
                    }else{
                        swal({
                            title: "Error",
                            text: data.msg,
                            icon: "error",
                        });
                    }
                });
            }
        });
    });

    // Category delete
    $(document).on("click", ".cat_del", function(e){

        e.preventDefault();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this category!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {

            if (willDelete) {
                var cat_uuid = $(this).data('cat_uuid');

                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                });
                $.ajax({
                    type: 'POST',
                    dataType: 'JSON',
                    url: baseURL+'/admin/category/delete',
                    data: {
                        cat_uuid: cat_uuid,
                    },
                }).done(function (data) {
                    // console.log(data);
                    if (data.status == true) {
                        swal({
                            title: "Success",
                            text: data.msg,
                            icon: "success",
                        });
                        setTimeout(function(){
                            window.location.href = baseURL+'/admin/category/all'
                        }, 2000);
                    }else{
                        swal({
                            title: "Error",
                            text: data.msg,
                            icon: "error",
                        });
                    }
                });
            }
        });
    });

    // Domain delete
    $(document).on("click", ".dmn_del", function(e){

        e.preventDefault();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this domain!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {

            if (willDelete) {
                var dmn_id = $(this).data('dmn_id');

                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                });
                $.ajax({
                    type: 'POST',
                    dataType: 'JSON',
                    url: baseURL+'/admin/domain/delete',
                    data: {
                        dmn_id: dmn_id,
                    },
                }).done(function (data) {
                    // console.log(data);
                    if (data.status == true) {
                        swal({
                            title: "Success",
                            text: data.msg,
                            icon: "success",
                        });
                        setTimeout(function(){
                            window.location.href = baseURL+'/admin/domains'
                        }, 2000);
                    }else{
                        swal({
                            title: "Error",
                            text: data.msg,
                            icon: "error",
                        });
                    }
                });
            }
        });
    });

    // Domain change
    $(document).on("change", "#domain", function(e){
        var val = $(this).val();

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: baseURL+'/admin/set_cookie',
            data: {
                val: val,
            },
        }).done(function (data) {
            console.log(data)
            // window.location.href = baseurl+'/'+val;
            location.reload();
        });
    });

    // Delete Reward
    $(document).on("click", ".rwd_del", function(e){

        e.preventDefault();
        
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this reward!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {

            if (willDelete) {

                var reward_id = $(this).data('reward_id');

                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                });
                $.ajax({
                    type: 'POST',
                    dataType: 'JSON',
                    url: baseURL+'/admin/reward/delete',
                    data: {
                        reward_id: reward_id,
                    },
                    
                }).done( function (data) {
                    if (data.status == true) {
                        swal({
                            title: "Success",
                            text: data.msg, 
                            icon: "success",
                        });   
                        
                        setTimeout(function(){ 
                            window.location.href = baseURL+'/admin/reward/list'
                        }, 2000);
                    }else{
                        swal({
                            title: "Error",
                            text: data.msg,
                            icon: "error",
                        });
                    }
                });
            }
        });
    });

    // Activate or Deactivate Reward
    $(document).on("change", ".rwd_status", function(e){

        var status = '';
        var reward_id = $(this).data('reward_id');
        
        if ($(this).prop('checked')) {
            status = '1';
        }else{
            status = '0';
        }

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: baseURL+'/admin/reward/update_status',
            data: {
                status: status,
                reward_id: reward_id,
            },
        }).done(function (data) {
            console.log(data);
            if (data.status == true) {
                swal({
                    title: "Success",
                    text: data.msg, 
                    icon: "success",
                });   
                // setTimeout(function(){ 
                //     window.location.href = baseURL+'/admin/reward/list'
                // }, 2000);
            }else{
                swal({
                    title: "Error",
                    text: data.msg,
                    icon: "error",
                });
            }
        });
    });

    // Add or Edit off-canvas
    $(".prz_btn").click(function(e){
        // alert(123);
        e.preventDefault();

        var type = $(this).data('type');
        
        $('#offCanvas3').prop('disabled', true);
        if (type == 'add') {
            $('.head').html('<h6 class="tx-inverse mg-t-30 mg-b-25">Add Prize</h6>');
            $('#points').val('');
            $('#quantity').val('');
            $('#prize_id').val('');
            $('#reward_text').val('');
        } else {
            var prize_id = $(this).data('prize_id');
            $('.head').html('<h6 class="tx-inverse mg-t-30 mg-b-25">Edit Prize</h6>');
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: baseURL+'/admin/prize/details',
                data: {
                    prize_id: prize_id,
                },
            }).done(function (data) {
                console.log(data);
                if (data.status == true) {
                    $('#prize_id').val(data.data.id);
                    $('#points').val(data.data.points);
                    $('#quantity').val(data.data.quantity);
                    $('#reward_text').val(data.data.reward_text);
                }
            });
            
        }
    });

    // Domain details modal
    $(document).on('click', '.domain_dtl_btn', function() {

        var dmn_id = $(this).data('dmn_id');

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: baseURL+'/admin/domain/details',
            data: {
                dmn_id: dmn_id,
            },
        }).done(function (data) {
            
            if (data.status == true) {

                $('#domain_name').val(data.data.domain_name);
                $('#source_path').val(data.data.source_path);
                $('#renew_subs_url').val(data.data.renew_subs_url);
                $('#daily_subs_url').val(data.data.daily_subs_url);
                $('#weekly_subs_url').val(data.data.weekly_subs_url);
                $('#yearly_subs_url').val(data.data.yearly_subs_url);
                $('#monthly_subs_url').val(data.data.monthly_subs_url);
                $('#destination_path').val(data.data.destination_path);
                $('#subscribe_notify_url').val(data.data.subscribe_notify_url);
                $('#unsubscribe_notify_url').val(data.data.unsubscribe_notify_url);

                $('#exampleModal').modal('toggle');
            } else {
                console.log(data);                
            }
        });
    });

});



