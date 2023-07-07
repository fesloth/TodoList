<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "todo");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;
    // ambil data tiap element dalam form
    $priority = htmlspecialchars($data["priority"]);
    $description = htmlspecialchars($data["description"]);
    $deadline = htmlspecialchars($data["deadline"]);
    $status = htmlspecialchars($data["status"]);

    // query insert data
    $query = "INSERT INTO tugas
     VALUES ('', '$priority', '$description', '$deadline', '$status')
     ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tugas WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;

    // Ambil data tiap elemen dalam form
    $id = $data["id"];
    $priority = htmlspecialchars($data["priority"]);
    $description = htmlspecialchars($data["description"]);
    $deadline = htmlspecialchars($data["deadline"]);
    // Query update data
    $query = "UPDATE tugas SET 
                priority = '$priority',
                description = '$description',
                deadline = '$deadline'
            WHERE id = '$id'";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function add($data)
{
    global $conn;
    // ambil data tiap element dalam form
    $hari = htmlspecialchars($data["hari"]);
    $subjek = htmlspecialchars($data["subjek"]);
    $ruangan = htmlspecialchars($data["ruangan"]);
    $status = htmlspecialchars($data["status"]);

    // query insert data
    $query = "INSERT INTO jadwal
     VALUES ('', '$hari', '$subjek', '$ruangan', '$status')
     ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function delete($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM jadwal WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function edit($data)
{
    global $conn;

    // Ambil data tiap elemen dalam form
    $id = $data["id"];
    $hari = htmlspecialchars($data["hari"]);
    $subjek = htmlspecialchars($data["subjek"]);
    $ruangan = htmlspecialchars($data["ruangan"]);
    $status = htmlspecialchars($data["status"]);
    // Query update data
    $query = "UPDATE jadwal SET 
                hari = '$hari',
                subjek = '$subjek',
                ruangan = '$ruangan',
                status = '$status'
            WHERE id = '$id'";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
