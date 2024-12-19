$(document).ready(function() {

  let chatHistory = {
    "Чат 1": [],
    "Чат 2": [],
    "Чат 3": []
  };$(document).ready(function() {
    let chatHistory = {
      "Чат 1": [],
      "Чат 2": [],
      "Чат 3": []
    };
  
    // Инициализация активного чата
    let firstChatItem = $('.chat-item').first();
    firstChatItem.addClass('active');
    let activeChat = firstChatItem.find('.chat-name').text();
    let chatImage = $('.chat-header .header-image').css('background-image');
    
    // $('.chat-header').html(`<img src="${chatImage}" class="header-image"> <span>${activeChat}</span>`);
    
  $('.chat-header .header-image').css('background-image', chatImage)
  $('.chat-header span').text(activeChat)
  
    function displayChatHistory(chatName) {
      $('.chat-messages').empty();
      let messages = chatHistory[chatName] || [];
      messages.forEach(function(message) {
        let messageElement = $('<div class="message"></div>').text(message.text);
        if (message.sender === 'user') {
          messageElement.addClass('sent');  
        } else {
          messageElement.addClass('bot');   
        }
        $('.chat-messages').append(messageElement);
      });
      $('.chat-messages').scrollTop($('.chat-messages')[0].scrollHeight);
    }
  
    // Переключение чатов
    $('.chat-item').on('click', function() {
      $('.chat-item').removeClass('active');
      $(this).addClass('active');
      activeChat = $(this).find('.chat-name').text();
      chatImage = $('.chat-item.active .chat-image').css('background-image');
      // $('.chat-header').html(`<img src="${chatImage}" class="header-image"> <span>${activeChat}</span>`);
      
  $('.chat-header .header-image').css('background-image', chatImage)
  $('.chat-header span').text(activeChat)
      displayChatHistory(activeChat);
    });
  
    // Отправка сообщения
    $('#send-btn').on('click', function() {
      let message = $('#chat-input').val();
      if (message.trim() !== '') {
        chatHistory[activeChat].push({ sender: 'user', text: message });
        let messageElement = $('<div class="message sent"></div>').text(message);
        $('.chat-messages').append(messageElement.hide().fadeIn(300));
        $('.chat-messages').scrollTop($('.chat-messages')[0].scrollHeight);
        $('#chat-input').val('');
        setTimeout(function() {
          let botMessage = message;
          chatHistory[activeChat].push({ sender: 'bot', text: botMessage });
          let botElement = $('<div class="message bot"></div>').text(botMessage);
          $('.chat-messages').append(botElement.hide().fadeIn(300));
          $('.chat-messages').scrollTop($('.chat-messages')[0].scrollHeight);
        }, 1000);
      }
    });
  
    // Переключение между боковыми панелями
    // $('.toggle-widget-btn').first().on('click', ()=>{
    //   $('.sidebar').toggleClass('collapsed');
    //   if (!$('.sidebar').hasClass('collapsed')) {
    //     $('.right-widget').addClass('collapsed'); // Закрытие правой панели при открытии левой
    //     $('.widget-toggle').css({ right: '0' });
    //   }
    // });
  
    $('.toggle-widget-btn').on('click', function() {
      $('.right-widget').toggleClass('collapsed');
        $('.sidebar').toggleClass('collapsed'); // Закрытие левой панели при открытии правой
    });
  
    // Переключение секций в правой панели
    $('.toggle-section').on('click', function() {
      const sectionContent = $(this).closest('.widget-section').find('.toggle-content');
      sectionContent.slideToggle();
      $(this).toggleClass('fa-chevron-down fa-chevron-up');
    });
  
    // Эмодзи-панель
    $('#emoji-btn').on('click', function() {
      $('#emoji-picker').toggle();
    });
  
    $(document).on('click', function(e) {
      if (!$(e.target).closest('#emoji-picker, #emoji-btn').length) {
        $('#emoji-picker').hide();
      }
    });
  
    // Отправка сообщения по Enter
    $('#chat-input').on('keypress', function(e) {
      if (e.which === 13) {
        $('#send-btn').click();
      }
    });
  });
  

  let firstChatItem = $('.chat-item').first();
  firstChatItem.addClass('active');
  let activeChat = firstChatItem.find('.chat-name').text();  
  let chatImage = $('.chat-item.active .chat-image').css('background-image');
  console.log(chatImage);
  
  $('.chat-header .header-image').css('background-image', chatImage)
  $('.chat-header span').text(activeChat)
  // .html(`<div style='"${chatImage}"' class="header-image"> <span>${activeChat}</span>`);  

  function displayChatHistory(chatName) {
    $('.chat-messages').empty();

    let messages = chatHistory[chatName] || [];
    
    messages.forEach(function(message) {
      let messageElement = $('<div class="message"></div>').text(message.text);
      if (message.sender === 'user') {
        messageElement.addClass('sent');  
      } else {
        messageElement.addClass('bot');   
      }
      $('.chat-messages').append(messageElement);
    });

    $('.chat-messages').scrollTop($('.chat-messages')[0].scrollHeight);
  }

  $('.chat-item').on('click', function() {
    $('.chat-item').removeClass('active');
    $(this).addClass('active');
  
    activeChat = $(this).find('.chat-name').text();
  
    let chatImage = $('.chat-item.active .chat-image').css('background-image');
    // $('.chat-header').html(`<img src="${chatImage}" class="header-image"> <span>${activeChat}</span>`);
    
  $('.chat-header .header-image').css('background-image', chatImage)
  console.log($('.chat-header .header-image').css('background-image'))
  $('.chat-header span').text(activeChat)
  
    displayChatHistory(activeChat);
  });

  $('#send-btn').on('click', function() {
    let message = $('#chat-input').val();
    if (message.trim() !== '') {
      chatHistory[activeChat].push({ sender: 'user', text: message });

      let messageElement = $('<div class="message sent"></div>').text(message);
      $('.chat-messages').append(messageElement.hide().fadeIn(300));

      $('.chat-messages').scrollTop($('.chat-messages')[0].scrollHeight);
      
      $('#chat-input').val('');
      
      setTimeout(function() {
        let botMessage =message;
        chatHistory[activeChat].push({ sender: 'bot', text: botMessage });
        let botElement = $('<div class="message bot"></div>').text(botMessage);
        $('.chat-messages').append(botElement.hide().fadeIn(300));

        $('.chat-messages').scrollTop($('.chat-messages')[0].scrollHeight);
      }, 1000);
    }
  });

  $('#emoji-btn').on('click', function() {
    $('#emoji-picker').toggle(); 
  });

  $('.emoji').on('click', function() {
    let emoji = $(this).text(); 
    let currentText = $('#chat-input').val();
    $('#chat-input').val(currentText + emoji); 

    $('#emoji-picker').hide(); 
  });

  $('#send-btn').on('click', function() {
    let message = $('#chat-input').val().trim();
    if (message) {
      sendMessage(message); 
      $('#chat-input').val('');
    }
  });

  $(document).on('click', function(e) {
    if (!$(e.target).closest('#emoji-picker, #emoji-btn').length) {
      $('#emoji-picker').hide();
    }
  });

  $('#chat-input').on('keypress', function(e) {
    if (e.which === 13) {
      $('#send-btn').click();
    }
  });
});
