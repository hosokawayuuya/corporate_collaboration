window.onload = function(){
   
  //画像を配列に格納
  var images =['url(https://lastmagazine.jp/wp-content/uploads/2022/05/Gucci-Eyewear_Hollywood-Forever-2022-Adv_DPS_72dpi.jpg)',
               'url(https://prtimes.jp/i/8795/36/resize/d8795-36-905118-1.jpg)',
               'url(https://hips.hearstapps.com/jp.h-cdn.co/esqjp/esquire-mig/images/media/images/_1_article_type_3.jpg-middle1481/1144927-1-jpn-JP/_1_article_type_3.jpg-middle.jpg)']

  //要素をHTMLから取得
  //画像
  var target = document.getElementById('slide');
  //>,<
  var right = document.getElementById('right');
  var left = document.getElementById('left');


  //クリックしたときに変わるようにカウント変数
  var count = 0;

  //クリックしたら画像変更
 function change(){
     target.style.backgroundImage = images[count];
  }

 //>をクリックしたらcountを+1する
 function goNext(){
     if(count == 2){
         count = 0;
     }else{
         count++;
     }
     change();
 }
 
 //<をクリックしたらcountを-1する
 function goBack(){
     if(count == 0){
         count = 2;
     }else{
         count--;
     }
     change();
 }

 //クリックイベント
 right.addEventListener('click',goNext,false);
 left.addEventListener('click',goBack,false);
};