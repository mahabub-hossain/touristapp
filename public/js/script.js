// $(document).ready(function(){
//
//     $('#country_id').on('change', function(e) {
//
//         console.log(e);
//         var country_id = e.target.value;
//
//         $.get('/admin/package/findspots/' + country_id, function (data) {
//             console.log(data);
//             $('#spots').empty();
//             $('#success').html(data);
//
//             $('#spots').append('<option value="0" disable="true" selected="true">=== Select Regencies ===</option>');
//
//             $.each(data, function (index ,spotsObj) {
//                 $('#spots').append('<option value="' + spotsObj.id + '">' + spotsObj.name + '</option>');
//             })
//         });
//
//
//     })
//
// });

// $(document).ready(function(){
//
//
//     });
//
// $(document).ready(function(){
//
//
// });