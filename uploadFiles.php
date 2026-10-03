<?php



 function  uploadFiles($product, $db)
 {

if(isset($_POST['submit'])){
	
    // File upload configuration 
    $targetDir = "uploads/"; 
    $allowTypes = array('jpg','png','jpeg','gif'); 
     
    $statusMsg = $errorMsg = $errorUpload = $errorUploadType = '';
    $fileNames = array_filter($_FILES['files']['name']);
	$image_number=0;
	print_r($product);
	$uploadedFiles = [];
    if(!empty($fileNames)){
        foreach($_FILES['files']['name'] as $key=>$val){
            // File upload path
            $fileName = basename($_FILES['files']['name'][$key]);
			echo $fileName."/n";
			echo $product['ID'];
			$uniqueFileName=$product['ID']."_".time()."_".$fileName;

            $targetFilePath = $targetDir . $uniqueFileName;

            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
					$uniqueFileName=$product['ID']."_".time()."_".$fileName;
					$uploadedFiles[] = [$product['ID'], $uniqueFileName, $image_number];
					$image_number++;
                }else{
                    $errorUpload .= $_FILES['files']['name'][$key].' | ';
                }
            }else{
                $errorUploadType .= $_FILES['files']['name'][$key].' | ';
            }
        }

        // Error message
        $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):'';
        $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):'';
        $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType;

        if(!empty($uploadedFiles)){
            $stmt = $db->prepare("INSERT INTO product_images (product_id, path, image_number, uploaded_on) VALUES (?, ?, ?, NOW())");
            $insertOk = true;
            foreach($uploadedFiles as $file){
                if(!$stmt->execute($file)){
                    $insertOk = false;
                }
            }
            if($insertOk){
                $statusMsg = "Files are uploaded successfully.".$errorMsg;
            }else{
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }else{
            $statusMsg = "Upload failed! ".$errorMsg;
        }
    }else{
        $statusMsg = 'Please select a file to upload.';
    } 
} 
else
{
	echo "adsasd";
}

}


?>