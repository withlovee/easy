/* Copyright (c) NetSlave GmbH, www.netslave.de
 * **
 * ** <script type="text/javascript">
 * ** (function() { var qct = document.createElement('script'); qct.type = 'text/javascript'; qct.async = true;
 * ** qct.src = (document.location.protocol == 'https:' ? 'https' : 'http') + '://[your-affiliate-url]/path/to/getpid.js';
 * ** (document.getElementsByTagName('head')[0] || document.body).appendChild(qct); })();
 * ** </script>
 * */


var qc_proto = (window.location.protocol == "http:") ? 'http' : 'https';
var qc_params = false;

function qc_create_cookie(name,value,days){
    if (days){
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
    
    document.cookie = name+"="+value+expires+"; path=/;"; //domain=
}

function qc_load_qc_pixel(qc_clickid){
        var gp = document.createElement('img'); 
        var qc_top_doc = '';
        if(top.document.location.href != undefined && top.document.location.href != '') qc_top_doc = encodeURI(top.document.location.href);
        gp.src = qc_proto + "://affiliate.lazada.com/go.cgi?cpid="+gl_cpid+"&clickid="+encodeURI(qc_clickid)+"&wmid=bcc&target="+encodeURI(document.location.href)+"&ref="+encodeURI(document.referrer)+"&top="+qc_top_doc;
        gp.height = 1; gp.width = 2; (document.getElementsByTagName('head')[0] || document.body).appendChild(gp);
}

if(location.hash){
    var qc_anchortags = '';qc_anchortags = location.hash.substr(1);
    if(qc_anchortags.substr(0,1) == "Q" ) {
        var qc_date = new Date().getTime();
        qc_clickid = qc_date+'.'+qc_anchortags+'.'+Math.random().toString(36).substring(4);
        qc_create_cookie("qc_cid",qc_clickid,30);
        qc_load_qc_pixel(qc_clickid);
    }
}