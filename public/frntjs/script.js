$(document).ready(function() {

    $('#search').on('change', function (e) {

        console.log(e);

        var country_id = e.target.value;
        if(country_id){
            $("#generaldata").hide();
            $("#ajaxdata").show();
        } else{
            $("#generaldata").show();
            $("#ajaxdata").hide();
        }
        $.get('/homemain/search/' + country_id, function (data) {
            console.log(data);
             $('#success').empty();

             $.each(data, function (index, successObj) {
                var descriptio = successObj.description;
                 var encode = successObj.packageimages;
                 var datadecode = JSON.parse(encode);
                  $('#success').append('<div class="col-xs-12" ><div class="media packagesList"><a class="media-left fancybox-pop" href="/package/'+successObj.packageslug+'"> <img src="images/'+datadecode[1]+'"></a><div class="media-body"><div class="bodyLeft">\n'+
                      '                                        <h4 class="media-heading"><a href="/package/'+successObj.packageslug+'">'+successObj.packagename+'</a></h4><div class="countryRating">\n' +
                      '                                            \n' +
                      '                                            <ul class="list-inline rating">\n' +
                      '                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>\n' +
                      '                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>\n' +
                      '                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>\n' +
                      '                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>\n' +
                      '                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>\n' +
                      '                                            </ul>\n' +
                      '                                        </div><p>'+(descriptio.substr(0,30))+'</p>\n' +
                      '                                        <ul class="list-inline detailsBtn">\n' +
                      '                                            <li><span class="textInfo"><i class="fa fa-calendar" aria-hidden="true"></i> 27 jan, 2016</span></li>\n' +
                      '                                            <li><span class="textInfo"><i class="fa fa-clock-o" aria-hidden="true"></i> 5 days</span></li>\n' +
                      '                                        </ul></div><div class="bodyRight">\n' +
                      '                                        <div class="bookingDetails">\n' +
                      '                                            <h2>$'+successObj.packageprice+'</h2>\n' +
                      '                                            <p>Per Person</p>\n' +
                      '                                            <a href="/package/'+successObj.packageslug+'" class="btn buttonTransparent clearfix">Details</a>\n' +
                      '                                            <a data-toggle="modal" data-target="#inquiryModal" href="#" class="btn buttonTransparent">Inquiry</a>\n' +
                      '                                        </div>\n' +
                      '                                    </div></div></div></div>');
             })
        });
    });

    $('#searchitem').on('change', function (e) {

        console.log(e);

        var country_id = e.target.value;

        if (country_id) {
            $("#generaldata").hide();
            $("#ajaxdataoffer").show();
        } else {
            $("#generaldata").show();
            $("#ajaxdataoffer").hide();
        }
        $.get('/homemain/searchoffer/' + country_id, function (data) {
            console.log(data);
            $('#successoffer').empty();
            $.each(data, function (index, successofferObj) {
                var description = successofferObj.description;
                var encode = successofferObj.packageimages;
                var datadecode = JSON.parse(encode);


                $('#successoffer').append(' <div class="col-lg-4 col-sm-6 col-xs-12">\n' +
                    '                <div class="thumbnail deals packagesPage"><img src="/images/'+datadecode[0]+'" style = "height:190px !important;">\n' +
                    '                  <a class="pageLink" href="/offerpackage/'+successofferObj.offerslug+'"></a><div class="discountInfo">\n'+
                    '                    <div class="discountOffer">\n' +
                    '                      <h4>'+successofferObj.offeramount+'%<span>OFF</span>\n' +
                    '                      </h4>\n' +
                    '                    </div>\n' +
                    '                    <ul class="list-inline rating homePage">\n' +
                    '                      <li><i class="fa fa-star" aria-hidden="true"></i></li>\n' +
                    '                      <li><i class="fa fa-star" aria-hidden="true"></i></li>\n' +
                    '                      <li><i class="fa fa-star" aria-hidden="true"></i></li>\n' +
                    '                      <li><i class="fa fa-star" aria-hidden="true"></i></li>\n' +
                    '                      <li><i class="fa fa-star" aria-hidden="true"></i></li>\n' +
                    '                    </ul>\n' +
                    '                    <ul class="list-inline duration">\n' +
                    '                      <li>7 days</li>\n' +
                    '                      <li>15 hrs</li>\n' +
                    '                      <li>15 min</li>\n' +
                    '                    </ul>\n' +
                    '                  </div>\n' +
                    '                  <div class="caption">\n' +
                    '                    <h4><a class="captionTitle" href="/offerpackage/'+successofferObj.offerslug+'">'+successofferObj.name+'</a></h4>\n' +
                    '                    <p>'+(description.substr(0,30))+'</p>\n' +
                    '                    <div class="detailsInfo">\n' +
                    '                      <h5>\n' +
                    '                        <span>Start From</span>$'+successofferObj.discount+'</h5>\n' +
                    '                      <ul class="list-inline detailsBtn">\n' +
                    '                        <li><a data-toggle="modal" data-target="#inquiryModal" href="#" class="btn buttonTransparent">Booknow</a></li>\n' +
                    '                      </ul>\n' +
                    '                    </div>\n' +
                    '                  </div>\n' +
                    '                </div>\n' +
                    '              </div>');
            })

        });
    })




});


$(document).ready(function () {

    var delay = 3000;

    $( ".packageslide" ).slider({

        range: true,
        min: 200,
        max: 10000,
        values: [220, 10000],
        slide: function (event, ui) {

            var min = ui.values[0];
            var max = ui.values[1];
            if (min || max) {
                $("#generaldata").hide();
                $("#ajaxdataslider").show();
            } else {
                $("#generaldata").show();
                $("#ajaxdataslider").hide();
            }
            $('#range').text(min + ' - ' + max);
            $.get('/homemain/slidersearch/' + min + '/' + max, function (data) {

                console.log(data);
                setTimeout(function() {
                    $('#successslider').html(data);
                }, delay);



            })

        }

    })

    var delay = 3000;
        $( ".offerslide" ).slider({


            range: true,
            min: 200,
            max: 10000,
            values: [220, 10000],
            slide: function (event, ui) {



                var min = ui.values[0];
                var max = ui.values[1];
                if (min || max) {
                    $("#generaldata").hide();
                    $("#ajaxdataoffer").show();
                } else {
                    $("#generaldata").show();
                    $("#ajaxdataoffer").hide();
                }
                $('#pricerange').text(min + ' - ' + max);
                $.get('/homemain/offerslidersearch/' + min + '/' + max, function (data) {

                    console.log(data);
                    setTimeout(function() {
                        $('#successoffer').html(data);
                    }, delay);



                })

            }

        })






});


$(document).ready(function () {

    $('.select2').select2();
  
      $('.select2').on('select2:selecting', function(e) {

        var city = e.params.args.data.text;
        //alert(city);
        var key ='4999bdda1f696481cd0d945c695416d8';

        $.ajax({


            url:'http://api.openweathermap.org/data/2.5/weather',
            dataType:'json',
            type:'GET',
            data:{q:city, appid:key,units:'metric'},

            success:function (data) {
                var wf = '';

                $.each(data.weather, function (index, val) {
                    var d = new Date();

                    wf += '<img src="/img/cities/weather-bg.jpg" alt="image"><div class="cityWeather">\n' +
                        '                                <div class="cityTable">\n' +
                        '                                    <div class="cityTableInner">\n' +
                        '                                        <div class="cityWeatherInfo">\n' +
                        '                                          <img src="/img/icons/cloud-sm.png">\n' +
                        '                                            <h2>'+data.main.temp+'&deg;C'+'</h2>\n' +
                        '                                             <p>'+val.description+'</p>\n' +
                        '                                            <p>'+data.name +'</p>\n' +
                        '                                        </div>\n' +
                        '                                    </div>\n' +
                        '                                </div>\n' +
                        '                            </div><div class="dayTime">\n' +
                        '                                <span class="pull-left">'+d+'</span>\n'
                        '                            </div>'

                   });
                $('#showweatherforcast').html(wf);

            }
        });
      });


    $(window ).load('load',function () {
        var city =$('#cityweather').val();

        console.log(city);
        var key ='4999bdda1f696481cd0d945c695416d8';

        $.ajax({


            url:'http://api.openweathermap.org/data/2.5/weather',
            dataType:'json',
            type:'GET',
            data:{q:city, appid:key,units:'metric'},

            success:function (data) {
                var wf = '';

                $.each(data.weather, function (index, val) {
                    var d = new Date();

                    wf += '<img src="/img/cities/weather-bg.jpg" alt="image"><div class="cityWeather">\n' +
                        '                                <div class="cityTable">\n' +
                        '                                    <div class="cityTableInner">\n' +
                        '                                        <div class="cityWeatherInfo">\n' +
                        '                                          <img src="/img/icons/cloud-sm.png">\n' +
                        '                                            <h2>'+data.main.temp+'&deg;C'+'</h2>\n' +
                        '                                             <p>'+val.description+'</p>\n' +
                        '                                            <p>'+data.name +'</p>\n' +
                        '                                        </div>\n' +
                        '                                    </div>\n' +
                        '                                </div>\n' +
                        '                            </div><div class="dayTime">\n' +
                        '                                <span class="pull-left">'+d+'</span>\n'
                    '                            </div>'

                });
                $('#showspotweather').html(wf);

            }
        });

    });

    $(window ).load('load',function () {
        var city =$('#capitalweather').val();

        console.log(city);
        var key ='4999bdda1f696481cd0d945c695416d8';

        $.ajax({


            url:'http://api.openweathermap.org/data/2.5/weather',
            dataType:'json',
            type:'GET',
            data:{q:city, appid:key,units:'metric'},

            success:function (data) {
                var wf = '';

                $.each(data.weather, function (index, val) {
                    var d = new Date();

                    wf += '<img src="/img/cities/weather-bg.jpg" alt="image"><div class="cityWeather">\n' +
                        '                                <div class="cityTable">\n' +
                        '                                    <div class="cityTableInner">\n' +
                        '                                        <div class="cityWeatherInfo">\n' +
                        '                                          <img src="/img/icons/cloud-sm.png">\n' +
                        '                                            <h2>'+data.main.temp+'&deg;C'+'</h2>\n' +
                        '                                             <p>'+val.description+'</p>\n' +
                        '                                            <p>'+data.name +'</p>\n' +
                        '                                        </div>\n' +
                        '                                    </div>\n' +
                        '                                </div>\n' +
                        '                            </div><div class="dayTime">\n' +
                        '                                <span class="pull-left">'+d+'</span>\n'
                    '                            </div>'

                });
                $('#showweatherforcast').html(wf);

            }
        });

    });

});




// $(document).ready(function (){
//     $("#city").select2({
//         allowClear:true,
//         placeholder: 'Search for a disease'
//     });
// });


