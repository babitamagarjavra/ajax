$(document).ready(function () {

  $("#form").submit(function (e) {

    e.preventDefault();

    var form = $(this);

    

    $.ajax({

      type: "POST",

      url: 'action.php',

      data: form.serialize(), // serializes the form's elements.

      success: function (response) {

        // alert('data saved');
        // if (typeOf(response)=='array')
        // {
        var output = JSON.parse(response);
        displaytable();
        
        // else
        // {
        //   alert (response);
        // }
        function displaytable()
        {
          $('#myTable').empty();
          var heading = $('<tr><th>Product Name</th><th>Quantity</th><th>Rate</th><th>Price</th></tr>');
          $('#myTable').append(heading);
          for (var i = 0; i < output.length; i++) {
            var row = $('<tr><td>' + output[i].Product_name + '</td><td>' + output[i].Quantity
              + '</td><td>' + output[i].Rate + '</td><td>' + output[i].Quantity * output[i].Rate +
              '</td></tr>');
            $('#myTable').append(row);
          }// show response from the php script.
        }
        
      }



    })

  })

});

