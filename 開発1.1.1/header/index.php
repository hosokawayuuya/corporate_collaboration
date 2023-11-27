<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ヘッダー</title>
    <link rel="stylesheet" href="../Sample/template/css/vertical-layout-light/style.css">
    <link rel="stylesheet" href="../Sample/template/vendors/typicons.font/font/typicons.css">
    <link rel="stylesheet" href="../Sample/template/vendors/css/vendor.bundle.base.css">
    <link rel="shortcut icon" href="../Sample/template/images/favicon.png" />
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
<!--ヘッダー始まり-->
    <div class="container-scroller">
      <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.php"><img src="../image/AsoCityロゴ2.png" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="index.php"><img src="../image/AsoCityロゴ.png" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center d-none d-lg-flex" type="button" data-toggle="minimize">
            <span class="typcn typcn-th-menu"></span>
          </button>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <ul class="navbar-nav navbar-nav-right">
          <!--検索機能-->
          <div class="nav-search">
            <div class="input-group">
              <input type="text" class="form-control" size="130" placeholder="AsoCityで探す" aria-label="search" aria-describedby="search" href="../G3-1/index.php">
              <div class="input-group-append">
                <button type="submit" class="btn btn-primary" id="search"> 
                  <i class="typcn typcn-zoom"></i>
                </button>
              </div>
            </div>
          </div>
            <li class="nav-item dropdown  d-flex">
              <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="index.php">
                <i class="typcn typcn-home mr-0"></i>
              </a>
            </li>
            <li class="nav-item dropdown  d-flex">
              <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="../G6-1/index.php">
                <i class="typcn typcn-user mr-0"></i>
              </a>
            </li>
            <li class="nav-item dropdown  d-flex">
              <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="../G4-1/index.php">
                <i class="typcn typcn-shopping-cart"></i>
              </a>
            </li>
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle  pl-0 pr-0" href="../G6-2/index.php" data-toggle="dropdown" id="profileDropdown">
                <i class="typcn typcn-cog text-primary"></i>
                <span class="nav-profile-name">変更</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="../G6-2/index.php">
                <i class="typcn typcn-cog text-primary"></i>
                設定
                </a>
                <a class="dropdown-item">
                <i class="typcn typcn-power text-primary"></i>
                ログアウト
                </a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="typcn typcn-th-menu"></span>
          </button>
        </div>
      </nav>
      <!--ヘッダー終わり-->
      <div class="container-fluid page-body-wrapper">
        <!--ヘッダーの色変更始まり-->
        <div class="theme-setting-wrapper">
          <div id="settings-trigger"><i class="typcn typcn-cog-outline"></i></div>
          <div id="theme-settings" class="settings-panel">
            <i class="settings-close typcn typcn-delete-outline"></i>
            <p class="settings-heading">SIDEBAR SKINS</p>
            <div class="sidebar-bg-options" id="sidebar-light-theme">
              <div class="img-ss rounded-circle bg-light border mr-3"></div>
              Light
            </div>
            <div class="sidebar-bg-options selected" id="sidebar-dark-theme">
              <div class="img-ss rounded-circle bg-dark border mr-3"></div>
              Dark
            </div>
            <p class="settings-heading mt-2">HEADER SKINS</p>
            <div class="color-tiles mx-0 px-4">
              <div class="tiles success"></div>
              <div class="tiles warning"></div>
              <div class="tiles danger"></div>
              <div class="tiles primary"></div>
              <div class="tiles info"></div>
              <div class="tiles dark"></div>
              <div class="tiles default border"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="../Sample/template/vendors/js/vendor.bundle.base.js"></script>
    <script src="js/off-canvas.js"></script>
    <script src="../Sample/template/js/off-canvas.js"></script>
    <script src="../Sample/template/js/hoverable-collapse.js"></script>
    <script src="../Sample/template/js/template.js"></script>
    <script src="../Sample/template/js/settings.js"></script>
    <script src="../Sample/template/js/todolist.js"></script>
    <script src="../Sample/template/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../Sample/template/vendors/chart.js/Chart.min.js"></script>
    <script src="../Sample/template/js/dashboard.js"></script>
  </body>
</html>