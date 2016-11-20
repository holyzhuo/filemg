
    function myCheck()
            {
               for(var i=0;i<document.form1.elements.length-1;i++)
               {
                  if(document.form1.elements[i].value=="")
                  {
                     alert("当前表单不能有空项");
         //一进入页面将光标定位到第一个input
                     document.form1.elements[i].focus();
                     return false;
                  }
               }
               return true;
              
            }
