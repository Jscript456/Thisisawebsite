<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: login.php');
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>stm gossip</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(function() {
      // update the chat every 1 second
      setInterval(function() {
        $.ajax({
          url: 'getMessages.php',
          success: function(data) {
            $('#messages').html(data);
          }
        });
      }, 1000);

      // send a message when the form is submitted
      $('#messageForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
          url: 'sendMessage.php',
          method: 'post',
          data: $(this).serialize(),
          success: function() {
            $('#messageForm input[type="text"]').val('');
          }
        });
      });
    });
  </script>
</head>
<body>
  <h1>Chat</h1>
  <div id="messages"></div>
  <form id="messageForm">
    <input type="text" name="message">
    <input type="submit" value="Send">
  </form>
</body>
</html>
