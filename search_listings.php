<?php
// DB connection
$host = 'localhost';
$db = 'trustpoint_db';
$user = 'root'; // Change to your DB username
$pass = '';     // Change to your DB password

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize function
function clean_input($conn, $data) {
    return mysqli_real_escape_string($conn, trim($data));
}

// Get POST data
$offering_type = clean_input($conn, $_POST['offering_type'] ?? '');
$property_type = clean_input($conn, $_POST['property_type'] ?? '');
$location = clean_input($conn, $_POST['location'] ?? '');
$bedroom = clean_input($conn, $_POST['bedroom'] ?? '');
$price_from = clean_input($conn, $_POST['price_from'] ?? '');
$completion_sts = clean_input($conn, $_POST['completion_sts'] ?? '');
$size_range = clean_input($conn, $_POST['size_range'] ?? '');
$furnished = clean_input($conn, $_POST['furnished_sts'] ?? '');
$amenities = $_POST['amenities'] ?? [];

// Start building query
$query = "SELECT * FROM listings WHERE is_active = 1";

// Filters
if ($offering_type !== '') {
    $query .= " AND purpose = '$offering_type'";
}
if ($property_type !== '') {
    $query .= " AND property_type = '$property_type'";
}
if ($location !== '') {
    $query .= " AND location LIKE '%$location%'";
}
if ($bedroom !== '') {
    if ($bedroom === '>4') {
        $query .= " AND bedroom > 4";
    } else {
        $query .= " AND bedroom = '$bedroom'";
    }
}
if ($price_from !== '') {
    list($minPrice, $maxPrice) = explode('-', str_replace(['k', 'm'], ['', '000'], strtolower($price_from)));
    $minPrice = (float)$minPrice * (strpos($price_from, 'm') !== false ? 1000000 : 1000);
    $maxPrice = (float)$maxPrice * (strpos($price_from, 'm') !== false ? 1000000 : 1000);
    $query .= " AND price BETWEEN $minPrice AND $maxPrice";
}
if ($completion_sts !== '') {
    $query .= " AND completion_status = '$completion_sts'";
}
if ($size_range !== '') {
    switch ($size_range) {
        case "1000":
            $query .= " AND size <= 1000";
            break;
        case "3000":
            $query .= " AND size > 1000 AND size <= 3000";
            break;
        case "5000":
            $query .= " AND size > 3000 AND size <= 5000";
            break;
        case "15000":
            $query .= " AND size > 5000 AND size <= 15000";
            break;
        case "15001":
            $query .= " AND size > 15000";
            break;
    }
}
if ($furnished !== '') {
    $query .= " AND furnished = '$furnished'";
}
if (!empty($amenities)) {
    foreach ($amenities as $amenity) {
        $amenity = clean_input($conn, $amenity);
        $query .= " AND amenities LIKE '%$amenity%'";
    }
}

// Run query
$result = $conn->query($query);

// Output results
$listings = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $listings[] = $row;
    }
    echo json_encode(['status' => 'success', 'data' => $listings]);
} else {
    echo json_encode(['status' => 'empty', 'message' => 'No listings found']);
}

$conn->close();
?>
