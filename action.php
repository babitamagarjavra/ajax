<?php

  /* if the request method post cha bhaney matra , function call garyo

ani teslai json file ma write garyo*/

//   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $json_data = fileInput();

    file_put_contents("formdata.json", $json_data);

    echo $json_data;
    

  //defining function

//   class Product{

    function fileInput()

  {

    $current_data = file_get_contents('formdata.json');

    $decoded_data = json_decode($current_data, true);

    $data_add = array(

        'Product_name' => filter_input(INPUT_POST,'pname',FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^([A-Za-z0-9])*$/"))),
        'Quantity' => filter_input(INPUT_POST,'qty',FILTER_VALIDATE_INT),
        'Rate' => filter_input(INPUT_POST,'rate',FILTER_VALIDATE_FLOAT)
    );

    // if ($data_add['Product_name']='false')
    // {
    //     $message='please enter alphabets and numbers only in Product name field';
    // }
    // elseif ($data_add['Quantity']='false')
    // {
    //     $message='please enter intergers only in Quantity field';
    // }
    // elseif ($data_add['Rate']='false')
    // {
    //     $message='please enter float only in Rate field';
    // }
    // else{
    $decoded_data[] = $data_add;

    $updated_data = json_encode($decoded_data);
    // }
    // if (isset($message))
    // {
    //     return $message;
    // }
    // else
    // {
    return $updated_data;
    }
  

// }

  ?>