

<style>
body{
  font-family: sans-serif;
}

.select2{
  width: 100%;
}

</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet">

 <script src="https://code.jquery.com/jquery-2.2.4.js"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.min.js"></script>

<select class="select2">
  <option value="1">Option 1</option>
  <option value="2">Option 2</option>
  <option value="3">Option 3</option>
  <option value="4">Option 4</option>
  <option value="5">Option 5</option>
  <option value="6">Option 6</option>
  <option value="7">Option 7</option>
</select>

<script>

$(document).ready(function () {
 

  $('.select2').select2();
  
  $('.select2').on('select2:selecting', function(e) {
    alert(e.params.args.data.text)
  });
});



</script>