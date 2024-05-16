<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    if (!empty($_POST["selected_terms"])) {
        $conn = new mysqli("localhost", "username", "password", "db_terms");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $stmt = $conn->prepare("INSERT INTO terms (term_abbreviation, fk_sentences) VALUES (?, ?)");
        foreach ($_POST["selected_terms"] as $selected_term) {
            $fk_sentence = 1;
            $stmt->bind_param("si", $selected_term, $fk_sentence);
            $stmt->execute();
        }
        $stmt->close();
        $conn->close();
        header("Location: index.html");
        exit();
    }
} else {
    header("Location: index.html");
    exit();
}
?>
