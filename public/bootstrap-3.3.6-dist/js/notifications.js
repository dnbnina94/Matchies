//autor: Milena Filipovic 73/13

function pullNotifications()
{
    retrieveNotifications();

    setTimeout(pullNotifications,3000);
}


function retrieveNotifications(){
  $.ajax({
    method : 'GET',
    url: '/retrieveNotifications',

  }).done( function (notify){
  //  console.log(notify['number']);
    var number = notify['number'];

    if(number > 0 ){
      var dataInsert = "<span class='badge' id='numAlerts' style='background-color:white; color:#AE0000; border-radius: 10px;'>"+number+"</span>";
      $('#alerts').html(dataInsert);

    }else{
      $('#alerts').html('');
    }

      $('#alerts').html();

  });
}
