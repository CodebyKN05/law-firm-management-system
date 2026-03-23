<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once 'db.php';
include 'header.php';
?>

<div class="container">
    <h2>Documents List</h2>
    <table>
        <thead>
            <tr>
                <th>Document ID</th>
                <th>Case Title</th>
                <th>Uploaded By</th>
                <th>Type</th>
                <th>Description</th>
                <th>File</th>
                <th>Upload Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT d.*, c.title AS case_title, u.name AS uploader_name 
                    FROM Documents d 
                    LEFT JOIN Cases c ON d.case_id = c.case_id 
                    LEFT JOIN Users u ON d.uploaded_by = u.user_id";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['document_id']}</td>
                        <td>{$row['case_title']}</td>
                        <td>{$row['uploader_name']}</td>
                        <td>{$row['document_type']}</td>
                        <td>{$row['description']}</td>
                        <td><a href='{$row['file_path']}' target='_blank'>View</a></td>
                        <td>{$row['upload_date']}</td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>
