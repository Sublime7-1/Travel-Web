var tabQie = function(lis,divs){
        // 当前高亮显示的页签的索引
        var index=0;
      };
      tabQie.prototype.tabChange =function(lis,divs){
        var _this = this;
          // 遍历每一个页签且给他们绑定事件
            for(var i=0;i<lis.length;i++){
              lis[i].id=i;
              lis[i].onmouseover=function(){
                changeOption(this.id);
              }
            }
            function changeOption(curIndex){
              for(var j=0;j<lis.length;j++){
                 lis[j].className='';
                 divs[j].style.display='none';
              }
              // 高亮显示当前页签
              lis[curIndex].className='select';
              divs[curIndex].style.display='block';
              _this.index=curIndex;
            }
      }
  
    var aTabLength = $('.tabCon').length;
    for(var i = 0; i<aTabLength; i++){
        function addCss(i){
          $('.tabCon:eq('+i+') .tabChange:first').css('display', 'block');
        }
        addCss(i);
    }