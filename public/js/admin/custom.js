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

