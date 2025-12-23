<?php

function formatName($name) {
    return ucwords(trim($name));
}

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function cleanSkills($string) {
    return array_map("trim", explode(",", $string));
}

function saveStudent($name, $email, $skillsArray) {
    $skills = implode("|", $skillsArray);
    $data = "$name,$email,$skills\n";
    file_put_contents("students.txt", $data, FILE_APPEND);
}

function uploadPortfolioFile($file) {
    if ($file["error"] !== 0) {
        throw new Exception("Upload error");
    }

    $allowed = ["application/pdf", "image/jpeg", "image/png"];
    if (!in_array($file["type"], $allowed)) {
        throw new Exception("Only PDF, JPG, PNG allowed");
    }

    if ($file["size"] > 2 * 1024 * 1024) {
        throw new Exception("Max file size 2MB");
    }

    if (!is_dir("uploads")) {
        throw new Exception("Uploads folder not found");
    }

    $newName = time() . "_" . basename($file["name"]);
    move_uploaded_file($file["tmp_name"], "uploads/" . $newName);

    return $newName;
}