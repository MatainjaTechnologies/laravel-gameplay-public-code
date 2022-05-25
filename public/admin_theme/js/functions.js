$(document).ready(function(params) {
    
    var baseURL = window.location.origin;

    /* Category Banner image privew */
    $('#category_banner_image').change(function(){
        var img = `<img src="${URL.createObjectURL(event.target.files[0])}" class="rounded" >`;
        $('.category_banner_image').html(img);
    });
    
    

    /* Delete Category */
    $(document).on("click", ".del_cat", function(e){

        e.preventDefault();
        
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this category!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {

            if (willDelete) {

                var cat_id = $(this).data('cat_id');

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
                        cat_id: cat_id,
                    },
                    
                }).done( function (data) {
                    if (data.status == true) {
                        swal({
                            title: "Success",
                            text: data.msg, 
                            icon: "success",
                        });   
                        
                        setTimeout(function(){ 
                            window.location.href = baseURL+'/admin/category/list'
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

    // Activate or Deactivate Banner
    $(document).on("change", ".banner_status", function(e){

        var status = '';
        var banner_id = $(this).data('banner_id');
        
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
            url: baseURL+'/admin/banner/update_status',
            data: {
                status: status,
                banner_id: banner_id,
            },
        }).done(function (data) {
            
            if (data.status == true) {
                swal({
                    title: "Success",
                    text: data.msg, 
                    icon: "success",
                });   
                // setTimeout(function(){ 
                //     window.location.href = baseURL+'/admin/banner/list'
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

    // Delete Banner
    $(document).on("click", ".bnr_del", function(e){

        e.preventDefault();
        
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this banner!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {

            if (willDelete) {

                var banner_id = $(this).data('banner_id');

                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                });
                $.ajax({
                    type: 'POST',
                    dataType: 'JSON',
                    url: baseURL+'/admin/banner/delete',
                    data: {
                        banner_id: banner_id,
                    },
                    
                }).done( function (data) {
                    if (data.status == true) {
                        swal({
                            title: "Success",
                            text: data.msg, 
                            icon: "success",
                        });   
                        
                        setTimeout(function(){ 
                            window.location.href = baseURL+'/admin/banner/list'
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

    // Ajax on banner type change
    $(document).on("change", "#type", function(e){
        
        var value = $(this).val();

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: baseURL+'/admin/get_type',
            data: {
                value: value,
            },
        }).done(function (data) {
            if (data.status == true) {
                

                var html = `
                    <label class="col-sm-4 col-form-label">`+data.type+` <span class="tx-danger">*</span></label>
                    <select class="custom-select select2" name="category_id" required="">
                `;
                        if (data.data.length) {
                            data.data.forEach(element => {
                                html+=`<option value="`+element.id+`">`+element.title+`</option>`
                            });                                
                        }
                html += `
                    </select>
                    <div class="invalid-feedback mg-b-10">This is required</div>
                `;

                $('.select2').select2({
                    placeholder: 'Choose one',
                    searchInputPlaceholder: 'Search options'
                });

                $('#type_div').html(html);

                $('#type_div').removeClass('dpn');

            }else{
                swal({
                    title: "Error",
                    text: 'Somthing went wrong, try again later',
                    icon: "error",
                });
            }
        });


    });

    // Delete Banner
    $(document).on("click", ".prz_del", function(e){

        e.preventDefault();
        
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this prize!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {

            if (willDelete) {

                var prize_id = $(this).data('prize_id');

                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                });
                $.ajax({
                    type: 'POST',
                    dataType: 'JSON',
                    url: baseURL+'/admin/prize/delete',
                    data: {
                        prize_id: prize_id,
                    },
                    
                }).done( function (data) {
                    if (data.status == true) {
                        swal({
                            title: "Success",
                            text: data.msg, 
                            icon: "success",
                        });   
                        
                        setTimeout(function(){ 
                            window.location.href = baseURL+'/admin/prize/list'
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

    // Add more option
    $("#btn_added").click(function(){

        var lbl = '';
        var opt_num = $('#opt_num').val();

        if (opt_num == '3') {
            lbl = 'C';
        }else if (opt_num == '4') {
            lbl = 'D';
        }else if (opt_num == '5') {
            lbl = 'E';
        }else{
            lbl = 'F';
        }

        var html =`
            <div class="form-group ext-file row opt_`+opt_num+`">
                <input class="col-sm-2 col-form-label" type="text" name="option_num[]" class="form-control option-num" value="`+lbl+`" readonly="">
                
                <div class="col-sm-6">
                    <input type="text" class="form-control opt_ans_`+opt_num+`" name="option[]" placeholder="" required="">
                </div>
                <div class="col-sm-2 m-auto">
                    <label class="radio-inline m-auto">
                        <input id="`+opt_num+`" name="optionscheck" type="radio" class="optionscheck cmn ans_`+opt_num+`" value="0" required >
                    </label>
                </div>
                <div class="col-sm-2 m-auto " id="remove_opt_btn_div">
                    <button type="button" class="btn btn-danger btn-circle remove_opt_btn" id="rmv_`+opt_num+`" style="cursor: pointer;">-</button>
                </div>
            </div>
        `;

        $(".adding-box").append(html);

        $('#opt_num').val((parseInt(opt_num)+1));

        $('#rmv_'+(parseInt(opt_num)-1)).addClass('no_show');

        // console.log(".opt_"+(parseInt(opt_num)-1));

    });
    
    $(document).on("click", ".optionscheck", function(e){

        var num = $(this).attr('id');
        var ans = $(".opt_ans_"+num).val();

        if (ans) {
            
            $(".cmn").val('0');
            $(".ans_"+num).val(ans);
            
        }else{
            $(this).prop('checked', false);
            alert('Please enter answer first');
        }

    });

    $(document).on("click", ".remove_opt_btn", function(e){
        // e.preventDefault();
        var opt_num = $('#opt_num').val();
        
        $(".opt_"+(parseInt(opt_num)-1)).remove();
        $('#rmv_'+(parseInt(opt_num)-2)).removeClass('no_show');

        $('#opt_num').val((parseInt(opt_num)-1));
        
    });

    // Question set quizes on off-canvas
    $(".set_quries_btn").click(function(e){
        
        e.preventDefault();

        var set_id = $(this).data('set_id');        

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: baseURL+'/admin/quizset/quiz/list',
            data: {
                set_id: set_id,
            },
            
        }).done( function (data) {
            if (data.status == true) {

                var ans = '';
                var html = ``;

                data.data.forEach((ele, indx) => {
                    
                    html += `
                        
                        <div class="col-sm-12" style="margin-top: 0.4rem;">
                            <div class="card" id="data_card_div" >
                                <div class="card-body">
                                    <span class="card-title span_class"><strong>`+ele.title+`</strong></span>
                                    <div class="opt_div">
                                    
                    `;

                    ele.options.forEach((opt, ix) => { 
                        
                                    if(opt == ele.answer ){ 
                                        ans = `&nbsp;&nbsp;&nbsp;<b>(Answer)</b>`;
                                    }else{
                                        ans = '';
                                    }
                                    
                                    html += `
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <p class="card-text">`                                            
                                                    +opt+ans+
                                                `</p>
                                            </div>
                                        </div>
                                    `;
                    });
                    
                    html += `
                                    </div>
                                    <a href="`+baseURL+`/quiz/edit/`+ele.id+`" class="tx-success card-link"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    `;
                });

                $('.data_div').empty();

                $('.data_div').html(html);

                
            }else{
                var html = `<div style="display: flex; justify-content: center;"><h4>No quiz added yet</h4></div>`;

                $('.data_div').html(html);              
            }
        });
        return;
        // console.log(set_id);
        var target = $(this).attr('href');
        // var target = '#offCanvasAddQuiz';
        $(target).addClass('show');
    });

    // Delete QuizSet
    $(document).on("click", ".qset_del", function(e){

        e.preventDefault();
        
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this quiz set!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {

            if (willDelete) {

                var set_id = $(this).data('set_id');

                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                });
                $.ajax({
                    type: 'POST',
                    dataType: 'JSON',
                    url: baseURL+'/admin/quizset/delete',
                    data: {
                        set_id: set_id,
                    },
                    
                }).done( function (data) {
                    if (data.status == true) {
                        swal({
                            title: "Success",
                            text: data.msg, 
                            icon: "success",
                        });   
                        
                        setTimeout(function(){ 
                            window.location.href = baseURL+'/admin/quizset/list'
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

    // Delete Quiz
    $(document).on("click", ".quiz_del", function(e){

        e.preventDefault();
        
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this quiz!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {

            if (willDelete) {

                var quiz_id = $(this).data('quiz_id');

                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                });
                $.ajax({
                    type: 'POST',
                    dataType: 'JSON',
                    url: baseURL+'/admin/quiz/delete',
                    data: {
                        quiz_id: quiz_id,
                    },
                    
                }).done( function (data) {
                    if (data.status == true) {
                        swal({
                            title: "Success",
                            text: data.msg, 
                            icon: "success",
                        });   
                        
                        setTimeout(function(){ 
                            window.location.href = baseURL+'/admin/quiz/list'
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

    // Activate or Deactivate Quiz Set
    $(document).on("change", ".quizset_status", function(e){
        var status = '';
        var set_id = $(this).data('set_id');
        
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
            url: baseURL+'/admin/quizset/update_status',
            data: {
                set_id: set_id,
                status: status,
            },
        }).done(function (data) {
            
            if (data.status == true) {
                swal({
                    title: "Success",
                    text: data.msg, 
                    icon: "success",
                });   
                // setTimeout(function(){ 
                //     window.location.href = baseURL+'/admin/quizset/list'
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
   
    // PVP Quiz Set
    $(document).on("change", ".quizset_pvp", function(e){
        var status = '';
        var set_id = $(this).data('set_id');
        
        if ($(this).prop('checked')) {
            status = 'PVP';
        }else{
            status = null;
        }

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: baseURL+'/admin/quizset/update_pvp',
            data: {
                set_id: set_id,
                status: status,
            },
        }).done(function (data) {
            
            if (data.status == true) {
                swal({
                    title: "Success",
                    text: data.msg, 
                    icon: "success",
                });   
                // setTimeout(function(){ 
                //     window.location.href = baseURL+'/admin/quizset/list'
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
        
        if (type == 'add') {
            $('.head').html('<h6 class="tx-inverse mg-t-30 mg-b-25">Add Prize</h6>');
            $('#points').val('');
            $('#quantity').val('');
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
                    $('#points').val(data.data.points);
                    $('#quantity').val(data.data.quantity);
                    $('#reward_text').val(data.data.reward_text);
                }
            });
            
        }
    });

    $(document).on("change", "#ans_test", function(e){
        var val = $(this).val();
        $('.quiz_answer').val(val);
    });

    // Change winner list status
    $(document).on("change", "#pz_status", function(e){
        var id = $(this).data('win_id');
        var status = $(this).val();

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: baseURL+'/admin/winner/update_status',
            data: {
                id: id,
                status: status,
            },
        }).done(function (data) {
            console.log(data);
            if (data.status == true) {
                swal({
                    title: "Success",
                    text: data.msg, 
                    icon: "success",
                });   
                setTimeout(function(){ 
                    window.location.href = baseURL+'/admin/winners'
                }, 2000);
            }else{
                swal({
                    title: "Error",
                    text: data.msg,
                    icon: "error",
                });
            }
        });
    });

    /*add game image preview end*/
    
    
});