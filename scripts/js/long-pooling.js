function getContentMessage(timestamp)
{
    var 
    queryString = {'timestamp' : timestamp};  
    letter = '';

    $.get('scripts/php/api/getMessage.php', queryString, function(data)
    {
        var responseJSON = JSON.parse(data).messages;
        var resonseTimeStamp = JSON.parse(data).timestamp;

        var obj = responseJSON;

        for (var k in responseJSON)
        {
            letter = obj[k].username.substr(0,1);
            avatar = "http://placeholdit.imgix.net/~text?txtsize=22&w=48&h=48&txt=" + letter.toUpperCase();


            insertChat(obj[k].username.toUpperCase() == (global_name !== null ? global_name.toString().toUpperCase() : 'null') ? 'me' : '' , obj[k], avatar);

            $('#chat').scrollTop($('ul').height());
        }

        getContentMessage(resonseTimeStamp);
    });
}