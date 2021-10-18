<?php

$data = $_POST['data'] ?? '';

$url = 'index.php?message=' . urlencode("Data\n saved!");

header('Location: ' . $url);
