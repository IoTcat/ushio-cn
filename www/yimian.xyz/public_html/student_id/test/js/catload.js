var bubblsarry=[];

var canvas=document.getElementById('canvas');
canvas.width=document.body.clientWidth;
canvas.height=document.body.clientHeight;
window.onload=function(){
var context=canvas.getContext('2d');
var ballcount=-1;

  
setInterval(function(){
	
		ballcount = ballcount + 1;
		
		if(ballcount<=360)
		{    
			Drawball(context,20,ballcount);	
				
				Draw(context,ballcount);
		}
		else{
		ballcount=0;	
		}
		
	},50);


	}

//绘制眼珠
function Drawball(cxt,r ,i){
 
	cxt.clearRect(0,0,canvas.width, canvas.height);
	 DrawCircle(cxt);
	cxt.beginPath();
	cxt.arc((canvas.width/2-45)+(Math.sin((6*i)/180*Math.PI)*r),(canvas.height/2-20 )-(Math.cos((6*i)/180*Math.PI)*r),4,0,2*Math.PI);
   cxt.fillStyle="black"; 
   cxt.fill();
   cxt.closePath();
   cxt.beginPath();
	cxt.arc((canvas.width/2+45)+(Math.sin((6*i)/180*Math.PI)*r),(canvas.height/2 -20)-(Math.cos((6*i)/180*Math.PI)*r),4,0,2*Math.PI);
   cxt.fillStyle="black"; 
   cxt.fill();
   cxt.closePath();
}
//画耳朵
function ears_left(cxt){
	 cxt.save();
	  cxt.beginPath();
	   cxt.translate(canvas.width/2,canvas.height/2-100);//将画布坐标系原点移至中心
	 cxt.rotate(20*Math.PI/180); 
	 cxt.translate(-(canvas.width/2-70),-(canvas.height/2));//修正画布坐标系
	 cxt.moveTo(canvas.width/2-30,canvas.height/2);
   cxt.quadraticCurveTo(canvas.width/2,canvas.height/2-70 ,canvas.width/2+30,canvas.height/2);
	 cxt.fillStyle="#228b7f"; 
   cxt.fill();
	  cxt.closePath();
	  cxt.restore();
}
function ears_right(cxt){
	 cxt.save();
	  cxt.beginPath();
	   cxt.translate(canvas.width/2,canvas.height/2-100);//将画布坐标系原点移至中心
	 cxt.rotate(-20*Math.PI/180); //旋转
	 cxt.translate(-(canvas.width/2+70),-(canvas.height/2));//修正画布坐标系
	 cxt.moveTo(canvas.width/2-30,canvas.height/2);
   cxt.quadraticCurveTo(canvas.width/2,canvas.height/2-70 ,canvas.width/2+30,canvas.height/2);
		 cxt.fillStyle="#228b7f"; 
   cxt.fill();
	  cxt.closePath();
	  cxt.restore();
}
//绘制运动的三个小球
function Draw(cxt,i){

   cxt.beginPath();
	cxt.arc((canvas.width/2)+(Math.sin((8*i)/180*Math.PI)*200),(canvas.height/2)-(Math.cos((8*i)/180*Math.PI)*200),10,0,2*Math.PI);
   cxt.fillStyle="rgba(34,139,127,1)";
   cxt.fill();
   cxt.closePath();
	cxt.beginPath();
   
	cxt.arc((canvas.width/2)+(Math.sin((8*(i-1))/180*Math.PI)*200),(canvas.height/2)-(Math.cos((8*(i-1))/180*Math.PI)*200),8,0,2*Math.PI);
   cxt.fillStyle="rgba(34,139,127,0.8)";
   cxt.fill();
   cxt.closePath();
	cxt.beginPath();
	cxt.arc((canvas.width/2)+(Math.sin((8*(i-2))/180*Math.PI)*200),(canvas.height/2)-(Math.cos((8*(i-2))/180*Math.PI)*200),6,0,2*Math.PI);
   cxt.fillStyle="rgba(34,139,127,0.6)";
   cxt.fill();
   cxt.closePath();

	
}
//绘制猫咪
function DrawCircle(cxt){ 
	ears_left(cxt);
	ears_right(cxt);
  cxt.beginPath();
   cxt.moveTo(canvas.width/2,canvas.height/2-100);
   cxt.bezierCurveTo(canvas.width/2+170,canvas.height/2-100,canvas.width/2+170,canvas.height/2+100,canvas.width/2,canvas.height/2+100);
   cxt.moveTo(canvas.width/2,canvas.height/2+100);
   cxt.bezierCurveTo(canvas.width/2-170,canvas.height/2+100,canvas.width/2-170,canvas.height/2-100,canvas.width/2,canvas.height/2-100);

   cxt.fillStyle="#29a69c"; 
	cxt.fill();
   cxt.closePath();
   
   cxt.beginPath();
cxt.arc(canvas.width/2-45,canvas.height/2-20,30,0,2*Math.PI);

   cxt.fillStyle="white"; 
   cxt.fill();
   cxt.closePath();
	 cxt.beginPath();
cxt.arc(canvas.width/2+45,canvas.height/2-20,30,0,2*Math.PI);
   cxt.fillStyle="white"; 
   cxt.fill();
	cxt.beginPath();
 
	cxt.moveTo(canvas.width/2-30,canvas.height/2+40);
   cxt.bezierCurveTo(canvas.width/2-30,canvas.height/2+60,canvas.width/2,canvas.height/2+60,canvas.width/2,canvas.height/2+40);
   cxt.moveTo(canvas.width/2,canvas.height/2+40);
   cxt.bezierCurveTo(canvas.width/2,canvas.height/2+60,canvas.width/2+30,canvas.height/2+60,canvas.width/2+30,canvas.height/2+40);
   
   cxt.lineCap="round";
   cxt.lineWidth=4;
   cxt.strokeStyle="#228b7f"; 
   cxt.stroke();
   cxt.closePath();
}
	