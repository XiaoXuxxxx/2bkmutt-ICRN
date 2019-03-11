$.extend($.expr[":"], {
    "containsIN": function(elem, i, match, array) {
    return (elem.textContent || elem.innerText || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
    }
});

function setProgress(id, at){
    var from =  parseInt($("#" + id + "-progress")[0].style.width.replace("%",""));
    $("#" + id + "-progress").css("width", at+"%");
    if( at == 0 || at == 100){
        setTimeout( function(){
            $("#" + id + "-main").animate({"opacity": 0});
        }, 500);
    }else if(from == 0 || from == 100){
        $("#" + id + "-main").animate({"opacity": 1});
    }
}
