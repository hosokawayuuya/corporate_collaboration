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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="script/script.js"></script>
    <style>
      .error {
          color: red;
          display: block;
      }
  </style>
  </head>
	<body>
		<!-- ここから書き換えてください -->
    
    <div class="tabs">
      <input id="user_info_tab" type="radio" name="tab_group" checked>
      <label class="tab_label" for="user_info_tab">ユーザー情報変更</label>
      <input id="address_tab" type="radio" name="tab_group">
      <label class="tab_label" for="address_tab">住所変更・追加</label>
      <input id="payment_method_tab" type="radio" name="tab_group">
      <label class="tab_label" for="payment_method_tab">お届け先・支払方法</label>
      <div class="tab_content" id="user_info_content">
        <div class="tab_content_description">

          <form id="myForm" onsubmit="return validateForm()">

            <div style="text-align: center">
              <h2>ユーザー情報変更</h2>
            </div><br>
            <div class="form-group">
              <label for="username"><span class="black-text">ユーザー名</span></label>
              <input type="text" id="username" name="username">
              <span id="usernameError" class="error"></span>
            </div>
          <div class="form-group">
            <label for="phoneNumber"><span class="black-text">電話番号</span></label>
            <input type="text" id="phoneNumber" name="phoneNumber" oninput="restrictToNumeric(this)">
            <span id="phoneNumberError" class="error"></span>
          </div>

          <div class="form-group">
            <label for="email"><span class="black-text">メールアドレス</span></label>
            <input type="text" id="email" name="email">
            <span id="emailError" class="error"></span>
          </div>
         
<p><span class="red-text">こちらはログイン時に必要なのでメモしてください▼</span></p>
          <div class="form-group">
            <label for="username"><span class="black-text">ユーザーID</span></label>
            <input type="text" id="username" name="username">
            <span id="usernameError" class="error"></span>
          </div>

          

            <div class="form-group">
            <label for="password"><span class="black-text"　placeholder="Password">パスワード</span></label>
            <input type="password" id="exampleInputPassword1" name="password">
              <div style="position: relative;">
                <span id="buttonEye" class="fa fa-eye-slash" onclick="pushHideButton()">
              </div>
            
            <span id="passwordError" class="error"></span>
          </div>

          
      
        </div>
      </div>
      <div class="tab_content" id="address_content">
        <div class="tab_content_description">
          

          <div style="text-align: center">
            <h2>住所情報変更・追加</h2>
          </div><br>

          <div style="text-align: center">
              <label>
                  <input type="radio" name="address" value="address1" onclick="showAddress('address1')" > 住所１
              </label>
              <label>
                  <input type="radio" name="address" value="address2" onclick="showAddress('address2')"> 住所２
              </label>
              <label>
                  <input type="radio" name="address" value="address3" onclick="showAddress('address3')"> 住所３
              </label>
          </div>
          <div style="text-align: center">
            <p> 住所を変更したい方もしくは追加したい方はクリックして選択してください</p>
          </div><br>
          

              <div id="address1" style="display: none;">
                <div style="text-align: center">
                  <h3> 住所１の登録情報</h3>
                </div><br>
                  
                  <div class="form-group">
                    <label for="postalCode"><span class="black-text">郵便番号</span></label>
                    <input type="text" id="postalCode" name="postalCode" placeholder="例: 000-0000">
                    <span id="postalCodeError" class="error"></span>
                  </div>
                  
                  
                  <div class="form-group">
                    <label for="prefecture"><span class="black-text">都道府県</span></label>
                    <select id="prefecture" name="prefecture">
                        <option value="">都道府県を選択してください</option>
                        <option value="北海道">北海道</option>
      <option value="青森県">青森県</option>
      <option value="岩手県">岩手県</option>
      <option value="宮城県">宮城県</option>
      <option value="秋田県">秋田県</option>
      <option value="山形県">山形県</option>
      <option value="福島県">福島県</option>
      <option value="茨城県">茨城県</option>
      <option value="栃木県">栃木県</option>
      <option value="群馬県">群馬県</option>
      <option value="埼玉県">埼玉県</option>
      <option value="千葉県">千葉県</option>
      <option value="東京都">東京都</option>
      <option value="神奈川県">神奈川県</option>
      <option value="新潟県">新潟県</option>
      <option value="富山県">富山県</option>
      <option value="石川県">石川県</option>
      <option value="福井県">福井県</option>
      <option value="山梨県">山梨県</option>
      <option value="長野県">長野県</option>
      <option value="岐阜県">岐阜県</option>
      <option value="静岡県">静岡県</option>
      <option value="愛知県">愛知県</option>
      <option value="三重県">三重県</option>
      <option value="滋賀県">滋賀県</option>
      <option value="京都府">京都府</option>
      <option value="大阪府">大阪府</option>
      <option value="兵庫県">兵庫県</option>
      <option value="奈良県">奈良県</option>
      <option value="和歌山県">和歌山県</option>
      <option value="鳥取県">鳥取県</option>
      <option value="島根県">島根県</option>
      <option value="岡山県">岡山県</option>
      <option value="広島県">広島県</option>
      <option value="山口県">山口県</option>
      <option value="徳島県">徳島県</option>
      <option value="香川県">香川県</option>
      <option value="愛媛県">愛媛県</option>
      <option value="高知県">高知県</option>
      <option value="福岡県">福岡県</option>
      <option value="佐賀県">佐賀県</option>
      <option value="長崎県">長崎県</option>
      <option value="熊本県">熊本県</option>
      <option value="大分県">大分県</option>
      <option value="宮崎県">宮崎県</option>
      <option value="鹿児島県">鹿児島県</option>
      <option value="沖縄県">沖縄県</option>
                    </select>
                    <span id="prefectureError" class="error"></span>
                  </div>
                  
                  <div class="form-group">
                    <label for="city"><span class="black-text">市区町村</span></label>
                    <input type="text" id="city" name="city" placeholder="市区町村を入力してください">
                    <span id="cityError" class="error"></span>
                  </div>
                  
                  <div class="form-group">
                    <label for="streetAddress"><span class="black-text">丁目・番地・号</span></label>
                    <input type="text" id="streetAddress" name="streetAddress" placeholder="例: 1-2-3">
                    <span id="streetAddressError" class="error"></span>
                  </div>
                  
                  <div class="form-group">
                    <label for="buildingName"><span class="black-text">建物名</span></label>
                    <input type="text" id="buildingName" name="buildingName" placeholder="例: ○○マンション-123">
                    <span id="buildingNameError" class="error"></span>
                  </div>
                          </div>
                    
             
              <div id="address2" style="display: none;">
                <div style="text-align: center">
                  <h3> 住所２の登録情報</h3>
                </div><br>
                  
                  <div class="form-group">
                    <label for="postalCode"><span class="black-text">郵便番号</span></label>
                    <input type="text" id="postalCode" name="postalCode" placeholder="例: 000-0000">
                    <span id="postalCodeError" class="error"></span>
                  </div>
                  
                  
                  <div class="form-group">
                    <label for="prefecture"><span class="black-text">都道府県</span></label>
                    <select id="prefecture" name="prefecture">
                        <option value="">都道府県を選択してください</option>
                        <option value="北海道">北海道</option>
      <option value="青森県">青森県</option>
      <option value="岩手県">岩手県</option>
      <option value="宮城県">宮城県</option>
      <option value="秋田県">秋田県</option>
      <option value="山形県">山形県</option>
      <option value="福島県">福島県</option>
      <option value="茨城県">茨城県</option>
      <option value="栃木県">栃木県</option>
      <option value="群馬県">群馬県</option>
      <option value="埼玉県">埼玉県</option>
      <option value="千葉県">千葉県</option>
      <option value="東京都">東京都</option>
      <option value="神奈川県">神奈川県</option>
      <option value="新潟県">新潟県</option>
      <option value="富山県">富山県</option>
      <option value="石川県">石川県</option>
      <option value="福井県">福井県</option>
      <option value="山梨県">山梨県</option>
      <option value="長野県">長野県</option>
      <option value="岐阜県">岐阜県</option>
      <option value="静岡県">静岡県</option>
      <option value="愛知県">愛知県</option>
      <option value="三重県">三重県</option>
      <option value="滋賀県">滋賀県</option>
      <option value="京都府">京都府</option>
      <option value="大阪府">大阪府</option>
      <option value="兵庫県">兵庫県</option>
      <option value="奈良県">奈良県</option>
      <option value="和歌山県">和歌山県</option>
      <option value="鳥取県">鳥取県</option>
      <option value="島根県">島根県</option>
      <option value="岡山県">岡山県</option>
      <option value="広島県">広島県</option>
      <option value="山口県">山口県</option>
      <option value="徳島県">徳島県</option>
      <option value="香川県">香川県</option>
      <option value="愛媛県">愛媛県</option>
      <option value="高知県">高知県</option>
      <option value="福岡県">福岡県</option>
      <option value="佐賀県">佐賀県</option>
      <option value="長崎県">長崎県</option>
      <option value="熊本県">熊本県</option>
      <option value="大分県">大分県</option>
      <option value="宮崎県">宮崎県</option>
      <option value="鹿児島県">鹿児島県</option>
      <option value="沖縄県">沖縄県</option>
                    </select>
                    <span id="prefectureError" class="error"></span>
                  </div>
                  
                  <div class="form-group">
                    <label for="city"><span class="black-text">市区町村</span></label>
                    <input type="text" id="city" name="city" placeholder="市区町村を入力してください">
                    <span id="cityError" class="error"></span>
                  </div>
                  
                  <div class="form-group">
                    <label for="streetAddress"><span class="black-text">丁目・番地・号</span></label>
                    <input type="text" id="streetAddress" name="streetAddress" placeholder="例: 1-2-3">
                    <span id="streetAddressError" class="error"></span>
                  </div>
                  
                  <div class="form-group">
                    <label for="buildingName"><span class="black-text">建物名</span></label>
                    <input type="text" id="buildingName" name="buildingName" placeholder="例: ○○マンション-123">
                    <span id="buildingNameError" class="error"></span>
                  </div>
                          </div>
                  
              </div>
              <div id="address3" style="display: none;">
                <div style="text-align: center">
                  <h3> 住所３の登録情報</h3>
                </div><br>
                  
                  <div class="form-group">
                    <label for="postalCode"><span class="black-text">郵便番号</span></label>
                    <input type="text" id="postalCode" name="postalCode" placeholder="例: 000-0000">
                    <span id="postalCodeError" class="error"></span>
                  </div>
                  
                  
                  <div class="form-group">
                    <label for="prefecture"><span class="black-text">都道府県</span></label>
                    <select id="prefecture" name="prefecture">
                        <option value="">都道府県を選択してください</option>
                        <option value="北海道">北海道</option>
      <option value="青森県">青森県</option>
      <option value="岩手県">岩手県</option>
      <option value="宮城県">宮城県</option>
      <option value="秋田県">秋田県</option>
      <option value="山形県">山形県</option>
      <option value="福島県">福島県</option>
      <option value="茨城県">茨城県</option>
      <option value="栃木県">栃木県</option>
      <option value="群馬県">群馬県</option>
      <option value="埼玉県">埼玉県</option>
      <option value="千葉県">千葉県</option>
      <option value="東京都">東京都</option>
      <option value="神奈川県">神奈川県</option>
      <option value="新潟県">新潟県</option>
      <option value="富山県">富山県</option>
      <option value="石川県">石川県</option>
      <option value="福井県">福井県</option>
      <option value="山梨県">山梨県</option>
      <option value="長野県">長野県</option>
      <option value="岐阜県">岐阜県</option>
      <option value="静岡県">静岡県</option>
      <option value="愛知県">愛知県</option>
      <option value="三重県">三重県</option>
      <option value="滋賀県">滋賀県</option>
      <option value="京都府">京都府</option>
      <option value="大阪府">大阪府</option>
      <option value="兵庫県">兵庫県</option>
      <option value="奈良県">奈良県</option>
      <option value="和歌山県">和歌山県</option>
      <option value="鳥取県">鳥取県</option>
      <option value="島根県">島根県</option>
      <option value="岡山県">岡山県</option>
      <option value="広島県">広島県</option>
      <option value="山口県">山口県</option>
      <option value="徳島県">徳島県</option>
      <option value="香川県">香川県</option>
      <option value="愛媛県">愛媛県</option>
      <option value="高知県">高知県</option>
      <option value="福岡県">福岡県</option>
      <option value="佐賀県">佐賀県</option>
      <option value="長崎県">長崎県</option>
      <option value="熊本県">熊本県</option>
      <option value="大分県">大分県</option>
      <option value="宮崎県">宮崎県</option>
      <option value="鹿児島県">鹿児島県</option>
      <option value="沖縄県">沖縄県</option>
                    </select>
                    <span id="prefectureError" class="error"></span>
                  </div>
                  
                  <div class="form-group">
                    <label for="city"><span class="black-text">市区町村</span></label>
                    <input type="text" id="city" name="city" placeholder="市区町村を入力してください">
                    <span id="cityError" class="error"></span>
                  </div>
                  
                  <div class="form-group">
                    <label for="streetAddress"><span class="black-text">丁目・番地・号</span></label>
                    <input type="text" id="streetAddress" name="streetAddress" placeholder="例: 1-2-3">
                    <span id="streetAddressError" class="error"></span>
                  </div>
                  
                  <div class="form-group">
                    <label for="buildingName"><span class="black-text">建物名</span></label>
                    <input type="text" id="buildingName" name="buildingName" placeholder="例: ○○マンション-123">
                    <span id="buildingNameError" class="error"></span>
                  </div>
                          </div>
              </div>
      html
          

      <div class="tab_content" id="payment_method_content">
        <div class="tab_content_description">
          <div style="text-align: center">
            <h3>・お届け先住所を選択してください</h3>
          </div>
          <div style="text-align: center">
            <label>
                <input type="radio" name="address" value="address1" checked="checked" onclick="showAddress('address1')" > 住所１
            </label>
            <label>
                <input type="radio" name="address" value="address2" onclick="showAddress('address2')"> 住所２
            </label>
            <label>
                <input type="radio" name="address" value="address3" onclick="showAddress('address3')"> 住所３
            </label>
        </div>
        <div style="text-align: center">
          <h3>・購入時の支払い方法を選択してください</h3>
        </div><br>
          <div class="form-group">
            <input type="radio" id="convenienceStore" name="paymentMethod" value="convenienceStore" checked="checked" onclick="hideCreditCardFields()"> コンビニ支払い
            <input type="radio" id="cashOnDelivery" name="paymentMethod" value="cashOnDelivery" onclick="hideCreditCardFields()"> 代金引換
            <input type="radio" id="installmentPayment" name="paymentMethod" value="installmentPayment" onclick="hideCreditCardFields()"> ツケ払い
            <input type="radio" id="creditCard" name="paymentMethod" value="creditCard" onclick="showCreditCardFields()"> クレジットカード
          </div>
      
          <div id="creditCardFields" style="display: none;">
            <div class="form-group">
              <label for="cardNumber"><span class="black-text">カード番号</span></label>
              <input type="text" id="cardNumber" name="cardNumber">
            </div>
      
            <div class="form-group">
              <label for="expiryDate"><span class="black-text">有効期限</span></label>
              <input type="text" id="expiryDate" name="expiryDate">
            </div>
      
            <div class="form-group">
              <label for="securityCode"><span class="black-text">セキュリティコード</span></label>
              <input type="text" id="securityCode" name="securityCode">
            </div>
          </div>
        </div>
      </div>
      
      <div style="text-align: center">
        <button type="submit"  class="btn btn-light btn-rounded btn-fw" ><h2>登録内容を保存する</h2></button>
        </div>
    </div>
    
    <br><br>
    <div style="text-align: center">
      <button type="button" class="btn btn-light btn-rounded btn-fw" onclick="history.back()">　　　　　戻る　　　　　</button>
      </div><br><br>
    
		<!-- ここまで書き換えてください -->
    
	</body>
</html>
