<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Notification panel</title>
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
  <style type="text/css">
    

    .container{
  padding: 20px;
  width: 30%;
  margin: 0 auto;
  border: 1px solid black;
}

.container h3{
  text-align: center;
}

.notif-bar{
  list-style-type: none;
  padding: 0;
  margin: 0;
  position: relative;
}

.notif-bar li{
  margin-top: 50px;
}

.notif-bar li div{
  margin-left: 50px;
  margin-top: -30px;
  border: 1px solid gray;
  padding: 10px;
  background-color: white;
}


.notif-bar li i{
  width: 30px;
  height:30px;
  background-color: white;
  display: block;
  text-align: center;
  line-height: 30px;
  border: 1px solid gray;
  border-radius: 50%;
}

.notif-bar li i:after{
  content: '';
  width: 40px;
  height: 1px;
  position: absolute;
  background-color: gray;
  margin-top: 15px;
  z-index: -1;
}


.notif-bar:after{
  content: '';
  width: 1px;
  height: 100%;
  background-color: gray;
  position: absolute;
  top: 4px;
  left: 15px;
  z-index: -1;  
}

  </style>
</head>
<body>
  <div class="container">
    
    <h3><i class='ion-earth'></i>&nbsp;&nbsp;Notifications</h3>
    <ul class="notif-bar">
      <li>
        <i class="ion-plus"></i>
        <div>Friend request</div>
      </li>
      <li>
        <i class="ion-android-favorite-outline"></i>
        <div>Photo liked</div>
      </li>
      <li>
        <i class="ion-android-favorite-outline"></i>
        <div>Post liked</div>
      </li>
      <li>
        <i class="ion-android-star-outline"></i>
        <div>New follower</div>
      </li>
    </ul>
  
  </div>
  
</body>
</html>