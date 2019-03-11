$(function(){
    $("#first-time-search-form").on("submit", function(e){
        e.preventDefault();
        search();
    });
});

function search(){
    var search = $("#search-box").val().split(' ').join('%20');;
    var error = $("#first-time-search-error");
    var success = $("#first-time-search-success");
    error.html(""); success.html(""); $("#first-time-next-step-btn").css("display", "none");
    var bar = "first-time-progress-bar";
    setProgress(bar, 10);
    $.ajax({
        url: APP_URL + "/api/v1/user-profile/" + search,
    }).done(function(data) {
        setProgress(bar, 30);
        console.log(data);
        if( data.info.found == 0 ){
            setProgress(bar, 100);
            error.html("ไม่พบข้อมูล");
        }else{
            setProgress(bar, 50);
            if(data.content.length > 1){
                setProgress(bar, 100);
                var str = "พบข้อมูลมากกว่าหนึ่ง:<br>";
                for(var i = 0; i < data.content.length; i++){
                    str += "- " + data.content[i].camp_id + ": " + data.content[i]["first_name-en"] + " " + data.content[i]["last_name-en"] + "<br>";
                }
                error.html(str);
            }else{
                setProgress(bar, 100);
		if(data.content[0]["first_name-th"]==''){
                	success.html("พบข้อมูลแล้ว: " + data.content[0]["first_name-en"] + " " + data.content[0]["last_name-en"] + " (" + data.content[0].camp_id + ")" + "<br>");
                }
		else if(data.content[0]["first_name-th"]!=''){
			success.html("พบข้อมูลแล้ว: " + data.content[0]["first_name-th"] + " " + data.content[0]["last_name-th"] + " (" + data.content[0].camp_id + ")" + "<br>");
		}
		$("#camp_id").val(data.content[0].camp_id);
                $("#first-time-next-step-btn").css("display", "block");
            }
        }
    });
}
