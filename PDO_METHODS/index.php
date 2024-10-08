<?php require_once 'core/dbConfig.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Selecting All Customers in the table -->
    <?php
    $stmt = $pdo-> prepare("SELECT * FROM Customer");
    // fetch all
    if ($stmt->execute()) {
        echo "<pre>";
        print_r($stmt->fetchAll());
        echo "<pre>";
    }

    // Selecting the customer whose customer id is equal to 1
    $stmt = $pdo-> prepare("SELECT * FROM Customer WHERE customer.customer_user_id = 1");
    // fetch that customer
    if ($stmt->execute()) {
        echo "<pre>";
        print_r($stmt->fetch());
        echo "<pre>";
    }

    // Inserting a new customer to the table
    $query = "INSERT INTO Customer (customer_user_id, NAME, phone, email, Loyalty_Points)
    VALUES (?,?,?,?,?)";

    $stmt = $pdo->prepare($query);
    $executeQuery = $stmt->execute(
        [11, "Fistacs", "09925502467", "iamgabrielljohn@gmail.com", 0]
    );
    if ($executeQuery) {
        echo "Query successful\n";
    }
    else {
        echo "Query failed\n";    
    }

    // Delete a customer from the the table
    $query = "DELETE FROM Customer WHERE customer_user_id = 11";

    $stmt = $pdo->prepare($query);

    $executeQuery = $stmt->execute();
    if ($executeQuery) {
        echo "Deletion successful\n";
    }
    else {
        echo "Query failed\n";    
    }

    // Update a customers data on the table
    $query = "UPDATE Customer SET phone =? WHERE customer_user_id = 1";

    $stmt = $pdo->prepare($query);

    $executeQuery = $stmt->execute(
        [666]
    );
    if ($executeQuery) {
        echo "Update successful\n";
    }
    else {
        echo "Query failed\n";    
    }

    // SQL Query result set to render on an html table
    $querystmt = "SELECT * FROM Customer";
    $querystmt = $pdo-> prepare("SELECT * FROM Customer");
    $executeQuery = $querystmt -> execute();

    if ($executeQuery){
        $customer = $querystmt->fetchAll();
    }

    else {
        echo "Query Failed\n";
    }
    ?>
    <!-- Printing the database in tabular form -->
    <table>
        <tr>
            <th>customer_user_id</th>
            <th>NAME</th>
            <th>phone</th>
            <th>email</th>
            <th>Loyalty_Points</th>
        </tr>
        <?php foreach ($customer as $row) { ?>
        <tr>
            <td><?php echo $row['customer_user_id']; ?></td>
            <td><?php echo $row['NAME']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['Loyalty_Points']; ?></td>
        </tr>
        <?php
    } ?>
</body>
</html>