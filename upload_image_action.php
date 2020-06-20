
<?php
  
  error_reporting(0);
  
  include('upload_connection.php');
  
  if(isset($_FILES['upload_files']['name'])!= ''){
	  
	  for($i=0; $i<count($_FILES['upload_files']['name']); $i++){
	  
	      $name = $_FILES['upload_files']['name'][$i];
		  
		  $tmp_name = $_FILES['upload_files']['tmp_name'][$i];
		  
		  $target_file = "upload_images/".$name;
		  
		  move_uploaded_file($tmp_name, $target_file);
		  
		  $image_url = "http://localhost/img/".$target_file;
		  
		  $sql = "INSERT INTO `images`(`image_url`) VALUES ('$image_url')";
		  
		  $result = mysqli_query($conn, $sql);
		  
		  if($result){
			  
			  echo "Insert successfully";
			  
		  }else{
			  
			  echo "error";
		  }
	 
	  }
  }

  //fecth images
  
  if(isset($_POST['action'])){
	  
	  $sql = "SELECT * FROM `images` ORDER BY `id` DESC";
		  
      $result = mysqli_query($conn, $sql);
	  
	  while($row = mysqli_fetch_assoc($result)){
		  
		 $images = $row['image_url']; 
		 
		 if( $images == null){
			 
			 $image_url = '<img src="icon/post_image.png" />';
			 
		 }else{
			 
			 $image_url = '<img src="'.$images.'" />';
			 
		 }
		 
		 echo '<div class="upload-display-image">
  
                  '.$image_url .'
				  
               </div> ';
	  }
		   
     
  }
  
  
  
  
?>