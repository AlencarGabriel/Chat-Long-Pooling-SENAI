var 
avatar = '',
global_name = getCookie("global_name");

function formatAMPM(date) {
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
            hours = hours ? hours : 12; // the hour '0' should be '12'
            minutes = minutes < 10 ? '0'+minutes : minutes;
            var strTime = hours + ':' + minutes + ' ' + ampm;
            return strTime;
        }            

//-- No use time. It is a javaScript effect.
function insertChat(who, obj, avatar, time = 0){
    var control = "";
    // var date = formatAMPM(new Date());

    if (who == "me"){

        control = '<li style="width:100%">' +
        '<div class="msj macro">' +
        '<div class="avatar"><img class="img-circle" style="width:100%;" src="' + avatar + '" /></div>' +
        '<div class="text text-l">' +
        '<p>'+ obj.message +'</p>' +
        '<p><small>'+obj.created_at+'</small></p>' +
        '</div>' +
        '</div>' +
        '</li>';                    
    }else{
        control = '<li style="width:100%;">' +
        '<div class="msj-rta macro">' +
        '<div class="text text-r">' +
        '<p>'+obj.message+'</p>' +
        '<p><small>'+obj.created_at+'</small></p>' +
        '</div>' +
        '<div class="avatar" style="padding:0px 0px 0px 10px !important"><img class="img-circle" style="width:100%;" src="' + avatar + '" /></div>' +                                
        '</li>';
    }

    setTimeout(
        function(){                        
            $("ul").append(control);
            $('#chat').scrollTop($('ul').height());
        }, time);

    setTimeout(
        function(){
            $('#chat').scrollTop($('ul').height());
        }
        , 1000);
}

function resetChat(){
    $("ul").empty();
}

function Send(message, author){
    function guid() {
        function s4() {
            return Math.floor((1 + Math.random()) * 0x10000)
            .toString(16)
            .substring(1);
        }

        return s4() + s4() + '-' + s4() + '-' + s4() + '-' + s4() + '-' + s4() + s4() + s4();
    }

    $.post(
        'scripts/php/api/setMessage.php',
        {token: guid, message: message, username: author}, 
        function(data, textStatus, xhr) {
            console.log(data);
        });
}

$(".mytext").on("keyup", function(e){
    if (e.which == 13){
        var text = $(this).val();
        if (text !== ""){
            Send(text, global_name == "" ? '' : global_name);
            $(this).val('');
        }
    }
});

//-- Clear Chat
resetChat();

$(document).ready(function()
{

    if (getCookie("global_name") == "null" || getCookie("global_name") == "") {
        setCookie("global_name", prompt("Informe o seu nome:", ""), 1);
    }

    getContentMessage();
    
    $('.mytext').focus();
});

