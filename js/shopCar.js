window.onload=function  () {
	var ooneMoney=document.getElementsByClassName('aMoney');
	var otshopNum=document.getElementsByClassName('shopNum');
	var obJia= document.getElementsByClassName('jia');
	var obJian= document.getElementsByClassName('jian');
	var osumMoney=document.getElementsByClassName('sumMoneyWord');
	var ooneGood=document.getElementsByClassName('oneGood');
	var osumTotalWord=document.getElementById('sumTotalWord');
	
//	obJia.onclick=function  () {
//		otshopNum.value=otshopNum.value*1+1;
//		osumMoney.innerHTML=(otshopNum.value*1)*(ooneMoney.innerHTML*1);		
//	}
//	
//	obJian.onclick=function  () {
//		console.log(this)
//		otshopNum.value=otshopNum.value*1-1;
//		osumMoney.innerHTML=(otshopNum.value*1)*(ooneMoney.innerHTML*1);		
//	}

//	alert(osumTotalWord.innerHTML);
	for (var i = 0; i < ooneGood.length; i++) {
		(function  (i) {
			//点击+
			obJia[i].onclick=function  () {
				var sum1=0;
				otshopNum[i].value=otshopNum[i].value*1+1;
				osumMoney[i].innerHTML=(otshopNum[i].value*1)*(ooneMoney[i].innerHTML*1);
				//处理最终结果
				for (var j = 0; j < ooneGood.length; j++) {
					(function  (j) {
						sum1=sum1+osumMoney[j].innerHTML*1;
//						alert(osumTotalWord.innerHTML);
					})(j)
				}
				osumTotalWord.innerHTML=sum1;
			};
			//+结束
			//点击-
			obJian[i].onclick=function  () {
				var sum2=0;
				otshopNum[i].value=otshopNum[i].value*1-1;
				if (otshopNum[i].value<=0) {
					otshopNum[i].value=1;
				}
				osumMoney[i].innerHTML=(otshopNum[i].value*1)*(ooneMoney[i].innerHTML*1);
				//处理最终结果
				for (var k = 0; k < ooneGood.length; k++) {
					(function  (k) {
						sum2=sum2+osumMoney[k].innerHTML*1;
//						alert(osumTotalWord.innerHTML);
					})(k)
				}
				osumTotalWord.innerHTML=sum2;
			};
			//-结束
		})(i);	
	}
}

