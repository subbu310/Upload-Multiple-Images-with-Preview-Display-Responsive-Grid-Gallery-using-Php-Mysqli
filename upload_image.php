<!DOCTYPE html>
<html>
<head>

<title>Upload Multiple Image</title>
 
<meta charset="utf-8">
  
<meta name="viewport" content="width=device-width, initial-scale=1">
 
 <!----add jquery link----> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  
<style>
*{
	
	margin:0;
	padding:0;
	box-sizing:border-box;
}
.container{
	
	width:100%;
	height:100%;
}
.heading-container{
	
	width:100%;
	height:100px;
	text-align:center;
}
h2{
	
	font-size:30px;
	line-height:100px;
	color:blue;
	
}
.upload-container{
	
	width:100%;
	max-width:1000px;
	margin:auto;
	height:100px;
	display:flex;
	align-items:center;
	justify-content:space-between;
}
.upload-left{
	
	width:280px;
	height:100px;
	border:1px solid #ccc;
	display:flex;
	align-items:center;
	justify-content:center;
}
.upload-right{
	
	width:700px;
	height:100px;
	border:1px solid #ccc;
	display:flex;
}
.upload-preview-image{
	
	width:100px;
	height:100px;
	margin-left:2px;
}
.upload-preview-image img{
	
	width:100%;
	height:100%;
}
.upload-submit{
	
	width:100%;
	max-width:1000px;
	margin:auto;
	height:100px;
	display:flex;
	align-items:center;
	justify-content:center;
}
.upload-submit button{
	
	width:100px;
	padding:5px;
	color:white;
	background-color:blue;
	font-size:15px;
    cursor:pointer;
}
.upload-display{
	
	width:100%;
	max-width:1000px;
	margin:auto;
	border:1px solid #ccc;
	display:flex;
	flex-wrap:wrap;
}
.upload-display-image{
	
	width:32.5%;
	height:300px;
	margin:0.25%;
}
.upload-display-image img{
	
	width:100%;
	height:100%;
}
@media only screen and (max-width:768px){
	
 .upload-display-image{
	
	height:150px;
	
}
 h2{
	
	font-size:10px;
	
	
 }
}
</style>

</head>

<body>
  
  <div class="container">
  
      <div class="heading-container">
  
        <h2>Upload Multiple Images with Preview Display Responsive Grid Gallery using Php Mysqli</h2>
  
       </div>
	   
	   <div class="upload-container">
          
		  <div class="upload-left">
  
             <input type="file" name="file[]" id="upload_file" onchange="preview();" multiple/>
			 
          </div>
	   
	     <div class="upload-right">
  
             
         </div>

       </div>
	   
	    <div class="upload-submit">
  
                  <button id="submit">submit</button>
				  
        </div>
		
		<div class="upload-display">
  
            
			 
         </div>
  
  </div>
   
<script>

  $(document).ready(function(){
	  
	  
	   $('#submit').click(function(){
	  
	     var files = $('#upload_file')[0].files;
		 
		 var form_data = new FormData();
		 
		 for(var count=0; count<files.length; count++ ){
			    
			 form_data.append("upload_files[]", files[count]); 
		  }
		  
		     $.ajax({
				 
			    url:"upload_image_action.php",
                
				method:"post",
				
				data:form_data,
				
				contentType:false,
				
				cache:false,
				
				processData:false,
				
				success:function(data){
					
					fetch_images();
				}
				
			 });
		 
      });
	  
	 // fetch images
	 
	   fetch_images();
	   
	   function fetch_images()
	   {
		  
		  var action = "fetch_images";
		  
		  $.ajax({
				 
			    url:"upload_image_action.php",
                
				method:"post",
				
				data:{action:action},
				
				success:function(data){
					
					$('.upload-display').html(data);
					
				}
				
			 }); 
	   }
	  
	  
  });

   function preview(){
	   
	   $(".upload-right").empty();
	   
	   var totalFile = document.getElementById("upload_file").files.length;
	   
	    for( var i=0; i<totalFile; i++){
			
			$(".upload-right").prepend(" <div class='upload-preview-image'><img src='"+URL.createObjectURL(event.target.files[i])+"' /></div>");
		}
	   
	   
   }
   
</script>

</body>
</html>