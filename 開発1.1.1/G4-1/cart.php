<?php
if (!empty($_SESSION['Shohin'])) {
    echo '<table>';
    echo '<tr><th>個数</th><th>商品名</th><th>価格</th><th>数量</th><th>小計</th><th></th></tr>';
    $total = 0;
    foreach ($_SESSION['Shohin'] as $shohin_id => $Shohin) {
        echo '<tr>';
        echo '<td>', $shohin_id, '</td>';
        echo '<td><a href="../G3-2/Shohin.php?shohin_id=', $shohin_id, '">', $Shohin['shohin_name'], '</a></td>';
        echo '<td>', $Shohin['price'], '</td>';
        echo '<td>', $Shohin['count'], '</td>';
        $subtotal = $Shohin['price'] * $Shohin['count'];
        echo '<td>', $subtotal, '</td>';
        echo '<td><a href="cart-delete.php?shohin_id=', $shohin_id, '">削除</a></td>'; 
        echo '</tr>';
        $total += $subtotal; 
    }
    echo '<tr><td>合計</td><td>', $total, '</td><td></td></tr>';
    echo '</table>';
} else {
    echo 'カートに商品がありません。';
}
?>
    <div class="row">
      <div class="col-md-4 offset-md-4 mb-4">
        <!--1品目開始-->
        <div class="card">
          <table>
            <tr>
              <td><a href="../G3-2/index.php"><img src="sample/product1.jpg" width="250"></a></td>
              <td>&nbsp;</td>
              <td> 
                <p class="card-text font-weight-bold">個数</p>
                <div class="dropdown"> 
                  <button class="btn bg-white btn-sm dropdown-toggle btn-icon-text border mr-2" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                    <i class="typcn typcn-calendar-outline mr-2"></i>1
                  </button> 
                  <div class="dropdown-menu dropdown-menu-bottom" aria-labelledby="dropdownMenuSizeButton3" data-x-placement="top-start">
                    <a class="dropdown-item" href="#">1</a>
                    <a class="dropdown-item" href="#">2</a>
                    <a class="dropdown-item" href="#">3</a>
                    <a class="dropdown-item" href="#">4</a>
                    <a class="dropdown-item" href="#">5</a>
                    <a class="dropdown-item" href="#">6</a>
                    <a class="dropdown-item" href="#">7</a>
                    <a class="dropdown-item" href="#">8</a>
                    <a class="dropdown-item" href="#">9</a>
                    <a class="dropdown-item" href="#">10</a> 
                  </div> 
                </div> 
                <p class="card-text font-weight-bold">サイズ</p>
                <div class="dropdown"> 
                  <button class="btn bg-white btn-sm dropdown-toggle btn-icon-text border mr-2" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                      <i class="typcn typcn-calendar-outline mr-2"></i>XS
                  </button> 
                  <div class="dropdown-menu dropdown-menu-bottom" aria-labelledby="dropdownMenuSizeButton3" data-x-placement="top-start">
                    <a class="dropdown-item" href="#">XS</a>
                    <a class="dropdown-item" href="#">S</a>
                    <a class="dropdown-item" href="#">M</a>
                    <a class="dropdown-item" href="#">L</a>
                    <a class="dropdown-item" href="#">XL</a>
                    <a class="dropdown-item" href="#">XXL</a>
                    <a class="dropdown-item" href="#">3XL</a>
                    <a class="dropdown-item" href="#">4XL</a>        
                  </div> 
                </div> 
              </td>
              <td>&nbsp;</td>
              <td><button type="button" class="btn btn-light btn-rounded btn-fw">削除</button></td>
            </tr>
          </table>
        </div>
        <p class="card-text font-weight-bold">金額:￥0,000円</p><br><br>
        <!--1品目終了-->
      </div>
    </div>
    <!--商品整列終了-->
    <!--商品合計-->
    <p class="card-text1 font-weight-bold">合計:￥0,000</p><br>
    <div class="define">
      <button type="button" class="btn btn-light btn-rounded btn-fw" _msttexthash="1893619" _msthash="82"onclick="history.back()">戻る</button>
      <a href="../G5-1/index.php">
        <button type="button" class="btn btn-light btn-rounded btn-fw">購入へ</button>
      </a>
    </div>