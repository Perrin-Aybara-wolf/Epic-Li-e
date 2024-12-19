<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href={{asset("css/chat.css")}}>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="chat-list">
                <div class="chat-item" data-chat="Чат 1">
                  <img src="https://s3-alpha-sig.figma.com/img/4b65/0691/4b39d3234b2684ba3053391e9c0652f0?Expires=1729468800&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=X~7jJma6na8MLHyHq6CIsNDji5AI7wJsH~9Knswz7OEj3Fymgvn7MIjz-E5bV9h4ivSoyx2BxqpwhJg2c9vnJiOjjgHqqVMruVRa1Up~pCOw3hUpKd4g1mwnap-flImPLHM7ob3u8dOkX76oKyEQsiTe3K-gt7IK1Ui6TbC4qpR2bdT4hIj9FXy16qPE27Mxf7m9hb7cyKtINs0wpgPd~mWh3WvoK3f0wCpjwjZS3NRRM~Ane-Z1u73JuI910k4aWHJUipwX361CBjbozprWap~FT6YgLYHK52eRTmOq0iITWKLQcYcqE6beE~s1xCr5lqTEijsI-GoFU9IjozmUbQ__" alt="Chat 1" class="chat-image">
                  <span class="chat-name">Чат 1</span>
                </div>
                <div class="chat-item" data-chat="Чат 2">
                  <img src="https://s3-alpha-sig.figma.com/img/4b65/0691/4b39d3234b2684ba3053391e9c0652f0?Expires=1729468800&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=X~7jJma6na8MLHyHq6CIsNDji5AI7wJsH~9Knswz7OEj3Fymgvn7MIjz-E5bV9h4ivSoyx2BxqpwhJg2c9vnJiOjjgHqqVMruVRa1Up~pCOw3hUpKd4g1mwnap-flImPLHM7ob3u8dOkX76oKyEQsiTe3K-gt7IK1Ui6TbC4qpR2bdT4hIj9FXy16qPE27Mxf7m9hb7cyKtINs0wpgPd~mWh3WvoK3f0wCpjwjZS3NRRM~Ane-Z1u73JuI910k4aWHJUipwX361CBjbozprWap~FT6YgLYHK52eRTmOq0iITWKLQcYcqE6beE~s1xCr5lqTEijsI-GoFU9IjozmUbQ__" alt="Chat 2" class="chat-image">
                  <span class="chat-name">Чат 2</span>
                </div>
                <div class="chat-item" data-chat="Чат 3">
                  <img src="https://s3-alpha-sig.figma.com/img/4b65/0691/4b39d3234b2684ba3053391e9c0652f0?Expires=1729468800&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=X~7jJma6na8MLHyHq6CIsNDji5AI7wJsH~9Knswz7OEj3Fymgvn7MIjz-E5bV9h4ivSoyx2BxqpwhJg2c9vnJiOjjgHqqVMruVRa1Up~pCOw3hUpKd4g1mwnap-flImPLHM7ob3u8dOkX76oKyEQsiTe3K-gt7IK1Ui6TbC4qpR2bdT4hIj9FXy16qPE27Mxf7m9hb7cyKtINs0wpgPd~mWh3WvoK3f0wCpjwjZS3NRRM~Ane-Z1u73JuI910k4aWHJUipwX361CBjbozprWap~FT6YgLYHK52eRTmOq0iITWKLQcYcqE6beE~s1xCr5lqTEijsI-GoFU9IjozmUbQ__" alt="Chat 3" class="chat-image">
                  <span class="chat-name">Чат 3</span>
                </div>
              </div>              
        </div>
      
        <div class="main-chat">
          <div class="chat-header">Чат 1</div>
          <div class="chat-messages"></div>
          <div class="chat-input-area">
            <button id="emoji-btn">😊</button>
            <input type="text" id="chat-input" placeholder="Введіть повідомлення...">
            <button id="send-btn">Надіслати</button>
          </div>
          <div id="emoji-picker" class="emoji-picker">
            <span class="emoji">😀</span>
            <span class="emoji">😂</span>
            <span class="emoji">😍</span>
            <span class="emoji">😎</span>
            <span class="emoji">😢</span>
            <span class="emoji">👍</span>
          </div>
        </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src={{asset("js/chat.js")}}></script>
</body>
</html>