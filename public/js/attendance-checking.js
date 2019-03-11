var apiLead = APP_URL + "/api/v1/attendance/";
var timeDiff;
var currentSelected;
var localCheckedTracker;
var globalCheckedTracker;
var localLastChecked;
var globalLastChecked = {};
var users = {};
var statusUp;

$(function(){

    init();

    $(".user-attendance-card").click( function(){
        var to = ! select( $(this).data("camp_id") ).data("checked");
        setVisual($(this).data('camp_id'), to);
        setStatusAs($(this).data('camp_id'), to);
    });

    $("#check-search").on('change keyup paste', function(e){
        if(e.which == 13) {
            e.preventDefault();
            $("#check-search").val("");
            setVisual(currentSelected, true);
            setStatusAs(currentSelected, true);
            search();
        }else{
            search();
        }
    });

    Offline.on('up', function(){
        connectionStatusSet("up");
    });

    Offline.on('down', function(){
        connectionStatusSet("down");
    });

});

function updateLocalLastChecked(id, status){
    $(".local-name").html(id + " ("+ $("*[data-camp_id='"+id+"']").find('.nickname-th').html() +")");
    if( status == "unchecked" ){
        $(".local-status").css("color", "red");
        $(".local-status").html("UNCHECKED");
    }else if(status){
        $(".local-status").css("color", "green");
        $(".local-status").html("CONFIRMED");
    }else if(!status){
        $(".local-status").css("color", "grey");
        $(".local-status").html("SYNCING");
    }
}

function updateGlobalLastChecked(){
    $(".last-check").html("");
    for(var i = 0; i < 10; i++){
        if(globalLastChecked[i] == null) continue;
        $(".last-check-" + (i+1)).html(globalLastChecked[i].camp_id +
        " (" + $("*[data-camp_id='"+ globalLastChecked[i].camp_id + "']").find('.nickname-th').html() + ") by " +
        users[ globalLastChecked[i].checker ] + "<p class='small-last-check'>at " + globalLastChecked[i].location +
        " (" + globalLastChecked[i].at + ")</p>"
        );
    }
}


function updateCheckedCount(checked, all,dorm,McountD,McountH){
	$("#status-checked").html(checked + "/" + all);
}

function setStatusAs(id, state){

    Offline.check();

    if(state){
        var url = "check";
        localLastChecked = id;
        updateLocalLastChecked(id, false);
    }else{
        var url = "remove";
        updateLocalLastChecked(id, "unchecked");
    }
    $.ajax({
        method: "POST",
        url: apiLead + url,
        data: {
            session_date: $("#status-date").val(),
            session_key: $("#status-key").val(),
            camp_id: id,
            location: $("#status-location").val()
        }
    }).done(function(data){

    }).fail(function( jqXHR, textStatus, errorThrown ){
        connectionStatusSet("warning");
    });
}

function checkStatus(){

    Offline.check();

    $.ajax({
        method: "POST",
        url: apiLead + "get",
        data: {
            session_date: $("#status-date").val(),
            session_key: $("#status-key").val()
        }
    }).done(function(data){
       if( data.status == 200 ) {
           updateGlobalCheckedTracker(data.content);
           updateCheckedCount(data.count.checked, data.count.all, data.count.home, data.count.dorm);
       }
    }).fail(function( jqXHR, textStatus, errorThrown ){
        connectionStatusSet("warning");
    });
}

function search(){
    var search = $("#check-search").val();
    $(".user-attendance-card").css("display", "none");
    var found = $(".user-attendance-card:containsIN('" + search + "')");
    found.css("display","block");
    if( search.length == 0 ){
        setSearchInfo("Start typing to search.")
    }else{
        var visible = $("#display").find(".user-attendance-card").filter(function(){ return this.style && this.style.display === 'block' });
        currentSelected = visible.first().data("camp_id");
        var count = visible.length;
        setSearchInfo("Found " + count + " occurrences. Press 'enter' to check " + currentSelected + ".");
    }
}

function setSearchInfo(str){
    $("#check-search-info").html(str);
}

function connectionStatusSet(str){
    var text;
    var color;
    if( str == "up" ){
        text = "ONLINE [เช็คได้ตามปกติ]";
        color = "green";
    }
    if( str == "down" ){
        text = "OFFLINE";
        color = "red";
    }
    if( str == "warning" ){
        text = "WARNING [มีปัญหาในการเชื่อมต่อ]";
        color = "orange";
    }
    if( str == "fetal" ){
        text = "ERROR";
        color = "red";
    }
    $("#status-connection").html(text).css("color", color);
}

function getUsers(){
    $.ajax({
        method: "GET",
        url: apiLead + "getusers",
    }).done(function(data){
        var tempusers = data.content;
        for( var i = 0; i < tempusers.length; i++ ){
            users[ tempusers[i]['id'] ] = tempusers[i]['name'];
        }
    })
}

function init(){

    getUsers();

    $("#status-date").val(new Date().toISOString().substring(0, 10));
    $("#main-container").removeClass("container").addClass("container-fluid");
    var hrs = new Date().getHours();
    var min = new Date().getMinutes();
    var sec = new Date().getSeconds();
    console.log(sec);
//    if( hrs == 1 && min == 13 && (sec >=20 && sec < 22    )){
//	window.location.reload();
  //  }
    if( hrs >= 6 && hrs < 10 ){
	if(hrs >= 9 && min >= 30){
        var key = "L";
	statusUp = "L";
	}
	else{
	var key = "M";
        statusUp = "M";
	}
    }else if( hrs >=10 && hrs <16 ){
	var key = "L";
        statusUp = "L";
    }else if( hrs >= 16 && hrs < 20 ){
        var key = "E";
	statusUp = "E";
    }else if( hrs >= 20 && hrs < 24 ){
        var key = "N";
	statusUp = "N";
	if(document.getElementById("status-location").value ="BANGMOD"){
                document.getElementById("status-location").value = "BANGKHUNTIEN";
        }
        else{
                document.getElementById("status-location").value = "BANGKHUNTIEN";
        }
    }else{
        var key = "X";
	statusUp = "X";
    }
    $("#status-key").val(key);
    $.ajax({
        url: apiLead + "server-time"
    }).done(function( data ) {
        timeDiff = data.content - parseInt((Date.now() / 1000).toFixed());
    });
    clock();
    trackerInit();
    search();
    connectionStatusSet(Offline.state);

}

function trackerInit(){

    localCheckedTracker = {};
    var allArr = $(".user-attendance-card").map(function() {
                    return $(this).data("camp_id");
                 }).get();
    for( var i = 0; i < allArr.length ; i++ ){
        localCheckedTracker[ allArr[i] ] = false;
    }

    checkStatus();

}

function updateGlobalCheckedTracker(data){
    globalCheckedTracker = {};
    globalLastChecked = {};
    var allGlobalArr = data;
    for( var i = 0; i < allGlobalArr.length; i++ ){
        globalCheckedTracker[ allGlobalArr[i]['camp_id'] ] = true;
        if(allGlobalArr.length - i <= 10) globalLastChecked[allGlobalArr.length - i - 1] = allGlobalArr[i];
        if(localLastChecked == allGlobalArr[i]['camp_id'] ) updateLocalLastChecked(allGlobalArr[i]['camp_id'], true);
    }

    updateVisual();
    updateGlobalLastChecked();

}

function updateVisual(){
    $.each(localCheckedTracker, function(key, value){
        if( value == true && globalCheckedTracker[key] == null ){
            setVisual(key, false);
        }
        if( value == false && globalCheckedTracker[key] == true ){
            setVisual(key, true);
        }
    });
}

function clock(){
    setInterval(function(){
        var time = new Date(Date.now() + timeDiff).toTimeString().replace(/.*(\d{2}:\d{2}:\d{2}).*/, "$1");;
        $("#status-time").html(time);
    }, 1000);

    setInterval(function(){
        checkStatus();
    }, 2000);

}

function toggleVisual(id){
    if( select(id).data("checked") ){
        setVisual(id, false);
    }else{
        setVisual(id, true);
    }
}

function setVisual(id, state){
    if(state){
        localCheckedTracker[id] = true;
        select(id).find(".user-attendance-card-inner").addClass("user-attendance-card-selected");
        select(id).data("checked", true);
    }else{
        localCheckedTracker[id] = false;
        select(id).find(".user-attendance-card-inner").removeClass("user-attendance-card-selected");
        select(id).data("checked", false);
    }
}

function select(id){
    return $('[data-camp_id='+id+']');
}
