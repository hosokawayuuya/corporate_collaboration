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
        <!--ヘッダーの色変更終わり-->
    

        <!--サイドバー始まり-->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <div class="d-flex sidebar-profile">
              <div class="sidebar-profile-image">
                <img src="../image/アイコン.png" alt="image">
                <span class="sidebar-status-indicator"></span>
              </div>
              <div class="sidebar-profile-name">
                <p class="sidebar-name">
                  前園勝俊
                </p>
                <p class="sidebar-designation">
                  maezono-Apostle
                </p>
              </div>
            </div>
            <p class="sidebar-menu-title">ダッシュメニュー</p>
          </li>
          <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                  <i class="typcn typcn-briefcase menu-icon"></i>
                  <span class="menu-title">トップス</span>
                  <i class="typcn typcn-chevron-right menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#">Tシャツ/カットソー</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">シャツ/ブラウス</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">ビジネスシャツ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">ポロシャツ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">ニット/セーター</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">ベスト</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">パーカー</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">スウェット</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">カーディガン/ボレロ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">アンサンブル</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">ジャージ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">タンクトップ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">キャミソール</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">チューブトップ</a></li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                  <i class="typcn typcn-film menu-icon"></i>
                  <span class="menu-title">ジャケット/アウター</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="form-elements">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="#">テーラードジャケット</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">ノーカラージャケット</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">デニムジャケット</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">ライダースジャケット</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">ノーカラーコート</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">ブルゾン</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">ミリタリージャケット</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">MA-1</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">ダウンジャケット/コート</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">ダウンベスト</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">ダッフルコート</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">モッズコート</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">ピーコート</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">ステンカラーコート</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">トレンチコート</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">チェスターコート</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">ムートンコート</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">ナイロンジャケット</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">マウンテン</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">パーカー</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">スタジャン</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">スカジャン</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">セットアップ</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">カバーオール</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">ポンチョ</a></li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                  <i class="typcn typcn-chart-pie-outline menu-icon"></i>
                  <span class="menu-title">パンツ</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="charts">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#">デニムパンツ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">カーゴパンツ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">チノパンツ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">スウェットパンツ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">スラックス</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">スカート</a></li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                  <i class="typcn typcn-th-small-outline menu-icon"></i>
                  <span class="menu-title">シューズ</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="tables">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#">スニーカー</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">スリッポン</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">サンダル</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">パンプス</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">ブーツ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">ドレスシューズ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">バレエシューズ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">ローファー</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">モカシン/デッキジューズ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">レインシューズ</a></li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                  <i class="typcn typcn-compass menu-icon"></i>
                  <span class="menu-title">ファッション雑貨</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="icons">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#">ベルト</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">サスペンダー</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">サングラス</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">メガネ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">ストール/ショール</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">マフラー</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">ネックウォーマー/スヌード</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">手袋</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">アームカバー</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">イヤーカフ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">ネックレス</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">リング</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">ピアス</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">イヤリング</a></li>  
                    <li class="nav-item"> <a class="nav-link" href="#">ブレスレット</a></li>  
                    <li class="nav-item"> <a class="nav-link" href="#">バングル/リストバンド</a></li>  
                    <li class="nav-item"> <a class="nav-link" href="#">アンクレット</a></li>  
                    <li class="nav-item"> <a class="nav-link" href="#">チョーカー</a></li>  
                    <li class="nav-item"> <a class="nav-link" href="#">ブローチ/コサージュ</a></li>  
                    <li class="nav-item"> <a class="nav-link" href="#">チャーム</a></li>   
                    <li class="nav-item"> <a class="nav-link" href="#">香水</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">ヘアゴム</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">ヘアバンド</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">カチューシャ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">バレッタ/ヘアクリップ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">ヘアピン</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">シュシュ</a></li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                  <i class="typcn typcn-user-add-outline menu-icon"></i>
                  <span class="menu-title">バッグ</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="auth">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#">ショルダーバッグ</a></li>  
                    <li class="nav-item"> <a class="nav-link" href="#">トートバッグ</a></li>   
                    <li class="nav-item"> <a class="nav-link" href="#">バッグパックリュック</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">ボディバッグ/ウエストポーチ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">ハンドバッグ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">クラッチバッグ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">メッセンジャーバッグ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">ビジネスバッグ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">スーツケース/キャリーバッグ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">ドラムバッグ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">エコバッグ/サブバッグ</a></li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
                  <i class="typcn typcn-globe-outline menu-icon"></i>
                  <span class="menu-title">その他</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="error">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#">アウトドア</a></li>  
                    <li class="nav-item"> <a class="nav-link" href="#">スポーツ</a></li>   
                    <li class="nav-item"> <a class="nav-link" href="#">ゴルフ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">水着</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">ラッシュガード</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">スイムグッズ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">浴衣/着物/和装小物</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">ブラジャー</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">ショーツ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">スポーツブラ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">ナイトブラ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">ボクサーパンツ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">トランクス</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">ブリーフ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">インナーウェア/肌着</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">スーツジャケット</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">スーツベスト</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">スーツパンツ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">スーツスカート</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">ネクタイ/蝶ネクタイ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">ネクタイピン</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">カフリンクス</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">ポケットチーフ</a></li>
                  </ul>
                </div>
              </li>
            </ul>
          </nav>
        </ul>
        </nav>
      
        <!--サイドバー終わり-->

        <!--条件指定検索欄始まり-->
        
        <div class="main-panel">
          <div class="yuuya">
            <div class="row">
              <div class="col-sm-6">
                <div class="d-flex align-items-center justify-content-md-end">
                  <div class="mb-3 mb-xl-0 pr-1">
                      <div class="dropdown">
                        <button class="btn bg-white btn-sm dropdown-toggle btn-icon-text border mr-2" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="typcn typcn-pen"></i>色
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3" data-x-placement="top-start">
                          <a class="dropdown-item" href="#">黒</a>
                          <a class="dropdown-item" href="#">白</a>
                          <a class="dropdown-item" href="#">赤</a>
                          <a class="dropdown-item" href="#">青</a>
                          <a class="dropdown-item" href="#">黄色</a>
                          <a class="dropdown-item" href="#">緑</a>
                        </div>
                      </div>
                  </div>
                  <div class="mb-3 mb-xl-0 pr-1">
                    <div class="dropdown">
                      <button class="btn bg-white btn-sm dropdown-toggle btn-icon-text border mr-2" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="typcn typcn-group-outline"></i>性別
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3" data-x-placement="top-start">
                        <a class="dropdown-item" href="#">男性</a>
                        <a class="dropdown-item" href="#">女性</a>
                        <a class="dropdown-item" href="#">子供</a>
                      </div>
                    </div>
                </div>
                <div class="mb-3 mb-xl-0 pr-1">
                  <div class="dropdown">
                    <button class="btn bg-white btn-sm dropdown-toggle btn-icon-text border mr-2" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="typcn typcn-watch"></i>ブランド
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3" data-x-placement="top-start">
                      <a class="dropdown-item" href="#">LOUIS VUITTON</a>
                      <a class="dropdown-item" href="#">CHANEL</a>
                      <a class="dropdown-item" href="#">Dior</a>
                      <a class="dropdown-item" href="#">HERMES</a>
                      <a class="dropdown-item" href="#">SAINT LAURENT</a>
                      <a class="dropdown-item" href="#">PRADA</a>
                      <a class="dropdown-item" href="#">GUCCI</a>
                    </div>
                  </div>
                </div>
                <div class="mb-3 mb-xl-0 pr-1">
                  <div class="dropdown">
                    <button class="btn bg-white btn-sm dropdown-toggle btn-icon-text border mr-2" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="typcn typcn-calendar-outline mr-2"></i>価格
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3" data-x-placement="top-start">
                      <a class="dropdown-item" href="#">1~1000</a>
                      <a class="dropdown-item" href="#">1000~3000</a>
                      <a class="dropdown-item" href="#">3000~5000</a>
                      <a class="dropdown-item" href="#">5000~10000</a>
                      <a class="dropdown-item" href="#">10000~</a>
                    </div>
                </div>
              </div>
              <div class="mb-3 mb-xl-0 pr-1">
                <div class="dropdown">
                  <button class="btn bg-white btn-sm dropdown-toggle btn-icon-text border mr-2" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="typcn typcn-device-tablet"></i>在庫
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3" data-x-placement="top-start">
                    <a class="dropdown-item" href="#">あり</a>
                    <a class="dropdown-item" href="#">なし</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
     
        <!--条件指定検索終わり-->
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