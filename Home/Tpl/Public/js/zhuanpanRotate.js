
    $(function() {
        window.requestAnimFrame = (function() {
            return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame ||
            function(callback) {
				
                window.setTimeout(callback, 1000 / 60)
            }
        })();
        var totalDeg = 360 * 3 + 0;
		//var totalDeg = 360+ 0;
        var steps = [];
        //var lostDeg = [36, 66, 96, 156, 186, 216, 276, 306, 336];
        //var prizeDeg = [6, 126, 246];
		var lostDeg = [337];
        //var prizeDeg = [337,292,247,202,157,112,67];
		var prizeDeg = [22,292,67,157,202,112,247];
        var prize, sncode;
		var praisecontent= '';
        var count = 0;
        var now = 0;
        var a = 0.01;
        var outter, inner, timer, running = false;
        function countSteps() {
            var t = Math.sqrt(2 * totalDeg / a);
            var v = a * t;
            for (var i = 0; i < t; i++) {
                steps.push((2 * v * i - a * i * i) / 2)
            }
            steps.push(totalDeg)
        }
        function step() {
			
            outter.style.webkitTransform = 'rotate(' + steps[now++] + 'deg)';
            outter.style.MozTransform = 'rotate(' + steps[now++] + 'deg)';
            if (now < steps.length) {
                requestAnimFrame(step);
				
            } else {
				
                //running = false;
                setTimeout(function() {
                    if (prize != null) {
//                        var type = "";
//                        if (prize == 1) {
//                            type = "一等奖";
//                        } else if (prize == 2) {
//                            type = "二等奖";
//                        } else if (prize == 3) {
//                            type = "三等奖";
//                        }else if (prize == 4) {
//                            type = "四等奖";
//                        }else if (prize == 5) {
//                            type = "五等奖";
//                        }else if (prize == 6) {
//                            type = "六等奖";
//                        }else if (prize == 7) {
//                            type = "七等奖";
//                        }
						alert('恭喜你，中得'+praisecontent+'!')
						window.location.href="http://wx.wayhu.com/kh_wnzp/index.php/Index/result?gamecode=ofAFbuH3lDSXVL8BnaT7M45A2hf8&gametype=home";
				
                        
                    } else {
						
                       alert("真遗憾，就差一点，再接再厉");
						location.reload();
                    }
                },
                200)
            }
        }
        function start(deg) {
            deg = deg || lostDeg[parseInt(lostDeg.length * Math.random())];
            running = true;
            clearInterval(timer);
            totalDeg = 360 * 5 + deg;
			//totalDeg = 360 + deg;
            steps = [];
            now = 0;
            countSteps();
            requestAnimFrame(step)
        }
        window.start = start;
        outter = document.getElementById('outer');
        inner = document.getElementById('inner');
        i = 10;
        $("#inner").click(function() {
			
            if (running) return;
           
            $.ajax({
                url: "http://wx.wayhu.com/kh_wnzp/index.php/Index/run",
                dataType: "json",
                data: {
                   
                },
                beforeSend: function() {
                    running = true;
                    timer = setInterval(function() {
                        i += 5;
                        outter.style.webkitTransform = 'rotate(' + i + 'deg)';
                        outter.style.MozTransform = 'rotate(' + i + 'deg)'
                    },
                    1)
                },
                success: function(data) {
					
					var p = data.praisecontent;//奖项
					var id = data.id; //奖项ID
					if(id==8){
						
						start(lostDeg[0]);
						prize = null;
					}else{
						
						start(prizeDeg[id-1]);
						prize=id;
						praisecontent = p;
					
					}
					
                    
                    //running = false;
                    return;
                },
                error: function() {
					//alert("here");
                    prize = null;
                    start();
                    running = false;
                    count++
                },
                timeout: 4000
            })
        })
    });
   
