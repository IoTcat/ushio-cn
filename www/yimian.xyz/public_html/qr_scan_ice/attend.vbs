Set xmlhttp = CreateObject("msxml2.xmlhttp")
xmlhttp.open "post", "https://ice.xjtlu.edu.cn/login/index.php", False
xmlhttp.setRequestHeader "Content-Type", "application/x-www-form-urlencoded"
xmlhttp.send "username=yimian.liu17&password=lymian$0904@112"
Set xmlhttp = CreateObject("msxml2.xmlhttp")
xmlhttp.open "post", "https://ice.xjtlu.edu.cn/mod/attendance/attendance.php?qrpass=09hpll&sessid=18385", False
xmlhttp.setRequestHeader "Content-Type", "application/x-www-form-urlencoded"
xmlhttp.send ""
set fso=createobject("scripting.filesystemobject")
set f=fso.opentextfile("return.txt",2,true):f.write xmlhttp.responseText:f.close