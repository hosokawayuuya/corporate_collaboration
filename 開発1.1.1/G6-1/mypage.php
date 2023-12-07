<?php require '../others/head.php'; ?>
<?php require '../others/header.php'; ?>
    <div class="example">
      <a href="../G6-3/mypage.php">
        <button type="button" class="btn btn-secondary btn-rounded btn-fw custom-btn">設定変更</button>
      </a>
    </div>

    <div class="example">
      <a href="../G6-2/index.php">
        <button type="button" class="btn btn-light btn-rounded btn-fw custom-btn">個人情報変更</button>
      </a>
    </div>

    <div class="example">
      <a href="../G6-4/index.php">
        <button type="button" class="btn btn-light btn-rounded btn-fw custom-btn">お気に入り</button>
      </a>
    </div>

    <div class="example">
      <a href="../G6-5/index.php">
        <button type="button" class="btn btn-light btn-rounded btn-fw custom-btn">商品購入履歴</button>
      </a>
    </div>

    <div class="example">
      <a href="../G6-6/index.php">
        <button type="button" class="btn btn-light btn-rounded btn-fw custom-btn">商品閲覧履歴</button>
      </a>
    </div>
    <div class="example">
    <button type="button" class="btn btn-light btn-rounded btn-fw custom-btn"  onclick="history.back()">戻る</button>
</div>
<style>
      .example {
        text-align: center;
        padding: 10px;
        margin-top: 10px;
      }

      .custom-btn {
        width: 400px; /* ボタンの幅を調整する値 */
        height: 70px; /* ボタンの高さを調整する値 */
      }
 </style>
 <?php require '../others/footer.php'; ?>