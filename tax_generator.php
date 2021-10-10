<?php 
#Created by: Suman Kandel on 05/10/2021
// Get the data from the form.
$gross_income = $_POST['gross_income'];
$deductions = $_POST['deductions'];

#Calculate taxable income
$taxable_income = $gross_income - $deductions;

#Condition;
if ($taxable_income <= 6000){
    $tax_due = 0;
}
elseif($taxable_income >= 6001 && $taxable_income <= 20000){
    $tax_due = ($taxable_income - 6000) * 0.17;
}
elseif($taxable_income >= 20001 && $taxable_income <= 50000){
    $tax_due = (($taxable_income - 20000) * 0.30) + 2380;
}
elseif($taxable_income >= 50001 && $taxable_income <= 60000){
    $tax_due = (($taxable_income - 50000) * 0.42) + 11380;
}
else {//$taxable_income => 60001
    $tax_due = (($taxable_income - 60000) * 0.47) + 15580;
}

// Apply currency formatting to the dollar.
$gross_income_formatted = "$".number_format($gross_income, 2);
$deductions_formatted = "$".number_format($deductions, 2);
$taxable_income_formatted = "$".number_format($taxable_income, 2);
$tax_due_formatted = "$".number_format($tax_due, 2);

$date = date('d/m/y'). ".";

?>

<!DOCTYPE html>
<html>
<head>
    <title>Tax Payable Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <main>
        <h1>Tax Payable Calculator</h1>

       <!--  Displaying values. -->
        <label>Gross income:</label>
        <span><?php echo $gross_income_formatted; ?></span><br>

        <label>Deductions:</label>
        <span><?php echo $deductions_formatted; ?></span><br>

        <label>Taxable income:</label>
        <span><?php echo $taxable_income_formatted; ?></span><br>

        <label>Tax due:</label>
        <span><?php echo $tax_due_formatted; ?></span><br>

        <p> This calculation was done on <?php echo $date; ?></p>
        
    </main>
</body>
</html>