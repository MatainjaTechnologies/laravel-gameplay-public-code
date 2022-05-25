var table;
$(document).ready(function() {
    var baseurl=window.location.origin;
   
    $(document).on("click", ".catDetails", function(e){
        e.preventDefault();
        var cat_id = $(this).data("id");
        var html = '';
        $('.cateBlock').append('<div class="loading align-items-center justify-content-center"><img src="'+baseurl+'/images/loading.gif" alt="Loading"></div>');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type : "POST",
            dataType : "json",
			url : baseurl + "/get_cat_details",
			data : {  cat_id : cat_id},

            success: function(data) {

                    if (data.success = true) {
                        if(data.games.length>0){

                            $('.cateBlock').html('');
                            $('.cateBlock').append('<div class="row no-gutters game-list-wrapper addData">');
                            $.each(data.games, function (index, element) {

                                // var image = $('<img src="'+baseurl+'/uplodes/games/'+element.id+'/'+element.image+'" />');
                                // if (image.attr('width') > 0)
                                //   imageExists = '/uplodes/games/'+element.id+'/'+element.image;
                                // else
                                //   imageExists = '/images/no_game.jpg';
                                $('.addData').append('<div class="col-4 dev"><div class="game-item"><a href="'+baseurl+'/game/details/'+element.uuid+'"><img class="img-fluid game-item-pic" src="'+baseurl+'/uploads/games/'+element.id+'/'+element.image+'" alt="Images"><p class="game-item-title text-truncate">'+element.name+'</p><div class="game-item-star star-third"></div></a></div></div>');
                            });

                            $('.cateBlock').append('</div>');
                        }else{
                            $('.cateBlock').html('');
                            $('.loading').hide();
                            $('.cateBlock').append('No game added for this category');
                        }
                        
                    }
            }
		})
    });


    $(document).on("click", ".getDetailsById", function(e){
        e.preventDefault();
        var cat_id = $(this).data("id");
        var type = $(this).data("type");
        var application = $(this).data("application");
        var block = $(this).data("block");

        var url = '';

        $('.category-button li a.active').removeClass('active');
        $(this).addClass('active');
        var html = '';
        $('.'+block+'cateBlock').append('<div class="loading align-items-center justify-content-center"><img src="'+baseurl+'/images/loading.gif" alt="Loading"></div>');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type : "POST",
            dataType : "json",
            url : baseurl + "/content/getDetailsByCatId",
            data : {  cat_id : cat_id,type : type,application : application},

            success: function(data) {

                    if (data.success = true) {
                        if(data.result.length>0){

                            $('.'+block+'cateBlock').html('');
                            $('.'+block+'cateBlock').append('<div class="row no-gutters game-list-wrapper '+block+'_addData">');
                            $.each(data.result, function (index, element) {

                                if(data.type =='wallpaper'){
                                    var url = '/wallpaper/details/';
                                }else if(data.type =='video'){
                                    var url = '/video/details/';
                                }else if(data.type =='application' && element.application_type == 'game'){
                                    var url = '/app/game/details/';
                                }else if(data.type =='application' && element.application_type == 'software'){
                                    var url = '/app/details/';
                                }

                                // html = '';

                                var html = `
                                    <div class="col-4 dev">
                                        <div class="game-item">
                                            <a href="`+baseurl+url+element.uuid+`">
                                                <img class="img-fluid game-item-pic" src="`+baseurl+`/uploads/`+data.type+`/`+element.uuid+`/image/`+element.image+`" alt="Images">
                                                <p class="game-item-title text-truncate">`+element.name+`</p>
                                            </a>
                                        </div>
                                    </div>
                                `;

                                if(data.type =='video'){
                                    html = `
                                        <div class="col-4 dev">
                                            <div class="game-item">
                                                <a href="`+baseurl+url+element.uuid+`">
                                                    <video width="320" height="240" src="`+baseurl+`/video/`+element.uuid+`/file/`+element.file+`" >
                                                        Video
                                                    </video>
                                                    <p class="game-item-title text-truncate">`+element.name+`</p>
                                                </a>
                                            </div>
                                        </div>
                                    `;
                                }

                                $('.'+block+'_addData').append(html);

                            });

                            $('.'+block+'cateBlock').append('</div>');
                        }else{
                            $('.'+block+'cateBlock').html('');
                            $('.loading').hide();
                            $('.'+block+'cateBlock').append('No game added for this category');
                        }
                        
                    }
            }
        })
    });


    $(document).on("click", "#msisdnSubmit", function(e){
        e.preventDefault();
        var msisdn = $('.msisdn').val();
        if(msisdn ==''){
            $(".error").text("Msisdn Cannot be blank");
        }else{
            if(msisdn.length!=10){
               $(".error").text("Msisdn must be 10 degit");
            }else{
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
            type : "POST",
            dataType : "json",
            url : baseurl + "/subscribe",
            data : {  msisdn : msisdn},

            success: function(data) {

            }
        })


            }
        }

    });

    
    //called when key is pressed in textbox
    $(".msisdn").keypress(function (e) {
         //if the letter is not digit then display error and don't type anything
         if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            $(".error").html("Digits Only").show().fadeOut("slow");
                   return false;
        }
    });
   

    $(document).on("keyup", "#search-box", function(e){
        var key_word = this.value;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type : "POST",
            dataType : "json",
            url : baseurl + "/app-game/search",
            data : {  key_word : key_word},

            success: function(data) {

                if (data.success == true) {
                    var game_html = ``;
                    var app_html = ``;
                    if (data.games.length != 0) {
                        // console.log('In: ',data.games);
                        array.forEach(element => {
                            
                        });
                        game_html += `
                            <div class="slide-competititon-box">
                                <a href="{{url('game/details/'.$banner['uuid'])}}">

                                </a>
                            </div>
                        `;
                    }
                    if (data.games.length != 0) {
                    }
                }
            }

        });   
    });   
});   

