<?php 
// header('Link: <http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css>; rel=preload; as=style, <scripts/js/chat.js>; rel=preload; as=script'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Simple Chat - Bootsnipp.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">

    <meta http-equiv="refresh" content="300"> <!-- 5 minutos -->
    
    <style type="text/css">
        ::-webkit-scrollbar
        {
          width: 12px;  /* for vertical scrollbars */
          height: 12px; /* for horizontal scrollbars */
      }

      ::-webkit-scrollbar-track
      {
          background: rgba(0, 0, 0, 0.1);
      }

      ::-webkit-scrollbar-thumb
      {
          background: rgba(0, 0, 0, 0.5);
          border-radius: 2px;
      }

      .mytext{
        border:0;padding:10px;background:whitesmoke;
    }
    .text{
        width:75%;display:flex;flex-direction:column;
    }
    .text > p:first-of-type{
        width:100%;margin-top:0;margin-bottom:auto;line-height: 13px;font-size: 12px;
    }
    .text > p:last-of-type{
        width:100%;text-align:right;color:silver;margin-bottom:-7px;margin-top:auto;
    }
    .text-l{
        float:left;padding-right:10px;
    }        
    .text-r{
        float:right;padding-left:10px;
    }
    .avatar{
        display:flex;
        justify-content:center;
        align-items:center;
        width:25%;
        float:left;
        padding-right:10px;
    }
    .macro{
        margin-top:5px;width:85%;border-radius:5px;padding:5px;display:flex;
    }
    .msj-rta{
        float:right;background:whitesmoke;
    }
    .msj{
        float:left;background:white;
    }
    .frame{
        background:#e0e0de;
        height:450px;
        overflow:hidden;
        padding:0;
    }
    .frame > div:last-of-type{
        position:absolute;bottom:5px;width:100%;display:flex;
    }
    ul {
        width:100%;
        list-style-type: none;
        padding:18px;
        /* position:absolute; */
        bottom:32px;
        display:flex;
        flex-direction: column;

    }
    .msj:before{
        width: 0;
        height: 0;
        content:"";
        top:-5px;
        left:-14px;
        position:relative;
        border-style: solid;
        border-width: 0 13px 13px 0;
        border-color: transparent #ffffff transparent transparent;            
    }
    .msj-rta:after{
        width: 0;
        height: 0;
        content:"";
        top:-5px;
        left:14px;
        position:relative;
        border-style: solid;
        border-width: 13px 13px 0 0;
        border-color: whitesmoke transparent transparent transparent;           
    }  
    input:focus{
        outline: none;
    }        
    ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
        color: #d4d4d4;
    }
    ::-moz-placeholder { /* Firefox 19+ */
        color: #d4d4d4;
    }
    :-ms-input-placeholder { /* IE 10+ */
        color: #d4d4d4;
    }
    :-moz-placeholder { /* Firefox 18- */
        color: #d4d4d4;
    }   
</style>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
</head>
<body>
    <!DOCTYPE html>
    <html>
    <body>
        <div class="col-sm-3 col-sm-offset-4 frame">
            <div id="chat" style="height: 400px; overflow: auto;">
                <ul></ul>
            </div>
            <div>
                <div class="msj-rta macro" style="margin:auto">                        
                    <div class="text text-r" style="background:whitesmoke !important">
                        <input class="mytext" placeholder="Escreva sua Mensagem"/>
                    </div> 
                </div>
            </div>
        </div>        
    </body>
    </html>

    <script src="scripts/js/cookie.js"></script>
    <script src='scripts/js/long-pooling.js'></script>
    <script src='scripts/js/chat.js'></script>
</body>
</html>
