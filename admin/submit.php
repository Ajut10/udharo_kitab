<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="../javascript/jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/d3js/7.8.5/d3.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<form action="submit.php" method="post">

<h2>Customer Information</h2>
<label for="">Customer Name</label>
<input type="text" name="cust_name" id="cust_name">
<input type="submit" value="submit" name="submit">
</form>
<script>
          $(function(){
              $("#cust_name").autocomplete({
                  source: "../ajax/autocomplete.php",
                  minLength:1,
                  select:function(event, ui){

                      $("#cust_name").val(ui.item.value);
                      $("#cust_id").val(ui.item.id);
                      $("#cust_phone").val(ui.item.phone);
                  }
              }).data("ui-autocomplete")._renderItem = function( ul, item ) {
          return $( "<li class='ui-autocomplete-row'></li>" )
              .data( "item.autocomplete", item )
              .append( item.label )
              .appendTo( ul );
              };
          });

      </script>