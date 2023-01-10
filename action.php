<?php

$json_data = fileInput();

if ((gettype(json_decode($json_data, true))) != 'NULL') 
{
  file_put_contents("formdata.json", $json_data);
  echo $json_data;
} 
else 
{
  echo $json_data;
}

function fileInput()
{
  $current_data = file_get_contents('formdata.json');
  $decoded_data = json_decode($current_data, true);
  $data_add = array(
    'Product_name' => filter_input(INPUT_POST, 'pname', FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^([A-Za-z])*$/"))),
    'Quantity' => filter_input(INPUT_POST, 'qty', FILTER_VALIDATE_INT),
    'Rate' => filter_input(INPUT_POST, 'rate', FILTER_VALIDATE_FLOAT)
  );

  if ($data_add['Product_name'] != false && $data_add['Quantity'] != false && $data_add['Rate'] != false) 
  {
    $decoded_data[] = $data_add;
    $updated_data = json_encode($decoded_data);
    return $updated_data;
  } 
  else 
  {
    $message = 'please enter correct format in the fields';
    return $message;
  }
}
