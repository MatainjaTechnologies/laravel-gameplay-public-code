// const { parseJSON } = require("jquery");

$(document).ready(function() {

    var baseurl = window.location.origin;

    // See more game
    $(document).on('click', '.see_more', function() {
        
        var limit = $('#limit').val();
        var page = ( parseInt(limit) + 1);
        var type = $(this).data('btn_info');

        load_more(page, type);
        
    });

    function load_more(page, type) {
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        $.ajax({
            datatype: "html",
            type: "get",
            url: baseurl+'/?type='+type+'&page='+page,
        }).done(function (data) {
            /*if (data.length == 0) {
                $('.game_row').append("<div class='col-12' style='display: flex; justify-content: center;'><div style='padding: 1rem; color: red;'>No more data to display</div></div>");
                $('.see_more').remove();
                return;
            }else{
            }*/
            $('#limit').val(page);

            if (!data.hasPages) {
                $('.see_more').remove();
            }
            
            $(".game_row").append(data.html);
        });
    }

    // Category game
    $(document).on('click', '.cat_btn', function() {

        $('.cat_btn').removeClass('active');
        var type = $(this).data('btn_info');

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        $.ajax({
            datatype: "html",
            type: "get",
            url: baseurl+'/cat/game/?type='+type+'&page=1',            
        }).done(function (data) {
            $('.btn_'+type).addClass("active");

            var dt = JSON.parse(data);
            
            // gameData.forEach(game => {
            //     console.log(game);
            // });
            // return;
            var gameData = dt.games;
            if (gameData.length > 0) {

                var html = `
                    <div class="row section-heading align-items-center">
                        <div class="col-7 text-left">
                            <p class="page-heading">`+dt.type_name+`</p>
                        </div>
                        <div class="col-5 text-right">
                            <a class="btn btn-outline-dark btn-sm rounded-pill " href="`+baseurl+`/category/`+type+`/game">See More</a>
                        </div>
                `;

                /*if (data.hasPages) {
                    html += `
                        <div class="col-5 text-right">
                            <button class="btn btn-outline-dark btn-sm rounded-pill see_more" data-btn_info="`+data.type+`">See More</button>
                            <input type="hidden" name="limit" id="limit" value="1">
                        </div>
                    `;
                }*/

                html += `
                    </div>
                    <div class="row game_row">`                    
                        gameData.forEach(game => {
                            html += `
                                <div class='col-6'>
                                    <div class='game-list'>
                                        <a href='`+baseurl+`/game/`+game.uuid+`'>
                                            <img src='`+baseurl+`/uploads/games/`+game.id+`/cover_image/`+game.cover_image+`' alt='Game'>
                                        </a>
                                        <div class='row no-gutters mt-2'>
                                            <div class='col-8'>
                                                <h6 class='mb-0 text-truncate'>`+game.name+`</h6>
                                                <small class='text-secondary'>`+game.category_name+`</small>
                                            </div>
                                            <div class='col-4 text-right'>
                                                <a href='`+baseurl+`/game/`+game.uuid+`' class='btn btn-sm button-green-sh sh-sm rounded-pill px-2 text-uppercase'>Play</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                        });
                    `</div> 
                `;

                             
            }else{

                var html = `
                    <div class="row section-heading align-items-center">
                        <div class="col-7 text-left">
                            <p class="page-heading">`+dt.type_name+`</p>
                        </div>
                        <div class="col-5 text-right">
                        </div>
                    </div>
                    <div class="row game_row">
                        <div class="col-12">
                            <p>No Game to show</p>
                        </div>
                    </div>
                `;
            }

            $('.games_main').html(html);              
        });
    });

    // See more category game
    $(document).on('click', '.see_more_category_game', function() {
        
        var limit = $('#limit').val();
        var page = ( parseInt(limit) + 1);
        var type = $(this).data('btn_info');

        infinteLoadMore(page, type);
        
    });

    function infinteLoadMore(page, type) {
        // console.log('Page: ', page); return;
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        $.ajax({
            datatype: "html",
            type: "get",
            url: baseurl+'/category/'+type+'/game?page='+page,
        }).done(function (data) {

            // console.log(JSON.parse(data).games);
            var gameData = JSON.parse(data).games

            
            if (JSON.parse(data).more) {
                $('#limit').val(page);
                
                var html = '';
                
                gameData.forEach(game => {
                    html += `
                        <div class='col-6'>
                            <div class='game-list'>
                                <a href='`+baseurl+`/game/`+game.uuid+`'>
                                    <img src='`+baseurl+`/uploads/games/`+game.id+`/cover_image/`+game.cover_image+`' alt='Game'>
                                </a>
                                <div class='row no-gutters mt-2'>
                                    <div class='col-8'>
                                        <h6 class='mb-0 text-truncate'>`+game.name+`</h6>
                                        <small class='text-secondary'>`+game.category_name+`</small>
                                    </div>
                                    <div class='col-4 text-right'>
                                        <a href='`+baseurl+`/game/`+game.uuid+`' class='btn btn-sm button-green-sh sh-sm rounded-pill px-2 text-uppercase'>Play</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                });


                $(".game_row").append(html);
            }else{
                $('.game_row').append("<div class='col-12' style='display: flex; justify-content: center;'><div style='padding: 1rem; color: red;'>No more data to display</div></div>");
                $('.see_more_category_game').remove();
                return;
            }
        });
    }
    
    // See more finish competition
    $(document).on('click', '.see_more_finish_comp', function() {
        
        var limit = $('#limit').val();
        var page = ( parseInt(limit) + 1);

        loadMoreFComp(page);
        
    });

    function loadMoreFComp(page) {
        // console.log('Page: ', page); return;
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        $.ajax({
            datatype: "html",
            type: "get",
            url: baseurl+'/competition/?page='+page,
        }).done(function (data) {
            
            if (data.html.length == 0) {
                $('.comp_row').append("<div class='col-12' style='display: flex; justify-content: center;'><div style='padding: 1rem; color: red;'>No more data to display</div></div>");
                $('.see_more_finish_comp').remove();
                return;
            }else{
                $('#limit').val(page);
                
                if (!data.hasPages) {
                    $('.see_more_finish_comp').remove();                    
                }
                $(".comp_row").append(data.html);
            }
        });
    }

    
    $(document).on('change', '#lang', function() {
        var val = $(this).val();

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: baseurl+'/changlang',
            data: {
                val: val,
            },
        }).done(function (data) {
            location.reload();
        });

    });

    $( '#showSearch' ).click(function() {
        $( '.search-box' ).toggle();
        if ($('.search-box').is(':visible')) {
          $('#showSearch').html('<i class="fas fa-times"></i>')
        } else {
          $('#showSearch').html('<i class="fas fa-search"></i>')
        }
    });

    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict'
    
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')
    
        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }
    
            form.classList.add('was-validated')
            }, false)
        })
    })()

}); 