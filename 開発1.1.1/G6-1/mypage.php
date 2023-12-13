<?php require '../others/head.php'; ?>
<?php require '../others/header.php'; ?>
    <div class="example">
      <a href="../G6-2/setting.php">
        <button type="button" class="btn btn-secondary btn-rounded btn-fw custom-btn">設定変更</button>
      </a>
    </div>

    <div class="example">
      <a href="../G6-3/changemyInfo.php">
        <button type="button" class="btn btn-secondary btn-rounded btn-fw custom-btn">個人情報変更</button>
      </a>
    </div>

    <div class="example">
      <a href="../G6-4/favorite-show.php">
        <button type="button" class="btn btn-secondary btn-rounded btn-fw custom-btn">お気に入り</button>
      </a>
    </div>
    <div class="example">
    <button type="button" onclick="window.location.href='../G2-1/index.php'" class="btn btn-info">ホームに戻る</button>

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