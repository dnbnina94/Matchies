//autor: Milena Filipovic 73/13

function pullData()
{
    retrieveChatMessages();

    setTimeout(pullData,1500);
}

function retrieveChatMessages()
{
  $.ajax({
    method : 'GET',
    url: '/ucitajPoruke/'+chatId,
    data: {chatId: chatId, _token : token}
  }).done( function (msges){

     $('#progressComplete').css('width', (msges['number']) + "%");
     var data= '';
       console.log('poyref');
    if(msges['number'] < 100){
      data= "<i class='fa fa-lock' style='font-size: 20px; color: #333333'></i>";
    }else{
        data= " <i class='fa fa-unlock-alt' style='font-size: 20px; color: #333333'></i>";
    }
     $('#lockGly').html(data);
     var data1="";
     $('#tabelica1').html(data1);
     var messages = msges['messages'];
     var text= "";
     var time ="";
     var idFrom = 0;
     for (i = 0; i < messages.length; i++) {
                text = messages[i]["text"];
                time = messages[i]["time"];
                idFrom = messages[i]["id_source_user"];
                if(msges['userTo']["id"] == idFrom){
                  data1 = "<tr><td class='colleft' id='sirina'><div style='display: table; table-layout: fixed; word-break: break-word'><div style='display: table-row'><div style='display: table-cell' class='msgBox1'><span class='message'>"+text+"</span> <br/><span class='messagetime'>"+time+"</span></div></div></div></td></tr>";
                  $('#tabelica1').append(data1);

                }else{
                  data1="<tr><td id='sirina' align='right' style='padding-top: 15px; padding-left: 10px;'><div style='display: table; table-layout: fixed; word-break: break-word'><div style='display: table-row'><div style='display: table-cell' class='msgBox2' ><span class='message'>"+text+"</span> <br/><span class='messagetime'>"+time+"</span></div></div></div></td></tr>";
                  $('#tabelica1').append(data1);
                }
            }
            var objDiv = document.getElementById("messageBoxContainer");
            objDiv.scrollTop = objDiv.scrollHeight;

  });
}


$(document).ready(function() {

// ovo je kod za send message

$("#subButt").click(function(event){
    event.preventDefault();
    sendMessage();
});

});

function sendMessage(){
    console.log('poy');
  $.ajax({
    method : 'POST',
    url: '/chat/'+chatId,
    data: {message: $('#message').val(), _token : token}
  }).done( function (msges){

     $('#progressComplete').css('width', (msges['number']) + "%");
     var data= '';
    if(msges['number'] < 100){
      data= "<i class='fa fa-lock' style='font-size: 20px; color: #333333'></i>";
    }else{
        data= " <i class='fa fa-unlock-alt' style='font-size: 20px; color: #333333'></i>";
    }
    $('#message').val('');
     $('#lockGly').html(data);
     var data1="";
     $('#tabelica1').html(data1);
     var messages = msges['messages'];
     var text= "";
     var time ="";
     var idFrom = 0;
     for (i = 0; i < messages.length; i++) {
                text = messages[i]["text"];
                time = messages[i]["time"];
                idFrom = messages[i]["id_source_user"];
                if(msges['userTo']["id"] == idFrom){
                  data1 = "<tr><td class='colleft' id='sirina'><div style='display: table; table-layout: fixed; word-break: break-word'><div style='display: table-row'><div style='display: table-cell' class='msgBox1'><span class='message'>"+text+"</span> <br/><span class='messagetime'>"+time+"</span></div></div></div></td></tr>";
                  $('#tabelica1').append(data1);

                }else{
                  data1="<tr><td id='sirina' align='right' style='padding-top: 15px; padding-left: 10px;'><div style='display: table; table-layout: fixed; word-break: break-word'><div style='display: table-row'><div style='display: table-cell' class='msgBox2' ><span class='message'>"+text+"</span> <br/><span class='messagetime'>"+time+"</span></div></div></div></td></tr>";
                  $('#tabelica1').append(data1);
                }
            }
            var objDiv = document.getElementById("messageBoxContainer");
            objDiv.scrollTop = objDiv.scrollHeight;

  });



}
