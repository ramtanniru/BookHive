<?php
$conn = new mysqli('localhost', 'root', 'root');
$sql = 'use bookhive;';
$sql .= 'create table credenentials(
    username varchar2(20),
    password not null varchar2(20));';
$sql .= 'insert into credenentials("ram","123");';
if ($conn->multi_query($sql)) {
    echo 'created table credenentials';
}
$conn->close();
?>