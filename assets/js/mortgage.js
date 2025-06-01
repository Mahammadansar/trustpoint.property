 $(document).ready(function(){
  pStat=false;nStat=false;rStat=false;dStat=false;
  $("#calculate-btn").prop("disabled",true);

  checkPrice();
  checkSpan();    
  downPaymentCal();
  downCheck();
  checkRate();

  $("#prop-price").keyup(function(){checkPrice()});
  $("#loan-span").keyup(function(){checkSpan()});
  $("#down-payment").keyup(function(){downPaymentCal()});
  $("#down-payment-in-p").keyup(function(){downCheck()});
  $("#interest-rate").keyup(function(){checkRate()});


  $("#calculate-btn").click(function(){
    $(".pre-val").hide();
    var inputp = $("#prop-price").val();
    var inputr = $("#interest-rate").val();
    var inputn = $("#loan-span").val();
    var inputd = $("#down-payment").val();

    if(inputr!= null && inputp!=null && inputn!=null && inputr!= 0 && inputp!=0 && inputn!=0 && $.isNumeric(inputr) && $.isNumeric(inputp) && $.isNumeric(inputn) ){
      var oute=emi(inputp,inputn,inputr,inputd);
      $("#re-out-er").hide();
      $("#re-out-bi").show();
      // console.log(oute)
      // var fin=formatter.format(oute);
      $("#re-out-bi-value").html(oute);
      $("#re-out-more").show();
      $("#re-out-sm").removeClass("text-danger");
      $("#re-out-sm").html("Approximate mortgage rate (Exclusive of all the fees)");
      $("#tip-place").html("Click on the more details button for more");
    }
    else{
      $("#re-out-bi").hide();
      $("#re-out-er").show();
      $("#re-out-er").html("Invalid Values");
      $("#re-out-sm").html("Please enter the corrent PNR values.");
      $("#re-out-sm").addClass("text-danger");
    }
  });

});

 function emi(p,n,r,d){
  var n = n*12;
  d=p*(d/100);
  var p = p-d;
  r=((r)/12)/100;
  var E=(p*r*(Math.pow((1+r),n)))/(Math.pow((1+r),n)-1);
  return Math.round(E);
}

function succeed_input(mode,icon,value,msg){
  $("#"+icon).removeClass('hide-optional');
  $("#"+value).html(msg);
  if(mode=='suc'){
    $("#"+icon).removeClass('text-danger');
    $("#"+icon).addClass('text-success');
    if(pStat==true && nStat==true && rStat==true && dStat==true){
      $("#calculate-btn").prop("disabled",false);
      $("#tip-place").html("Please press the Calculate button");
      $("#calculate-btn").click();
      return true;
    }        
  }else{        
    $("#"+icon).removeClass('text-success');
    $("#"+icon).addClass('text-danger');
    $("#re-out-bi-value").html("0.0");
    $("#tip-place").html("Please provide valid entries");
    return false;
  }      
  $("#calculate-btn").prop("disabled",true);        
}
function downPaymentCal(){
  var princi = $("#prop-price").val();
  var valiD = $("#down-payment").val();
  if(!$.isNumeric(valiD)){
    dStat=false;
    succeed_input('err','pro-down-icon','pro-down-val','Down payment must be above 35%');        
  }else{
    var valiDP = Math.round(princi*(valiD/100));          
    $("#down-payment-in-p").val(valiDP);
    if( valiD < 90 && valiD > 34 ){          
      dStat=true;
      succeed_input('suc','pro-down-icon','pro-down-val','Done');                    
    }else{
      dStat=false;
      succeed_input('err','pro-down-icon','pro-down-val','Down payment must be above 35%');
    }}
  }

  // New
  function checkPrice(){
    var valiP = $("#prop-price").val();
    if(!$.isNumeric(valiP)){
      succeed_input('err','pro-pri-icon','pro-pri-val','Enter a value above 10,000'); }
      else{
        if(valiP > 9999 && valiP < 999999999999 ){
          pStat=true;
          succeed_input('suc','pro-pri-icon','pro-pri-val','Done');
          downPaymentCal(valiP);
        }else{
          pStat=false;
          succeed_input('err','pro-pri-icon','pro-pri-val','Enter a value above 10,000');
        } 
      }
    }

    function checkSpan(){
      var valiS = $("#loan-span").val();
      if(!$.isNumeric(valiS)){
        succeed_input('err','pro-spa-icon','pro-spa-val','Enter between 5 and 25 years'); }
        else{
          if(valiS > 4 && valiS < 26 ){
            nStat=true;
            succeed_input('suc','pro-spa-icon','pro-spa-val','Done');
          }else{
            nStat=false; 
            succeed_input('err','pro-spa-icon','pro-spa-val','Enter between 5 and 25 years');
          }}
        }

        function downCheck(){
          var valiDPA = $("#down-payment-in-p").val();
          if(!$.isNumeric(valiDPA)){
            dStat=false;
            succeed_input('err','pro-down-icon','pro-down-val','Enter a valid number');
          }else{

            var princi = $("#prop-price").val();
            if(princi>9999 && princi < 999999999999 ){
              var valiDPAuto=Number((((valiDPA/princi)*100)).toFixed(1));
              $("#down-payment").val(valiDPAuto);
              if( valiDPAuto > 90 || valiDPAuto < 34){
                dStat=false;
                succeed_input('err','pro-down-icon','pro-down-val','Invalid down payment');
              }else{  dStat=true; succeed_input('suc','pro-down-icon','pro-down-val','Good'); }
            }
          }
        }

        function checkRate(){
          var valiR = $("#interest-rate").val();
          if(!$.isNumeric(valiR)){
            succeed_input('err','pro-rat-icon','pro-rat-val','Enter Rate between 0 and 10');
          }else{
            if(valiR > 0 && valiR < 10 ){
              rStat=true;
              succeed_input('suc','pro-rat-icon','pro-rat-val','Done');
            }else{ 
              rStat=false;
              succeed_input('err','pro-rat-icon','pro-rat-val','Normal interest rate is 0 to 5%');
            }}
          }
