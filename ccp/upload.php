   <?php
    if ( isset( $_POST['submit'] ) ) {
        $file = $_FILES['file'];
        
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $file = explode('.', $fileName);
        $fileActualExt = strtolower(end($file));

        $allowed = array('csv');

        if( in_array( $fileActualExt, $allowed ) ) {
            if( $fileError === 0 ) {
                $target = "images/" .basename($_FILES['file']['name']);

                $db = mysqli_connect("localhost", "root", "", "ccp");
            
                $file = $_FILES['file']['name'];
            
                $sql = "INSERT INTO batchFile (file) VALUES ('$file')";
                mysqli_query($db, $sql);
                header("Location: index.php?uploadsukses");
            } else {
                echo "upload file error !";
            }
        } else {
            echo "file harus .csv";
        }
    }