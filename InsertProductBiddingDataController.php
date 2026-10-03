<?php

include_once 'dbConfig.php';
include_once 'ProductController.php';

header('Content-Type: application/json');

$product_id = $_GET['product_id'] ?? '';
$user_id = $_GET['user_id'] ?? '';
$bid_value = $_GET['bid_value'] ?? '';

if (!is_numeric($bid_value) || floatval($bid_value) <= 0) {
    http_response_code(400);
    echo json_encode(['error' => 'Bid must be a number greater than 0']);
    exit;
}

$bid_value = floatval($bid_value);

$productService = new ProductService($db,null,null,null,null,null,null,null,null, null,null);

$bids = $productService->getBiddingDetails($product_id);
if (!empty($bids)) {
    $highest_bid = floatval($bids[0]['bid_price']);
    if ($bid_value <= $highest_bid) {
        http_response_code(400);
        echo json_encode(['error' => 'Bid must be greater than the current highest bid of ' . $highest_bid]);
        exit;
    }
}

$message = $productService->insertBiddingDetails($user_id, $product_id, $bid_value);
echo json_encode(['success' => $message]);

?>
