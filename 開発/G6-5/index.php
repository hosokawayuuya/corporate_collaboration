<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    <link rel="stylesheet" href="../Sample/template/vendors/typicons.font/font/typicons.css">
    <link rel="stylesheet" href="../Sample/template/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../Sample/template/css/vertical-layout-light/style.css">
    <link rel="shortcut icon" href="../Sample/template/images/favicon.png" />
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  </head>
	<body>
		<!-- ここから書き換えてください -->
    <div class="container">
			<h1 class="my-4">購入履歴一覧</h1>
			<table>
				<tr>
				<div class="row">
					<div class="col-md-4 mb-4">
						<div class="card text-center position-relative">
							<a href="../G3-2/index.php"> 
								<img src="sample/product1.jpg" class="card-img-top mx-auto mt-3" alt="商品1の画像" style="width: 50%; height: 50%;">
							</a>
							<button id="hart" class="hart position-absolute bottom-0 end-0">&#10084;</button>
							<div class="card-body">
								<h5 class="category"><i>#面白い  #トップス</i></h5>
								<h5 class="card-title">商品1</h5>
								<p class="card-text">商品1の説明文がここに入ります。</p>
								<p class="card-text font-weight-bold">評価</p>
								<p class="card-text font-weight-bold">1,000円</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 mb-4">
						<div class="rating" id="rating1">
							<span class="fa fa-star" data-rating="1"></span>
							<span class="fa fa-star" data-rating="2"></span>
							<span class="fa fa-star" data-rating="3"></span>
							<span class="fa fa-star" data-rating="4"></span>
							<span class="fa fa-star" data-rating="5"></span>
						</div>
						
						<div class="card">
							<textarea class="form-control" rows="5" placeholder="レビューを書く" maxlength="300"></textarea>
						</div>
						<button type="button" class="btn btn-light btn-rounded btn-fw mt-2 float-right">送信</button>	
					</div>					
				</div>
				</tr>
			</table>
			<table>
				<tr>
				<div class="row">
					<div class="col-md-4 mb-4">
						<div class="card text-center">
							<a href="../G3-2/index.php"> 
								<img src="sample/product1.jpg" class="card-img-top mx-auto mt-3" alt="商品2の画像" style="width: 50%; height: 50%;">
							</a>
							<div class="item-head">
								<button id="hart" class="hart">&#10084;</button>
							</div>
							<div class="card-body">
								<h5 class="card-title">商品2</h5>
								<p class="card-text">商品2の説明文がここに入ります。</p>
								<p class="card-text font-weight-bold">評価</p>
								<p class="card-text font-weight-bold">1,000円</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 mb-4">
						<div class="rating" id="rating2">
							<span class="fa fa-star" data-rating="1"></span>
							<span class="fa fa-star" data-rating="2"></span>
							<span class="fa fa-star" data-rating="3"></span>
							<span class="fa fa-star" data-rating="4"></span>
							<span class="fa fa-star" data-rating="5"></span>
						</div>
						
						<div class="card">
							<textarea class="form-control" rows="5" placeholder="レビューを書く" maxlength="300"></textarea>
						</div>
						<button type="button" class="btn btn-light btn-rounded btn-fw mt-2 float-right">送信</button>
					</div>						
				</div>
				</tr>
			</table>
    </div>
    <script src="./script/script.js"></script>
		<!-- ここまで書き換えてください -->
	</body>
</html>