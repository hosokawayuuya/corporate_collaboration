$(function() {
    var $favorite = $('.checkbox'), //お気に入りボタンセレクタ
    productId;
    $favorite.on('click',function(e){
        //カスタム属性（postid）に格納された投稿ID取得
        productId = $(this).data('postid');
        console.log("クリック前の処理");
        console.log("ID=" + productId);
        if (!$(this).hasClass("is-checked")) {
            console.log("クリック前の処理");
        }
        $(this).toggleClass("is-checked");
        if ($(this).hasClass("is-checked")) {
            console.log("クリック後の処理");
            $.ajax({
                type: "POST",
                url: "favorite-incert.php",
                data: {id: productId},
                success: function(response) {
                    // レスポンスを処理する（必要に応じて）
                    console.log(response);
                },
                error: function(error) {
                    console.error(error);
                }
            });
        }
    });
});
