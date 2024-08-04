<?php

require_once 'vendor/autoload.php';

use Dompdf\Dompdf;
include('./connection/connect.php');
session_start();




$cart_id = $_SESSION['cart_id'];
$customer_id = $_SESSION['customer_id'];

$select_query = "SELECT s.customer_id as customer_id, c.product_id as product_id, c.color as color, c.size as size, c.quantity as quantity FROM shopping_cart s, cart_items c WHERE s.ordered = 'no' AND s.customer_id = $customer_id AND s.cart_id = c.cart_id;";
$result = mysqli_query($con, $select_query);


// Close the HTML tags
$invoiceHtml = '<html><head>
<style>
body{margin-top:20px;
    background-color: #f7f7ff;
    }
    #invoice {
        padding: 0px;
    }
    
    .invoice {
        position: relative;
        background-color: #FFF;
        min-height: 680px;
        padding: 15px
    }
    
    .invoice header {
        padding: 10px 0;
        margin-bottom: 20px;
        border-bottom: 1px solid #0d6efd
    }
    
    .invoice .company-details {
        text-align: right
    }
    
    .invoice .company-details .name {
        margin-top: 0;
        margin-bottom: 0
    }
    
    .invoice .contacts {
        margin-bottom: 20px
    }
    
    .invoice .invoice-to {
        text-align: left
    }
    
    .invoice .invoice-to .to {
        margin-top: 0;
        margin-bottom: 0
    }
    
    .invoice .invoice-details {
        text-align: right
    }
    
    .invoice .invoice-details .invoice-id {
        margin-top: 0;
        color: #0d6efd
    }
    
    .invoice main {
        padding-bottom: 50px
    }
    
    .invoice main .thanks {
        margin-top: -100px;
        font-size: 2em;
        margin-bottom: 50px
    }
    
    .invoice main .notices {
        padding-left: 6px;
        border-left: 6px solid #0d6efd;
        background: #e7f2ff;
        padding: 10px;
    }
    
    .invoice main .notices .notice {
        font-size: 1.2em
    }
    
    .invoice table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px
    }
    
    .invoice table td,
    .invoice table th {
        padding: 15px;
        background: #eee;
        border-bottom: 1px solid #fff
    }
    
    .invoice table th {
        white-space: nowrap;
        font-weight: 400;
        font-size: 16px
    }
    
    .invoice table td h3 {
        margin: 0;
        font-weight: 400;
        color: #0d6efd;
        font-size: 1.2em
    }
    
    .invoice table .qty,
    .invoice table .total,
    .invoice table .unit {
        text-align: right;
        font-size: 1.2em
    }
    
    .invoice table .no {
        color: #fff;
        font-size: 1.6em;
        background: #0d6efd
    }
    
    .invoice table .unit {
        background: #ddd
    }
    
    .invoice table .total {
        background: #0d6efd;
        color: #fff
    }
    
    .invoice table tbody tr:last-child td {
        border: none
    }
    
    .invoice table tfoot td {
        background: 0 0;
        border-bottom: none;
        white-space: nowrap;
        text-align: right;
        padding: 10px 20px;
        font-size: 1.2em;
        border-top: 1px solid #aaa
    }
    
    .invoice table tfoot tr:first-child td {
        border-top: none
    }
    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0px solid rgba(0, 0, 0, 0);
        border-radius: .25rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
    }
    
    .invoice table tfoot tr:last-child td {
        color: #0d6efd;
        font-size: 1.4em;
        border-top: 1px solid #0d6efd
    }
    
    .invoice table tfoot tr td:first-child {
        border: none
    }
    
    .invoice footer {
        width: 100%;
        text-align: center;
        color: #777;
        border-top: 1px solid #aaa;
        padding: 8px 0
    }
    
    @media print {
        .invoice {
            font-size: 11px !important;
            overflow: hidden !important
        }
        .invoice footer {
            position: absolute;
            bottom: 10px;
            page-break-after: always
        }
        .invoice>div:last-child {
            page-break-before: always
        }
    }
    
    .invoice main .notices {
        padding-left: 6px;
        border-left: 6px solid #0d6efd;
        background: #e7f2ff;
        padding: 10px;
    }

</style></head>
<body>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div id="invoice">

                <div class="invoice overflow-auto">
                    <div style="min-width: 600px">
                        <header>
                            <div class="row">

                                <div class="col company-details">
                                    <h2 class="name">
                                        <a target="_blank" href="javascript:;">
									SportiFlex
									</a>
                                    </h2>
                                    <div>455 Foggy Heights, AZ 85004, US</div>
                                    <div>(123) 456-789</div>
                                    <div>company@example.com</div>
                                </div>
                            </div>
                        </header>
                        <main>
                            <div class="row contacts">
                                <div class="col invoice-to">
                                    <div class="text-gray-light">INVOICE TO:</div>
                                    <h2 class="to">John Doe</h2>
                                    <div class="address">796 Silver Harbour, TX 79273, US</div>
                                    <div class="email"><a href="mailto:john@example.com">john@example.com</a>
                                    </div>
                                </div>
                                <div class="col invoice-details">
                                    <h1 class="invoice-id">INVOICE 3-2-1</h1>
                                    <div class="date">Date of Invoice: 01/10/2018</div>
                                    <div class="date">Due Date: 30/10/2018</div>
                                </div>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="text-left">DESCRIPTION</th>
                                        <th class="text-right">Unit Price</th>
                                        <th class="text-right">Quantity</th>
                                        <th class="text-right">TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>';
                                
$total= 0;
$shipping = 4254;
                                // Loop through the query result and generate HTML for each row
    $ids = array();
    $colors = array();
    $quantities = array();
    $sizes = array();
while ($row = mysqli_fetch_assoc($result)) {
    $customer_id = $customer_id;
    $product_id = $row['product_id'];
    $select1 = "select * from products where product_id = $product_id;";
    $result1 = mysqli_query($con, $select1);
    $row1 = mysqli_fetch_assoc($result1);
    $product_name = $row1['product_name'];
    $description = $row1['description'];
    $unit_price = $row1['price'];
    $color = $row['color'];
    $size = $row['size'];
    $quantity = $row['quantity'];
    $subtotal = $quantity * $unit_price;
    $total +=$subtotal;
    $ids[] = $product_id;
    $colors[] = "$color";
    $sizes[] = "$size";
    $quantities[] = $quantity;
    // Append the dynamic data to the invoice HTML
    $invoiceHtml .= '
    <tr>
        <td class="no">04</td>
        <td class="text-left">
            <h3>
        '. $product_name .'
            </h3>
            '. $description .'</td>
        <td class="unit">        '. $unit_price .'</td>
        <td class="qty">        '. $quantity .'</td>
        <td class="total">        '. $subtotal .'</td>
    </tr>
    ';

}

$grand = $total + $shipping;
$date = date('Y-m-d');
// Insert Query
$insert_query = "INSERT INTO `orders` (`order_date`, `customer_id`, `order_status`, `total_amount`) VALUES ('$date', '$customer_id', 'processing', '$grand');";
$sql_execute = mysqli_query($con, $insert_query);


if ($sql_execute) {
    $order_id = mysqli_insert_id($con);
    $length = count($ids);

    for ($i = 0; $i < $length; $i++) {
        $id = $ids[$i];
        $clr = $colors[$i];
        $sze = $sizes[$i];
        $qty = $quantities[$i];

        $insert_query1 = "INSERT INTO `order_line` (`order_id`, `product_id`, `quantity`, `color`, `size`) VALUES ('$order_id', '$id', '$qty', '$clr', '$sze');";
        $sql_execute1 = mysqli_query($con, $insert_query1);

        if (!$sql_execute1) {
            echo "<script>alert('Error Occurred while inserting into order_line table')</script>";
            break; // Stop the loop if an error occurs
        }
        

    }
} else {
    echo "<script>alert('Error Occurred while inserting into orders table')</script>";
    
}
$update_query = "UPDATE shopping_cart SET  ordered = 'yes' WHERE cart_id = $cart_id;";
$result = mysqli_query($con, $update_query);


                                    $invoiceHtml .= '
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">SUBTOTAL</td>
                                        <td>' . $total . '</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">Shipping Cost</td>
                                        <td>' . $shipping .  '</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">GRAND TOTAL</td>
                                        <td>' . $grand . '</td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="thanks">Thank you!</div>

                        </main>
                        <footer>Invoice was created on a computer and is valid without the signature and seal.</footer>
                    </div>
                    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                    <div></div>
                </div>
            </div>
        </div>
    </div>
</div>
</body></html>';

// Generate the PDF using the invoice HTML
$dompdf = new Dompdf();
$dompdf->loadHtml($invoiceHtml);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$pdf = $dompdf->output();

// Output the PDF as a download
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="invoice.pdf"');
echo $pdf;


$update_query = "INSERT into `notifications` (`message`, `status`) values('A new order has been ordered!', 'unread');";
$result = mysqli_query($con, $update_query);


?>
