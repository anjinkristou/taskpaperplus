(function(){var _a,_b,_c,eventType,firstKeydown,keyHandler,keydownTimer,lastKeydownTime,specialKeys;specialKeys={8:'backspace',9:'tab',13:'return',16:'shift',17:'ctrl',18:'alt',19:'pause',20:'capslock',27:'esc',32:'space',33:'pageup',34:'pagedown',35:'end',36:'home',37:'left',38:'up',39:'right',40:'down',45:'insert',46:'del',91:'meta',93:'meta',96:'0',97:'1',98:'2',99:'3',100:'4',101:'5',102:'6',103:'7',104:'8',105:'9',106:'*',107:'+',109:'-',110:'.',111:'/',112:'f1',113:'f2',114:'f3',115:'f4',116:'f5',117:'f6',118:'f7',119:'f8',120:'f9',121:'f10',122:'f11',123:'f12',144:'numlock',145:'scroll',191:'/',219:'[',220:'\\',221:']',224:'meta'};firstKeydown=true;keydownTimer=null;lastKeydownTime=0;keyHandler=function(handleObj){var emulateKeyup,keys,origHandler;if((typeof handleObj.data!=='string')){return null;}
origHandler=handleObj.handler;keys=handleObj.data.toLowerCase().split(' ');handleObj.handler=function(event){var _a,_b,_c,character,key,modif,possible,special;modif='';possible={any:true};special=event.type!=='keypress'&&specialKeys[event.which];event.altKey&&special!=='alt'?modif+='alt+':null;event.ctrlKey&&special!=='ctrl'?modif+='ctrl+':null;if(event.metaKey&&(!event.ctrlKey)&&special!=='meta'){modif+='meta+';if(event.type==='keydown'){if(lastKeydownTime===0){firstKeydown=true;setTimeout((function(){firstKeydown=false;return firstKeydown;}),420);clearTimeout(keydownTimer);keydownTimer=setTimeout(emulateKeyup,500);}else if(!firstKeydown){clearTimeout(keydownTimer);keydownTimer=setTimeout(emulateKeyup,90);}
lastKeydownTime=new Date().getTime();}}
event.shiftKey&&special!=='shift'?modif+='shift+':null;if(special){possible[modif+special]=true;}else{character=String.fromCharCode(event.which).toLowerCase();possible[modif+character]=true;}
_b=keys;for(_a=0,_c=_b.length;_a<_c;_a++){key=_b[_a];if(possible[key]){return origHandler.apply(this,arguments);}}};emulateKeyup=function(){lastKeydownTime=0;return $window.trigger('keyup');};return emulateKeyup;};_b=['keydown','keyup','keypress'];for(_a=0,_c=_b.length;_a<_c;_a++){eventType=_b[_a];$.event.special[eventType]={add:keyHandler};}})();