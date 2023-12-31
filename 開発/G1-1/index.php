<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title></title>
  <link rel="stylesheet" href="../Sample/template/vendors/typicons.font/font/typicons.css">
  <link rel="stylesheet" href="../Sample/template/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../Sample/template/css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="../Sample/template/images/favicon.png" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
  
</head>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo" style="text-align: center">
                <img src="..\image\AsoCityロゴ2.png" alt="ここに画像アイコン入る">
              </div>
              <form action="login-output.php" method="post">
              <form class="pt-3">
                <p>ユーザーID</p>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" name="login">
                </div>
                <p>パスワード</p>
                <div class="form-group">
                  <div style="position: relative;">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password">
                    <span id="buttonEye" class="fa fa-eye-slash" onclick="pushHideButton()"></span>
                  </div>
                </div>
              
                <div id="error-message" class="text-danger text-center mt-2"></div>
                <div class="mt-3">
                  <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="#" onclick="login()">ログイン</a>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                    </label>
                  </div>
				  
                </div>
              </form>
              <div class="text-center mt-4 font-weight-light">
                <a href="..\G1-2\index.php" class="text-primary">ーーーー新規登録ーーーー</a>
                <div class="text-center mt-4 font-weight-light">
                  <a href="..\G2-1\index.php" class="text-primary">ーーログインせずに進むーー</a>
                </div><br>
				
              </div>
			  
            </div>
          </div>
        </div>
		
      </div>
	 
    </div>
  </div>

  <!-- base:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>

  <!-- スクリプトを分割 -->
  <script src="script/script.js"></script>
</body>
</html>
