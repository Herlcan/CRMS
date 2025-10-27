<?php
// Connect to the database
require_once 'homeIncludes/dbconfig.php';

// Query the database for all products
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

// Loop through each product
while ($row = mysqli_fetch_assoc($result)) {
  // Get the product information
  $name = $row['name'];
  $price = $row['price'];
  $description = $row['description'];
  $full_description = $row['full_descriptions'];
  $features = $row['features'];


  // Generate the modal for the product
  echo '<!-- Modal for ' . $name . ' -->';
  echo '<div class="modal fade" id="product-modal-' . $name . '" tabindex="-1" role="dialog" aria-labelledby="product-modal-' . $name . '-label" aria-hidden="true">';
  echo '<div class="modal-dialog modal-lg">';
  echo '<div class="modal-content">';
  echo '<div class="modal-header">';
  echo '<h5 class="modal-title" id="product-modal-' . $name . '-label">' . $name . '</h5>';
  echo '<button type="button" class="m-close close" data-dismiss="modal" aria-label="Close">';
  echo '<span aria-hidden="true">×</span>';
  echo '</button>';
  echo '</div>';
  echo '<div class="modal-body">';
  // Navbar
  echo '<nav class="m-nav navbar navbar-expand-sm navbar-light bg-light">';
  echo '<div class="collapses navbar-collapse" id="navbarNav">';
  echo '<ul class="nav nav-tabs" id="myTab" role="tablist">';
  echo '<li class="nav-item">';
  echo '<a class="nav-link active" id="overview-tab-' . $name . '" data-toggle="tab" href="#overview-' . $name . '" role="tab" aria-controls="overview" aria-selected="true">Overview</a>';
  echo '</li>';
  echo '<li class="nav-item">';
  echo '<a class="nav-link" id="specification-tab-' . $name . '" data-toggle="tab" href="#specification-' . $name . '" role="tab" aria-controls="specification" aria-selected="false">Specification</a>';
  echo '</li>';
  echo '</ul>';
  echo '</div>';
  echo '</nav>';
  // Modal body content
  echo '<div class="tab-content" id="myTabContent">';
  // Overview tab
  echo '<div class="tab-pane fade show active" id="overview-' . $name . '" role="tabpanel" aria-labelledby="overview-tab-' . $name . '">';
  echo '<h4>Overview</h4>';
  //Convert the full_description string to an array
  $full_description_array = explode("\n", $full_description);
  //oop through the array and output each item as a list item
  echo '<ul>';
  foreach ($full_description_array as $descriptionss) {
    echo '<li>' . $descriptionss . '</li>';
  }
  echo '</ul>';
  echo '</div>';
  // Specification tab
  echo '<div class="tab-pane fade" id="specification-' . $name . '" role="tabpanel" aria-labelledby="specification-tab-' . $name . '">';
  echo '<h4>Specification</h4>';
  //Convert the features string to an array
  $features_array = explode("\n", $features);
  //oop through the array and output each item as a list item
  echo '<ul>';
  foreach ($features_array as $feature) {
    echo '<li>' . $feature . '</li>';
  }
  echo '</ul>';
  echo '</div>';

  echo '<div class="modal-footer">';
  echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
  echo '</div>';

  echo '</div>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
  echo '</div>';

}

// Close the database connection
mysqli_close($conn);
?>