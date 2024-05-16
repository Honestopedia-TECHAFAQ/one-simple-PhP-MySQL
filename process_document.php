<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $document_url = $_POST["document_url"];
    $extracted_terms = array("5G fifth generation", "UDNs ultra-dense networks", "SmC small cell", "MNOs mobile network operators", "RATs radio access technologies", "COs central offices");
    echo '<form action="save_terms.php" method="POST">';
    foreach ($extracted_terms as $term) {
        echo '<input type="checkbox" name="selected_terms[]" value="' . $term . '">' . $term . '<br>';
    }
    echo '<input type="submit" name="submit" value="Save Selected Terms">';
    echo '</form>';
} else {
    header("Location: index.html");
    exit();
}
?>
