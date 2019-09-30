
<html xmlns="http://wwww.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1/">
        <title>Website Payment Standard </title>
        <script type="text/javascript" langauge="javascript">
             function paypal_submit(){
               //  var actionName='https://www.paypal.com/cgi-bin/webscr';
                 var actionName='https://www.sandbox.paypal.com/cgi-bin/webscr';
                 
                 
                 document.forms.frmOrderAutoSubmit.action=actionName;
                 document.forms.frmOrderAutoSubmit.submit();
             }
        </script>
            
    </head>
    
    <body onload="paypal_submit();">
        <form style="padding: 0px;margin: 0px;" name="frmOrderAutoSubmit" method="POST">
            
            <input type="hidden" name="upload" value="1">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="robinahmedcse@gmail.com">    
            
                
                
                 <input type="hidden" name="quantity" value="1"/>
                 <input type="hidden" name="item_name" value="laptop">
                 <input type="hidden" name="amount" value="100">    
            
                     
                  <input type="hidden" name="rm" value="2"/>
                 <input type="hidden" name="address_override" value="0">
                 <input type="hidden" name="first_name" value="">    
            
            
                 <input type="hidden" name="address" value="2"/>
                 <input type="hidden" name="address2" value="0">
                 <input type="hidden" name="city" value="">    
            
                 
            
        </form>
    </body>
</html>

