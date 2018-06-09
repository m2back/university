$(document).ready(function(){
  $(".submitDetailData").click(function(){
    alert("goba");
    var fname = $(".fname").val();
    var lname = $(".lname").val();
    var father_name = $(".father_name").val();
    var national_code = $(".national_code").val();
    var prsnl_id = $(".prsnl_id").val();
    var birthday = $(".birthday").val();
    var sex = $(".sex").val();
    var major = $(".major").val();
    var evidence = $(".evidence").val();
    var send = true;
    $.post("../pages/sendqueryspc.php", {fname:fname,lname:lname,father_name:father_name,evidence:evidence
    national_code:national_code,prsnl_id:prsnl_id,birthday:birthday,sex:sex,major:major,send:send} , function(data){
    $(".result").html(data);
    });
  });
});
