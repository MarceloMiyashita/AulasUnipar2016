<?php

require '../config.php';

$tb = new Application_Model_DbTable_Post();
$posts = $tb->fetchAll()->toArray();

echo json_encode($posts);