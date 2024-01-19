
<!DOCTYPE html>
<html>
<head>
    <title>Google Lens Image Search</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
       <p style="text-align:center;"> Kéo thả ảnh vào đây hoặc click để chọn ảnh:</p>
        <input type="file" name="fileToUpload" id="fileToUpload" style="margin: 15px 700px" required>
        <button type="submit" class="btn btn-primary" style="display:block; margin: 0 auto;">Search</button>
    </form>
	 <div class="container alert alert-info" style="margin-top: 15px">

       <p ><strong> Thông báo</strong > </p>
        <p> Do đây mới chỉ là sản phẩm demo nên sẽ có nhiều sai sót hoặc cái gói ngôn ngữ không đáp ứng được.
           </p>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/handlebars@latest/dist/handlebars.js"></script>
</html>