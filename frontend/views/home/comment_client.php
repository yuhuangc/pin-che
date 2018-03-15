<?php
/**
 * Created by PhpStorm.
 * User: huangy02
 * Date: 2018/3/15
 * Time: 15:37
 */
?>
<div>
    发送内容：<textarea name="content" id="content" cols="30" rows="10"></textarea><br>
    发送给谁：<input type="text" name="toUid" value="" id="toUid"><br>
    <button onclick="send();">发送</button>
</div>

<script>
    var ws = new WebSocket("ws://119.29.248.59:9501?uid=<?php echo $uid ?>&token=<?php echo $token; ?>");
    ws.onopen = function(event) {
    };
    ws.onmessage = function(event) {
        var data = event.data;
        data = eval("("+data+")");
        if (data.event == 'alertTip') {
            alert(data.msg);
        }
    };
    ws.onclose = function(event) {
        console.log('Client has closed.\n');
    };

    function send() {
        var obj = document.getElementById('content');
        var content = obj.value;
        var toUid = document.getElementById('toUid').value;
        ws.send('{"event":"alertTip", "toUid": '+toUid+'}');
    }
</script>
