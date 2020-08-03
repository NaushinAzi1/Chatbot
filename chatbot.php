<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>
body {
  margin: 0 auto;
  max-width: 800px;
  padding: 0 20px;
}

.container1 {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container1::after {
  content: "";
  clear: both;
  display: table;
}

.container1 img {
  float: left;
  max-width: 50px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container1 img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}

div.sticky {
  position: -webkit-sticky;
  position: sticky;
  bottom: 0;
  margin-top: 200px;
  background-color: #ddd;
  padding: 10px 0 0 10px;
  font-size: 20px;
}
.square {
  background-image: url("bvrith.png");
  height: auto;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
em{
  color: white;
}
h5{
  color: black;
}
</style>
</head>
<body>

<span id="ref">
<div class="square">
<center><h2><em>BVRITH BOT</em></h2></center>
<button class="btn btn-primary" style="margin-left:600px;" onclick="delete_message()">
  <i class="fa fa-trash-o fa-lg"></i> Clear Chat
</button>
<br/>
<div class="container1 darker" style="margin-right: 400px;">
    <img src="chatbot.png" alt="Avatar" class="right" style="width:100%;">
    <p><?php echo"  <h5>Hey! Iam BVRITH Bot,I will proide you any information regarding BVRITH College of Engineering for Women \nWhat would you like to know about?</h5>";?></p>
    <span class="time-right"></span>
  </div>
  <?php 
    $query="select * from chats ORDER by date ASC";
    $res=mysqli_query($conn,$query);
    while($data=mysqli_fetch_array($res)){
      $user=$data['user'];
      $chatbot=$data['chatbot'];
      $date=$data['date'];
  ?>
  <div class="container1" style="margin-left: 400px;">
    <img src="user.png" alt="Avatar" style="width:100%;">
    <p id="message"><?php echo $user;?></p>
    <span class="time-left"></span>
  </div>

  <div class="container1 darker" style="margin-right: 400px;">
    <img src="chatbot.png" alt="Avatar" class="right" style="width:100%;">
    <p><?php echo $chatbot;?></p>
    <span class="time-right"></span>
  </div>

<?php } ?>
<div class="sticky">
  <div class="row">
     <div class="col-md-12">
       <div class="input-group mb-3">
          <input type="text" class="form-control" id="msg">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" onclick="send()">enter</button>
            </div>
        </div>
   </div>
  </div>
</div>
</div>
</span>
<br/>

<script type="text/javascript">
  function send(){
    var text=$('#msg').val().toLowerCase();
    
     $.ajax({
                type:"post",
                url:"mysearch.php",
                data:{text:text},
                success:function(data){
                    //alert(data);
                    $('#ref').load(' #ref');
                }
      });
  }
</script>
<script type="text/javascript">
  function digitsOnly(input){
    var regex = /[^a-z ?]/gi;
    input.value= input.value.repalce(regex,"");
  }
  function delete_message(){
    $.ajax({
      type:"post",
      url:"delete_message.php",
      success:function(data){
        $('#ref').load('#ref');
      }
    });
  }
</script>

</body>
</html>