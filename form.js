$(document).ready(function () {

  $("#form").submit(function (e) {
  
    e.preventDefault();
  
    var form = $(this);

    $.ajax(
    { 
      type: "POST",
      url: 'action.php',
      data: form.serialize(), 
      success: function (response) 
      { 
        function check(){
        try {
        JSON.parse(response);
        return true;
        } catch (error) {
        return false;
        }
        }

        value=check();
        if(value==true)
        {
          var output = JSON.parse(response);
          alert('data saved');
          displaytable();
        }
        else{
          alert(response);
        }

        function displaytable()
        {
          $('#myTable').empty();
          var total = 0;

          var heading = $('<tr><th>Product Name</th><th>Quantity</th><th>Rate</th><th>Price</th></tr>');
                        $('#myTable').append(heading);

          for (var i = 0; i < output.length; i++) 
          {
           var row = $('<tr><td>' + output[i].Product_name + '</td><td>' + output[i].Quantity
                     + '</td><td>' + output[i].Rate + '</td><td>' + output[i].Quantity * output[i]
                     .Rate +'</td></tr>');
            $('#myTable').append(row);
          }
          for (var i=0; i< output.length; i++){
            total = total+ (output[i].Quantity * output[i].Rate);
          }
          var totalrow= $('<tr> <th colspan=3>Total</th><td>'+total+'</td></tr>');
          $('#myTable').append(totalrow);
          }
          
      }
    });
  
    });
  
  });