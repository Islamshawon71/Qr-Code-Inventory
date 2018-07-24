<?php
/**
 * Created by PhpStorm.
 * User: MegaMind
 * Date: 7/17/2018
 * Time: 1:25 AM
 */

$_REQUEST['action']();

function send_qrcode_add(){
    $content = explode('$',$_REQUEST['content']);

                //var_dump($content);

    $success = array(
        'status' => 'success',
        'product_code' => $content[1],
        'name' => $content[2],
        'price' => $content[3],
        'ex-date' => $content[4],
        'me-date' => $content[5],
        'image' => $content[6]
    );
    echo json_encode($success);
    die();
}
function send_qrcode_sell(){
    $content = explode('$',$_REQUEST['content']);

                //var_dump($content);
				
$q = "<tr>
	<td><input type='text' class='form-control' id='' name='id[]' value='' readonly></td>
	<td><input   type='text' class='form-control' id='' name='name[]' value='' readonly ></td>
	<td><input  type='number' class='form-control price' id='' name='price[]' value='' readonly></td>
	<td><input  type='number' class='form-control quantity' id='quantity' name='quantity[]' value=''></td>
	<td><input  type='text' class='form-control total' id='' name='total[]' value='' readonly></td> 
</tr>";
				

    $success = array(
        'status' => 'success',
        'html' => $q
    );
    echo json_encode($success);
    die();
} ?>


